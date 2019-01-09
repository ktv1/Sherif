<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\Http\Controllers\Voyager\CategoriesController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class LeftNavComposer
{
    public function compose(View $view)
    {
        if (!Storage::disk(config('voyager.storage.disk'))->exists('categories')) {
            $categories = Category::all();
            Storage::disk(config('voyager.storage.disk'))->put('categories', ($categories->toJson()));
        } else {
            $categories = json_decode(Storage::disk(config('voyager.storage.disk'))->get('categories'));
        }

        if(!Storage::disk(config('voyager.storage.disk'))->exists('categoriespath')) {
            $categoriespath = Category::i()->BuildThree($categories, 0);// Category::all();
            Storage::disk(config('voyager.storage.disk'))->put('categoriespath', json_encode($categoriespath));
        } else {
            $categoriespath = json_decode(Storage::disk(config('voyager.storage.disk'))->get('categoriespath'));
        }

        $view->with('Global_category', $categoriespath);
    }
}