<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


class SearchController extends Controller
{
    public function autocomplete(){
        $term = Input::get('q');

        $results = array();

        $queries = DB::table('products')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->orWhere('id', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'name' => $query->name ];
        }
        return Response::json($results, 200, [], JSON_UNESCAPED_UNICODE);
    }
}