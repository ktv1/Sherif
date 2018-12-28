<?php

namespace App\Http\Controllers\ClientsController;
set_time_limit(0);
use App\Characteristic;
use App\CharacteristicOption;
use App\JoomlaProducts;
use App\ProductCharacteristicPivot;
use App\ProductImages;
use App\ProductsExtraFields;
use App\ProductsExtraFieldsValues;
use App\Provider;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategoriesPivot as CategoryPivot;
use Illuminate\Support\Facades\Cache;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use Response;

class CatalogController extends Controller
{

    public function getSlugCPU($slug)
    {

        $parts = explode('/',$slug);

        $endslug = end($parts);

        array_pop($parts);

        // catalog

        $cat = Category::where('slug',$endslug)->first();

        if ($cat) {
            $categorypath = Product::i()->GetCategoriesPath($cat->parent_id);
            if (count($parts) == count($categorypath)) {
                $i = 0;
                foreach ($categorypath as $k => $path) {
                    if($path !== $parts[$i])
                    {
                        return abort('404');
                    }
                    $i++;
                }
            }
            $firstslug = collect($parts)->first();
            return $this->responseCategory($cat->id,$firstslug,$endslug);
        }

        $product = Product::where('slug',$endslug)->first();
        if($product)
        {
            return ProductController::i()->getProduct('','',$slug);
        }

    }

    public function responseCategory($cat_id,$firstslug ='',$endslug)
    {
        $firstCategory = Category::where('slug',$firstslug)->first();
        $currentCategory = Category::where('id',$cat_id)->first();
        $childcategories = Category::where('parent_id',$cat_id)->get();
        $products = CategoryPivot::join('products as p','p.id','product_categories_pivot.product_id')
            ->where('category_id',$cat_id);

        if((Request()->get('sortby') == 'name') && (Request()->get('orderby') == 'ASC')) {
            $productsCategory = $products->orderBy('name', 'ASC');
        } elseif((Request()->get('sortby') == 'name') && (Request()->get('orderby') == 'DESC')) {
            $productsCategory = $products->orderBy('name', 'DESC');
        }elseif((Request()->get('sortby') == 'name') && (Request()->get('orderby') == null)) {
            $productsCategory = $products->orderBy('name', 'ASC');
            //////////////////////
        } elseif((Request()->get('sortby') == 'default') && (Request()->get('orderby') == 'ASC')) {
            $productsCategory = $products->orderBy('ordering', 'ASC');
        } elseif((Request()->get('sortby') == 'default') && (Request()->get('orderby') == 'DESC')) {
            $productsCategory = $products->orderBy('ordering', 'DESC');
        } elseif((Request()->get('sortby') == 'default') && (Request()->get('orderby') == null)) {
            $productsCategory = $products->orderBy('ordering', 'ASC');
            ///////////////
        } elseif ((Request()->get('sortby') == 'price') && (Request()->get('orderby') == null)){
            $productsCategory = $products->orderBy('price_final', 'ASC');
        } elseif((Request()->get('sortby') == 'price') && (Request()->get('orderby') == 'ASC')) {
            $productsCategory = $products->orderBy('price_final', 'DESC');
        } elseif((Request()->get('sortby') == 'price') && (Request()->get('orderby') == 'DESC')) {
            $productsCategory = $products->orderBy('price_final', 'DESC');
        };
        $productsCategory = $products->get();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($productsCategory);
        $perPage = 15;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $posts_object = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);


        $posts_object->setPath(route('slug', [$endslug]));
        return $this->viewMaker('Clients-page.subcatalog')->with([
            'header' => $this->header(),
            'left_side_bar' => $this->left_sidebar($firstslug),
            'data' => $posts_object,
            'datacategories' => $childcategories,
            'CurrentCategory' => $currentCategory,
            'CurrentSubCategory' => $firstCategory,
        ]);


    }


    public function getSlug($slug,$subslug = null, $product = null)
    {
        //dd(ProductController::i()->getProduct($slug, $subslug, $product));
        try {
            return ProductController::i()->getProduct($slug, $subslug, $product);
        } catch (\Exception $e) {
            try {
                return $this->getSubCatalog($slug,$subslug);
            } catch (\Exception $e) {
                try {
                    return $this->getCatalog($slug, $subslug);
                } catch (\Exception $e) {
                    return $this->viewMaker('errors.404')->with(['header' => $this->header(), 'left_side_bar' =>$this->left_sidebar($slug)]);
                }
            }
        }
    }
    /**/
   	public function getCatalog($slug,$subslug){
   		$CurrentCategory = Category::where('slug', $slug)->first();
        $CurrentSubCategory = Category::where('slug', $subslug)->first();
        //dd($subslug);
        if (($subslug != null) && (!$CurrentSubCategory)) {
            return $this->viewMaker('errors.404')->with(['header' => $this->header(), 'left_side_bar' =>$this->left_sidebar($slug)]);
        }
   		$SubCategory = [];
   		foreach (Category::all() as $key => $value) {
   			if($value->parent_id == $CurrentCategory->id){
   				array_push($SubCategory, $value);
   			}
   		}
   		if (!$CurrentCategory) {
   		    return $this->viewMaker('errors.404')->with(['header' => $this->header(), 'left_side_bar' =>$this->left_sidebar($slug)]);
        } else {
            return $this->viewMaker('Clients-page.catalog')->with([
                'header' => $this->header(),
                'left_side_bar' => $this->left_sidebar($slug),
                'data' => $SubCategory,
                'CurrentCategory' => $CurrentCategory
            ]);
        }
    }


    public function  getSubCatalog($slug, $subslug){
   		$CurrentCategory = Category::where('slug', $slug)->first();
   		$CurrentSubCategory = Category::where('slug', $subslug)->first();
        //dd($subslug);
        if (($CurrentSubCategory == null) &&($subslug != null)) {
            return $this->viewMaker('errors.404')->with(['header' => $this->header(), 'left_side_bar' =>$this->left_sidebar($slug)]);

        }
   		$SubSubCategory = Category::where('parent_id',$CurrentSubCategory->id)->get();
   		$Products = [];
   		$DataCategories = [];
        foreach ($SubSubCategory as $key => $value) {
            array_push($DataCategories, $value);
        }
      // Cache::put('name', $CurrentSubCategory, 1);
        //dd($CurrentSubCategory);
        $product_prices = [];
   		foreach (CategoryPivot::all() as $value) {
   			if($value->category_id == $CurrentSubCategory->id){
   				$product = Product::find($value->product_id);//()->withPivot(['option_id'])->get();
   				$product_prices[$product->id] = $product->price_final;
                array_push($Products, $product);
   			}
   		}
        $productsCategory = CategoryPivot::join('products as p','p.id','product_categories_pivot.product_id')
                            ->where('category_id',$CurrentSubCategory->id);//->get();

        if((Request()->get('sortby') == 'name') && (Request()->get('orderby') == 'ASC')) {
            $productsCategory = $productsCategory->orderBy('name', 'ASC');
        } elseif((Request()->get('sortby') == 'name') && (Request()->get('orderby') == 'DESC')) {
            $productsCategory = $productsCategory->orderBy('name', 'DESC');
        }elseif((Request()->get('sortby') == 'name') && (Request()->get('orderby') == null)) {
            $productsCategory = $productsCategory->orderBy('name', 'ASC');
            //////////////////////
        } elseif((Request()->get('sortby') == 'default') && (Request()->get('orderby') == 'ASC')) {
            $productsCategory = $productsCategory->orderBy('ordering', 'ASC');
        } elseif((Request()->get('sortby') == 'default') && (Request()->get('orderby') == 'DESC')) {
            $productsCategory = $productsCategory->orderBy('ordering', 'DESC');
        } elseif((Request()->get('sortby') == 'default') && (Request()->get('orderby') == null)) {
            $productsCategory = $productsCategory->orderBy('ordering', 'ASC');
            ///////////////
        } elseif ((Request()->get('sortby') == 'price') && (Request()->get('orderby') == null)){
            $productsCategory = $productsCategory->orderBy('price_final', 'ASC');
        } elseif((Request()->get('sortby') == 'price') && (Request()->get('orderby') == 'ASC')) {
            $productsCategory = $productsCategory->orderBy('price_final', 'DESC');
        } elseif((Request()->get('sortby') == 'price') && (Request()->get('orderby') == 'DESC')) {
            $productsCategory = $productsCategory->orderBy('price_final', 'DESC');
        };
        $productsCategory = $productsCategory->get();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($productsCategory);
        $perPage = 15;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $posts_object = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);


        $posts_object->setPath(route('subCatalog', [$slug, $subslug]));
        //dd($posts_object);
        return $this->viewMaker('Clients-page.subcatalog')->with([
            'header' => $this->header(),
            'left_side_bar' => $this->left_sidebar($slug),
            'data' => $posts_object,
            'datacategories' => $DataCategories,
            'CurrentCategory' => $CurrentCategory,
            'CurrentSubCategory' => $CurrentSubCategory,
        ]);
    }


    /* IMPORT FROM JOMMLA TABLES
    public function ImportProductsExtraFields() {
        $pef = ProductsExtraFields::all();
        foreach ($pef as $result) {
            $char = Characteristic::firstOrNew(['id' =>$result->id]);
            $char->id = $result->id;
            $char->name = $result->name_ru_RU;
            $ct = '';
            foreach (unserialize($result->cats) as $res) {
                $ct .= $res . ',';
            }
            $ct = substr($ct, 0, -1);
            $char->categories = $ct;
            if ($result->allcats === 0) {
                $char->choose = 1;
            } elseif ($result->allcats === 1) {
                $char->choose = 0;
            }
            $char->save();

            if (CharacteristicOption::where('id_characteristic',$result->id)->count() > 0) {
                CharacteristicOption::where('id_characteristic',$result->id)->delete();
            }

            foreach (ProductsExtraFieldsValues::where('field_id', $result->id)->get() as $pfv) {
                CharacteristicOption::insert([
                    'id' => $pfv->id,
                    'id_characteristic' => $result->id,
                    'value' => $pfv->name_ru_RU,
                    'ordering' => $pfv->ordering
                ]);
            }
        }
    }

    public function ImportProductsCharacteristic() {
        $pc = JoomlaProducts::all();
        foreach ($pc as $item) {
            $fields = explode(';-;',$item->extra_fields);
            foreach ($fields as $field) {
                $fieldvalues = explode(':=:', $field);
                if (isset($fieldvalues[1])) {
                    $fieldparams = explode(',', $fieldvalues[1]);
                    foreach ($fieldparams as $fieldparam) {
                        //dd($fieldparam);
                        ProductCharacteristicPivot::insert([
                            'product_id' => $item->product_id,
                            'characteristic_id' => $fieldvalues[0],
                            'option_id' => $fieldparam
                        ]);
                    }
                } else {
                    ProductCharacteristicPivot::insert([
                        'product_id' => $item->product_id,
                        'characteristic_id' => (int)$fieldvalues[0],
                        'option_id' => ''
                    ]);
                }
            }
        }

    }

    public function ImportProductsImages() {
        $pc = Product::all();
        foreach ($pc as $result) {
            $prImages = ProductImages::where('product_id',$result->id)->get()->toArray();
            if(count($prImages > 0) && $result->addimage != '') {
                $img = [];
                foreach ($prImages as $prImage) {
                    $img[$prImage['ordering']] = $prImage['image_full'];
                }
                ksort($img);
                $imgstr = json_encode(array_values($img));
                //dd($imgstr);
                $product_img = Product::find($result->id);
                $product_img->addimage = $imgstr;
                $product_img->save();
            }
        }
    }
    */

    public function importSimiliar()
    {
        $productsSimiliar = DB::table('u_jshopping_products_alike')
        ->selectRAW('product_id, GROUP_CONCAT(product_alike_id) AS CSV')
        ->groupBy('product_id')->get()->toArray();

        foreach ($productsSimiliar as $similiar) {
            $pr = [];
            $pr = explode(',',$similiar->CSV);
            $product = Product::where('id',$similiar->product_id)
                        ->update(['similar' => addslashes(json_encode($pr))]);
            //dd($similiar->product_id);
        }
    }

    public function importConcomitant()
    {
        $productsConcomitant = DB::table('u_jshopping_products_relations')
            ->selectRAW('product_id, GROUP_CONCAT(product_related_id) AS CSV')
            ->groupBy('product_id')->get()->toArray();
        //dd($productsConcomitant);
        foreach ($productsConcomitant as $concomitant) {
            $pr = [];
            $pr = explode(',',$concomitant->CSV);
            $product = Product::where('id',$concomitant->product_id)
                ->update(['concomitant' => addslashes(json_encode($pr))]);
        }
    }

    public function setInfoProduct($ch_id, $fieldname)
    {
        $char_pr_pivot = ProductCharacteristicPivot::
            where('characteristic_id','=', $ch_id)
            ->where('option_id','<>','')
            ->get();
        foreach ($char_pr_pivot as $item) {
            Product::where('id',$item->product_id)
                ->update([
                   $fieldname => $item->option_id
                ]);
        }
    }

    public function setProviders()
    {
        $char_pr_pivot = ProductCharacteristicPivot::
        where('characteristic_id','=', 72)
            ->where('option_id','<>','')
            ->get();

        foreach ($char_pr_pivot as $item) {
            $id_prov = Provider::where('name',$item->option_id)->first();
            if($id_prov) {
                DB::table('product_provider_pivot')
                    ->insert([
                        'product_id' => $item->product_id,
                        'provider_id' => $id_prov->id,
                    ]);
            }
        }
    }
}
