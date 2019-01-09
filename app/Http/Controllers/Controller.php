<?php

namespace App\Http\Controllers;

/*For Left Sidebar*/
use App\Category;
use App\Product;
use App\Session;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //variable to show admin's part
    public $is_admin = true;

    //exchange rate
    public $uah_to_usd = 0;
    public $uah_to_eur = 0;
    public $viewed_pages = array();

    /**
     * Controller constructor.
     */
    public function __construct(){
        if($this->is_admin){
            // $this->getExchange();
        }

        $this->middleware('blocked');
    }

    /**
     *
     */
    public function getExchange(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);
        $this->uah_to_usd = $output[0]->sale;
        $this->uah_to_eur = $output[1]->sale;
    }

    //view maker

    /**
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewMaker($page){
        if($this->is_admin){
            $params = [
                'is_admin'=>$this->is_admin,
                'uah_to_eur'=>$this->uah_to_eur,
                'uah_to_usd'=>$this->uah_to_usd
            ];
        }else{
            $params = [
                'is_admin'=>$this->is_admin
            ];
        }
        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path();
        array_unshift($links, $currentLink);
        session(['page' => $page]);
        session(['links' => $links]);

       return view($page,$params);

    }



    /*Left Sidebar*/

    /**
     * @param $status
     * @return string
     * @throws \Throwable
     */
    protected function left_sidebar($status){
    	$category = Category::all();
        $Global_category = [];
        $Sub_category = [];
        foreach ($category as $value) {
            if($value->parent_id == NULL){
                array_push($Global_category, $value);
            }else{
                array_push($Sub_category, $value);
            }
        }
        return $left_side_bar = view('layouts.left_side_bar')->with([
            //'Global_category' => $Global_category,
            'Sub_category' => $Sub_category,
            'status' => $status
        ])->render();
    }

    /**
     * @param $data
     * @return array
     */
    public function returnData($data){

        $products = [];
        $current_price = 0;
        if(empty($data)){
            return ['curr_price'=>$current_price, 'products'=>$products];
        }else{
            if($data['type'] == 'session'){
                foreach ($data['data'] as $key => $session) {
                    foreach ($session as $value) {
                        $product = Product::where('id', $value['product_id'])->first();
                        if(!empty($product)){
                            array_add($product, 'amount', $value['amount']);
                            $img_small = explode('.', $product->mainimage);
                            $product->mainimage = $img_small[0] . '-small.' . $img_small[1];
                            array_push($products, $product);
                            $current_price += $value['amount'] * $product->price_final;
                        }
                        
                    }
                }
            }else{
                foreach ($data['data'] as $key => $value) {
                        //dd($value);
                        $product = Product::where('id', $value->id_product)->first();
                        if(!empty($product)){
                            array_add($product, 'amount', $value->amount_product);
                            $img_small = explode('.', $product->mainimage);
                            $product->mainimage = $img_small[0] . '-small.' . $img_small[1];
                            array_push($products, $product);
                            $current_price += $value->amount_product * $product->price_final;
                        }
                }
            }
            return ['curr_price'=>$current_price, 'products'=>$products];
        }
        
    }

    /**
     * @return string
     * @throws \Throwable
     */
    protected function header(){
       $array = $this->getSession();
            return view('layouts.header')->with([
                'data' => $this->returnData(['data' => $array['data'], 'type' => $array['type']]),
                'basket' => view('layouts.basket')->with(
                    $this->returnData(['data' => $array['data'], 'type' => $array['type']])
                )->render()
            ])->render(); 
    }


    /**
     * @return array
     */
    public function getSession(){
        $ip_user = request()->ip();
        $is_auth = Auth::user();
        if(!empty(session('baskets'))){
            $session = session('baskets');
            $type = "session";
        }else{
             $type = "db";
            $session = Session::all();
            //dd($session->where('user_id', Auth::user()->id)->all());
            if(count($session) != 0){
                if($is_auth == true && count($session->where('user_id', Auth::user()->id)->first()) != 0){
                    $session = $session->where('user_id', Auth::user()->id);
                }else{
                    $session = $session->where('ip_address', $ip_user);
                } 
            }   
        }
        return ['data' => $session, 'type' => $type];
    }

}
