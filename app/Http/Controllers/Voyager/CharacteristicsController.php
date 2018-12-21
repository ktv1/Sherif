<?php

namespace App\Http\Controllers\Voyager;

use App\Category;
use App\Characteristic as C;
use App\CharacteristicOption as CO;

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

use Illuminate\Support\Facades\Response;

class CharacteristicsController extends VoyagerBaseController
{
   public function showList(Request $request)
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

        $view = 'voyager::bread.index';

        if (view()->exists("voyager::$slug.index")) {
            $view = "voyager::$slug.index";
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
        ))->with([
        	'categories'=>Category::all(),
         	'sort_category'=>$this->getCategories()->original['categories'],
         	'options' => CO::all()
        ]);
    }

    public function getCategories(){
    	$categories = Category::all();
    	$sub_categoty = [];
    	$SortCategories = [];
    	if(!empty($categories)){
    		foreach ($categories as $key => $value) {
    			if($value->parent_id == 0 || $value->parent_id == null){
	    			array_push($SortCategories, $value);
	    		}
    			foreach ($categories as $id => $category) {
    				if($category->parent_id == $value->id){
    					array_push($SortCategories, $category);
    				}
    			}	
    		}
    	}
    	return Response::json(['categories'=>$SortCategories]);
    }

    public function addCharacteristic(Request $request){
    	$characteristic = new C;
    	$characteristic->name = $request->name;
    	$characteristic->categories = "";
    	if($request->choose == "ALL"){
    		$characteristic->choose = 0;
    		$count = count(Category::all());
    		$characteristic->categories = "-";
    	}else{
    		$characteristic->choose = 1;
    		$count = count($request->choose);
    		foreach ($request->choose as $key => $value) {
    			$value = Category::where('id', $value)->first();
    			if($count != 1){
	    			if($value->parent_id == 0 || $value->parent_id == null){
	    				$characteristic->categories .= "[" . $value->id . "],";
	    			}else{
	    				$characteristic->categories .= $value->id . ",";
	    			}
	    		}else{
	    			if($value->parent_id == 0 || $value->parent_id == null){
	    				$characteristic->categories .= "[" . $value->id . "]";
	    			}else{
	    				$characteristic->categories .= $value->id;
	    			}
	    		}
	    		--$count;	
    		}
    	}
    	$characteristic->save();

    	if(count($request->options) != 0){
    		foreach ($request->options as $key => $value) {
    			if($value != "none" && $value != null){
    				$co = new CO;
    				$co->value = $value;
    				$co->id_characteristic = $characteristic->id;
    				$co->save();
    			}
    		}
    	}

    	return Response::json(true);
    }

    public function editCharacteristic(Request $request, $id){
    	$characteristic = C::where('id', $id)->first();
    	$characteristic->name = $request->name;
    	$characteristic->categories = "";
    	if($request->choose == "ALL"){
    		$characteristic->choose = 0;
    		$count = count(Category::all());
    		$characteristic->categories = "-";
    	}else{
    		$characteristic->choose = 1;
    		$count = count($request->choose);
    		foreach ($request->choose as $key => $value) {
    			$value = Category::where('id', $value)->first();
    			if($count != 1){
	    			if($value->parent_id == 0 || $value->parent_id == null){
	    				$characteristic->categories .= "[" . $value->id . "],";
	    			}else{
	    				$characteristic->categories .= $value->id . ",";
	    			}
	    		}else{
	    			if($value->parent_id == 0 || $value->parent_id == null){
	    				$characteristic->categories .= "[" . $value->id . "]";
	    			}else{
	    				$characteristic->categories .= $value->id;
	    			}
	    		}
	    		--$count;	
    		}
    	}
    	$characteristic->save();

    	if(count($request->options) != 0){
    		$delete_co = CO::where('id_characteristic', $characteristic->id)->get();
    		foreach ($delete_co as $key => $value) {
    			$value->delete();
    		}
    		foreach ($request->options as $key => $value) {
    			if($value != "none" && $value != null){
    				$co = new CO;
    				$co->value = $value;
    				$co->id_characteristic = $characteristic->id;
    				$co->save();
    			}
    		}
    	}

    	return Response::json(true);
    }

    public function deleteCharacteristic($id){
    	$characteristic = C::where('id', $id)->first();
    	$delete_co = CO::where('id_characteristic', $characteristic->id)->get();
    	foreach ($delete_co as $key => $value) {
    		$value->delete();
    	}
    	$characteristic->delete();
    	

    	return Response::json(true);
    }

    public function getcharacteristic($id){
    	$characteristic = C::where('id', $id)->first();
    	$category = $characteristic->categories;
    	$category = explode(',', $category);
    	$new_category = [];
    	foreach ($category as $key => $value) {
    		if(stristr($value, '[')){
                $value = explode('[', $value);
                $value = explode(']', $value[1]);
                $value = $value[0];
                array_push($new_category, $value);
            }else{
                array_push($new_category, $value);
            }
    	}
    	$characteristic->categories = $new_category;
    	$options = CO::where('id_characteristic', $characteristic->id)->get();
    	return Response::json([
    		'characteristic' => $characteristic,
    		'options' => $options,
    	]);
    }


    public function getSelectCharacteristic(){
        if(count(C::all()) != 0){
            return Response::json(C::all());
        }else{

        }return Response::json("None");
        
	}
	
	public function addCharacteristicOptions(Request $request) {
		
		$str = '';
        $options = DB::table('characteristic_options as co')
            ->join('characteristics as c', 'c.id','co.id_characteristic')
            ->where('co.id_characteristic', $request->data)
            ->orderBy('ordering','DESC')
            ->get(['co.*','c.name', 'c.categories', 'c.choose','c.group_id', 'c.type'])
            ->toArray();
		$str = '';
		if (count($options) > 0) {
            if ($options[0]->type == 0) {
                $str .= '<select multiple class="form-control" name="characteristics_options[' . $request->data . '][]">';
                foreach ($options as $i) {
                    $str .= '<option value="' . $i->id . '">' . $i->value . '</option>';
                }
                $str .= '</select>';
            }
        } else {
            $str .= '<input class="form-control" type="text" name="characteristics_options[' . $request->data . '][]" value="">';
        }

		echo $str;
	}
}
