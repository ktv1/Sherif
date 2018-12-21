@section("right_side_bar")
    <div class="sherif_right_column">
        <div class="sherif_home_main-box-right_bar">
            <!-- Air Show -->
            <div class="sherif_home_main-box-right_bar-advertising">
                <a href="#" style="background-image:url({{asset('/assets/img/pic/Air_Show.jpg')}});" class="sherif_home_main-box-right_bar-advertising-pic"  >
                </a>
                <a href="#" style="background-image:url({{asset('/assets/img/pic/Air_Show.jpg')}});" class="sherif_home_main-box-right_bar-advertising-pic"  >
                </a>
            </div>
            <!-- Already viewed -->
            @php
                $viewedproducts = session('viewed_products');
                 if(!is_array($viewedproducts)) {
                     $viewedproducts = array();
                 }

                $ipsession = \App\Session::where('ip_address',request()->getClientIp())->first();
                if ($ipsession) {
                    $ipsessionproducts = unserialize($ipsession->payload);
                    foreach ($ipsessionproducts as $ipsessionproduct) {
                        if(!in_array($ipsessionproduct, $viewedproducts))  {
                            array_unshift($viewedproducts,$ipsessionproduct);
                        }
                    }
                 }
                $viewedproducts = array_slice(array_reverse($viewedproducts),0,6);

            @endphp
            @if(count($viewedproducts) > 0)
                <div class="sherif_home_main-right_bar-viewed">
                <h3>Вы просматривали</h3>
                <button class="sherif_home_main-right_bar-viewed-button button_top"></button>
                    @foreach($viewedproducts as $viewedproduct)
                        @php
                            $product = \App\Product::where('id',$viewedproduct)->with('categories')->first();
                        //dd($product);
                        @endphp
                        <div class="sherif_home_main-right_bar-viewed-trade_item">
                            <div class="sherif_home_main-right_bar-viewed-trade_item-pic">
                                <img src="/storage/{{get_download_image_cache($product->mainimage,62,82)}}" alt="{{$product->name}}"
                                     data-src="/storage/{{get_download_image_cache($product->mainimage,200,300)}}">
                                <img class="hidden-large" style="">
                            </div>
                            <div class="sherif_home_main-right_bar-viewed-trade_item-description">
                                <div class="sherif_home_main-right_bar-viewed-trade_item-description-top">
                                    @if(($product->categories))
                                        @php
                                            $categorypath = \App\Product::i()->GetCategoriesPath($product->categories[0]->id);
                                        @endphp
                                        <h5><a href="{{route('product', ['slug'=>array_pop($categorypath), 'subslug'=>array_shift($categorypath), 'product' => $product->slug])}}">{{$product->name}}</a></h5>
                                    @else
                                        <h5><a href="{{route('productNoURL',['slug'=>$product->id])}}">{{$product->name}}</a></h5>
                                    @endif
                                        <p>Артикул: {{$product->code}}</p>
                                </div>
                                <div class="sherif_home_main-right_bar-viewed-trade_item-description_bot">
                                    <h5>Цена: {{$product->price_final}}</h5>
                                    @if($product->sale_price != 0)
                                        <h4><strong>Цена: {{$product->price_final}} грн</strong></h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                <button class="sherif_home_main-right_bar-viewed-button button_bot"></button>
            </div>
            @endif
            <!-- Pick up goods -->
            <div class="sherif_home_main-box-right_bar-pick_up">
                <a href="" style="background-image: url({{asset('/assets/img/pic/pick_up.jpg')}});" class="sherif_home_main-box-right_bar-pick_up-pic">
                    <img src="{{asset('/assets/img/icons/pick_up-icon.png')}}" alt="">
                    <h4>Подобрать товары по цвету</h4>
                </a>
            </div>
        </div>
    </div>
@endsection