<?php

namespace App\Http\Controllers\ClientsController;

use App\Category;
use App\Product;
use App\ProductCategoriesPivot;
use App\ProductCharacteristicPivot;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Request;
use Session;
use App\Http\Controllers\Controller;

class Filter extends Controller
{
    //

    //public function __construct()
    //{
    //    $input = Request::all();
    //}

    private function _parseBFilterParam()
    {
        $input = Request::all();
        if (!isset($input['filter'])) {
            return;
        }
        $filter = $input['filter'];

        $params = explode(';', $filter);

    }

    public function ajaxfilter()
    {
        if(Request::isMethod('get') && Request::ajax() && Session::token() == Request::header('X-CSRF-TOKEN')) {

            //$input = Request::all();

            $catslug = $this->_getRequestParam('curcat','');
            $curCat = Category::where('slug',$catslug)->first();
            $products = [];//ProductCharacteristicPivot::with('product');

            $filters = $this->_getRequestParam('filters',array());
            if ($filters) {
                foreach ($filters as $key => $item) {
                    $products[] = ProductCharacteristicPivot::whereIn('option_id',explode(',',$item['value']))
                    ->pluck('product_id')->toArray();
                }
            } else {
                $products[0] = ProductCategoriesPivot::where('category_id',$curCat->id)->pluck('product_id')->toArray();
            }

            if (count($products)>1) {
                $result = call_user_func_array('array_intersect', $products);
            } else {
                $result = $products[0];
            }

            $productsCategory = ProductCategoriesPivot::where('category_id',$curCat->id)
                ->join('products as p','p.id','product_categories_pivot.product_id')
                ->whereIn('p.id',$result);

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

            $currentPage = LengthAwarePaginator ::resolveCurrentPage();
            $col = new Collection($productsCategory);
            $perPage = 15;
            $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();

            $post_objects = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
            $post_objects->setPath(route('slug', [$catslug]));
            $returnHTML = view('Clients-page.partials.product-ajax',['data'=>$post_objects])->render();

            return response()->json($returnHTML);//response()->json(dd(DB::getQueryLog()));

        } elseif(Request::isMethod('get')) {  /// not ajax

            $filters = $this->_getRequestParam('filters',array());
            $input = Request::all();
            if (!$filters) {
                return Redirect::to('/');
            } else {

                $curCat = Category::where('slug',Request::segment(1))->first();
                $products = [];//ProductCharacteristicPivot::with('product');
                $filterval = [];
                $filters = explode(',',$filters);
                foreach ($filters as $filter) {
                    foreach ($input as $key => $item) {
                        dd($key);
                        if(/*($key != 'filters') &&*/ str_contains($filter,$item)) {
                            dd($item);
                            $filterval[] = $item;
                        }
                    }
                }

            }

        }
    }

    private function _getRequestParam($name, $default = null)
    {
        $input = Request::all();
        if (isset($input[$name])) {
            return $input[$name];
        }
        return $default;
    }
}
