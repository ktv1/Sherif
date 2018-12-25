<?php

namespace App\Http\Controllers\ClientsController;

use App\CharacteristicOption;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductLabel;
use App\ProductStatus as PS;

use App\Category;
use App\ProductCategoriesPivot as PCP;

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
   		//dd(request()->session());
   		$product = Product::where('slug', $product)
            ->with(['reviews','vendor'])->first();
         if (($subslug != null) && (!$CurrentSubCategory)) {
             return $this->viewMaker('errors.404')->with(['header' => $this->header(), 'left_side_bar' =>$this->left_sidebar($slug)]);
         }
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


         if (isset($ipsession->payload)) {
             $ipsessionProducts = unserialize($ipsession->payload);
         } else {
             $ipsessionProducts = array();
         }

         if(!in_array($product->id,$ipsessionProducts)) {
             array_push($ipsessionProducts,$product->id);
         }
         $ipsession->payload = serialize($ipsessionProducts);

         $ipsession->ip_address = request()->getClientIp();
         $ipsession->created_at = \Carbon\Carbon::now()->toDateTimeString();
         $ipsession->updated_at = \Carbon\Carbon::now()->toDateTimeString();
         $ipsession->session_id = request()->session()->getId();
         $ipsession->user_id = isset(Auth::user()->id) ? Auth::user()->id : 0;
         //dd(Auth::user()->id);
         $productCharacteristic = Product::i()->getProductCharacteristics($product->id);
         $ipsession->save();

        return $this->viewMaker('Clients-page.product')->with([
        	'CurrentCategory' => $CurrentCategory,
            'CurrentSubCategory' => $CurrentSubCategory,
            'product' => $product,
            'productCharacteristic' => $productCharacteristic,
            'status' => PS::where('id', $product->status)->first(),
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }


    public function getProductNoURL($id){
    	$product = Product::where('products.id', $id)
            ->with('reviews')
            //->with('characteristicsopt')
            ->first();

        $productCharacteristic = Product::i()->getProductCharacteristics($id);
		if(empty($product)){
			return redirect()->back();
		}else {
			return $this->viewMaker('Clients-page.product')->with([
				'product' => $product,//Product::where('id', $id)->first(),
                'productCharacteristic' => $productCharacteristic,
				'status' => PS::where('id', $product->status)->first(),
				'left_side_bar' => $this->left_sidebar("None"),
				'header' => $this->header()
			]);
		}
    	/*if(empty($product)){
    		return redirect()->back();
    	}else{
    		$subcategory_id = PCP::where('product_id', $id)->first();
    		if(!empty($subcategory_id)){
	    		$subcategory = Category::where('id', $subcategory_id->category_id)->first();
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
    	}*/
    }


}
