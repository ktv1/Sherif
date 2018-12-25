<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
            $array = json_decode(File::get(storage_path('synonyms.json')), true);
            $query = $request->get('query');

            $data = DB::table('products')
                ->where('name', 'LIKE',"%{$query}%")
                ->orWhere('id', '=', $query)
                ->orWhere('code', '=', $query)
                ->orWhere('description', 'LIKE',"%{$query}%")
                ->take(10)->get();

            if (count($data) == 0)
            {
                foreach($array as $k => $e){
                    for ($i = 0; $i < count($e); $i++){
                        if ($query == $e[$i]){
                            $data = DB::table('products')
                                ->where('name', 'LIKE',"%{$k}%")
                                ->orWhere('description', 'LIKE',"%{$k}%")
                                ->take(10)->get();
                        }
                    }
                }
            }


            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            
            if (count($data) == 0)
                $output .= '<ul style="display:inline-block">Ничего не найдено</ul>';
            else {
                $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                foreach($data as $row)
                {
                    $output .= '<li><a href="/public/get/product/'. $row->id .'">';
                    if ($row->status != 0)
                        $output .= '<div class="sherif-product_availability"
                            ><span class="sherif-product_availability_available"></span></div>';
                    else
                        $output .= '<div class="sherif-product_availability"
                            ><span class="sherif-product_availability_non-available"></span></div>';

                      $output .=  '<img width="50" height="50" class="sherif-product_content_img" src="/storage/app/public/'
                        . $row->mainimage . '" alt="">'. ' ' . $row->name .'</a></li>';
                }
            }
            
            $output .= '</ul>';
            echo $output;
        }
    }
    //fetchin in admin
    function fetchadm(Request $request)
    {
        if($request->get('query') && (strlen($request->get('query')) >=3))
        {
            $array = json_decode(File::get(storage_path('synonyms.json')), true);
            $query = $request->get('query');

            $data = DB::table('products')
                ->where('name', 'LIKE',"%{$query}%")
                ->orWhere('id', '=', $query)
                ->orWhere('code', '=', $query)
                ->orWhere('description', 'LIKE',"%{$query}%")
                ->take(10)->get();

            if (count($data) == 0)
            {
                foreach($array as $k => $e){
                    for ($i = 0; $i < count($e); $i++){
                        if ($query == $e[$i]){
                            $data = DB::table('products')
                                ->where('name', 'LIKE',"%{$k}%")
                                ->orWhere('description', 'LIKE',"%{$k}%")
                                ->take(10)->get();
                        }
                    }
                }
            }

            ///add thumbs
            if (count($data) > 0 ){
                foreach ($data as $datum) {
                    $datum->th =  '/storage/' . get_download_image_cache($datum->mainimage,50,50);
                }
            }

            return Response::json($data);
        }
    }

}