@extends("layouts.app")
@section("css_files")
    loadCSS("{{route('index')}}/assets/_header.css");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("{{route('index')}}/assets/css/_header_admin.css");              //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("{{route('index')}}/assets/_main.css");                //User Styles: Main
    loadCSS("{{route('index')}}/assets/css/blog/_main.css");                //User Styles: Main
    @if($is_admin)
        loadCSS("{{route('index')}}/assets/css/_main_admin.css");                //User Styles: Main
    @endif
    loadCSS("{{route('index')}}/assets/css/blog/_media.css");               //User Styles: Media
    @if($is_admin)
        loadCSS("{{route('index')}}/assets/css/_media_admin.css");               //User Styles: Media
    @endif

@endsection

@section('header')
    {!!$header!!}
@endsection

@section('left_sidebar')
    {!!$left_side_bar!!}
@endsection


@section("company_text")@endsection
@section("bottom_alert")@endsection

@section("main_column")
    <div class="sherif_center_column">
       @include("layouts.chat")
        <!--Sherif blog-->
        <div class="sherif_blog">
            <div class="container-fluid">
                <div class="row">
                    <ol class="sherif_blog_breadcrumb">
                        <li><a href="#" class="sherif_blog_link">Главная </a></li>
                        <li> / </li>
                        <li class="urhere"> Вы здесь <i class="fas fa-arrow-right"></i></li>
                        <li class="active
							            "> Блог</li>
                    </ol>
                </div>
            </div>

            <h1 class="sherif_blog_title text-center">Блог</h1>
            <div class="container-fluid sherif_blog_content">
                <div class="row">
                    <div class="tabs sherif_blog_content_tabs">
                        <ul class="nav nav-tabs">
                            <li class="sherif_blog_content_tabs_itm active"><a href="#tab-1" class="sherif_blog_content_tabs_link"  data-toggle="tab">Новости</a></li>
                            <li class="sherif_blog_content_tabs_itm"><a href="#tab-2" class="sherif_blog_content_tabs_link" data-toggle="tab">Статьи</a></li>
                            <li class="sherif_blog_content_tabs_itm"><a href="#tab-3" class="sherif_blog_content_tabs_link" data-toggle="tab">Обзоры</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active fade in" id="tab-1">
                                @for($i=0;$i<4;$i++)
                                <div class="container-fluid">
                                    <div class="row borders">
                                        <div class="sherif_blog_tab_content image">
                                            <img src="{{asset('/assets/img/blog/product.png')}}" class="sherif_blog_content_tabs_img" alt="">
                                        </div>
                                        <div class="sherif_blog_tab_content sherif_blog_content_tabs_content">
                                            <div class="sherif_blog_content_tabs_content-text">
                                                <h1 class="sherif_blog_content_tabs_content_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩЯЯ</h1>
                                                <p class="sherif_blog_content_tabs_content_text">Компания М-Тас предлагает обратить внимание на новинку - потоотводящую балаклаву-ниндзя, созданную для Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt nulla libero vitae voluptatum expedita sequi, ratione nobis. Impedit inventore saepe minima tempore quibusdam consequuntur accusantium, soluta ratione animi laborum odio perspiciatis atque reprehenderit illum odit in nostrum placeat at ex. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis molestias animi eaque pariatur asperiores, sint voluptatum vitae nulla ratione?..</p>
                                            </div>

                                            <div class="sherif_blog_tab_content info-buttons">
                                                <i class="far fa-calendar"></i><span class="sherif_blog_content_tabs_content_stats">30,01,2018</span>
                                                <i class="far fa-eye"></i><span class="sherif_blog_content_tabs_content_stats">200</span>
                                                <i class="fas fa-comment"></i><span class="sherif_blog_content_tabs_content_stats">1</span>
                                                <i class="fas fa-bullhorn"></i><span class="sherif_blog_content_tabs_content_stats">7</span>
                                                <i class="far fa-thumbs-up"></i><span class="sherif_blog_content_tabs_content_stats">3</span>
                                                <a href="#" class="sherif_blog_content_tabs_content_link pull-right">читать дальше <i class="fas fa-angle-right"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                    @endfor
                            </div>
                            <div class="tab-pane fade" id="tab-2">
                                <div class="container-fluid">
                                    <div class="row">
                                        @for($i=0;$i<4;$i++)
                                        <div class="container-fluid">
                                            <div class="row borders">
                                                <div class="sherif_blog_tab_content image">
                                                    <img src="{{asset('/assets/img/blog/product.png')}}" class="sherif_blog_content_tabs_img" alt="">
                                                </div>
                                                <div class="sherif_blog_tab_content sherif_blog_content_tabs_content">
                                                    <div class="sherif_blog_content_tabs_content-text">
                                                        <h1 class="sherif_blog_content_tabs_content_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩЯЯ</h1>
                                                        <p class="sherif_blog_content_tabs_content_text">Компания М-Тас предлагает обратить внимание на новинку - потоотводящую балаклаву-ниндзя, созданную для Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt nulla libero vitae voluptatum expedita sequi, ratione nobis. Impedit inventore saepe minima tempore quibusdam consequuntur accusantium, soluta ratione animi laborum odio perspiciatis atque reprehenderit illum odit in nostrum placeat at ex. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis molestias animi eaque pariatur asperiores, sint voluptatum vitae nulla ratione?..</p>
                                                    </div>

                                                    <div class="sherif_blog_tab_content info-buttons">
                                                        <i class="far fa-calendar"></i><span class="sherif_blog_content_tabs_content_stats">30,01,2018</span>
                                                        <i class="far fa-eye"></i><span class="sherif_blog_content_tabs_content_stats">200</span>
                                                        <i class="fas fa-comment"></i><span class="sherif_blog_content_tabs_content_stats">1</span>
                                                        <i class="fas fa-bullhorn"></i><span class="sherif_blog_content_tabs_content_stats">7</span>
                                                        <i class="far fa-thumbs-up"></i><span class="sherif_blog_content_tabs_content_stats">3</span>
                                                        <a href="#" class="sherif_blog_content_tabs_content_link pull-right">читать дальше <i class="fas fa-angle-right"></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3">
                                <div class="container-fluid">
                                    <div class="row">
                                        @for($i=0;$i<4;$i++)
                                        <div class="container-fluid">
                                            <div class="row borders">
                                                <div class="sherif_blog_tab_content image">
                                                    <img src="{{asset('/assets/img/blog/product.png')}}" class="sherif_blog_content_tabs_img" alt="">
                                                </div>
                                                <div class="sherif_blog_tab_content sherif_blog_content_tabs_content">
                                                    <div class="sherif_blog_content_tabs_content-text">
                                                        <h1 class="sherif_blog_content_tabs_content_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩЯЯ</h1>
                                                        <p class="sherif_blog_content_tabs_content_text">Компания М-Тас предлагает обратить внимание на новинку - потоотводящую балаклаву-ниндзя, созданную для Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt nulla libero vitae voluptatum expedita sequi, ratione nobis. Impedit inventore saepe minima tempore quibusdam consequuntur accusantium, soluta ratione animi laborum odio perspiciatis atque reprehenderit illum odit in nostrum placeat at ex. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic reiciendis molestias animi eaque pariatur asperiores, sint voluptatum vitae nulla ratione?..</p>
                                                    </div>

                                                    <div class="sherif_blog_tab_content info-buttons">
                                                        <i class="far fa-calendar"></i><span class="sherif_blog_content_tabs_content_stats">30,01,2018</span>
                                                        <i class="far fa-eye"></i><span class="sherif_blog_content_tabs_content_stats">200</span>
                                                        <i class="fas fa-comment"></i><span class="sherif_blog_content_tabs_content_stats">1</span>
                                                        <i class="fas fa-bullhorn"></i><span class="sherif_blog_content_tabs_content_stats">7</span>
                                                        <i class="far fa-thumbs-up"></i><span class="sherif_blog_content_tabs_content_stats">3</span>
                                                        <a href="#" class="sherif_blog_content_tabs_content_link pull-right">читать дальше <i class="fas fa-angle-right"></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="">
                <ul class="pagination-sherif">
                    <li class=""><a href="#"><<</a></li>
                    <li class=""><a href="#"><</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a class="active-sherif" href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a class="active-sherif-dots" href="#"></a></li>
                    <li><a href="#">20</a></li>
                    <li><a class="active-sherif-dots" href="#"></a></li>
                    <li><a href="#">30</a></li>
                    <li><a class="active-sherif-dots" href="#"></a></li>
                    <li><a href="#">40</a></li>
                    <li><a class="active-sherif-dots" href="#"></a></li>
                    <li><a href="#">50</a></li>
                    <li><a href="#">></a></li>
                    <li><a href="#">>></a></li>
                </ul>
            </nav>
        </div>



        <div class="sherif_home_main-mobile_bar air-show">
            <div class="sherif_home_mobile_ads">
                <a href="#" style="background-image:url({{asset('/assets/img/pic/Air_Show.jpg')}});" class="sherif_home_main-box-right_bar-advertising-pic"  >
                </a>
                <a href="#" style="background-image:url({{asset('/assets/img/pic/Air_Show.jpg')}});" class="sherif_home_main-box-right_bar-advertising-pic"  >
                </a>
            </div>
        </div>

        <div class="sherif_home_main-box_recommended sherif_main_looked">

            <div class="flex_row_mobile">
                <h3>Вы просматривали:<a class="mobile_toggle dropdown-icon" toggle-object="looked" toggle="off"><i class="far fa-arrow-alt-circle-down"></i></a></h3>

            </div>
            <div class="toggle_mobile_looked">
                <div class="sherif_home_main-box_scroll">
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Костюм ПОЛИЦИЯ нового образца, Тип А</a><br />
                            <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif-product_other">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                            <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif-product_other">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon3.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                            <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif-product_other">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon4.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                            <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif-product_other">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                            <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif-product_other">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Костюм ПОЛИЦИЯ нового образца, Тип А</a><br />
                            <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif-product_other">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                            <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif-product_other">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                            <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif-product_other">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="sherif_home_main-mobile_bar">
            <div class="color_pick">
                <a href="#" style="background-image: url({{asset('/assets/img/pic/pick_up.jpg')}});" class="sherif_home_main-box-right_bar-pick_up-pic">
                    <img src="{{asset('/assets/img/icons/pick_up-icon.png')}}" alt="">
                    <h4>Подобрать товары по цвету</h4>
                </a>
            </div>
        </div>
    </div>
@endsection

