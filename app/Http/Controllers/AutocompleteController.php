<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutocompleteController extends Controller
{

    function index()
    {
        return view('autocomplete');
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('products')
                ->where('name', 'LIKE',"%{$query}%")
                /*->orWhere('id', 'LIKE',"{$query}%")
                ->orWhere('code', 'LIKE',"{$query}%")
                ->orWhere('description', 'LIKE',"%{$query}%")*/
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li><a href="/public/get/product/'. $row->id .'">'

                    . '<div class="sherif-product_availability">
                                    <span class="sherif-product_availability_available"></span>
                                </div>'
                    . '<img width="50" height="50" class="sherif-product_content_img" src="/storage/app/public/'
                . $row->mainimage . '" alt="">'. ' ' . $row->name .'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

}