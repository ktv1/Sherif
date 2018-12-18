@extends("layouts.app")
@section('meta-tegs')
    <link rel="canonical" href="{{url('/')}}">
@endsection
@section("css_files")

    loadCSS("assets/_header.css");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("assets/css/_header_admin.css");              //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("assets/_main.css");                //User Styles: Main
    loadCSS("{{asset('assets/css/catalog/_main.css')}}");                   //User Styles: Main
    @if($is_admin)
        loadCSS("assets/css/_main_admin.css");                //User Styles: Main
    @endif
        loadCSS("assets/_media.css");               //User Styles: Media
    @if($is_admin)
        loadCSS("assets/css/_media_admin.css");               //User Styles: Media
    @endif

@endsection

@section('header')
    {!!$header!!}
@endsection

@section('left_sidebar')
    {!!$left_side_bar!!}
@endsection

@section("main_column")
    <div class="sherif_center_column">
        @include("layouts.chat")
        @include("frontend.module.banner")

        <div class="sherif_home_main-box_brand">
            <!-- Box brand start -->
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand1.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand2.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand3.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand4.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand5.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand4.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand4.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand5.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand6.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands">
                <img src="{{asset('/assets/img/box brand/Health-brand2.jpg')}}" alt="">
            </div>
            <div class="sherif_home_main-box_brand-brands last_brend">
                <img src="{{asset('/assets/img/box brand/Health-brand3.jpg')}}" alt="">
            </div>
            <a href="#"><div class="link_arrow ">
                    <h4>Смотреть <br>все бренды</h4>
                    <div class="link_arrow-pic">
                        <i class="fas fa-angle-double-right"></i>
                    </div>
                </div></a>
            <!-- Box brand end -->
        </div>
        <div class="sherif_home_main-box_recommended">
            <div class="flex_row_mobile">
                <h3>Мы рекомендуем:</h3>
                <a class="mobile_toggle" toggle-object="recommended" toggle="off"><i class="far fa-arrow-alt-circle-down"></i></a>
            </div>
            <div class="toggle_mobile_recommended">
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
                <h3>Вы просматривали:</h3>
                <a class="mobile_toggle" toggle-object="looked" toggle="off"><i class="far fa-arrow-alt-circle-down"></i></a>
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
        <div class="sherif_home_main-mobile_bar smaller">
            <div class="color_pick">
                <a href="#" class="sherif_home_main-box-right_bar-pick_up-pic stock">
                    <h4>Акции</h4>
                </a>
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
        <div class="sherif_home_main-mobile_bar-articles_reviews">
            <div class="flex_row_mobile">
                <h3>Статьи и обзоры:</h3>
                <a class="mobile_toggle" toggle-object="articles" toggle="off"><i class="far fa-arrow-alt-circle-down"></i></a>
            </div>
        </div>
    </div>
@endsection

@section("main_content")
    <div class="sherif_home_main-incision">
        <div class="sherif_row incision_flex-wrap">
            <div class="sherif_home_main-incision-box-advantage">
                <div class="sherif_home_main-incision_title-advantages">
                    Наши преимущества
                </div>
                <div class="sherif_home_main-incision_advantages">
                    <div class="sherif_home_main-advantage left_ins_advatage">
                        <div class="number_advantage">1</div>
                        <div class="content_advantage">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, quam nesciunt eligendi mollitia possimus enim dolorum quaerat. Ducimus qui distinctio adipisci, libero iste doloremque earum!</div>
                        <div class="number_advantage_buffer">1</div>
                    </div>
                    <div class="sherif_home_main-advantage left_ins_advatage">
                        <div class="number_advantage">2</div>
                        <div class="content_advantage">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, quam nesciunt eligendi mollitia possimus enim dolorum quaerat. Ducimus qui distinctio adipisci, libero iste doloremque earum!</div>
                        <div class="number_advantage_buffer">2</div>
                    </div>
                    <div class="sherif_home_main-advantage left_ins_advatage">
                        <div class="number_advantage">3</div>
                        <div class="content_advantage">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, quam nesciunt eligendi mollitia possimus enim dolorum quaerat. Ducimus qui distinctio adipisci, libero iste doloremque earum!</div>
                        <div class="number_advantage_buffer">3</div>
                    </div>
                    <div class="sherif_home_main-advantage">
                        <div class="number_advantage">4</div>
                        <div class="content_advantage">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, quam nesciunt eligendi mollitia possimus enim dolorum quaerat. Ducimus qui distinctio adipisci, libero iste doloremque earum!</div>
                    </div>
                    <div class="sherif_home_main-advantage">
                        <div class="number_advantage">5</div>
                        <div class="content_advantage">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, quam nesciunt eligendi mollitia possimus enim dolorum quaerat. Ducimus qui distinctio adipisci, libero iste doloremque earum!</div>
                    </div>
                </div>
            </div>

            <div class="sherif_home_main-incision-box-stock">
                <div class="sherif_home_main-incision_stock-title">
                    Акция
                </div>
                <div class="sherif_home_main-incision_stock-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#сategoty-1">Категория 1</a></li>
                        <li><a data-toggle="tab" href="#menu1">Категория 2</a></li>
                        <li><a data-toggle="tab" href="#menu2">Категория 3</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="сategoty-1" class="tab-pane fade in active">
                            <div class="sherif_home_main-incision_stock-tabs_slider slider">
                                <!--Slide start-->
                                <div class="slide item">
                                    <div class="slide-content flex_incision_stock-slider">
                                        <div class="incision_stock-box-preview"></div>
                                        <div class="incision_stock-box-product">
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                                                    </div>
                                                    <a href="#" class="sherif-product_content_link promt_main">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
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
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                                                    </div>
                                                    <a href="#" class="sherif-product_content_link promt_main">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
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
                                            <div class="sherif-product promt_additional">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                                                    </div>
                                                    <a href="#" class="sherif-product_content_link promt_additional" >Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
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
                                <!--Slide end -->
                                <!--Slide start-->
                                <div class="slide item">
                                    <div class="slide-content flex_incision_stock-slider">
                                        <div class="incision_stock-box-preview"></div>
                                        <div class="incision_stock-box-product">
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                            <div class="sherif-product promt_additional">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                <!--Slide end -->
                                <!--Slide start-->
                                <div class="slide item">
                                    <div class="slide-content flex_incision_stock-slider">
                                        <div class="incision_stock-box-preview"></div>
                                        <div class="incision_stock-box-product">
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                            <div class="sherif-product promt_additional">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                <!--Slide end -->
                                <!--Slide start-->
                                <div class="slide item">
                                    <div class="slide-content flex_incision_stock-slider">
                                        <div class="incision_stock-box-preview"></div>
                                        <div class="incision_stock-box-product">
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                            <div class="sherif-product promt_additional">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                <!--Slide end -->
                                <!--Slide start-->
                                <div class="slide item">
                                    <div class="slide-content flex_incision_stock-slider">
                                        <div class="incision_stock-box-preview"></div>
                                        <div class="incision_stock-box-product">
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                            <div class="sherif-product ">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                            <div class="sherif-product promt_additional">
                                                <div class="sherif-product_content">
                                                    <div class="sherif-product_content-img_box">
                                                        <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                    </div>
                                                    <div class="sherif-product_content_discount">
                                                        <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                                        <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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
                                <!--Slide end -->
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Some content in menu 1.</p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("additional_content")
    <div class="sherif_home_main_novelties">
        <div class="sherif_row">
            <h3 class="sherif_home_main_novelties_title">Новинки</h3>
        </div>
        <div class="sherif_row">
            <div class="sherif_home_main_novelties_items">
                <div class="sherif-product">
                    <div class="sherif-product_content">
                        <div class="sherif-product_content-img_box">
                            <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
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
                            <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon5.png')}}" alt="">
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
                <div class="sherif-product ">
                    <div class="sherif-product_content">
                        <div class="sherif-product_content-img_box">
                            <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                        </div>
                        <div class="sherif-product_content_discount">
                            <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                            <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
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

    <div class="toggle_mobile_articles">
        <div class="sherif_home_main_video-blog">
            <div class="sherif_row">
                <div class="sherif_home_main_video-blog_video">
                    <h2 class="video-blog-title">Видео блог</h2>
                    <nav class="pull-right">
                        <ul class="pager-video-blog pager">
                            <li class=""><a href="#">&#10094;</a></li>
                            <li class=""><a href="#">&#10095;</a></li>
                        </ul>
                    </nav>
                    <video width="850" height="480" controls="controls">
                        <source src="#" type="video/mp4">
                        <source src="#" type="video/ogg">
                        <source src="#" type="video/webm">
                    </video><br />
                    <span class="video-blog_video_name">Полное название видео</span><br />
                    <div class="video-btn">
                        <a href="#" class="video-blog_video_btn">Все видео</a>
                    </div>
                </div>
                <div class="sherif_home_main_video-blog_reviews">
                    <h2 class="video-blog-title">Статьи и обзоры</h2>
                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            <li class="video-blog_reviews_tabs_itm active"><a href="#tab-1" class="video-blog_reviews_tabs_link"  data-toggle="tab">Категория 1</a></li>
                            <li class="video-blog_reviews_tabs_itm"><a href="#tab-2" class="video-blog_reviews_tabs_link" data-toggle="tab">Категория 2</a></li>
                            <li class="video-blog_reviews_tabs_itm"><a href="#tab-3" class="video-blog_reviews_tabs_link" data-toggle="tab">Категория 3</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active fade in" id="tab-1">
                                <div class="video-blog_review">
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="video-blog-row">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="video-blog-row">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="video-blog-buttons">
                                    <a href="#" class="video-blog-btn"><span></span><i class="fas fa-book-open"></i><strong>Все статьи</strong></a>
                                </div>
                                <div class="video-blog_contact">
                                    <form class="video-blog_contact_form flex-row" action="">
                                        <input type="email" name="e-mail" placeholder="e-mail">
                                        <input type="submit" value="Подписаться">
                                    </form>
                                    <div class="video-blog_social flex-row">
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/fb.png')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/you-tube.png')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/inst.png')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade in" id="tab-2">

                                <div class="video-blog_review">
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="video-blog-row">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="video-blog-row">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="video-blog-buttons">
                                    <a href="#" class="video-blog-btn"><span></span><i class="fas fa-book-open"></i><strong>Все статьи</strong></a>
                                </div>
                                <div class="video-blog_contact">
                                    <form class="video-blog_contact_form flex-row" action="">
                                        <input type="email" name="e-mail" placeholder="e-mail">
                                        <input type="submit" value="Подписаться">
                                    </form>
                                    <div class="video-blog_social flex-row">
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/fb.png')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/you-tube.png')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/inst.png')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade in" id="tab-3">

                                <div class="video-blog_review">
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="video-blog-row">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video-blog_review_content">
                                        <div class="video-blog-row">
                                            <img class="video-blog_review_img" src="{{asset('/assets/img/pic/product.png')}}" alt="">
                                            <div class="video-blog_review_content_text">
                                                <h2 class="video-blog_review_title">ОБЗОР М-ТАС БАЛАКЛАВА-НИНДЗЯ ПОТООТВОДЯЩАЯ</h2>
                                                <p>Компания М-Тас предлагает военнослужащим обратить внимание на новинку - потоотводящюю балаклаву-ниндзя для за..</p>
                                                <div class="video-blog-row">
                                                    <span class="pull-left video-blog_review_date">30,01,2018</span><span class="pull-right video-blog_review_more">Читать дальше ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="video-blog-buttons">
                                    <a href="#" class="video-blog-btn"><span></span><i class="fas fa-book-open"></i><strong>Все статьи</strong></a>
                                </div>
                                <div class="video-blog_contact">
                                    <form class="video-blog_contact_form flex-row" action="">
                                        <input type="email" name="e-mail" placeholder="e-mail">
                                        <input type="submit" value="Подписаться">
                                    </form>
                                    <div class="video-blog_social flex-row">
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/fb.png')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/you-tube.png')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('/assets/img/footer/icons/inst.png')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
