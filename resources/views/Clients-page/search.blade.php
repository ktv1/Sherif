@extends("layouts.app")
@section('meta-tegs')
    <link rel="canonical" href="{{url('/')}}">
@endsection
@section("css_files")
    loadCSS("{{asset('assets/_header.css')}}");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("{{asset('assets/css/_header_admin.css')}}");       //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("{{asset('assets/css/catalog/_main.css')}}");
    //User Styles: Main
    @if($is_admin)
        loadCSS("{{asset('assets/css/_main_admin.css')}}");
        //User Styles: Main
    @endif
    loadCSS("{{asset('assets/css/catalog/_media.css')}}");
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
    <!--SHERIF catalog-->
        <div class="sherif-catalog">
            <ul class="sherif-breadcrumb">
                <li><a href="{{route('index')}}">Главная</a></li>
                <li>Поиск</li>
                <li><span><i class="fas fa-arrow-right"></i></span>{{'"'. $search_word .'"'}}</li>
            </ul>

            <!--
            subcategories
            clear. can take out subcatalog.blade.php
            -->

            <div class="sherif_row-btn tab">
                <button type="button" class="btn-sherif-product btn-hide" data-toggle="collapse" data-target="#link1">ФИЛЬТР ТОВАРОВ</button>
                <div id="link1" class="collapse">
                    <div class="sherif_sidebar_catalog-title">
                        <h2>Фильтр:</h2>
                    </div>
                    <div class="sherif_sidebar_catalog-content panel-group">
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <p>Сезон</p>
                                        <a href="#subscribe_itm1" data-parent="#accordion-catalog" data-toggle="collapse"class=""><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <input type="checkbox" checked  name=""> Все сезоны<span class="pull-right">476</span><br>
                                            <input type="checkbox"  name=""> Демисезон<span class="pull-right">255</span><br>
                                            <input type="checkbox" name=""> Лето<span class="pull-right">100</span><br>
                                            <input type="checkbox"  name=""> Зима<span class="pull-right">120</span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Фильтр 2</p>
                                        <a href="#subscribe_itm2" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm2" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <form>
                                            <input type="checkbox"  name=""> Wader<span class="pull-right">476</span><br>
                                            <input type="checkbox"  name=""> Azimut<span class="pull-right">426</span><br>
                                            <input type="checkbox"  name=""> Turbo Trike24<span class="pull-right">181</span><br>
                                            <input type="checkbox"  name=""> Bambi<span class="pull-right">14</span><br>
                                            <input type="checkbox"  name=""> CFS<span class="pull-right">455</span><br>
                                            <input type="checkbox"  name=""> Тетрада<span class="pull-right">455</span><br>
                                            <a href="#" class="pull-right">Показать еще <span>(160)</span></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Цвет</p>
                                        <a href="#subscribe_itm3" data-parent="#accordion-catalog" data-toggle="collapse" cla><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm3" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/multicam.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Multicam
                                            </div><br />
                                            <div class="colors"  style="
                                                                                    background-color: #606757;">
                                                <input type="checkbox" name=""> Olive
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/woodland.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Woodland
                                            </div><br />
                                            <div class="colors"  style="
                                                                                    background-color: #d1b37f;">
                                                <input type="checkbox" name=""> TAN
                                            </div><br />
                                            <div class="colors"  style="
                                                                                    background-color: #000;">
                                                <input type="checkbox" name=""> Black
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/A-TACS.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> A-TACS
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/A-TACS-AU.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> A-TACS AU
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/A-TACS-FG.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> A-TACS FG
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/ACU.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> ACU
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/MTP.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> MTP
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/mossy-oak.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Mossy Oak
                                            </div><br />
                                            <div class="colors"  style="
                                                                                    background-color: #ae8c70;">
                                                <input type="checkbox" name=""> Coyote
                                            </div><br />
                                            <div class="colors"  style="
                                                                                    background-color: #fff;">
                                                <input type="checkbox" name=""> White
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/cadpat.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Cadpat
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/flexktarn.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Flacktarn
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/AT-Digital.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> AT-Digital
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/Digital.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Digital
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/Khaki.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Khaki
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/FG.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> FG
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/OliveDrab.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Olive Drab
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/AOR-1.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> AOR 1/2
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/desert-dpm2.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Desert
                                            </div><br />
                                            <div class="colors"  style="
                                                                                    background-color: #521f05;">
                                                <input type="checkbox" name=""> Brown
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/ССЕTarn1.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> CCE Tarn
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/DDPM2.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> DDPM
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/tree2.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Березка
                                            </div><br />
                                            <div class="colors"  style="
                                                                                    background-color: #4e86a7;">
                                                <input type="checkbox" name=""> Navy Blue
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/dpm_urban_b_.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Urban
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/Kruptek.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Kruptek
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/Varan.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Varan
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/MARPAT.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Marpat
                                            </div><br />
                                            <div class="colors"  style="
                                                                                    background-color: #b2b2b2;">
                                                <input type="checkbox" name=""> Другой
                                            </div><br />

                                            <a href="#" class="pull-left">Показать еще <span>160</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Критерий 6</p>
                                        <a href="#subscribe_itm4" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm4" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <input type="checkbox" checked="" name=""> Складные <span class="pull-right">15</span><br>
                                            <input type="checkbox"  name=""> Нескладные <span class="pull-right">0</span><br>
                                            <input type="checkbox" name=""> Мультитул <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Нож многофункциональный <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Мультитул карманный <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Метательные <span class="pull-right">0</span><br>
                                            <input type="checkbox" name=""> Балисонг - нож бабочка <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Сабли и мечи <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Топоры <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Учебные <span class="pull-right">22</span><br>
                                            <input type="checkbox" name=""> Кукри и мачете <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Охотничьи <span class="pull-right">22</span><br>
                                            <a href="#" class="pull-left">Показать еще <span>(160)</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Критерий-8</p>
                                        <a href="#subscribe_itm5" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm5" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <input type="checkbox" checked="" name=""> Складные <span class="pull-right">15</span><br>
                                            <input type="checkbox"  name=""> Нескладные <span class="pull-right">0</span><br>
                                            <input type="checkbox" name=""> Мультитул <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Нож многофункциональный <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Мультитул карманный <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Метательные <span class="pull-right">0</span><br>
                                            <input type="checkbox" name=""> Балисонг - нож бабочка <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Сабли и мечи <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Топоры <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Учебные <span class="pull-right">22</span><br>
                                            <input type="checkbox" name=""> Кукри и мачете <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Охотничьи <span class="pull-right">22</span><br>
                                            <a href="#" class="pull-left">Показать еще <span>160</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Цена</p>
                                        <a href="#subscribe_itm6" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm6" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                            <div data-role="main" class="ui-content">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="#" class="filter-btn">СБРОСИТЬ ВСЕ ФИЛЬТРЫ</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sherif-catalog_sort">
                <div class="sorting">
                    <form class="sherif-catalog_sort_date">
                        <div class="">
                            <label for="date-catalog">сортировка</label>
                        </div>
                        <div class="form-group sort">
                            <select id="date-catalog" name="date">
                                <option value="day">дата поступления</option>
                                <option value="week">название</option>
                                <option value="month">цена</option>
                            </select>
                            <button><i class="fas fa-sort-numeric-down"></i></button>
                        </div>
                    </form>
                    <form class="sherif-catalog_sort_amount">
                        <div class="">
                            <label for="amount-catalog">товаров на странице</label>
                        </div>
                        <div class="">
                            <select id="amount-catalog" name="date">
                                <option value="day">20</option>
                                <option value="week">40</option>
                                <option value="month">60</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="sherif-catalog_sort_look">
                    <a href="#"><img src="{{asset('/assets/img/icons/th-large-solid.svg')}}"></a>
                    <a href="#"><img src="{{asset('/assets/img/icons/th-solid.svg')}}"></a>
                    <a href="#"><img src="{{asset('/assets/img/icons/bars-solid.svg')}}"></a>
                </div>
            </div>

            <div class="sherif_catalog_content">
                @foreach($products as $product)
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>



                                <?php
                                    $img_cropped = explode('.', $product->mainimage);
                                    if ($product->mainimage != ''){
                                        $product->mainimage = get_download_image_cache($product->mainimage,140,200);
                                    }
                                    else $product->mainimage = 'no_product.jpg';
                                ?>
                            <div class="bgc-img">
                                <img src="/storage/app/public/{{$product->mainimage}}" alt="">
                            </div>
                            <a href="/public/get/product/{{$product->id}}" class="sherif-product_content_link">{{$product->name}}</a><br />

                            <!-- <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br /> -->
                            <span class="sherif-product_content_current-price">Цена: <span class="price">{{$product->price_final}} грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a class="sherif-btn btn-sherif-product btn-in-basket" product-id="{{$product->id}}"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
            @endforeach
            <!-- <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon3.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>

                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>

                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon4.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon5.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>

                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>

                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div>
                    <div class="sherif-product ">
                        <div class="sherif-product_content">
                            <div class="sherif-product_availability">
                                <span class="sherif-product_availability_available"></span>
                            </div>
                            <div class="sherif-product_content-img_box">
                                <img class="sherif-product_content_img" src="{{asset('/assets/img/recommended/icon2.png')}}" alt="">
                            </div>
                            <div class="sherif-product_content_discount">
                                <p class="sherif-product_content_discount_amount">-<span>15</span>%</p>
                                <p class="sherif-product_content_discount_date">До конца акции осталось <span>5</span> дней</p>
                            </div>
                            <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />

                            <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br />
                            <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                        </div>
                        <div class="sherif-product-buttons notoneclick">
                            <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                            <div class="sherif_row">
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-balance-scale fa-lg"></i><strong></strong></a>
                                <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>

                            </div>
                        </div>
                        <div class="sherif-product-buttons">
                            <a href="#" class="sherif-product-buttons_click-btn"><span></span><i class="far fa-hand-point-up fa-2x"></i><strong>купить в один клик</strong></a>
                        </div>
                        <div class="hiden">
                            <p>Максимальная кратность: <span>8-10 х</span></p>
                            <p>По типу: <span>Призменный</span></p>
                            <p>Диаметр линзы: <span></span></p>
                            <p>Цвет: <span>Серебро</span></p>
                            <p>АКЦИИ и СКИДКИ:<span></span></p>
                        </div>
                    </div> -->
            </div>

            <div class="sherif-catalog_bottom">
                <!--<ul class="pagination-sherif">
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
                </ul>-->
                <div id="product_pegination" class="products-pagination row">
                    <div class="">
                        {!! $products->appends(['q' => \Illuminate\Support\Facades\Input::get('q')])->links() !!}
                    </div>
                </div>
                <div class="sherif-catalog_sort">
                    <div class="sorting">
                        <form class="sherif-catalog_sort_date">
                            <div class="">
                                <label for="date-catalog">сортировка</label>
                            </div>
                            <div class="form-group">
                                <select id="date-catalog" name="date">
                                    <option value="day">дата поступления</option>
                                    <option value="week">название</option>
                                    <option value="month">цена</option>
                                </select>
                                <button><i class="fas fa-sort-numeric-down"></i></button>
                            </div>
                        </form>
                        <form class="sherif-catalog_sort_amount">
                            <div class="">
                                <label for="amount-catalog">товаров на странице</label>
                            </div>
                            <div class="">
                                <select id="amount-catalog" name="date">
                                    <option value="day">20</option>
                                    <option value="week">40</option>
                                    <option value="month">60</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="sherif-catalog_sort_look">
                        <img src="{{asset('/assets//img/icons/th-large-solid.svg')}}">
                        <img src="{{asset('/assets/img/icons/th-solid.svg/')}}">
                        <img src="{{asset('/assets/img/icons/bars-solid.svg/')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--SHERIF catalog END-->

@endsection

@section("right_side_bar")
    <div class="sherif_right_column">
        <div class="sherif_home_main-box-right_bar">
            <!-- Already viewed -->
            <div class="sherif_home_main-right_bar-viewed">
                <h3>Вы просматривали</h3>
                <button class="sherif_home_main-right_bar-viewed-button button_top"></button>
                <div class="sherif_home_main-right_bar-viewed-trade_item">
                    <div class="sherif_home_main-right_bar-viewed-trade_item-pic">
                        <img src="{{asset('/assets/img/recommended/icon2.png')}}" alt="" >
                    </div>
                    <div class="sherif_home_main-right_bar-viewed-trade_item-description">
                        <div class="sherif_home_main-right_bar-viewed-trade_item-description-top">
                            <h5>Костюм Полиция нового образца, тип А </h5>
                            <p>Артикул: 30700А</p>
                        </div>
                        <div class="sherif_home_main-right_bar-viewed-trade_item-description_bot">
                            <h5>Цена:870.00 грн</h5>
                            <h4><strong>Цена:870.00 грн</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="sherif_home_main-right_bar-viewed-trade_item">
                    <div class="sherif_home_main-right_bar-viewed-trade_item-pic">
                        <img src="{{asset('/assets/img/recommended/icon1.png')}}" alt="" >
                    </div>
                    <div class="sherif_home_main-right_bar-viewed-trade_item-description">
                        <div class="sherif_home_main-right_bar-viewed-trade_item-description-top">
                            <h5>Костюм Полиция нового образца, тип А </h5>
                            <p>Артикул: 30700А</p>
                        </div>
                        <div class="sherif_home_main-right_bar-viewed-trade_item-description_bot">
                            <h5>Цена:870.00 грн</h5>
                            <h4><strong>Цена:870.00 грн</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="sherif_home_main-right_bar-viewed-trade_item">
                    <div class="sherif_home_main-right_bar-viewed-trade_item-pic">
                        <img src="{{asset('/assets/img/recommended/icon3.png')}}" alt="" >
                    </div>
                    <div class="sherif_home_main-right_bar-viewed-trade_item-description">
                        <div class="sherif_home_main-right_bar-viewed-trade_item-description-top">
                            <h5>Костюм Полиция нового образца, тип А </h5>
                            <p>Артикул: 30700А</p>
                        </div>
                        <div class="sherif_home_main-right_bar-viewed-trade_item-description_bot">
                            <h5>Цена:870.00 грн</h5>
                            <h4><strong>Цена:870.00 грн</strong></h4>
                        </div>
                    </div>
                </div>
                <button class="sherif_home_main-right_bar-viewed-button button_bot"></button>
            </div>

            <!-- Pick up goods -->
            <div class="sherif_home_main-box-right_bar-pick_up">

                <div class="sherif_sidebar_catalog-filter">
                    <div class="sherif_sidebar_catalog-title">
                        <h2>Фильтр:</h2>
                    </div>
                    <div class="sherif_sidebar_catalog-content panel-group">
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <p>Сезон</p>
                                        <a href="#subscribe_itm11" data-parent="#accordion-catalog" data-toggle="collapse"class=""><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm11" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <input type="checkbox" checked  name=""> Все сезоны<span class="pull-right">476</span><br>
                                            <input type="checkbox"  name=""> Демисезон<span class="pull-right">255</span><br>
                                            <input type="checkbox" name=""> Лето<span class="pull-right">100</span><br>
                                            <input type="checkbox"  name=""> Зима<span class="pull-right">120</span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Фильтр 2</p>
                                        <a href="#subscribe_itm12" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm12" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <form>
                                            <input type="checkbox"  name=""> Wader<span class="pull-right">476</span><br>
                                            <input type="checkbox"  name=""> Azimut<span class="pull-right">426</span><br>
                                            <input type="checkbox"  name=""> Turbo Trike24<span class="pull-right">181</span><br>
                                            <input type="checkbox"  name=""> Bambi<span class="pull-right">14</span><br>
                                            <input type="checkbox"  name=""> CFS<span class="pull-right">455</span><br>
                                            <input type="checkbox"  name=""> Тетрада<span class="pull-right">455</span><br>
                                            <a href="#" class="pull-right">Показать еще <span>(160)</span></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Цвет</p>
                                        <a href="#subscribe_itm13" data-parent="#accordion-catalog" data-toggle="collapse" cla><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm13" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/multicam.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Multicam
                                            </div><br />
                                            <div class="colors"  style="
    							                                    		background-color: #606757;">
                                                <input type="checkbox" name=""> Olive
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/woodland.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Woodland
                                            </div><br />
                                            <div class="colors"  style="
    							                                    		background-color: #d1b37f;">
                                                <input type="checkbox" name=""> TAN
                                            </div><br />
                                            <div class="colors"  style="
    							                                    		background-color: #000;">
                                                <input type="checkbox" name=""> Black
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/A-TACS.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> A-TACS
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/A-TACS-AU.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> A-TACS AU
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/A-TACS-FG.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> A-TACS FG
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/ACU.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> ACU
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/MTP.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> MTP
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/mossy-oak.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Mossy Oak
                                            </div><br />
                                            <div class="colors"  style="
    							                                    		background-color: #ae8c70;">
                                                <input type="checkbox" name=""> Coyote
                                            </div><br />
                                            <div class="colors"  style="
    							                                    		background-color: #fff;">
                                                <input type="checkbox" name=""> White
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/cadpat.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Cadpat
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/flexktarn.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Flacktarn
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/AT-Digital.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> AT-Digital
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/Digital.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Digital
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/Khaki.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Khaki
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/FG.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> FG
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/OliveDrab.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Olive Drab
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/AOR-1.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> AOR 1/2
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/desert-dpm2.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Desert
                                            </div><br />
                                            <div class="colors"  style="
    							                                    		background-color: #521f05;">
                                                <input type="checkbox" name=""> Brown
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/ССЕTarn1.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> CCE Tarn
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/DDPM2.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> DDPM
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/tree2.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Березка
                                            </div><br />
                                            <div class="colors"  style="
    							                                    		background-color: #4e86a7;">
                                                <input type="checkbox" name=""> Navy Blue
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/dpm_urban_b_.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Urban
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/Kruptek.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Kruptek
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/Varan.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Varan
                                            </div><br />
                                            <div class="colors"  style="
                                                    background: url({{asset('/assets/img/pic/filter/MARPAT.png')}});background-repeat: no-repeat;background-size: cover;">
                                                <input type="checkbox" name=""> Marpat
                                            </div><br />
                                            <div class="colors"  style="
    							                                    		background-color: #b2b2b2;">
                                                <input type="checkbox" name=""> Другой
                                            </div><br />

                                            <a href="#" class="pull-left">Показать еще <span>160</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Критерий 6</p>
                                        <a href="#subscribe_itm14" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm14" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <input type="checkbox" checked="" name=""> Складные <span class="pull-right">15</span><br>
                                            <input type="checkbox"  name=""> Нескладные <span class="pull-right">0</span><br>
                                            <input type="checkbox" name=""> Мультитул <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Нож многофункциональный <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Мультитул карманный <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Метательные <span class="pull-right">0</span><br>
                                            <input type="checkbox" name=""> Балисонг - нож бабочка <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Сабли и мечи <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Топоры <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Учебные <span class="pull-right">22</span><br>
                                            <input type="checkbox" name=""> Кукри и мачете <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Охотничьи <span class="pull-right">22</span><br>
                                            <a href="#" class="pull-left">Показать еще <span>(160)</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Критерий-8</p>
                                        <a href="#subscribe_itm15" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm15" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <input type="checkbox" checked="" name=""> Складные <span class="pull-right">15</span><br>
                                            <input type="checkbox"  name=""> Нескладные <span class="pull-right">0</span><br>
                                            <input type="checkbox" name=""> Мультитул <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Нож многофункциональный <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Мультитул карманный <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Метательные <span class="pull-right">0</span><br>
                                            <input type="checkbox" name=""> Балисонг - нож бабочка <span class="pull-right">0</span><br>
                                            <input type="checkbox"  name=""> Сабли и мечи <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Топоры <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Учебные <span class="pull-right">22</span><br>
                                            <input type="checkbox" name=""> Кукри и мачете <span class="pull-right">22</span><br>
                                            <input type="checkbox"  name=""> Охотничьи <span class="pull-right">22</span><br>
                                            <a href="#" class="pull-left">Показать еще <span>160</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-catalog" >
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title sherif-subscribe_row arr-down">
                                        <p>Цена</p>
                                        <a href="#subscribe_itm16" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                    </h4>
                                </div>
                                <div id="subscribe_itm16" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div>
                                            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                            <div data-role="main" class="ui-content">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="#" class="filter-btn">СБРОСИТЬ ВСЕ ФИЛЬТРЫ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection