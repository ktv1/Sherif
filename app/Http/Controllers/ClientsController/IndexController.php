<?php

namespace App\Http\Controllers\ClientsController;

use App\Article;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    

    //get exchange rate
    

    public function getIndex(Request $request){
        $banner = Banner::with(['bannerImages.bannerLinkPosition'])->first();
        return $this->viewMaker('Clients-page.index')->with([
            'banner' => $banner,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }

    public function getContacts(){
        $banner = Banner::with(['bannerImages.bannerLinkPosition'])->first();

        return $this->viewMaker('contacts')->with([
            'banner' => $banner,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }

    public function getBlog(){
        $banner = Banner::with(['bannerImages.bannerLinkPosition'])->first();

        return $this->viewMaker('blog')->with([
            'banner' => $banner,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }

    public function getIncome(){
        $banner = Banner::with(['bannerImages.bannerLinkPosition'])->first();
        
        return $this->viewMaker('income')->with([
            'banner' => $banner,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }

   
    public function getArticle($id){
        $banner = Banner::with(['bannerImages.bannerLinkPosition'])->first();

        $article = Article::where('id', $id)->first();

        return $this->viewMaker('article')->with([
            'banner' => $banner,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header(),
            'article' => $article
        ]);
    }
    public function getOrdering(){
        return $this->viewMaker('ordering')->with([
            'banner' => $banner,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }
    
    public function getStock(){
        return $this->viewMaker('stock')->with([
            'banner' => $banner,
            'left_side_bar' => $this->left_sidebar("None"),
            'header' => $this->header()
        ]);
    }
}
