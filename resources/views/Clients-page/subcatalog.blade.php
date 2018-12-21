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
                <li><a href="#">{{$CurrentCategory->name}}</a></li>
                <li><span>Вы здесь <i class="fas fa-arrow-right"></i></span>{{$CurrentSubCategory->name}}</li>
            </ul>

            <!-- subcategories -->
            <div class="sherif_home_main-box_section">
                @foreach($datacategories as $subcatalog)
                    <div class="sherif_home_main-box_section_itm">
                        <a href="{{route('subCatalog', ['slug'=>$CurrentCategory->slug, 'subslug'=>$subcatalog->slug])}}">
                            <img class="sherif-section_itm-img" src="{{asset('storage/'. $subcatalog->image)}}" alt="">
                            <p class="section-title">
                                <span class="category-link">{{$subcatalog->name}}<span class="section-number"> (7)</span></span>
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>



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
                    <form id="sort_count" class="sherif-catalog_sort_date">
                        <div class="">
                            <label for="date-catalog">сортировка</label>
                        </div>
                        <div class="form-group sort">
                            <select id="date-catalog" name="sortby" onchange="submitListProductFilters()">
                                <option value="default" {{ request()->get('sortby') === "default" ? "selected" : "" }}>предустановленная</option>
                                <option value="name" {{ request()->get('sortby') === "name" ? "selected" : "" }}>название</option>
                                <option value="price" {{ request()->get('sortby') === "price" ? "selected" : "" }}>цена</option>
                                <option value="dateadd" {{ request()->get('sortby') === "dateadd" ? "selected" : "" }}>дата поступления</option>
                                <option value="article" {{ request()->get('sortby') === "article" ? "selected" : "" }}>артикул</option>
                                <option value="vendor" {{ request()->get('sortby') === "vendor" ? "selected" : "" }}>производитель</option>
                                <option value="sale" {{ request()->get('sortby') === "sale" ? "selected" : "" }}>акция</option>

                            </select>
                            @if ((request()->get('orderby') == 'ASC'))
                                <button name="orderby" value="DESC" onclick="submitListProductFilterSortDirection()"><i class="fas fa-sort-numeric-down"></i></button>
                            @elseif((request()->get('orderby') == "DESC"))
                                <button name="orderby" value="ASC" onclick="submitListProductFilterSortDirection()"><i class="fas fa-sort-numeric-up"></i></button>
                            @else
                                <button name="orderby" value="DESC" onclick="submitListProductFilterSortDirection()"><i class="fas fa-sort-numeric-down"></i></button>
                            @endif
                        </div>
                    </form>
                    <script type="text/javascript">
                        function submitListProductFilterSortDirection(){
                            $('orderby').value = $('orderby').value ^ 1;
                            submitListProductFilters();
                            //jQuery('.jshop_list_product form#sort_count').submit();
                            //submitListProductFilters();
                        }
                        function submitListProductFilters(){
                            jQuery('form#sort_count').submit();
                            // $_('sort_count').submit();
                            //alert(jQuery('orderby'));
                            //jQuery('orderby').value = jQuery('orderby').value ^ 1;
                            //submitListProductFilters();
                        }
                    </script>
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

                    @foreach($data as $product)
                        <div class="sherif-product">
                            <div class="sherif-product_content">
                                <div class="sherif-product_availability">
                                    <span class="sherif-product_availability_available"></span>
                                </div>

                                <div class="sherif-product_content-img_box">
                                    <?php  
                                        $img_cropped = explode('.', $product->mainimage)
                                    ?>
                                        <img class="sherif-product_content_img" src="/storage/{{get_download_image_cache($product->mainimage,140,200)}}" alt="">
                                    <!--<img class="sherif-product_content_img" src="{{asset('storage/'. $img_cropped[0] . '-cropped.' . $img_cropped[1])}}" alt="">-->
                                </div>
                                <a href="{{route('product', ['slug'=>$CurrentCategory->slug, 'subslug'=>$CurrentSubCategory->slug, 'product'=>$product->slug])}}" class="sherif-product_content_link">{{$product->name}}</a><br />

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
                            @php
                                ///product characteristics
                                $productCharacteristic = \App\Product::i()->getProductCharacteristics($product->id);
                            @endphp
                            @if($productCharacteristic)
                                <div class="hiden">
                                    @foreach($productCharacteristic as $value)
                                        @if (($isadm === 0) && ($value['gr_id'] === 11))
                                            @php continue @endphp
                                        @endif
                                        @if (($isadm != 0) && ($value['gr_id'] === 11))
                                            <p><span style="color: red;">*</span>{{$value['char_name']}}: <span>{{$value['char_value']}}</span></p>
                                        @else
                                            <p>{{$value['char_name']}}: <span>{{$value['char_value']}}</span></p>

                                        @endif

                                    @endforeach
                                        @if (($isadm != 0)))
                                            <p><span  style="color: red; font-size: 8px;">* Только для служебных айпи!!!</span></p>
                                        @endif
                                </div>
                            @endif
                        </div>
                    @endforeach

                </div>

            <div class="sherif-catalog_bottom">

                <div id="product_pegination" class="products-pagination row">
                    <div class="">
                        {!! $data->appends(Request::capture()->except('page'))->render() !!}
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

