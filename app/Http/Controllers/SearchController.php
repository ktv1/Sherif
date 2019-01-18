<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Banner;


class SearchController extends Controller
{
    public function func_search($q, $count)
    {
        $query = mb_strtolower($q, 'UTF-8');
        $arr = explode(" ", $query); //разбивает строку на массив по разделителю
        
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($arr as $word)
        {
            $len = mb_strlen($word, 'UTF-8');
            switch (true)
            {
                case ($len <= 3):
                {
                    $query[] = $word . "*";
                    break;
                }
                case ($len > 3 && $len <= 6):
                {
                    $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                    break;
                }
                case ($len > 6 && $len <= 9):
                {
                    $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                    break;
                }
                case ($len > 9):
                {
                    $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                    break;
                }
                default:
                {
                    break;
                }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query); //объединяет массив в строку
        
        // Таблица для поиска
        $results = Product::whereRaw(
            "MATCH(name,description) AGAINST(? IN BOOLEAN MODE)", // name,email - поля, по которым нужно искать
            $qQeury)->paginate($count);
        
        
        //если товары не найдены - используется список синонимом
        if (count($results) == 0)
        {
            $arrs = json_decode(File::get(storage_path('synonyms.json')), true);
            foreach($arrs as $k => $e){
                for ($i = 0; $i < count($e); $i++){
                    if ($q == $e[$i]){
                        $results = DB::table('products')
                            ->where('name', 'LIKE',"%{$k}%")
                            ->orWhere('description', 'LIKE',"%{$k}%")
                            ->paginate($count);
                        return $results;
                    }
                }
            }
        }

        return $results;
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $max_page = 50;
        
        //Полнотекстовый поиск с пагинацией
        $results = $this->func_search($q, $max_page);

        $banner = Banner::with(['bannerImages.bannerLinkPosition'])->first();
        return $this->viewMaker('Clients-page.search')->with([
            'banner' => $banner,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header(),
            'products' => $results,
            'search_word' => $q,

        ]);
    }
}