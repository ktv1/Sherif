<?php

namespace App\Http\Controllers\Voyager;

use App\Currency;
use App\Product;
use App\ProductWholesale;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class CurrenciesController extends VoyagerBaseController
{

    public function currencyUpdate() {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);
        $USD = $output[0]->sale;
        $EUR = $output[1]->sale;

        Currency::where('name', 'USD')->update(['rate' => $USD]);
        Currency::where('name', 'EUR')->update(['rate' => $EUR]);

        return redirect()->route("voyager.currencies.index");
    }

    public function pricesUpdate() {

        $products = Product::get();

        foreach($products as $product) {
            $currency = Currency::where('id', '=', $product->currency_final)->first(); //retrieve currency object

            /*products prices*/
            $price_final = ($product[$currency->name]) * ($product->profitability / 100) * $currency->rate;

            //round prices
            $endprice = $price_final;
            if ($price_final < 100) {
                $endprice = round($price_final, 0);
            } elseif (($price_final >= 100) && ($price_final < 300)) {
                $endprice = ceil($price_final/5)/5;
            } elseif (($price_final >= 300) && ($price_final < 1000)){
                $endprice = round($price_final, -1);
            } elseif (($price_final >= 1000)) {
                $endprice = ceil($price_final/50)*50;
            }

            Product::where('id', '=', $product->id)->update(['price_final' => $endprice]);

            /*products wholesale prices*/
            $wholesale_products = Product::find($product->id)->wholesale;
            foreach($wholesale_products as $wholesale_product) {
                $product_wholesale_price = $price_final * (100 - $wholesale_product->discount) / 100;

                //round prices
                $endprice = $product_wholesale_price;
                if ($product_wholesale_price < 100) {
                    $endprice = round($product_wholesale_price, 0,PHP_ROUND_HALF_UP);
                } elseif (($product_wholesale_price >= 100) && ($product_wholesale_price < 300)) {
                    $endprice = ceil($product_wholesale_price / 5) * 5;
                } elseif (($product_wholesale_price >= 300) && ($product_wholesale_price < 1000)){
                    $endprice = round($product_wholesale_price, -1,PHP_ROUND_HALF_UP);
                } elseif (($product_wholesale_price >= 1000)) {
                    $endprice = ceil($product_wholesale_price/50) / 50;
                }
                ProductWholesale::where('id', '=', $wholesale_product->id)->update(['price' => $endprice]);
            }

            /*products discount prices*/
            $sale_price = $product->price_final * (100 - $product->sale_discount) / 100;
            Product::where('id', '=', $product->id)->update(['sale_price' => $sale_price]);
        }

        return redirect()->route("voyager.currencies.index");
    }
}
