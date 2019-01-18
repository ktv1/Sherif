<?php

namespace App\Http\Controllers\Voyager;

use App\Currency;//for convertion
use App\Models\Attribute;
use App\Product;//for convertion

use App\Category;
use App\ProductCategoriesPivot;

use App\ProductWholesale;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ProductsController extends VoyagerBaseController
{
    //***************************************
    //               ____
    //              |  _ \
    //              | |_) |
    //              |  _ <
    //              | |_) |
    //              |____/
    //
    //      Browse our Data Type (B)READ
    //
    //****************************************
    public function index(Request $request)
    {   
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = $this->getSlug($request);

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        $getter = $dataType->server_side ? 'paginate' : 'get';

        $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];
        $searchable = $dataType->server_side ? array_keys(SchemaManager::describeTable(app($dataType->model_name)->getTable())->toArray()) : '';
        $orderBy = $request->get('order_by');
        $sortOrder = $request->get('sort_order', null);

        // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $relationships = $this->getRelationships($dataType);

            $model = app($dataType->model_name);
            $query = $model::select('*')->with($relationships);

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'browse');

            if ($search->value && $search->key && $search->filter) {
                $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';
                $query->where($search->key, $search_filter, $search_value);
            }

            if ($orderBy && in_array($orderBy, $dataType->fields())) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'DESC';
                $dataTypeContent = call_user_func([
                    $query->orderBy($orderBy, $querySortOrder),
                    $getter,
                ]);
            } elseif ($model->timestamps) {
                $dataTypeContent = call_user_func([$query->latest($model::CREATED_AT), $getter]);
            } else {
                $dataTypeContent = call_user_func([$query->orderBy($model->getKeyName(), 'DESC'), $getter]);
            }

            // Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
            // If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
            $model = false;
        }

        // Check if BREAD is Translatable
        if (($isModelTranslatable = is_bread_translatable($model))) {
            $dataTypeContent->load('translations');
        }

        // Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        $view = 'voyager::bread.browse';

        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }

        return Voyager::view($view, compact(
            'dataType',
            'dataTypeContent',
            'isModelTranslatable',
            'search',
            'orderBy',
            'sortOrder',
            'searchable',
            'isServerSide'
        ));
    }

    //***************************************
    //                _____
    //               |  __ \
    //               | |__) |
    //               |  _  /
    //               | | \ \
    //               |_|  \_\
    //
    //  Read an item of our Data Type B(R)EAD
    //
    //****************************************

    public function show(Request $request, $id)
    {
        
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $relationships = $this->getRelationships($dataType);
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $dataTypeContent = call_user_func([$model->with($relationships), 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }
        //dd($dataTypeContent);
        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.read';

        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }

        /* Currency displaying */
        if($dataTypeContent->currency_final) {
            $currency = Currency::where('id', '=', $dataTypeContent->currency_final)->first(); //retrieve currency object
            $currency_name = $currency->name;
        } else {
            $currency_name = '';
        }

        /* WHolesale price displaying */
        $wholesale = Product::find($id)->wholesale;

        $main_category = Category::where('id', $dataTypeContent->maincategory)->first();
        $dataTypeContent->maincategory = $main_category;

        $attributes =  Attribute::all();
        //$product_attributes = A

        /*All editing info*/
        $edit_info = DB::table('product_edit_info')->where('product_id', $id)->first();

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'))->with('currency_name', $currency_name)->with('wholesales', $wholesale)->with('edit_info', $edit_info);
    }

    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $relationships = $this->getRelationships($dataType);

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? app($dataType->model_name)->with($relationships)->findOrFail($id)
            : DB::table($dataType->name)->where('id', $id)->first(); // If Model doest exist, get data from table name

        foreach ($dataType->editRows as $key => $row) {
            $details = json_decode($row->details);
            $dataType->editRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        //dd(Product::i()->SubcategoryAttributes($dataTypeContent->maincategory));
        $categories = Category::get();
        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        //maincategory: categories list
        $categories_ids = DB::table('product_categories_pivot')->where('product_id', $id)->get();//list of product categories
        foreach($categories_ids as $item) {
            $categories_list[] = DB::table('categories')->where('id', $item->category_id)->first();
        }
        //dd($categories_list);

        /* WHolesale price displaying */
        $wholesale = Product::find($id)->wholesale;

        /*All editing info*/
        $edit_info = DB::table('product_edit_info')->where('product_id', $id)->first();

        
        $characteristics = DB::table('characteristics')->get()->toArray();

        $characteristics_list = DB::table('products_characteristics_pivot')->where('product_id', $id)->pluck('characteristic_id')->toArray();//list of all characteristics of the product
        $characteristics_list = array_unique($characteristics_list, SORT_NUMERIC );//list of characteristics of the product without duplicating
        
        $characteristics_list_objects = [];
        foreach( $characteristics_list as $item) {
            $characteristics_list_objects[] = DB::table('characteristics')->where('id', $item)->first();//list of objects characteristics of the product without duplicating
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'))->with('categories', $categories)->with('wholesales', $wholesale)->with('edit_info', $edit_info)->with('categories_list', $categories_list)->with('characteristics', $characteristics)->with('characteristics_list_objects', $characteristics_list_objects);
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
    
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
    
        /* Final price convertation */
        if($request->currency_final) {
            if($request->profitability != Product::select('profitability')->where('id', $id)->first()->profitability) { //if entered profitability percent is different from such in db, then count new profitability percent
                $currency = Currency::where('id', '=', $request->currency_final)->first(); //retrieve currency object

                $price_final =  ceil(($request[$currency->name]) * ($request->profitability / 100) * $currency->rate);
                
                $request->merge(['price_final' => $price_final]);

                $sale_price = $request->price_final * (100 - $request->sale_discount) / 100;
                $sale_price = ceil($sale_price);
                $request->merge(['sale_price' => $sale_price]);
            } else {
                $price_final = $request->price_final;
                $sale_price = $request->price_final * (100 - $request->sale_discount) / 100;
                $sale_price = ceil($sale_price);
                $request->merge(['sale_price' => $sale_price]);
            }//if not save corrected new final price
        }

        //Inserting wholesale options of the product
        if($slug == 'products') {
            if(!$request->ajax()) {

                ProductWholesale::where('product_id', '=', $id)->delete();

                $i = 0;

                while(isset($request->sale[$i]) && isset($request->quantity[$i]) && isset($request->unit[$i])) {

                    $product_wholesale = new ProductWholesale;

                    $product_wholesale->product_id = $data->id;
                    $product_wholesale->quantity = $request->quantity[$i];
                    $product_wholesale->unit = $request->unit[$i];;
                    $product_wholesale->discount = $request->sale[$i];

                    $new_price = $price_final * (100 - $product_wholesale->discount) / 100;
                    $product_wholesale->price = round($new_price, 2, PHP_ROUND_HALF_UP);

                    $product_wholesale->save();

                    $i++;
                }
            }

            /* Publication history */
            if(Product::find($id)->publication == '1') {
                $last_value = 'on';
            } else {
                $last_value = 0;
            }

            $user_name = \Auth::user()->name;
            
            if($request->publication !== $last_value) {
                if($request->publication == 'on') {
                    DB::table('product_edit_info')->where('product_id', $id)
                        ->update(['publication_updated_at' => date("Y-m-d H:i:s"), 'publication_user' => $user_name, 'publication_action' => 'Опубликовано']);
                } else {
                    DB::table('product_edit_info')->where('product_id', $id)
                        ->update(['publication_updated_at' => date("Y-m-d H:i:s"), 'publication_user' => $user_name, 'publication_action' => 'Снято с публикации']);
                }
            }

            /* Editing history */
            DB::table('product_edit_info')->where('product_id', $id)->update(['editing_updated_at' => date("Y-m-d H:i:s"), 'editing_user' => $user_name]);

            /* Description editor */
            $last_description = Product::find($id)->description;
            if($request->description != $last_description) {
                DB::table('product_edit_info')->where('product_id', $id)->update(['description_updated_at' => date("Y-m-d H:i:s"), 'description_user' => $user_name]);
            }

            /* Status date and info */
            DB::table('product_edit_info')->where('product_id', $data->id)->update(['status_updated_at' => date("Y-m-d H:i:s"), 'status_user' => $user_name, 'status' => DB::table('product_statuses')->where('id', $request->status)->first()->name]);
            if($request->status == '3') {
                DB::table('product_edit_info')->where('product_id', $data->id)->update(['status_to_change' => date("Y-m-d H:i:s", strtotime("+10 day", strtotime("now")))]);
            } else {
                DB::table('product_edit_info')->where('product_id', $data->id)->update(['status_to_change' => null]);
            }
        }

        /*sale price 
        if($slug == 'products') {
            if(isset($request->sale_discount)) {
                if($request->sale_discount != Product::select('sale_discount')->where('id', $id)->first()->sale_discount) { //if entered discount percent is different from such in db, then count new discount percent
                    $sale_price = $request->price_final * (100 - $request->sale_discount) / 100;
                    //$sale_price = round($sale_price, 2, PHP_ROUND_HALF_UP);
                    $sale_price = ceil($sale_price);
                    $request->merge(['sale_price' => $request->sale_price]);
                } elseif($request->sale_price != Product::select('sale_price')->where('id', $id)->first()->sale_price) { //if entered sale price is different from such in db, then count new sale price
                    $sale_discount = (($request->price_final - $request->sale_price)/$request->price_final)*100;
                    //$sale_price = round($sale_price, 2, PHP_ROUND_HALF_UP);
                    $sale_discount = ceil($sale_discount);
                    $request->merge(['sale_discount' => $request->sale_discount]);
                }
            }
        }*/
        
        /// addimage
        if ($request->addimage) {
            $strimage = array();
            foreach ($request->addimage as $image){
                if (is_array($image) && isset($image['image'])) {
                    if (!is_file($image['image'])) {
                        $strimage[] .= $image['image'];
                    }
                }
            }
            $data->addimage = json_encode($strimage);
        }
        
        // if (!$request->product_belongstomany_attribute_relationship) {
        //     $request->merge(['product_belongstomany_attribute_relationship' => []]);
        // } else {
        //     $attr = [];

        //     foreach ($request->product_belongstomany_attribute_relationship as $attribute) {

        //         if(is_array($attribute['value'])) {
        //             $valstr = '';
        //             foreach ($attribute['value'] as $val) {
        //                 $valstr = $valstr . '/' . $val;
        //             };
        //             $attr[$attribute['attribute_id']] = array(
        //                 'value' => substr($valstr, 1)//$attribute['value']
        //             );
        //         } else {
        //             $attr[$attribute['attribute_id']] = array(
        //                 'value' => $attribute['value']
        //             );
        //         }
        //     }
        //     //dd($request->product_belongstomany_attribute_relationship);
        //     $request->merge(['product_belongstomany_attribute_relationship' => $attr]);
        // }
        if($request->concomitant) {
            $request->merge(['concomitant' =>addslashes(json_encode($request->concomitant))]);
        } else {
            $request->merge(['concomitant' =>'']);;
        }
        if($request->similar) {
            $request->merge(['similar' =>addslashes(json_encode($request->similar))]);
        } else {
            $request->merge(['similar' =>'']);
        }
        
        // Check permission
        $this->authorize('edit', $data);
        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id);

        //$date = $request->all();
        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }
        if (!$request->ajax()) {
            
            /*Characteristics adding*/
            if(DB::table('products_characteristics_pivot')->where('product_id', $id)->first()) {
                DB::table('products_characteristics_pivot')->where('product_id', $id)->delete();
            } 
            if(isset($request->characteristics_options)) {
                if(is_array($request->characteristics_options)) {
                    foreach($request->characteristics_options as $option) {
                        DB::table('products_characteristics_pivot')->insert([['product_id' => $id, 'characteristic_id' => DB::table('characteristic_options')->where('id', $option)->first()->id_characteristic, 'option_id' => $option]]);
                        
                    }
                } else {
                    DB::table('products_characteristics_pivot')->insert([['product_id' => $id, 'characteristic_id' => DB::table('characteristic_options')->where('id', $request->characteristics_options)->first()->id_characteristic, 'option_id' => $request->characteristics_options]]);
                }
            }
            


            //decrementing old categories and incrementing new
            $old_categories = DB::table('product_categories_pivot')->where('product_id', '=', $id)->get();
            foreach($old_categories as $old_category) {
                Category::where('id', $old_category->category_id)->decrement('in_stock');
            }
            foreach($request->product_belongstomany_сategory_relationship as $new_category) {
                Category::where('id', $new_category)->increment('in_stock');
            }

            //Inserting wholesale options of the product
            ProductWholesale::where('product_id', '=', $id)->delete();

            $i = 0;

            while(isset($request->sale[$i]) && isset($request->quantity[$i]) && isset($request->unit[$i])) {

                $product_wholesale = new ProductWholesale;

                $product_wholesale->product_id = $data->id;
                $product_wholesale->quantity = $request->quantity[$i];
                $product_wholesale->unit = $request->unit[$i];;
                $product_wholesale->discount = $request->sale[$i];

                $new_price = $price_final * (100 - $product_wholesale->discount) / 100;
                $product_wholesale->price = round($new_price, 2, PHP_ROUND_HALF_UP);

                $product_wholesale->save();

                $i++;
            }

            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

            //if label is set to None
            if(!isset($request->label)) {
                $data->label_end_date = null;
                $data->label = null;
                $data->save();  
            }

            event(new BreadDataUpdated($dataType, $data));

            
            if($request->button_type == 'submit_add') {
                return redirect()
                ->route("voyager.{$dataType->slug}.create")
                ->with([
                    'message'    =>  __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
            } elseif($request->button_type == 'submit_read') {
                return redirect()->action(
                    'Voyager\ProductsController@edit', ['id' => $id]
                )
                ->with([
                    'message'    =>  __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ])->withInput();
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);
        
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;

        foreach ($dataType->addRows as $key => $row) {
            $details = json_decode($row->details);
            $dataType->addRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        $categories = Category::get();
        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'))->with('categories', $categories);
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        /* Final price convertation */
        if($request->currency_final) {
            $currency = Currency::where('id', '=', $request->currency_final)->first(); //retrieve currency object

            $price_final =  ($request[$currency->name]) * ($request->profitability / 100) * $currency->rate;

            $request->merge(['price_final' => $price_final]);
        }
        
        if($slug == 'products') {
            if(isset($request->sale_discount)) {
                $sale_price = $request->price_final * (100 - $request->sale_discount) / 100;
                $sale_price = round($sale_price, 2, PHP_ROUND_HALF_UP);
                $sale_price = ceil($sale_price);
                $request->merge(['sale_price' => $sale_price]);
            }
        }
        
        //checking if product with same vendor code and manufacturer exists
        $products = Product::where('vendor_code', $request->vendor_code)->where('manufacturer', $request->manufacturer)->first();
        if(isset($products)) {
            return redirect()
                ->route("voyager.{$dataType->slug}.create")
                ->withInput()
                ->with([
                    'message'    => __('Товар с такими артикулом и производителем уже существуют'),
                    'alert-type' => 'error',
                ]); 
        }
        
        if (!$request->has('_validate')) {


            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
            if(!$data->code) {
                /* Generating product code */
                if(isset($request->maincategory)) {
                    $data->code = $code = $request->product_belongstomany_category_relationship[0] . '-' . $data->id;  
                    $data->save();
                }
                
            }   

            /*Characteristics adding*/
            if(is_array($request->characteristics_options)) {
                foreach($request->characteristics_options as $option) {
                    DB::table('products_characteristics_pivot')->insert([['product_id' => $id, 'characteristic_id' => DB::table('characteristic_options')->where('id', $option)->first()->id_characteristic, 'option_id' => $option]]);
                    
                }
            } else {
                DB::table('products_characteristics_pivot')->insert([['product_id' => $id, 'characteristic_id' => DB::table('characteristic_options')->where('id', $request->characteristics_options)->first()->id_characteristic, 'option_id' => $request->characteristics_options]]);
            }


            /* Increasing quantity of stock in related categories */
            foreach($request->product_belongstomany_сategory_relationship as $item) {
                Category::where('id', '=', $item )->increment('in_stock');
            }

            //Inserting wholesale options of the product
            if($slug == 'products') {
                $i = 0;

                while(isset($request->sale[$i]) && isset($request->quantity[$i]) && isset($request->unit[$i])) {

                    $product_wholesale = new ProductWholesale;

                    $product_wholesale->product_id = $data->id;
                    $product_wholesale->quantity = $request->quantity[$i];
                    $product_wholesale->unit = $request->unit[$i];;
                    $product_wholesale->discount = $request->sale[$i];

                    $new_price = $price_final * (100 - $product_wholesale->discount) / 100;
                    $product_wholesale->price = round($new_price, 2, PHP_ROUND_HALF_UP);

                    $product_wholesale->save();

                    $i++;
                }

                //creating row record in product_edit_info
                DB::table('product_edit_info')->insert(['product_id' => $data->id]);

                /* Publication history */
                $user_name = \Auth::user()->name;

                if($request->publication == 'on') {
                    DB::table('product_edit_info')->where('product_id', $data->id)
                        ->update(['publication_updated_at' => date("Y-m-d H:i:s"), 'publication_user' => $user_name, 'publication_action' => 'Опубликовано']);
                } else {
                    DB::table('product_edit_info')->where('product_id', $data->id)
                        ->update(['publication_updated_at' => date("Y-m-d H:i:s"), 'publication_user' => $user_name, 'publication_action' => 'Снято с публикации']);
                }

                /* Editing history */
                DB::table('product_edit_info')->where('product_id', $data->id)->update(['editing_updated_at' => date("Y-m-d H:i:s"), 'editing_user' => $user_name]);

                /* Description editor */
                if(isset($request->description)) {
                    DB::table('product_edit_info')->where('product_id', $data->id)->update(['description_updated_at' => date("Y-m-d H:i:s"), 'description_user' => $user_name]);
                }

                /* Status date and info */
                DB::table('product_edit_info')->where('product_id', $data->id)->update(['status_updated_at' => date("Y-m-d H:i:s"), 'status_user' => $user_name, 'status' => DB::table('product_statuses')->where('id', $request->status)->first()->name]);
                if($request->status == '3') {
                    DB::table('product_edit_info')->where('product_id', $data->id)->update(['status_to_change' => date("Y-m-d H:i:s", strtotime("+10 day", strtotime("now")))]);
                } else {
                    DB::table('product_edit_info')->where('product_id', $data->id)->update(['status_to_change' => null]);
                }
                
            }

            event(new BreadDataAdded($dataType, $data));

            if ($request->ajax()) {
                return response()->json(['success' => true, 'data' => $data]);
            }

            if($request->button_type == 'submit_add') {
                return redirect()
                ->route("voyager.{$dataType->slug}.create")
                ->with([
                    'message'    =>  __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
            } elseif($request->button_type == 'submit_read') {
                return redirect()->action(
                    'Voyager\ProductsController@edit', ['id' => $data->id]
                )
                ->with([
                    'message'    =>  __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
            }
            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    //***************************************
    //                _____
    //               |  __ \
    //               | |  | |
    //               | |  | |
    //               | |__| |
    //               |_____/
    //
    //         Delete an item BREA(D)
    //
    //****************************************

    public function destroy(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('delete', app($dataType->model_name));

        // Init array of IDs
        $ids = [];
        if (empty($id)) {
            // Bulk delete, get IDs from POST
            $ids = explode(',', $request->ids);
        } else {
            // Single item delete, get ID from URL
            $ids[] = $id;
        }

        foreach($ids as $id) {
            //decrementing old categories and incrementing new
            $old_categories = DB::table('product_categories_pivot')->where('product_id', '=', $id)->get();
            foreach($old_categories as $old_category) {
                Category::where('id', $old_category->category_id)->decrement('in_stock');
            }
        }
        
        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
            $this->cleanup($dataType, $data);

            //delete relations with categories
            $deletedRows = DB::table('product_categories_pivot')->where('product_id', '=', $id)->delete();

            //delete relations with wholesaleprices
            $deletedRows = DB::table('product_wholesales')->where('product_id', '=', $id)->delete();
        }

        $displayName = count($ids) > 1 ? $dataType->display_name_plural : $dataType->display_name_singular;

        $res = $data->destroy($ids);
        $data = $res
            ? [
                'message'    => __('voyager::generic.successfully_deleted')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager::generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }

    /**
     * Remove translations, images and files related to a BREAD item.
     *
     * @param \Illuminate\Database\Eloquent\Model $dataType
     * @param \Illuminate\Database\Eloquent\Model $data
     *
     * @return void
     */
    protected function cleanup($dataType, $data)
    {
        // Delete Translations, if present
        if (is_bread_translatable($data)) {
            $data->deleteAttributeTranslations($data->getTranslatableAttributes());
        }

        // Delete Images
        $this->deleteBreadImages($data, $dataType->deleteRows->where('type', 'image'));

        // Delete Files
        foreach ($dataType->deleteRows->where('type', 'file') as $row) {
            foreach (json_decode($data->{$row->field}) as $file) {
                $this->deleteFileIfExists($file->download_link);
            }
        }
    }

    /**
     * Delete all images related to a BREAD item.
     *
     * @param \Illuminate\Database\Eloquent\Model $data
     * @param \Illuminate\Database\Eloquent\Model $rows
     *
     * @return void
     */
    public function deleteBreadImages($data, $rows)
    {
        foreach ($rows as $row) {
            if ($data->{$row->field} != config('voyager.user.default_avatar')) {
                $this->deleteFileIfExists($data->{$row->field});
            }

            $options = json_decode($row->details);

            if (isset($options->thumbnails)) {
                foreach ($options->thumbnails as $thumbnail) {
                    $ext = explode('.', $data->{$row->field});
                    $extension = '.'.$ext[count($ext) - 1];

                    $path = str_replace($extension, '', $data->{$row->field});

                    $thumb_name = $thumbnail->name;

                    $this->deleteFileIfExists($path.'-'.$thumb_name.$extension);
                }
            }
        }

        if ($rows->count() > 0) {
            event(new BreadImagesDeleted($data, $rows));
        }
        //$this->deleteFileIfExists($path.$data->mainimage);
        $imagesarr = json_decode($data->addimage);
        foreach ($imagesarr as $addimg) {
            $this->deleteFileIfExists($addimg);
        }
        //dd($imagesarr);
    }

    /**
     * Order BREAD items.
     *
     * @param string $table
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function order(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        if (!isset($dataType->order_column) || !isset($dataType->order_display_column)) {
            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::bread.ordering_not_set'),
                    'alert-type' => 'error',
                ]);
        }

        $model = app($dataType->model_name);
        $results = $model->orderBy($dataType->order_column)->get();

        $display_column = $dataType->order_display_column;

        $view = 'voyager::bread.order';

        if (view()->exists("voyager::$slug.order")) {
            $view = "voyager::$slug.order";
        }

        return Voyager::view($view, compact(
            'dataType',
            'display_column',
            'results'
        ));
    }

    public function update_order(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        $model = app($dataType->model_name);

        $order = json_decode($request->input('order'));
        $column = $dataType->order_column;
        foreach ($order as $key => $item) {
            $i = $model->findOrFail($item->id);
            $i->$column = ($key + 1);
            $i->save();
        }
    }
}