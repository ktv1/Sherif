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
                <a href="#"><img src="<?php echo e(asset('/assets/img/icons/Kievstar.png')); ?>" alt="">  <span>+38 (097) 123 45 67</span></a>
                <a href="#"><i class="fas fa-phone-volume"></i>  <span>Заказать звонок</span></a>
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
                <?php if(isset($is_admin)): ?>
                    <div class="sherif_home_header-navigation-menu sherif_home_header-navigation_service">
                        <span>$ <?php echo e(substr($uah_to_usd,0,5)); ?></span>
                        <span>€ <?php echo e(substr($uah_to_eur,0,5)); ?></span>
                        <span class="toggle-bg">
									<input type="radio" name="toggle" value="off">
									<input type="radio" name="toggle" value="on">
									<span class="switch"></span>
								</span>
                        <span class="toggle-label">управление</span>
                    </div>
                <?php endif; ?>
                <div class="sherif_home_header-navigation-menu sherif_home_header-navigation-menu_arrange">
                    <a href="#">Оплата и доставка</a>
                    <a href="<?php echo e(route('contacts')); ?>">Контакты</a>
                    <a href="#">Гарантии</a>
                    <a href="<?php echo e(route('income')); ?>">Новые поступления</a>
                    <a href="#">Отзывы</a>
                    <a href="<?php echo e(route('blog')); ?>">Статьи</a>
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
                    <a href="<?php echo e(url('/')); ?>" class="sherif_home_header-logo">
                        <img src="<?php echo e(asset('/assets/img/Sherif_logo.png')); ?>" alt="" class="sherif_home_header-logo_img">
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
                            <a href="#"><img src="<?php echo e(asset('/assets/img/icons/Kievstar.png')); ?>" alt=""><span>+38 (067) 123 45 67</span></a>
                            <a href="#"><img src="<?php echo e(asset('/assets/img/icons/Vodafone.png')); ?>" alt=""><span>+38 (067) 123 45 67</span></a>
                            <a href="#"><img src="<?php echo e(asset('/assets/img/icons/LifeCell.png')); ?>" alt=""><span>+38 (067) 123 45 67</span></a>
                            <a href="#"><img src="<?php echo e(asset('/assets/img/icons/HomePhone.png')); ?>" alt=""><span>+38 (056) 231 86 00</span></a>
                        </div>
                        <div class="sherif_home_header-content_info-location">
                            <p><i class="fas fa-map-marker-alt"></i> Днепр, ул. Артема (Сечевых Стрельцов), 9</p>
                        </div>
                    </div>
                </div>
                <div class="sherif_home_header-content-buttons_arrange">
                    <div class="sherif_home_header-content-buttons">
                        <a href="#" class="btn-sherif cl-us"><span></span><i class="fas fa-phone-volume"></i><strong>Заказать Звонок</strong></a>
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

                <div class="sherif_home_header-content_buyer_arrange">
                    <div class="sherif_home_header-content_buyer">
                        <div class="sherif_home_header-content_buyer-basket">
                            <div class="sherif_home_header-content_buyer-basket_icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="sherif_home_header-content_buyer-basket_info">
                                <h4 class="price"><span id="final_basket"><?php echo e($data['curr_price']); ?></span> <span class="currency"> грн</span></h4>
                                <a href="#Basket"  class="sherif_issue_purchase" data-toggle="modal">ОФОРМИТЬ</a>
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
                <div class="sherif_home_header-toolbar_navigation_arrange">

                    <!-- Smallest -->
                    <div class="sherif_home_header-toolbar_navigation-mobile smaller">
                        <a class="sherif_home_header-toolbar_navigation-mobile_catalog-btn smaller catalog-toggle" toggle="off">Каталог <i class="fas fa-caret-down"></i></a>
                        <a href="/account">Мой аккаунт</a>
                    </div>
                    <!-- End Smallest -->
                    <!-- Mobile -->
                    <div class="sherif_home_header-toolbar_navigation-mobile">
                        <a class="sherif_left_column sherif_home_header-toolbar_navigation-mobile_catalog-btn catalog-toggle" toggle="off">Каталог <i class="fas fa-caret-down"></i></a>
                        <a href="/account">Мой аккаунт</a>
                        <a href="#">Мой список желаний</a>
                        <a href="#">Программа лояльности</a>
                        <a href="#">Вход</a>
                    </div>
                    <!-- End Mobile -->
                    <div class="sherif_home_header-toolbar_navigation">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="/account">Мой аккаунт</a>
                            <a href="#">Мой список желаний</a>
                        <?php endif; ?>
                        <a href="#">Программа лояльности</a>

                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(url('/login')); ?>">Вход</a>
                        <?php endif; ?>

                        <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(url('/logout')); ?>">Выход</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startSection('basket'); ?>
        <?php echo $basket; ?>

    <?php echo $__env->yieldSection(); ?>
</header>