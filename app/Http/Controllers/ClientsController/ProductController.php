<?php

namespace App\Http\Controllers\ClientsController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductLabel;
use App\ProductStatus as PS;
use App\ProductReview as PR;

use App\Category;
use App\ProductCategoriesPivot as PCC;

use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function getProduct($slug, $subslug, $product)
    {
        $CurrentCategory = Category::where('slug', $slug)->first();
        $CurrentSubCategory = Category::where('slug', $subslug)->first();
        $product = Product::where('slug', $product)->first();
        // $label = ProductLabel::where('id', $product->label)->first();

        $reviews = PR::where([
           ['pid', $product->id],
           ['status', 'approved']
        ])->with('reviewer')->paginate();

        return $this->viewMaker('Clients-page.product')->with([
            'CurrentCategory' => $CurrentCategory,
            'CurrentSubCategory' => $CurrentSubCategory,
            'product' => $product,
            'status' => PS::where('id', $product->status)->first(),
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header(),
            'reviews' => $reviews
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

    public function addReview(Request $request)
    {
        $model = new PR();

        if(auth()->check()) {
            if (isset(auth()->user()->id) && $request->header('Accepted-Autofill') != auth()->user()->id) {
                return response()->json(['error' => 'Bad request'], 400);
            }

            $model->uid   = auth()->user()->id;
            $model->name  = auth()->user()->name;
            $model->email = auth()->user()->email;
        } else {
            $model->name  = $request->get('name');
            $model->email = $request->get('email') ?? null;
        }

        $model->pid     = $request->get('pid');
        $model->review  = $request->get('review');

        try{
            list($message, $code) = $model->save() ? ['Запись добавлена', 200] : ['Ошибка добавления', 400];
        } catch(\Exception $e) {
            list($message, $code) = [$e->getMessage(), 400];
        }

        return response()->json($message, $code);
    }
}
