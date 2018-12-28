@if($product->concomitant)
    @php
        $productconcomitant = [];
        $concomitantarr = json_decode(stripslashes($product->concomitant));
        foreach ($concomitantarr as $item) {
             $pr = \App\Product::where('id',$item)->first();
             //array_push($productconcomitant,$pr);
             $productconcomitant[] = $pr;
        }
    @endphp
<div class="sherif_home_main-box_recommended">
    <div class="flex_row_mobile">
        <h3>Мы рекомендуем:</h3>
        <a class="mobile_toggle" toggle-object="recommended" toggle="off"><i class="far fa-arrow-alt-circle-down"></i></a>
    </div>

    <div class="toggle_mobile_recommended">
        <div class="sherif_home_main-box_scroll">
            @foreach($productconcomitant as $concomitant)
            <div class="sherif-product">
                <div class="sherif-product_content">
                    <div class="sherif-product_content-img_box">
                        <img class="sherif-product_content_img" src="/storage/{{get_download_image_cache($concomitant->mainimage,190,250)}}" alt="">
                    </div>
                    @if(($concomitant->categories))
                        @php
                            $categorypath = \App\Product::i()->GetCategoriesPath($concomitant->categories[0]->id);
                        @endphp
                        <a class="sherif-product_content_link" href="{{route('slug', ['slug'=>/*array_pop($categorypath) . '/' . array_shift($categorypath) . '/' . */$concomitant->slug])}}">{{$concomitant->name}}</a>
                    @else
                        <a class="sherif-product_content_link" href="{{route('productNoURL',['slug'=>$concomitant->id])}}">{{$concomitant->name}}</a>
                    @endif
                    <br />
                    <span class="sherif-product_content_vendor-code">Артикул: {{$concomitant->code}}</span><br />
                    <span class="sherif-product_content_prev-price">Цена: <span class="price">{{$concomitant->price_final}} грн</span></span><br />
                    <span class="sherif-product_content_current-price">Цена: <span class="price">{{$concomitant->price_final}} грн</span></span><br />
                </div>
                <div class="sherif-product-buttons">
                    <a href="#" class="sherif-btn btn-sherif-product"><span></span><i class="fas fa-shopping-cart"></i><strong>В корзину</strong></a>
                    <div class="sherif-product_other">
                        <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-phone-volume fa-lg"></i><strong></strong></a>
                        <a href="#" class="btn-sherif-product"><span></span><i class="fas fa-heart fa-lg"></i><strong></strong></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif