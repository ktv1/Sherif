@extends("layouts.app")
@section("css_files")
    loadCSS("assets/_header.css");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("assets/css/_header_admin.css");              //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("assets/_main.css");                //User Styles: Main
    loadCSS("assets/css/section/_main.css");                //User Styles: Main
    @if($is_admin)
        loadCSS("assets/css/_main_admin.css");                //User Styles: Main
    @endif
    loadCSS("assets/css/section/_media.css");               //User Styles: Media
    @if($is_admin)
        loadCSS("assets/css/_media_admin.css");               //User Styles: Media
    @endif

    loadCSS("/assets/libs/toastr/toastr.min.css");
    loadCSS("/assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css");
    loadCSS("/assets/libs/bootstrap-file-input/css/fileinput.min.css");
    loadCSS("assets/account.css");
@endsection

@section('header')
    {!!$header!!}
@endsection

@section('left_sidebar')
    {!!$left_side_bar!!}
@endsection

@section("main_column")
    <!-- Main Sherif-Home-->

    <div class="sherif_center_column">
        <!-- include home_messages -->
        {{--@include("layouts.partials.home_messages")--}}

        <!--SHERIF CABINET-->
        <input id="user_id" type="hidden" value="{{$user->id}}">

        <ul class="sherif-breadcrumb">
            <li><a href="index.html">Главная</a></li>
            <li><span style="margin-right: 5px">Вы здесь <i class="fas fa-arrow-right"></i></span>Кабинет покупателя</li>
        </ul>

        <div class="sherif_main-box_cabinet">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="video-blog_reviews_tabs_itm active"><a href="#tab-1" class="video-blog_reviews_tabs_link" data-toggle="tab">Профиль</a></li>
                    <li class="video-blog_reviews_tabs_itm"><a href="#tab-2" class="video-blog_reviews_tabs_link" data-toggle="tab">Заказы</a></li>
                    <li class="video-blog_reviews_tabs_itm"><a href="#tab-3" class="video-blog_reviews_tabs_link" data-toggle="tab">Бонусы</a></li>
                    <li class="video-blog_reviews_tabs_itm"><a href="#tab-4" class="video-blog_reviews_tabs_link" data-toggle="tab">Желания</a></li>
                    <li class="video-blog_reviews_tabs_itm"><a href="#tab-5" class="video-blog_reviews_tabs_link" data-toggle="tab">Переписка</a></li>
                    <li class="video-blog_reviews_tabs_itm"><a href="#tab-6" class="video-blog_reviews_tabs_link" data-toggle="tab">Подписки</a></li>
                    <li class="video-blog_reviews_tabs_itm"><a href="#tab-7" class="video-blog_reviews_tabs_link" data-toggle="tab">Отзывы</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active fade in" id="tab-1">
                        <div class="sherif_main-box_cabinet_profile">
                            <div class="cabinet_profile_user">
                                <img id="span_img"
                                     class="cabinet_profile_user_img"
                                     src="{{!empty($user->avatar) ?
                                            asset('/storage/cache/175x175_' . $user->avatar) :
                                            asset('/assets/img/pic/cabinet/user.png')
                                          }}"
                                     alt="{{$user->name}} {{$user->lastname}}"
                                >
                                <span id="span_name" class="cabinet_profile_user_data">{{$user->name}} {{$user->lastname}}</span>

                                <div class="cabinet_profile_info_data">
                                    <span class="col-sm-6 text-right">Телефон:</span>
                                    <span class="text-primary">{{$user->phone}}</span>
                                </div>
                                <div class="cabinet_profile_info_data">
                                    <span class="col-sm-6 text-right">E-Mail:</span>
                                    <span class="text-primary">{{$user->email}}</span>
                                </div>
                                {{--<span id="span_phone"  class="cabinet_profile_user_data">Тел: {{$user->phone}}</span>--}}
                                {{--<span class="cabinet_profile_user_data">email: {{$user->email}}</span>--}}
                            </div>
                            <div class="cabinet_profile_info">
                                {{--Social networks--}}
                                <h4>
                                    <i class="fas fa-users fa-w-20 fa-2x"></i>
                                    <span>Подтвердить аккаунт через соцсети</span>
                                </h4>
                                <div class="social-cabinet flex-row">
                                    <a href="#"><img src="{{asset('/assets/img/footer/icons/fb.png')}}" alt=""></a>
                                    <a href="#"><img src="{{asset('/assets/img/footer/icons/you-tube.png')}}" alt=""></a>
                                    <a href="#"><img src="{{asset('/assets/img/footer/icons/inst.png')}}" alt=""></a>
                                </div>

                                <div class="cabinet_profile_info_data">
                                    {{--User Profile--}}
                                    <h4>
                                        <i class="fas fa-user-circle fa-w-20 fa-2x"></i>
                                        <span>Персональная информация</span>
                                    </h4>

                                    <div class="row">
                                        <div class="col-sm-3 text-right">Пол:</div>
                                        <div class="col-sm-4 text-primary">
                                            {{!isset($user->userpersonal->sex) ? 'Не указан' : $user->userpersonal->sex == 'M' ? 'Мужчина' : 'Женщина'}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Дата рождения:</div>
                                        <div class="col-sm-4 text-primary">
                                            {{!empty($user->userpersonal->datebirth) ? $user->userpersonal->datebirth : 'Не указано'}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Область:</div>
                                        <div class="col-sm-4 text-primary">
                                            {{!empty($user->userpersonal->obl) ? $user->userpersonal->obl : 'Не указано'}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Город:</div>
                                        <div class="col-sm-4 text-primary">
                                            {{!empty($user->userpersonal->city) ? $user->userpersonal->city : 'Не указано'}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Улица:</div>
                                        <div class="col-sm-4 text-primary">
                                            {{!empty($user->userpersonal->street) ? $user->userpersonal->street : 'Не указано'}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Дом:</div>
                                        <div class="col-sm-4 text-primary">
                                            {{!empty($user->userpersonal->house) ? $user->userpersonal->house : 'Не указано'}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Квартира:</div>
                                        <div class="col-sm-4 text-primary">
                                            {{!empty($user->userpersonal->apartment) ? $user->userpersonal->apartment  : 'Не указано'}}
                                        </div>
                                    </div>

                                    <div class="cabinet_profile_btn">
                                        <button data-toggle="modal" data-target="#user-modal" class="btn btn-success">
                                            <i class="fas fa-pencil-alt"></i> Редактировать
                                        </button>
                                    </div>

                                    {{--Change password--}}
                                    <h4>
                                        <i class="fas fa-unlock-alt fa-w-20 fa-2x"></i>
                                        <span>Изменить пароль</span>
                                    </h4>
                                    <div class="cabinet_profile_info_data">
                                        <form id="changepassword" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="old_password" class="control-label col-sm-4 text-right">Текущий пароль</label>
                                                <input class="col-sm-4" name="old_password" type="password" id="old_password">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password" class="control-label col-sm-4 text-right">Новый пароль</label>
                                                <input class="col-sm-4" name="new_password" type="password" id="new_password">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password_2" class="control-label col-sm-4 text-right">Повторить новый пароль</label>
                                                <input class="col-sm-4" name="new_password_2" type="password" id="new_password_2">
                                            </div>
                                            {{--<input name="new_password" type="password" placeholder="Новый пароль">--}}
                                            {{--<input name="new_password_2" type="password" placeholder="Подтвердить новый пароль">--}}
                                            <div class="cabinet_profile_btn">
                                                <button type="submit" class="btn btn-success" id="savepasswordbtn">
                                                    <i class="fas fa-save"></i> Сохранить
                                                </button>
                                                <button type="reset" class="btn btn-danger">
                                                    <i class="fas fa-times-circle"></i> Очистить
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="tab-2">
                        <div class="panel-group" id="accordeon">
                            <div class="panel">
                                <div class="panel-heading cabinet_orders">
                                    <div class="panel-title cabinet_orders_title">
                                        <h4 class="cabinet_orders_par">Заказ № <span class="cabinet_orders_title_number">123123212 </span><span class="cabinet_orders_date">28.03.2018</span></h4>
                                    </div>
                                    <div class="cabinet_orders_content">
                                        <div class="cabinet_orders_content_data">
                                            <img class="cabinet_orders_content_data_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                            <div class="cabinet_orders_content_data_itm">
                                                <div class="cabinet_orders_content_data_itm_description">
                                                    <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                                                    <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                                                    <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                                                </div>
                                                <div class="cabinet_orders_content_data_itm_rate">
                                                    <div class="rating">
                                                        <span>Рейтинг:</span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                    </div>
                                                    <p class="itm_rate_par">Артикул: <span>10585</span></p>
                                                    <p>Код товара: <span>310-311-5678</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cabinet_orders_content_status">
                                            <span class="cabinet_orders_par">Доставлен</span>
                                            <span class="cabinet_orders_date">28.03.2018</span>
                                        </div>
                                        <div class="cabinet_orders_content_review">
                                            <span class="cabinet_orders_par">Оставить отзыв</span>
                                            <a class="cabinet_orders_link" href="#">Про компанию</a>
                                            <a class="cabinet_orders_link" href="#">Про товар</a>
                                            <a class="cabinet_orders_link" href="#">Написать</a>
                                        </div>
                                        <div class="cabinet_orders_content_open">
                                            <a href="#collapse-1" data-toggle="collapse" data-parent="#accordeon"><span class="glyphicon glyphicon-menu-down"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-collapse collapse in" id="collapse-1">
                                    <div class="panel-body">

                                        <div class="cabinet_orders_body">
                                            <div class="cabinet_orders_content_data cabinet_orders_content_data_complex_itm">
                                                <img class="cabinet_orders_content_data_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <div class="cabinet_orders_content_data_itm">
                                                    <div class="cabinet_orders_content_data_itm_description">
                                                        <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                                                        <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                                                        <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                                                    </div>
                                                    <div class="cabinet_orders_content_data_itm_rate">
                                                        <div class="rating">
                                                            <span>Рейтинг:</span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                        <p class="itm_rate_par">Артикул: <span>10585</span></p>
                                                        <p>Код товара: <span>310-311-5678</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cabinet_orders_status">
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-shopping-cart"></i></span>
                                                <span class="cabinet_orders_par">Заказ</span>
                                                <span class="cabinet_orders_date">28.03.2018</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-check"></i></span>
                                                <span class="cabinet_orders_par">Статус</span>
                                                <span class="cabinet_orders_date">1</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-check"></i></span>
                                                <span class="cabinet_orders_par">Cтатус</span>
                                                <span class="cabinet_orders_date">2</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-bus"></i></span>
                                                <span class="cabinet_orders_par">Статус</span>
                                                <span class="cabinet_orders_date">ТТН 59 0000 1010 0954207</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-shopping-bag"></i></span>
                                                <span class="cabinet_orders_par">Получено</span>
                                                <span class="cabinet_orders_date">28.03.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading cabinet_orders">
                                    <div class="panel-title cabinet_orders_title">
                                        <h4 class="cabinet_orders_par">Заказ № <span class="cabinet_orders_title_number">123123212 </span><span class="cabinet_orders_date">28.03.2018</span></h4>
                                    </div>
                                    <div class="cabinet_orders_content">
                                        <div class="cabinet_orders_content_data_complex">
                                            <div class="cabinet_orders_content_data_complex_img">
                                                <img class="cabinet_orders_content_data_img_complex" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <img class="cabinet_orders_content_data_img_complex" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <img class="cabinet_orders_content_data_img_complex" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <img class="cabinet_orders_content_data_img_complex" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                            </div>
                                            <div class="cabinet_orders_content_data_itm_complex">
                                                <span class="cabinet_orders_content_data_itm_description_complex">Комплексный заказ</span><br />
                                                <span class="sherif-product_content_current-price">Сумма: <span class="price">870.00 грн</span></span><br />
                                            </div>
                                        </div>
                                        <div class="cabinet_orders_content_status">
                                            <span class="cabinet_orders_par">Отпрален</span>
                                            <span class="cabinet_orders_date">28.03.2018</span>
                                        </div>
                                        <div class="cabinet_orders_content_review">
                                            <span class="cabinet_orders_par">Оставить отзыв</span>
                                            <a class="cabinet_orders_link" href="#">Про компанию</a>
                                            <a class="cabinet_orders_link" href="#">Про товар</a>
                                            <a class="cabinet_orders_link" href="#">Написать</a>
                                        </div>
                                        <div class="cabinet_orders_content_open">
                                            <a href="#collapse-2" data-toggle="collapse" data-parent="#accordeon"><span class="glyphicon glyphicon-menu-down"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-collapse collapse" id="collapse-2">
                                    <div class="panel-body">

                                        <div class="cabinet_orders_body">
                                            <div class="cabinet_orders_content_data cabinet_orders_content_data_complex_itm">
                                                <img class="cabinet_orders_content_data_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <div class="cabinet_orders_content_data_itm">
                                                    <div class="cabinet_orders_content_data_itm_description">
                                                        <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                                                        <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                                                        <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                                                    </div>
                                                    <div class="cabinet_orders_content_data_itm_rate">
                                                        <div class="rating">
                                                            <span>Рейтинг:</span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                        <p class="itm_rate_par">Артикул: <span>10585</span></p>
                                                        <p>Код товара: <span>310-311-5678</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cabinet_orders_content_data cabinet_orders_content_data_complex_itm">
                                                <img class="cabinet_orders_content_data_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <div class="cabinet_orders_content_data_itm">
                                                    <div class="cabinet_orders_content_data_itm_description">
                                                        <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                                                        <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                                                        <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                                                    </div>
                                                    <div class="cabinet_orders_content_data_itm_rate">
                                                        <div class="rating">
                                                            <span>Рейтинг:</span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                        <p class="itm_rate_par">Артикул: <span>10585</span></p>
                                                        <p>Код товара: <span>310-311-5678</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cabinet_orders_content_data cabinet_orders_content_data_complex_itm">
                                                <img class="cabinet_orders_content_data_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <div class="cabinet_orders_content_data_itm">
                                                    <div class="cabinet_orders_content_data_itm_description">
                                                        <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                                                        <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                                                        <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                                                    </div>
                                                    <div class="cabinet_orders_content_data_itm_rate">
                                                        <div class="rating">
                                                            <span>Рейтинг:</span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                        <p class="itm_rate_par">Артикул: <span>10585</span></p>
                                                        <p>Код товара: <span>310-311-5678</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cabinet_orders_status">
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-shopping-cart"></i></span>
                                                <span class="cabinet_orders_par">Заказ</span>
                                                <span class="cabinet_orders_date">28.03.2018</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-check"></i></span>
                                                <span class="cabinet_orders_par">Статус</span>
                                                <span class="cabinet_orders_date">1</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-check"></i></span>
                                                <span class="cabinet_orders_par">Cтатус</span>
                                                <span class="cabinet_orders_date">2</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-bus"></i></span>
                                                <span class="cabinet_orders_par">Статус</span>
                                                <span class="cabinet_orders_date">ТТН 59 0000 1010 0954207</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-shopping-bag"></i></span>
                                                <span class="cabinet_orders_par">Получено</span>
                                                <span class="cabinet_orders_date">28.03.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading cabinet_orders">
                                    <div class="panel-title cabinet_orders_title">
                                        <h4 class="cabinet_orders_par">Заказ № <span class="cabinet_orders_title_number">123123212 </span><span class="cabinet_orders_date">28.03.2018</span></h4>
                                    </div>
                                    <div class="cabinet_orders_content">
                                        <div class="cabinet_orders_content_data_complex">
                                            <div class="cabinet_orders_content_data_complex_img">
                                                <img class="cabinet_orders_content_data_img_complex" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <img class="cabinet_orders_content_data_img_complex" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <img class="cabinet_orders_content_data_img_complex" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <img class="cabinet_orders_content_data_img_complex" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                            </div>
                                            <div class="cabinet_orders_content_data_itm_complex">
                                                <span class="cabinet_orders_content_data_itm_description_complex">Комплексный заказ</span><br />
                                                <span class="sherif-product_content_current-price">Сумма: <span class="price">870.00 грн</span></span><br />
                                            </div>
                                        </div>
                                        <div class="cabinet_orders_content_status">
                                            <span class="cabinet_orders_par">Получен</span>
                                            <span class="cabinet_orders_date">28.03.2018</span>
                                        </div>
                                        <div class="cabinet_orders_content_review">
                                            <span class="cabinet_orders_par">Оставить отзыв</span>
                                            <a class="cabinet_orders_link" href="#">Про компанию</a>
                                            <a class="cabinet_orders_link" href="#">Про товар</a>
                                            <a class="cabinet_orders_link" href="#">Написать</a>
                                        </div>
                                        <div class="cabinet_orders_content_open">
                                            <a href="#collapse-3" data-toggle="collapse" data-parent="#accordeon"><span class="glyphicon glyphicon-menu-down"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-collapse collapse" id="collapse-3">
                                    <div class="panel-body">
                                        <div class="cabinet_orders_body">
                                            <div class="cabinet_orders_content_data cabinet_orders_content_data_complex_itm">
                                                <img class="cabinet_orders_content_data_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <div class="cabinet_orders_content_data_itm">
                                                    <div class="cabinet_orders_content_data_itm_description">
                                                        <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                                                        <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                                                        <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                                                    </div>
                                                    <div class="cabinet_orders_content_data_itm_rate">
                                                        <div class="rating">
                                                            <span>Рейтинг:</span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                        <p class="itm_rate_par">Артикул: <span>10585</span></p>
                                                        <p>Код товара: <span>310-311-5678</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cabinet_orders_content_data cabinet_orders_content_data_complex_itm">
                                                <img class="cabinet_orders_content_data_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <div class="cabinet_orders_content_data_itm">
                                                    <div class="cabinet_orders_content_data_itm_description">
                                                        <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                                                        <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                                                        <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                                                    </div>
                                                    <div class="cabinet_orders_content_data_itm_rate">
                                                        <div class="rating">
                                                            <span>Рейтинг:</span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                        <p class="itm_rate_par">Артикул: <span>10585</span></p>
                                                        <p>Код товара: <span>310-311-5678</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cabinet_orders_content_data cabinet_orders_content_data_complex_itm">
                                                <img class="cabinet_orders_content_data_img" src="{{asset('/assets/img/recommended/icon1.png')}}" alt="">
                                                <div class="cabinet_orders_content_data_itm">
                                                    <div class="cabinet_orders_content_data_itm_description">
                                                        <a href="#" class="sherif-product_content_link">Сумка-рюкзак Arm-tec тк. Cordura Digital ВСУ, 70л</a><br />
                                                        <span class="sherif-product_content_vendor-code">Артикул: 30700А</span><br />
                                                        <span class="sherif-product_content_current-price">Цена: <span class="price">870.00 грн</span></span><br />
                                                    </div>
                                                    <div class="cabinet_orders_content_data_itm_rate">
                                                        <div class="rating">
                                                            <span>Рейтинг:</span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                            <span class="far fa-star"></span>
                                                        </div>
                                                        <p class="itm_rate_par">Артикул: <span>10585</span></p>
                                                        <p>Код товара: <span>310-311-5678</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cabinet_orders_status">
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-shopping-cart"></i></span>
                                                <span class="cabinet_orders_par">Заказ</span>
                                                <span class="cabinet_orders_date">28.03.2018</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-check"></i></span>
                                                <span class="cabinet_orders_par">Статус</span>
                                                <span class="cabinet_orders_date">1</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-check"></i></span>
                                                <span class="cabinet_orders_par">Cтатус</span>
                                                <span class="cabinet_orders_date">2</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-bus"></i></span>
                                                <span class="cabinet_orders_par">Статус</span>
                                                <span class="cabinet_orders_date">ТТН 59 0000 1010 0954207</span>
                                            </div>
                                            <div class="cabinet_orders_status_itm">
                                                <span class="cabinet_orders_status_itm_fa"><i class="fas fa-shopping-bag"></i></span>
                                                <span class="cabinet_orders_par">Получено</span>
                                                <span class="cabinet_orders_date">28.03.2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="tab-3">
                        CONTENT
                    </div>
                    <div class="tab-pane fade in" id="tab-4">
                        CONTENT
                    </div>
                    <div class="tab-pane fade in" id="tab-5">
                        CONTENT
                    </div>
                    <div class="tab-pane fade in" id="tab-6">
                        CONTENT
                    </div>
                    <div class="tab-pane fade in" id="tab-7">
                        @include('frontend.account.partials.reviews')
                    </div>
                </div>
            </div>
        </div>
        <!--SHERIF CABINET END-->
        @component('frontend.account.modal-account-edit')

        @slot('name', 'user-modal')
            @slot('title', 'Редактирование персональных данных')
                <div class="form-group col-sm-12">
                    <label for="inputImg">Аватар</label>
                    @if(!empty($user) && !empty($user->avatar))
                        <br />
                        <img src="" alt="">
                    @endif
                    <input type="file" id="inputImg" name="avatar" class="" >
                </div>
            <div class="form-group col-sm-4">
                <label for="user-name">Имя</label>
                <input id="user-name" class="form-control" name="name" type="text" value="{{$user->name or old('name')}}">
            </div>

            <div class="form-group col-sm-4">
                <label for="user-lastname">Фамилия</label>
                <input id="user-lastname" class="form-control" name="lastname" type="text" value="{{$user->lastname or old('lastname')}}">
            </div>
            <div class="form-group col-sm-4">
                <label for="user-phone">Телефон</label>
                <input id="user-phone" class="form-control" name="phone" type="text" value="{{$user->phone or old('phone')}}">
            </div>
                <div class="form-group col-sm-6">
                    <label for="user-name">Пол</label><br/>
                    <select id="user-sex" name="sex" data-sex="" class="form-control">
                        @if (isset($user->userpersonal->sex))
                            @foreach ($sexvalues as $value)
                                <option value="{{ $value }}"
                                        @if ($value == old('sex', $user->userpersonal->sex))
                                        selected="selected"
                                        @endif
                                >{{ $value }}</option>
                            @endforeach
                        @else
                            @foreach ($sexvalues as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="user-datebirth">Дата рождения</label>
                    <div class="input-group date" id="input-datebirth">
                        <input id="user-datebirth" class="form-control" data-format="dd/MM/yyyy" name="datebirth" type="text" value="{{$user->userpersonal->datebirth or old('datebirth')}}">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <label for="user-obl">Область</label>
                    <input id="user-obl" class="form-control" name="obl" type="text" value="{{$user->userpersonal->obl or old('obl')}}">
                </div>

                <div class="form-group col-sm-12">
                    <label for="user-city">Город</label>
                    <input id="user-city" class="form-control" name="city" type="text" value="{{$user->userpersonal->city or old('city')}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="user-street">Улица/бульвар/проулок</label>
                    <input id="user-street" class="form-control" name="street" type="text" value="{{$user->userpersonal->street or old('street')}}">
                </div>
                <div class="form-group col-sm-3">
                    <label for="user-apartment">Дом</label>
                    <input id="user-house" class="form-control" name="house" type="text" value="{{$user->userpersonal->house or old('house')}}">
                </div>
                <div class="form-group col-sm-3">
                    <label for="user-apartment">Квартира</label>
                    <input id="user-apartment" class="form-control" name="apartment" type="text" value="{{$user->userpersonal->apartment or old('apartment')}}">
                </div>

                @slot('buttons')
                    <button type="submit" class="btn btn-success" id="save">Сохранить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                @endslot

        @endcomponent
    </div>

@endsection

@section('compiled_js')
    {"src" : "/assets/libs/moment/moment-with-locales.min.js", "async" : false},
    {"src" : "/assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js", "async" : false},
    {"src" : "/assets/libs/bootstrap-file-input/js/fileinput.min.js", "async" : false},
    {"src" : "/assets/libs/toastr/toastr.min.js", "async" : false},
    {"src" : "/assets/js/account.js", "async" : false},
@endsection

