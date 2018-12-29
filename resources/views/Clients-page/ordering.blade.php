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
    loadCSS("assets/css/ordering/_main.css");                //User Styles: Main
    @if($is_admin)
        loadCSS("assets/css/_main_admin.css");                //User Styles: Main
    @endif
    loadCSS("assets/css/ordering/_media.css");               //User Styles: Media
    @if($is_admin)
        loadCSS("assets/css/_media_admin.css");               //User Styles: Media
    @endif

@endsection

@section("company_text")@endsection
@section("bottom_alert")@endsection

@section('header')
    {!!$header!!}
@endsection

@section('left_sidebar')
    {!!$left_side_bar!!}
@endsection


@section("main_column")
    <div class="sherif_center_column">
        @include("layouts.chat")
        <!-- Ordering box start -->
        <div class="sherif_home_main-ordering-navigation">
            <a class="goods_main" href="">Главная</a>
            <p><span>/</span> Вы здесь <i class="fas fa-arrow-right"></i></p>
            <a href="">Оформление заказа</a>
        </div>
        <div class="sherif_home_main-ordering-box">
            <div class="sherif_home_main-ordering-box-title">
                <h3>Оформление заказа</h3>
            </div>
            <form class="sherif_home_main-ordering-box-drawing_order submit_order">
                <div class="sherif_home_main-ordering-box-drawing_order-form_block">
                    <div id="order_form">
                        <label for="sherif_mail"><b>Способ доставки </b></label>
                        <select id="sherif_mail" name="method_mail">
                            <option value="1">Доставка Новой почтой</option>
                            <option value="1">Доставка Новой почтой</option>
                        </select><br>
                        <label for="sherif_pay"><b>Способ оплаты</b> </label>
                        <select id="sherif_pay" name="method_pay">
                            <option value="1">Оплата наличными при получении</option>
                            <option value="1">Оплата наличными при получении</option>
                        </select><br>
                        <p><b>Информация для доставки заказа:</b></p>
                        <label for="sherif_name">ФИО<em>*</em></label>
                        <input type="name" name="name" id="sherif_name" placeholder=" Иванов Иван Иванович" required=""><br>
                        <label for="sherif_telephon">Телефон<em>*</em></label>
                        <input type="tel" name="tel" id="sherif_telephon" placeholder="+380" required=""><br>
                        <label for="sherif_email"><b>E-mail</b></label>
                        <input type="email" id="sherif_email" name="email"><br>
                        <p><b>Адрес</b></p>
                        <label for="sherif_region"><em>*</em>Регион</label>
                        <select id="sherif_region" name="region" required="">
                            <option value="novayapochta" value="0">-- Выберите --</option>
                            <option value="novayapochta" value="1">--  --</option>
                        </select><br>
                        <label for="sherif_town" ><em>*</em>Населенный пункт</label>
                        <select id="sherif_town" name="town" required="">
                            <option value="novayapochta">-- Не выбран регион --</option>
                        </select><br>
                        <label for="sherif_places_mail" required=""><em>*</em>Отделение новой почты</label>
                        <select id="sherif_places_mail" name="mail_place" required="">
                            <option value="novayapochta">-- Не выбран регион --</option>
                        </select><br>
                        <label for="sherif_comments">Комментарий к заказу</label>
                        <textarea id="sherif_comments" name="comments"></textarea>
                    </div>
                </div>
                <div class="sherif_home_main-ordering-box-drawing_order-product_block">
                    <?php $counter=1 ?>
                    @foreach($data['products'] as $value)
                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods bsk_itm_{{$value->id}}">
                            <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-pic">
                                <img src="{{asset('storage/'. $value->mainimage)}}" alt="">
                            </div>
                            <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info">
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top">
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-title">
                                        <a href="{{route('productNoURL', ['id'=>$value->id])}}">{{$value->name}}</a>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type">
                                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type-vendor_code">
                                            <p>Артикул:{{$value->vendor_code}}</p>
                                        </div>
                                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type-product_code">
                                            <p>Код товара:{{$value->code}}</p>
                                        </div>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view">
                                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view-size">
                                            <p>Размер: L</p>
                                        </div>
                                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view-color">
                                            <p>Цвет: Олива</p>
                                        </div>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-price">
                                        <p>Цена: {{$value->price_final}} грн</p>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter" order-item-id="1">
                                        <a togglers="down" class="sherif-basket_quantity_min product_togglers" id_product="{{$value->id}}">-</a>
                                        <input type="text" id="ordering_product_amount_{{$value->id}}" class="product_amount_input sherif-basket_quantity_num" value="{{$value->amount}}" id_product="{{$value->id}}">
                                        <a togglers="up" class="sherif-basket_quantity_plus product_togglers" id_product="{{$value->id}}">+</a>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-price">
                                        <p>Стоимость: <span class="itm_currency_product">{{$value->price_final * $value->amount}}</span> грн</p>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-out_basket">
                                        <a class="sherif-basket_product_description_link delete_from_basket" id_product="{{$value->id}}"><i class="fas fa-times"></i> Убрать из корзины</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    @endforeach
                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-total_price">
                        <p>Общая стоимость: <span class="total_basket">{{$data['curr_price']}}</span> грн</p>
                        <input type="hidden" class="count_basket_itm" value="{{count(\Gloudemans\Shoppingcart\Facades\Cart::content())}}">
                    </div>
                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-make_order">
                        <button type="submit" class="goods-make_order submit_order">Оформить заказ</button>
                    </div>
                <!--  <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods">
                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-pic">
                            <img src="{{asset('/assets/img/p)ic/sherif-ordering.jpg')}}" alt="">
                        </div>
                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info">
                            <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top">
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-title">
                                    <a href="">Сумка-рюкзак Arm-tech tk. Cordura Digital ВСУ, 70 л </a>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type">
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type-vendor_code">
                                        <p>Артикул:30700А</p>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type-product_code">
                                        <p>Код товара:310-311</p>
                                    </div>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view">
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view-size">
                                        <p>Размер: L</p>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view-color">
                                        <p>Цвет: Олива</p>
                                    </div>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-price">
                                    <p>Цена: 770.00 грн</p>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter"order-item-id="2">
                                    <button class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter-button counter-button-left">-</button>
                                    <input type="integer" value="1" name="amount_order" id="amount_order_cod_2">
                                    <button class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter-button counter-button-right">+</button>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-price">
                                    <p>Стоимость: 770.00 грн</p>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-out_basket">
                                    <a href="#"><u><i class="fas fa-times"></i> Убрать из корзины</u></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods last-good-ordering">
                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-pic">
                            <img src="{{asset('/assets/img/pic/sherif-ordering.jpg')}}" alt="">
                        </div>
                        <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info">
                            <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top">
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-title">
                                    <a href="">Сумка-рюкзак Arm-tech tk. Cordura Digital ВСУ, 70 л </a>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type">
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type-vendor_code">
                                        <p>Артикул:30700А</p>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-type-product_code">
                                        <p>Код товара:310-311</p>
                                    </div>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view">
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view-size">
                                        <p>Размер: L</p>
                                    </div>
                                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-view-color">
                                        <p>Цвет: Олива</p>
                                    </div>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-price">
                                    <p>Цена: 770.00 грн</p>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter" order-item-id="3">
                                    <button class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter-button counter-button-left">-</button>
                                    <input type="integer" value="1" name="amount_order" id="amount_order_cod_3">
                                    <button class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter-button counter-button-right">+</button>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-price">
                                    <p>Стоимость: 770.00 грн</p>
                                </div>
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-out_basket">
                                    <a href="#"><u><i class="fas fa-times"></i> Убрать из корзины</u></a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </form>
            <?php
                /*$arr = array('Доставка Новой почтой', 'Доставка Новой почтой');
                echo Form::open(array('url' => 'foo/bar'));
                echo Form::text('username','Username');
                echo Form::select('size', $arr, null, ['placeholder' => 'Сделайте выбор...']);
                echo '<br/>';

                echo Form::text('email', 'example@gmail.com');
                echo '<br/>';

                echo Form::password('password');
                echo '<br/>';

                echo Form::checkbox('name', 'value');
                echo '<br/>';

                echo Form::radio('name', 'value');
                echo '<br/>';

                echo Form::file('image');
                echo '<br/>';

                echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));
                echo '<br/>';

                echo Form::submit('Click Me!');
                echo Form::close();*/
            ?>
        </div>
    </div>
@endsection


@section('compiled_js')
    {"src" : "{{asset('assets/libs/Masked/masked.min.js')}}", "async" : false},
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        //$("#sherif_telephon").mask("+380(99) 99-99-999");

        $(".submit_order").submit(function(){
            var th = $(this);
            if($(".count_basket_itm").val() > 0){
                $.ajax({
                    url: 'ordering/buy',
                    data: th.serialize(),
                    type: 'post',
                    headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                    success: function( data, textStatus, jQxhr ){
                        console.log(data);
                        alert("Заказ выполнен! Ваш заказ обслуживает менеджер " + data['name']
                                + ' ' + data['phone1'] + ' ' + data['phone2']);
                    },
                    error: function(data){
                        $('html').append( data.responseText );
                    }
                });
            }else{
                alert("Корзина Пуста!")
            }
            return false;
        });
    });
</script>