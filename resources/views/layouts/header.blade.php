<header class="sherif_home_header">
    <div class="sherif_home_header-navigation">
        <div class="sherif_row">
            <!-- Smallest -->
            <div class="sherif_home_header-navigation_arrange-mobile smaller">
                <a href="#"><i class="fas fa-bars"></i></a>
                <a href="#"><i class="fas fa-phone-volume"></i>  <span>Позвонить</span></a>
                <a href="#"><i class="fas fa-envelope"></i>  <span>Написать</span></a>
            </div>
            <!-- End  Smallest -->
            <!-- Mobile -->
            <div class="sherif_home_header-navigation_arrange-mobile">
                <a href="#"><i class="fas fa-bars"></i></a>
                <a href="#"><img src="{{asset('/assets/img/icons/Kievstar.png')}}" alt="">  <span>+38 (097) 123 45 67</span></a>
                <a href="#" data-toggle="modal"><i class="fas fa-phone-volume"></i>  <span>Заказать звонок</span></a>
                <a href="#"><i class="fas fa-envelope"></i>  <span>Написать нам</span></a>
                <div class="sherif_home_header-navigation-lang_arrange">
                    <div class="sherif_home_header-navigation-lang">
                        <a href="#">RU</a>
                        <span>|</span>
                        <a href="#">UA</a>
                    </div>
                </div>
            </div>
            <!-- End Mobile -->
            <div class="sherif_home_header-navigation_arrange">
                @if(isset($is_admin))
                    <div class="sherif_home_header-navigation-menu sherif_home_header-navigation_service">
                        <span>$ {{substr($uah_to_usd,0,5)}}</span>
                        <span>€ {{substr($uah_to_eur,0,5)}}</span>
                        <span class="toggle-bg">
									<input type="radio" name="toggle" value="off">
									<input type="radio" name="toggle" value="on">
									<span class="switch"></span>
								</span>
                        <span class="toggle-label">управление</span>
                    </div>
                @endif
                <div class="sherif_home_header-navigation-menu sherif_home_header-navigation-menu_arrange">
                    <a href="#">Оплата и доставка</a>
                    <a href="{{route('contacts')}}">Контакты</a>
                    <a href="#">Гарантии</a>
                    <a href="{{route('income')}}">Новые поступления</a>
                    <a href="#">Отзывы</a>
                    <a href="{{route('blog')}}">Статьи</a>
                </div>
                <div class="sherif_home_header-navigation-lang_arrange">
                    <div class="sherif_home_header-navigation-lang">
                        <a href="#">RU</a>
                        <span>|</span>
                        <a href="#">UA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sherif_home_header-content">
        <div class="sherif_row">
            <div class="sherif_home_header-content_arrange">
                <div class="sherif_left_column">
                    <a href="{{url('/')}}" class="sherif_home_header-logo">
                        <img src="{{asset('/assets/img/Sherif_logo.png')}}" alt="" class="sherif_home_header-logo_img">
                    </a>
                </div>
                <!-- Mobile -->
                <div class="sherif_home_header-content-mobile">
                    <form class="sherif_home_header-toolbar_searcher_block" action="" method="">
                        <input type="name" class="toolbar_searcher" name="toolbar_searcher" placeholder="Поиск">
                        <select class="toolbar_selector" name="toolbar_selector">
                            <option>Категория</option>
                            <option>Lorem ipsum</option>
                            <option>Lorem ipsum</option>
                        </select>
                        <button class="toolbar_button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <!-- End Mobile -->
                <div class="sherif_home_header-content_info_arrange">
                    <div class="sherif_home_header-content_info">
                        <div class="sherif_home_header-content_info-phones">
                            <a href="#"><img src="{{asset('/assets/img/icons/Kievstar.png')}}" alt=""><span>+38 (067) 123 45 67</span></a>
                            <a href="#"><img src="{{asset('/assets/img/icons/Vodafone.png')}}" alt=""><span>+38 (067) 123 45 67</span></a>
                            <a href="#"><img src="{{asset('/assets/img/icons/LifeCell.png')}}" alt=""><span>+38 (067) 123 45 67</span></a>
                            <a href="#"><img src="{{asset('/assets/img/icons/HomePhone.png')}}" alt=""><span>+38 (056) 231 86 00</span></a>
                        </div>
                        <div class="sherif_home_header-content_info-location">
                            <p><i class="fas fa-map-marker-alt"></i> Днепр, ул. Артема (Сечевых Стрельцов), 9</p>
                        </div>
                    </div>
                </div>
                <div class="sherif_home_header-content-buttons_arrange">
                    <div class="sherif_home_header-content-buttons">
                        <a href="#Basket2" data-target="#Basket2" class="btn-sherif cl-us" data-toggle="modal"><span></span><i class="fas fa-phone-volume"></i><strong>Заказать Звонок</strong></a>
                        <a href="#" class="btn-sherif wr-us"><span></span><i class="fas fa-envelope"></i><strong>Написать нам</strong></a>
                    </div>
                </div>
                <div class="sherif_home_header-content-work_time_arrange">
                    <div class="sherif_home_header-content-work_time">
                        <h4>График работы:</h4>
                        <h4>пн-пт: 9.00-19.00</h4>
                        <h4>сб: 10.00-18.00</h4>
                        <h4>вс: выходной</h4>
                    </div>
                </div>

                <div class="sherif_home_header-content_buyer_arrange" style="position: relative">
                    <div class="sherif_home_header-content_buyer">
                        <div class="sherif_home_header-content_buyer-basket">
                            <div class="sherif_home_header-content_buyer-basket_icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="sherif_home_header-content_buyer-basket_info">
                                <h4 class="price"><span id="final_basket">{{$data['curr_price']}}</span> <span class="currency"> грн</span></h4>
                                <a href="#Basket" data-target="#Basket"  class="sherif_issue_purchase" data-toggle="modal">ОФОРМИТЬ</a>
                            </div>
                            <div id="basket_id" style="display: none; position: absolute; width: 300px; border: 1px solid #000;
                            padding: 0 1rem; background: white; margin-top: 70px; word-wrap: break-word;">
                                @if(count(Gloudemans\Shoppingcart\Facades\Cart::content()) == 0)
                                    Корзина Пуста
                                @else
                                    @foreach(Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                                        {{$product->name}}<br>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="sherif_home_header-content_buyer-compare">
                            <div class="sherif_home_header-content_buyer-compare_icon">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <div class="sherif_home_header-content_buyer-compare_info">
                                <a href="#" class="sherif_go_to_comarison">Перейти к<br>сравнению</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Small Mobile -->
    <div class="sherif_home_header-content-mobile smaller">
        <form class="sherif_home_header-toolbar_searcher_block" action="" method="">
            <input type="name" class="toolbar_searcher" name="toolbar_searcher" placeholder="Поиск">
            <select class="toolbar_selector" name="toolbar_selector">
                <option>Категория</option>
                <option>Lorem ipsum</option>
                <option>Lorem ipsum</option>
            </select>
            <button class="toolbar_button"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <!-- End Small Mobile -->
    <div class="sherif_home_header-toolbar">
        <div class="sherif_row">

            <div class="sherif_home_header-toolbar_arrange">
                <div class="sherif_home_header-toolbar_searcher_block_arrange">
                    <div class="form-group">
                        <form class="sherif_home_header-toolbar_searcher_block" action="{{route('search')}}" method="GET">
                            <input type="text" id="product_name" class="toolbar_searcher" name="q" value="{{ old('q') }}" placeholder="Поиск">
                            <!--<select class="toolbar_selector" name="toolbar_selector">
                                <option>Категория</option>
                                <option>Lorem ipsum</option>
                                <option>Lorem ipsum</option>
                            </select>-->
                            <button type="submit" class="toolbar_button"><i class="fas fa-search"></i></button>
                        </form>
                        <div id="productList">
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
                <div class="sherif_home_header-toolbar_navigation_arrange">

                    <!-- Smallest -->
                    <div class="sherif_home_header-toolbar_navigation-mobile smaller">
                        <a class="sherif_home_header-toolbar_navigation-mobile_catalog-btn smaller catalog-toggle" toggle="off">Каталог <i class="fas fa-caret-down"></i></a>
                        <a href="#">Мой аккаунт</a>
                    </div>
                    <!-- End Smallest -->
                    <!-- Mobile -->
                    <div class="sherif_home_header-toolbar_navigation-mobile">
                        <a class="sherif_left_column sherif_home_header-toolbar_navigation-mobile_catalog-btn catalog-toggle" toggle="off">Каталог <i class="fas fa-caret-down"></i></a>
                        <a href="#">Мой аккаунт</a>
                        <a href="#">Мой список желаний</a>
                        <a href="#">Программа лояльности</a>
                        <a href="#">Вход</a>
                    </div>
                    <!-- End Mobile -->
                    <div class="sherif_home_header-toolbar_navigation">
                        <a href="#">Мой аккаунт</a>
                        <a href="#">Мой список желаний</a>
                        <a href="#">Программа лояльности</a>
                        <a href="{{url('/login')}}">Вход</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('basket')
        {!!$basket!!}
    @show
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

    $(document).ready(function(){
        $('#product_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#productList').fadeIn();
                        $('#productList').html(data);
                    }
                });
            }
        });

        /*$('.sherif_home_header-content_buyer-basket_icon').mouseenter(function(){
            $(this).append($('#basket_id'));
            $('#basket_id').show(400);
        });
        $('.nav li').mouseleave(function(){

            $('.sherif_home_header-content_buyer-basket_icon').css('display','none');
        });*/


        /*$("a.btn-in-basket").on('click', function(e) {
            e.preventDefault();

            var product_id = $(this).attr('id_product');

            jQuery.ajax({
                url: "search123",
                method: 'get',
                data: {
                    id: product_id
                },
            });
        });*/

        /*$(".sherif_home_header-content_buyer-basket_icon").hover(function(){
            $("#lk_form").slideToggle("300");
        });*/
        /*$('.sherif_home_header-content_buyer-basket_icon').hover(
                function(){
                    $('.sherif_home_header-content-work_time').css('display','block');
                },
                function(){
                    $('.sherif_home_header-content-work_time').css('background-color','n');
                }
        );*/


        $(document).on('click', 'li', function(){
            $('#product_name').val($(this).text());
            $('#productList').fadeOut();
        });

        $('.sherif_home_header-content_buyer-basket_icon').on('mouseenter', function(){
            $(this).siblings('#basket_id').fadeIn();
        });
        $('.sherif_home_header-content_buyer-basket_icon').on('mouseleave', function(){
            $('#basket_id').fadeOut();
        });

        $(document).mouseup(function (e){ // событие клика по веб-документу
            var div = $("#productList"); // тут указываем ID элемента
            if (!div.is(e.target) // если клик был не по нашему блоку
                    && div.has(e.target).length === 0) { // и не по его дочерним элементам
                div.hide(); // скрываем его
            }
        });
    });
</script>