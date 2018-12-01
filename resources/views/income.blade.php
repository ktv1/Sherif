@extends('layouts.app')
@section("css_files")

    loadCSS("assets/_header.css");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("assets/css/_header_admin.css");              //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("assets/_main.css");                //User Styles: Main
    loadCSS("assets/css/income/_main.css");                //User Styles: Main
    @if($is_admin)
        loadCSS("assets/css/_main_admin.css");                //User Styles: Main
        loadCSS("assets/css/income/_main_admin.css");                //User Styles: Main
    @endif
    @if($is_admin)
        loadCSS("assets/css/income/_media_admin.css");               //User Styles: Media
     @else
        loadCSS("assets/css/income/_media.css");               //User Styles: Media
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

@if(!$is_admin)
@section("main_column")
    <div class="sherif_center_column">
        @include("layouts.chat")
        <!-- New goods start -->
        <div class="sherif_home_main-new_goods">
            <div class="sherif_home_main-new_goods-navigation">
                <a class="goods_main" href="{{route("index")}}">Главная</a>
                <p><span>/</span> Вы здесь &#8594;</p>
                <a href="{{route("income")}}">Новые поступления товаров</a>
            </div>
            <div class="sherif_home_main-new_goods-content">
                <div class="sherif_home_main-new_goods-content-table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Новые поступления товаров </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>Поступления нового товара 22.03.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 19.03.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 15.03.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 13.03.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 05.03.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 28.02.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 27.02.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 20.02.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 19.02.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 16.02.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 20.02.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 19.02.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Поступления нового товара 16.02.18
                                <a href="#" class="content-table">СМОТРЕТЬ >></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="sherif_home_main-new_goods-content-pagination">
                    <nav>
                        <ul class="pagination">
                            <li><a href="#"><<</a></li>
                            <li><a href="#"><</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li class="disabled"><a href="#">8</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">20</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">30</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">40</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">50</a></li>
                            <li><a href="#">></a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </nav>
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
@else
@section("main_column")
    <div class="sherif_center_column">
       @include("layouts.chat")
        <!-- Sherif Income Sevices  -->

        <div class="sherif_home_main-new_goods">
            <div class="sherif_home_main-new_goods-navigation">
                <ul class="sherif_home_main-new_goods-navigation">
                    <li><a href="{{route('index')}}">Главная</a></li>
                    <li><span>Вы здесь <i class="fas fa-arrow-right"></i></span> Новые поступления товаров</li>
                </ul>
            </div>
            <div class="sherif_home_main-new_goods-content">
                <div class="sherif_home_main-new_goods-content-table">
                    <div class="panel-group new_goods-table" id="accordion">
                        <h2 class="panel-group new_goods-table_title">Новые поступления товаров</h2>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm1" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm1" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm1" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm2" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm2" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm2" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(22)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm3" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm3" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm3" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm4" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm4" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm4" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm5" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm5" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm5" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm6" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm6" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm6" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm7" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm7" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm7" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm8" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm8" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm8" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm9" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm9" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm9" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm10" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm10" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm10" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <span class="pull-left">ПОСТУПЛЕНИЕ НОВОГО ТОВАРА 22.03.18</span>
                                    <div>
                                        <a href="#income-itm11" data-parent="#accordion" data-toggle="collapse" class="open">Смотреть</a>
                                        <a href="#income-itm11" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span><i class="far fa-arrow-alt-circle-down"></i></span></a>
                                    </div>
                                </h4>
                            </div>
                            <div id="income-itm11" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <div class="link_box">
						                                <span>Боевое снаряжение, обмундирование, бронежелеты
															<strong>(15)</strong>
														</span>
                                        <span>Снаряжение силовых структур (полиция, охрана, СБУ)
															<strong>(11)</strong>
														</span>
                                        <span>Средства связи
															<strong>(23)</strong>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sherif_home_main-new_goods-content-pagination">
                    <nav>
                        <ul class="pagination new_goods_pagination">
                            <li><a href="#"><<</a></li>
                            <li><a href="#"><</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li class="disabled"><a href="#">8</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">20</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">30</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">40</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            <li><a href="#">50</a></li>
                            <li><a href="#">></a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif

