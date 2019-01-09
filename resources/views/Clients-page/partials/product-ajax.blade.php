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
                    $img_cropped = explode('.', $product['mainimage'])
                    ?>
                    <img class="sherif-product_content_img" src="/storage/{{get_download_image_cache($product['mainimage'],140,200)}}" alt="">
                <!--<img class="sherif-product_content_img" src="{{--asset('storage/'. $img_cropped[0] . '-cropped.' . $img_cropped[1])--}}" alt="">-->
                </div>
                <a href="{{route('slug', [/*'slug'=>$CurrentCategory->slug, 'subslug'=>$CurrentSubCategory->slug, */'slug'=>$product['slug']])}}" class="sherif-product_content_link">{{$product['name']}}</a><br />

                <!-- <span class="sherif-product_content_prev-price">Цена: <span class="price">870.00 грн</span></span><br /> -->
                <span class="sherif-product_content_current-price">Цена: <span class="price">{{$product['price_final']}} грн</span></span><br />
            </div>
            <div class="sherif-product-buttons notoneclick">
                <a class="sherif-btn btn-sherif-product btn-in-basket" product-id="{{$product['id']}}"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
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
                $productCharacteristic = \App\Product::i()->getProductCharacteristics($product['id']);
            @endphp
            @if($productCharacteristic)
                <div class="hiden">
                    @foreach($productCharacteristic as $value)
                        <p>{{$value['char_name']}}: <span>{{$value['char_value']}}</span></p>
                    @endforeach
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