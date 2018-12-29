<?php

namespace App\Http\Controllers\ClientsController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductLabel;
use App\ProductStatus as PS;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Category;
use App\ProductCategoriesPivot as PCP;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
     public function getProduct($slug, $subslug, $product){
     	$CurrentCategory = Category::where('slug', $slug)->first();
   		$CurrentSubCategory = Category::where('slug', $subslug)->first();
   		$product = Product::where('slug', $product)->first();
   		// $label = ProductLabel::where('id', $product->label)->first();
        return $this->viewMaker('Clients-page.product')->with([
        	'CurrentCategory' => $CurrentCategory,
            'CurrentSubCategory' => $CurrentSubCategory,
            'product' => $product,
            'status' => PS::where('id', $product->status)->first(),
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }


	public function addCartProduct($id)
	{
		$model = Product::find($id);
		Cart::add( $id,  $model->name, 1, $model->price_final, [
			'image' => $model->mainimage,
			'box' => $model->box, //номер ящика
			'storage' => $model->storage, //номер склада
			'category' => $model->maincategory,
		]);
		//return response()->json(['model'=> back()->getTargetUrl()]);
		return redirect()->back();
	}

	public function removeCartProduct($id)
	{
		Cart::remove($id);
		//return response()->json(['id'=>$id]);
		return redirect()->back();
	}

	public function upCartProduct($id, $qty)
	{
		$qty++;
		Cart::update($id, $qty);
		//return response()->json(['id'=>$id]);
		return redirect()->back();
	}

	public function downCartProduct($id, $qty)
	{
		$qty--;
		Cart::update($id, $qty);
		//return response()->json(['id'=>$id]);
		return redirect()->back();
	}


    public function getProductNoURL($id){
    	$product = Product::where('id', $id)->first();
		if(empty($product)){
			return redirect()->back();
		}else {
			return $this->viewMaker('Clients-page.product')->with([
				'product' => Product::where('id', $id)->first(),
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
    	}*/
    }
}
