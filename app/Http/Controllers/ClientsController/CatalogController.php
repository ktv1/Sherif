<?php

namespace App\Http\Controllers\ClientsController;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategoriesPivot as CategoryPivot;
use Illuminate\Support\Facades\Cache;
use App\Category;
use App\Product;

class CatalogController extends Controller
{	
	/**/
   	public function getCatalog($slug){
   		$CurrentCategory = Category::where('slug', $slug)->first();

   		$SubCategory = [];
   		foreach (Category::all() as $key => $value) {
   			if($value->parent_id == $CurrentCategory->id){
   				array_push($SubCategory, $value);
   			}
   		}
        return $this->viewMaker('Clients-page.catalog')->with([
            'header' => $this->header(),
            'left_side_bar' => $this->left_sidebar($slug),
            'data' => $SubCategory,
            'CurrentCategory' => $CurrentCategory
        ]);
    }


    public function getSubCatalog($slug, $subslug){
   		$CurrentCategory = Category::where('slug', $slug)->first();
   		$CurrentSubCategory = Category::where('slug', $subslug)->first();
   		$SubSubCategory = Category::where('parent_id',$CurrentSubCategory->id)->get();
   		$Products = [];
   		$DataCategories = [];
        foreach ($SubSubCategory as $key => $value) {
            array_push($DataCategories, $value);
        }
      // Cache::put('name', $CurrentSubCategory, 1);

   		foreach (CategoryPivot::all() as $value) {
   			if($value->category_id == $CurrentSubCategory->id){
   				$product = Product::find($value->product_id);
   				array_push($Products, $product);
   			}
   		}
        $productsCategory = CategoryPivot::join('products as p','p.id','product_categories_pivot.product_id')
                            ->where('category_id',$CurrentSubCategory->id)->get();
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
}
