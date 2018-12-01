<?php

namespace App\Http\Controllers\ClientsController;


use App\Product;
use App\Session;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class OrderingController extends Controller
{
    public function getOrdering(Request $request){

    	$array = $this->getSession();

    	return $this->viewMaker('Clients-page.ordering')->with([
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header(),
            'data' => $this->returnData(['data' => $array['data'], 'type' => $array['type']]),
        ]);
    }
    public function orderBuy(Request $request){
    	$order = new Order;
    	$order->tel = $request->tel;
    	$order->name = $request->name;
    	$order->email = $request->email;
    	$order->method_mail = $request->method_mail;
    	$order->method_pay = $request->method_pay;
    	$order->region = $request->region;
    	$order->town = $request->town;
    	$order->method_pay = $request->method_pay;
    	$order->region = $request->region;
    	$order->mail_place = $request->mail_place;
    	$order->comment = $request->comment;

    	
    	return Response::json($this->getSession());
    }
}
