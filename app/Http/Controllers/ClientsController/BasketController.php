<?php

namespace App\Http\Controllers\ClientsController;

use App\Product;
use App\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;


class BasketController extends Controller
{
    
	public function addToBasket(Request $request, $id){
		$ip_user = request()->ip();
		$is_auth = Auth::user();
		$sli = Session::orderBy('created_at', 'desc')->first();
		if(!empty($sli)){
			$sli = $sli->id + 1;
		}else{
			$sli = 1;
		}
		$present_product = Session::where('id_product', $id)->get();
		$is_absent_model = false;

		if(count($present_product) != 0){

			if($is_auth == true && count($present_product->where('user_id', Auth::user()->id)->first()) != 0){
				$session = $present_product->where('user_id', Auth::user()->id)->first();
			}else{
				$session = $present_product->where('ip_address', $ip_user)->first();
			}
				
			if(count($session) != 0){
				$is_absent_model = true;
			}		
		}
		if($is_absent_model == false){
			$session = new Session;
			$session->id_product = $id;
			$session->id = $sli;
			if($is_auth == true){
				$session->user_id = Auth::user()->id;
			}else{
				$session->user_id = null;
			}

			$session->ip_address = $ip_user;
			$request->session()->push('baskets.' . $id, ['product_id' => $id, 'amount' => request()->amount]);
			if(request()->amount == 0){
				if(!empty(session('baskets'))){
					return Response::json($this->returnData(['data' => session('baskets'), 'type' => 'session']));
				}else{
					return Response::json($this->returnData(['data' => $session, 'type' => 'db']));
				}
				
			}else{
				$session->amount_product = request()->amount;
			}
			$session->amount_product = request()->amount;
			$session->save();
		}else{
			$old_amount = $request->session()->pull('baskets.' . $id);
			$request->session()->push('baskets.' . $id, ['product_id' => $id, 'amount' => $old_amount[0]['amount'] + request()->amount]);

			if($is_auth){
				$session->user_id = Auth::user()->id;
			}

			if(request()->amount == 0){
				if(!empty(session('baskets'))){
					return Response::json($this->returnData(['data' => session('baskets'), 'type' => 'session']));
				}else{
					return Response::json($this->returnData(['data' => $session, 'type' => 'db']));
				}
			}else{
				$session->amount_product += request()->amount;
			}
			
			$session->save();
		}
		if(!empty(session('baskets'))){
			return Response::json($this->returnData(['data' => session('baskets'), 'type' => 'session']));

		}else{
			$currently_session = Session::all();
			return Response::json($this->returnData(['data' => $currently_session, 'type' => 'db']));
		}
		
	}

	


	public function deleteItemBasket(Request $request, $id){
		$ip_user = request()->ip();
		$is_auth = Auth::user();

		$present_product = Session::where('id_product', $id)->get();
		if(count($present_product) != 0){
			if($is_auth == true && count($present_product->where('user_id', Auth::user()->id)->first()) != 0){
				$session = $present_product->where('user_id', Auth::user()->id)->first();
			}else{
				$session = $present_product->where('ip_address', $ip_user)->first();
			}
				
			if(count($session) != 0){
				$session->delete();
			}		
		}
    	$request->session()->forget('baskets.' . $id);
    	return Response::json($this->returnData(['data' => session('baskets'), 'type' => 'session']));
    }


    public function updateBasket(Request $request, $id){
    	$ip_user = request()->ip();
		$is_auth = Auth::user();
    	$present_product = Session::where('id_product', $id)->get();
		if(count($present_product) != 0){
			if($is_auth == true && count($present_product->where('user_id', Auth::user()->id)->first()) != 0){
				$session = $present_product->where('user_id', Auth::user()->id)->first();
			}else{
				$session = $present_product->where('ip_address', $ip_user)->first();
			}
				
			if(count($session) != 0){
				$session->amount_product = request()->amount;
				$session->save();
			}		
		}

    	$request->session()->forget('baskets.' . $id);
    	$request->session()->push('baskets.' . $id, ['product_id' => $id, 'amount' => request()->amount]);

    	return Response::json($this->returnData(['data' => session('baskets'), 'type' => 'session']));
    }

}
