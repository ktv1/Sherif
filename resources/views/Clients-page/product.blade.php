@extends("layouts.app")

@section('meta-tegs')
    <link rel="canonical" href="{{url('/')}}">
@endsection


@section("css_files")
    loadCSS("{{asset('assets/_header.css')}}");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("{{asset('assets/css/_header_admin.css')}}");       //Header Styles (compress & paste to header after release)
    @endif
        loadCSS("{{asset('assets/css/product/_main.css')}}");                
    //User Styles: Main
    @if($is_admin)
        loadCSS("{{asset('assets/css/_main_admin.css')}}");  
    //User Styles: Main
    @endif
        loadCSS("{{asset('assets/css/product/_media.css')}}");  
    //User Styles: Media
    @if($is_admin)
        loadCSS("{{asset('assets/css/_media_admin.css')}}");  
    //User Styles: Media
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
        
        <!-- Product page -->
        <div class="sherif_home_main-product">
            <div class="sherif_home_main-product-navigation">
                <a class="goods_main" href="">Главная</a>
                <p><span>/</span></p>
                <a class="goods_main" href="">Одежда туристическая</a>
                <p><span>/</span>  Вы здесь <i class="fas fa-arrow-right"></i></p>
                <a href="">Куртка зимняя охотника Twill</a>
            </div>
            <div class="sherif_home_main-product-title">
                <h3>{{$product->name}}</h3>
            </div>
            <div class="sherif_home_main-product-rating">
                <div class="sherif_home_main-product-rating-rating_star">
                    <p>Рейтинг: 
                        <span>
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star-half-alt"></i>  
                            <i class="far fa-star"></i> 
                        </span>
                    </p>
                </div>
                <div class="sherif_home_main-product-rating-vendor_code">
                    <p>Артикул:{{$product->vendor_code}}</p>
                </div>
                <div class="sherif_home_main-product-rating-product_code">
                    <p>Код товара:{{$product->code}}</p>
                </div>
            </div>
            <?php  $img_cropped = explode('.', $product->mainimage)?>
            <div class="sherif_home_main-product-good_block">
                @if ($product->addimage != '')
                    @php
                        $images = json_decode($product->addimage);
                    @endphp
                    <div class="slider-nav">
                        @foreach($images as $key => $image)
                            <div class="slider-nav__item"><img src="/storage/{{get_download_image_cache($image,80,80)}}" alt="Фото {{$key}}"></div>
                        @endforeach
                    </div>
                @endif
                <div class="sherif_home_main-product-good_block-view">
                    <div class="slider-item"> <img src="/storage/{{get_download_image_cache($product->mainimage,300,450)}}" data-src="/storage/{{$product->mainimage}}" alt=""></div>
                    @if ($product->addimage != '')
                        @php
                            $images = json_decode($product->addimage);
                        @endphp
                        @foreach($images as $key => $image)
                            <div class="slider-item"><img src="/storage/{{get_download_image_cache($image,300,450)}}" data-src="/storage/{{$image}}" alt="Фото {{$key}}"></div>
                        @endforeach
                    @endif
                </div>

                <div class="sherif_home_main-product-good_block-info">
                    <div class="sherif_home_main-product-good_block-info-description">
                        <div class="sherif_home_main-product-good_block-info-description-size_block">
                            <div class="sherif_home_main-product-good_block-info-description-size_block-size">
                                <p>Размер:</p>
                            </div>
                            <div class="sherif_home_main-product-good_block-info-description-size_block-pagination">
                                <nav class="">
                                    <ul class="product_page_info">
                                        <li class="disabled"><a href="#">XS</a></li>
                                        <li><a href="#">S</a></li>
                                        <li class="disabled"><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li class="active"><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                        <li><a href="#">XXXL</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-avaible">
                            <p>{{$status->name}}</p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-stock">
                            <div class="sherif_home_main-product-good_block-info-description-stock-block">
                                <div class="sherif_home_main-product-good_block-info-description-stock-block-number_percent">
                                    <p>-20%</p>
                                </div>
                                <div class="sherif_home_main-product-good_block-info-description-stock-block-days_stock">
                                    <p>До конца акции осталось 2дня</p>
                                </div>
                            </div>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-old_price">
                            <p>Цена: 1820.00 грн</p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-new_price">
                            <p>Цена: <b>{{$product->price_final}}.00</b> грн</p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-wholesale_price">
                            <p>Оптовая цена: 770.00 грн (от 10шт.)</p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-price_link">
                            <p><i class="fas fa-arrow-down"></i> <a href="#">Нашли дешевле?</a></p>
                            <p><i class="fas fa-chart-area"></i> <a href="#">Следить за ценой</a></p>
                        </div>
                            <div class="sherif_home_main-product-good_block-info-description-in_basket">
                                <div class="sherif_home_main-product-good_block-info-description-in_basket-button">
                                    <a class="btn-sherif product_in_basket" id_product="{{$product->id}}"><span></span><i class="fas fa-shopping-cart"></i>
                                        <strong>В корзину</strong></a>
                                    </div>
                                    <div class="sherif_home_main-product-good_block-info-description-in_basket-counter">
                                        <input type="text" id="product_amount_{{$product->id}}" class="product_amount_input" value="1" id_product="{{$product->id}}">
                                        <div class="sherif_home_main-product-good_block-info-description-in_basket-counter-button product_amount">
                                            <button class="basket_counter_button product_togglers" togglers="up" id_product="{{$product->id}}" ><i class="fas fa-caret-up"></i></button>
                                            <button class="basket_counter_button product_togglers" togglers="down" id_product="{{$product->id}}"><i class="fas fa-caret-down"></i></button>
                                        </div>
                                    </div>
                            </div>
                                <div class="sherif_home_main-product-good_block-info-description-buy_by_click">
                                    <a class="btn-sherif buy_by_click" href=""><span></span><i class="far fa-hand-point-up"></i></i>
                                        <strong>Купить в один клик</strong></a>
                                </div>
                                <div class="sherif_home_main-product-good_block-info-description-abotu_manufactor">
                                    <div class="sherif_home_main-product-good_block-info-description-abotu_manufactor-left">
                                        <p>Производитель:</p>
                                        <p>Страна произзводства:</p>
                                    </div>
                                    <div class="sherif_home_main-product-good_block-info-description-abotu_manufactor-right">
                                        <p>Украина</p>
                                        <p>Украина</p>
                                    </div>
                                </div>
                                
                                <div class="sherif_home_main-product-good_block-info-for_present">
                                    <a href="" style="background-image: url({{asset('assets/img/pic/pick_up.jpg')}});" class="sherif_home_main-product-good_block-info-description-pick_up_goods-pic">
                                        <img src="{{asset('assets/img/icons/pick_up-icon.png')}}" alt="">
                                        <h4>Подобрать товары того же цвета</h4>
                                    </a>
                                </div>  
                                <!-- <div class="sherif_home_main-product-good_block-info-description-pick_up_goods">

                                    <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product">
                                        <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-pic">
                                            <img src="img/product-page/product-page-description.jpg" alt="">
                                        </div>
                                        <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-description">
                                            <h3>Очки Revision тактические ACU (Olive)</h3>
                                        </div>
                                    </div>
                                    <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain">
                                        <h4>До конца акции осталось</h4>
                                        <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-box">
                                            <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-number">
                                                <h2>28</h2>
                                                <h4>дней</h4>
                                            </div>
                                            <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-number">
                                                <h2>05</h2>
                                                <h4>часов</h4>
                                            </div>
                                            <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-number">
                                                <h2>17</h2>
                                                <h4>минут</h4>
                                            </div>
                                            <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-number">
                                                <h2>45</h2>
                                                <h4>секунд</h4>
                                            </div>
                                        </div>
                                    </div>

                                </div> -->
                            </div>
                            
                        </div>
                    </div>
                    <div class="sherif_home_main-product-tabs"> 
                        <ul class="nav nav-tabs">
                            <li>
                                <a data-toggle="tab" href="#description">Описание</a>
                            </li>
                            <li class="active">
                                <a data-toggle="tab" href="#characteristics">Характеристики</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#video_review">Видеообзор</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews">Отзывы</a>
                            </li>
                        </ul>
                        <!-- characteristics tab content -->
                        <div class="sherif_home_main-product-tabs-tab-content ">
                            <div id="description" class="tabe-pane">
                                {!! $product->description!!}
                            </div>
                            <div id="characteristics" class="tabe-pane active">
                                <div class="sherif_home_main-product-tabs-tab-content-block">
                                    <div class="sherif_home_main-product-tabs-tab-content-left">



                                        <ul class="tab-content-characteristics">
                                            @foreach($productCharacteristic as $key => $charact)
                                                    <li>
                                                        <span class="text">{!!$charact['char_name'] !!}</span>
                                                    </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="sherif_home_main-product-tabs-tab-content-right">
                                        <ul class="tab-content-characteristics-right">
                                            @foreach($productCharacteristic as $key => $charact)
                                                <li>
                                                    <span class="text">{!!$charact['char_value'] !!}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="video_review" class="tabe-pane"></div>
                            <div id="reviews" class="tabe-pane"></div>
                        </div>
                    </div>
            </div>
	   </div>


@endsection
@section('bottom_scripts')
    <script src="{{asset('/assets/libs/zoom/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('/assets/libs/slick/slick.min.js')}}"></script>
@endsection
