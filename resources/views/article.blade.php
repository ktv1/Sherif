@extends("layouts.app")
@section("css_files")
    loadCSS("{{route('index')}}/assets/_header.css");       //Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("{{route('index')}}/assets/css/_header_admin.css");              //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("{{route('index')}}/assets/_main.css");                //User Styles: Main
    loadCSS("{{route('index')}}/assets/css/article/_main.css");                //User Styles: Main
    @if($is_admin)
        loadCSS("{{route('index')}}/assets/css/_main_admin.css");                //User Styles: Main
    @endif
    loadCSS("{{route('index')}}/assets/css/article/_media.css");               //User Styles: Media
    @if($is_admin)
        loadCSS("{{route('index')}}/assets/css/_media_admin.css");               //User Styles: Media
    @endif

@endsection

@section("company_text")@endsection

@section("main_column")
    <div class="sherif_center_column">
        @include("layouts.chat")

        <!-- Article Box Start -->
        <div class="sherif_home_main-article-navigation">
            <a class="goods_main" href="">Главная</a>
            <p><span>/</span></p>
            <a class="goods_main" href="">Блог</a>
            <p><span>/</span> Вы здесь &#8594;</p>
            <a href="">{{$article->heading}}</a>
        </div>
        <!--<div class="sherif_home_main-article-box">-->
        <div>
            <div class="sherif_home_main-article-box-title">
                <h3>
                    {{$article->heading}}
                </h3>
            </div>
            <!--<div class="sherif_home_main-article-box-new_rules">-->
            <div>
                {!!$article->text!!}
            </div>
            <div class="sherif_home_main-article-box-new_form">
                <div class="sherif_home_main-article-box-new_form-link">
                    <a class="sherif_home_main-article-box-new_form-link_facebook" href="#"><i class="fab fa-facebook-square"></i></a>
                    <a class="sherif_home_main-article-box-new_form-link_twitter" href="#"><i class="fab fa-twitter-square"></i></a>
                    <a class="sherif_home_main-article-box-new_form-link_google" href="#"><i class="fab fa-google-plus-square"></i></a>
                    <a class="sherif_home_main-article-box-new_form-link_mail" href="#"><i class="fas fa-envelope-square"></i></a>
                    <a class="sherif_home_main-article-box-new_form-link_print" href="#"><i class="fas fa-print"></i></a>
                </div>
            </div>
        </div>


    </div>
@endsection
