@extends("layouts.app")
@section("css_files")
    loadCSS("assets/_header.css");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("assets/css/_header_admin.css");              //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("assets/_main.css");                //User Styles: Main
    loadCSS("assets/css/stock/_main.css");                //User Styles: Main
    @if($is_admin)
        loadCSS("assets/css/_main_admin.css");                //User Styles: Main
    @endif
    loadCSS("assets/css/stock/_media.css");               //User Styles: Media
    @if($is_admin)
        loadCSS("assets/css/_media_admin.css");               //User Styles: Media
    @endif

@endsection
@section("company_text")@endsection
@section("bottom_alert")@endsection

@section("main_column")
    <div class="sherif_center_column">
        @include("layouts.chat")
        <ul class="sherif-breadcrumb">
            <li><a href="{{route('index')}}">Главная</a></li>
            <li><span>Вы здесь <i class="fas fa-arrow-right"></i></span>Акции</li>
        </ul>
        <div class="sherif_home_main-box_stock">
            @for($i=0;$i<9;$i++)
            <div class="sherif_home_main-box_stock_itm">
                <a href="#">
                    <div class="sherif_home_main-box_stock_itm_content">
												<span class="stock-sales">
													<span class="stock-discount">Акция </span>
													<span class="stock-text">При покупке берцов скидка на форму -20%</span>
												</span>
                        <br />
                        <div class="sherif-stock_itm-img_box">
                            <img class="sherif-stock_itm-img" src="{{asset('/assets/img/pic/stock.png')}}" alt="">
                        </div>
                        <span class="stock-exp-date">
													<span class="stock-exp-date_ending">До конца акции осталось:</span>
													<span class="stock-exp-date_date">28 дней</span>
												</span>
                    </div>
                </a>
            </div>
            @endfor

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