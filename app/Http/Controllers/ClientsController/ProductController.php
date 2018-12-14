<?php

namespace App\Http\Controllers\ClientsController;

use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductLabel;
use App\ProductStatus as PS;

use App\Category;
use App\ProductCategoriesPivot as PCC;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public static $_instance = null;
    public static function i()
    {
        $class = get_called_class();
        if (!static::$_instance) {
            static::$_instance = new $class();
        }

        return static::$_instance;
    }


     public function getProduct($slug, $subslug, $product){
     	$CurrentCategory = Category::where('slug', $slug)->first();
   		$CurrentSubCategory = Category::where('slug', $subslug)->first();
   		$product = Product::where('slug', $product)->first();
   		// $label = ProductLabel::where('id', $product->label)->first();
        //$viewed = [];

         $session_viewedproduct = session('viewed_products');
         if(!is_array($session_viewedproduct)) {
             $session_viewedproduct = array();
         }

        if(!in_array($product->id,$session_viewedproduct)) {
            array_push($session_viewedproduct,$product->id);
        }
        session(['viewed_products' => $session_viewedproduct]);

         $ipsession = Session::firstOrNew(['ip_address' =>request()->getClientIp()]);

         $ipsessionProducts = unserialize($ipsession->payload);

         if(!in_array($product->id,$ipsessionProducts)) {
             array_push($ipsessionProducts,$product->id);
         }
         $ipsession->payload = serialize($ipsessionProducts);
         //dd(session('viewed_products'));
         $ipsession->ip_address = request()->getClientIp();
         $ipsession->created_at = \Carbon\Carbon::now()->toDateTimeString();
         $ipsession->updated_at = \Carbon\Carbon::now()->toDateTimeString();
         $ipsession->session_id = session()->getId();
         $ipsession->session_id = Auth::user()->id;
         $ipsession->save();

        return $this->viewMaker('Clients-page.product')->with([
        	'CurrentCategory' => $CurrentCategory,
            'CurrentSubCategory' => $CurrentSubCategory,
            'product' => $product,
            'status' => PS::where('id', $product->status)->first(),
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }


    public function getProductNoURL($id){
    	$product = Product::where('id', $id)->first();
    	if(empty($product)){
    		return redirect()->back();
    	}else{
    		$subcategory_id = PCC::where('product_id', $id)->first();
    		if(!empty($subcategory_id)){
	    		$subcategory = Category::where('id', $subcategory_id)->first();
	    		if(!empty($subcategory)){
	    			if($subcategory->parent_id != null || $subcategory->parent_id != 0){
	    				$category = Category::where('id', $subcategory->parent_id)->first();
	    				if(!empty($category)){
	    					return redirect()->route('product', [
	    						'slug'=>$category->slug,
	    						'subslug'=>$subcategory->slug,
	    						'product'=>$product->slug
	    					]);
	    				}
	    			}else{
	    				return redirect()->back();
	    			}
	    		}else{
	    			return redirect()->back();
	    		}
	    	}else{
	    		return redirect()->back();
	    	}
    	}
    }


}
