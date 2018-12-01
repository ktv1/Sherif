@extends("layouts.app")
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
            <div class="sherif_home_main-ordering-box-drawing_order">
                <div class="sherif_home_main-ordering-box-drawing_order-form_block">
                    <form method="POST" action="#">
                        <label for="sherif_mail"><b>Способ доставки </b></label>
                        <select id="sherif_mail">
                            <option value="new_mail">Доставка Новой почтой</option>
                            <option value="new_mail">Доставка Новой почтой</option>
                        </select><br>
                        <label for="sherif_pay"><b>Способ оплаты</b> </label>
                        <select id="sherif_pay">
                            <option value="cash_payment">Оплата наличными при получении</option>
                            <option value="cash_payment">Оплата наличными при получении</option>
                        </select><br>
                        <p><b>Информация для доставки заказа:</b></p>
                        <label for="sherif_name">ФИО<em>*</em></label>
                        <input type="name" id="sherif_name" placeholder=" Иванов Иван Иванович"><br>
                        <label for="sherif_telephon">Телефон<em>*</em></label>
                        <input type="tel" id="sherif_telephon" value=" +  (   )  -  -   "><br>
                        <label for="sherif_email"><b>E-mail</b></label>
                        <input type="email" id="sherif_email"><br>
                        <p><b>Адрес</b></p>
                        <label for="sherif_region"><em>*</em>Регион</label>
                        <select id="sherif_region">
                            <option value="novayapochta">-- Выберите --</option>
                        </select><br>
                        <label for="sherif_town" ><em>*</em>Населенный пункт</label>
                        <select id="sherif_town">
                            <option value="novayapochta">-- Не выбран регион --</option>
                        </select><br>
                        <label for="sherif_places_mail"><em>*</em>Отделение новой почты</label>
                        <select id="sherif_places_mail">
                            <option value="novayapochta">-- Не выбран регион --</option>
                        </select><br>
                        <label for="sherif_comments">Комментарий к заказу</label>
                        <textarea id="sherif_comments"></textarea>
                    </form>
                </div>
                <div class="sherif_home_main-ordering-box-drawing_order-product_block">
                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods">
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
                                <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter" order-item-id="1">
                                    <button class="sherif_home_main-ordering-box-drawing_order-product_block-goods-info-top-product_counter-button counter-button-left">-</button>
                                    <input type="integer" value="1" name="amount_order" id="amount_order_cod_1">
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
                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods">
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
                    </div>
                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-total_price">
                        <p>Общая стоимость 2310.00 грн</p>
                    </div>
                    <div class="sherif_home_main-ordering-box-drawing_order-product_block-goods-make_order">
                        <button type="button" class="goods-make_order">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection