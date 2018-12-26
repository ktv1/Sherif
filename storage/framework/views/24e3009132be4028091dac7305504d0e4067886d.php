<?php $__env->startSection('meta-tegs'); ?>
    <link rel="canonical" href="<?php echo e(url('/')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection("css_files"); ?>
    loadCSS("<?php echo e(asset('assets/_header.css')); ?>");//Header Styles (compress & paste to header after release)
    <?php if($is_admin): ?>
        loadCSS("<?php echo e(asset('assets/css/_header_admin.css')); ?>");       //Header Styles (compress & paste to header after release)
    <?php endif; ?>
        loadCSS("<?php echo e(asset('assets/css/product/_main.css')); ?>");                
    //User Styles: Main
    <?php if($is_admin): ?>
        loadCSS("<?php echo e(asset('assets/css/_main_admin.css')); ?>");  
    //User Styles: Main
    <?php endif; ?>
        loadCSS("<?php echo e(asset('assets/css/product/_media.css')); ?>");  
    //User Styles: Media
    <?php if($is_admin): ?>
        loadCSS("<?php echo e(asset('assets/css/_media_admin.css')); ?>");  
    //User Styles: Media
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $header; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('left_sidebar'); ?>
    <?php echo $left_side_bar; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("main_column"); ?>
    <div class="sherif_center_column">
        
        
        <!-- Product page -->
        <div class="sherif_home_main-product">
                <div class="sherif_home_main-product-navigation">
                <a class="goods_main" href="">Главная</a>
                <p><span>/</span></p>
                <a class="goods_main" href="">Одежда туристическая</a>
                <p><span>/</span>  Вы здесь <i class="fas fa-arrow-right"></i></p>
                <a href="">Куртка зимняя охотника Twill</a>
            </div>
            <div class="sherif_home_main-product-title">
                <h3><?php echo e($product->name); ?></h3>
            </div>
            <div class="sherif_home_main-product-rating">
                <div class="sherif_home_main-product-rating-rating_star">
                    <p>Рейтинг: 
                        <span>
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star-half-alt"></i>  
                            <i class="far fa-star"></i> 
                        </span>
                    </p>
                </div>
                <div class="sherif_home_main-product-rating-vendor_code">
                    <p>Артикул:<?php echo e($product->vendor_code); ?></p>
                </div>
                <div class="sherif_home_main-product-rating-product_code">
                    <p>Код товара:<?php echo e($product->code); ?></p>
                </div>
            </div>

            <?php  $img_cropped = explode('.', $product->mainimage)?>

            <div class="sherif_home_main-product-good_block">
                <div class="sherif_home_main-product-good_block-view">
                    <img src="<?php echo e(asset('storage/'. $img_cropped[0] . '-medium.' . $img_cropped[1])); ?>" alt="">
                </div>
                <div class="sherif_home_main-product-good_block-info">
                    <div class="sherif_home_main-product-good_block-info-description">
                        <div class="sherif_home_main-product-good_block-info-description-size_block">
                            <div class="sherif_home_main-product-good_block-info-description-size_block-size">
                                <p>Размер:</p>
                            </div>
                            <div class="sherif_home_main-product-good_block-info-description-size_block-pagination">
                                <nav class="">
                                    <ul class="product_page_info">
                                        <li class="disabled"><a href="#">XS</a></li>
                                        <li><a href="#">S</a></li>
                                        <li class="disabled"><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li class="active"><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                        <li><a href="#">XXXL</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-avaible">
                            <p><?php echo e($status->name); ?></p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-stock">
                            <div class="sherif_home_main-product-good_block-info-description-stock-block">
                                <div class="sherif_home_main-product-good_block-info-description-stock-block-number_percent">
                                    <p>-20%</p>
                                </div>
                                <div class="sherif_home_main-product-good_block-info-description-stock-block-days_stock">
                                    <p>До конца акции осталось 2дня</p>
                                </div>
                            </div>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-old_price">
                            <p>Цена: 1820.00 грн</p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-new_price">
                            <p>Цена: <b><?php echo e($product->price_final); ?>.00</b> грн</p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-wholesale_price">
                            <p>Оптовая цена: 770.00 грн (от 10шт.)</p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-price_link">
                            <p><i class="fas fa-arrow-down"></i> <a href="#">Нашли дешевле?</a></p>
                            <p><i class="fas fa-chart-area"></i> <a href="#">Следить за ценой</a></p>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-in_basket">
                            <div class="sherif_home_main-product-good_block-info-description-in_basket-button">
                                <a class="btn-sherif product_in_basket" id_product="<?php echo e($product->id); ?>"><span></span><i
                                            class="fas fa-shopping-cart"></i>
                                    <strong>В корзину</strong></a>
                            </div>
                            <div class="sherif_home_main-product-good_block-info-description-in_basket-counter">
                                <input type="text" id="product_amount_<?php echo e($product->id); ?>" class="product_amount_input"
                                       value="1" id_product="<?php echo e($product->id); ?>">
                                <div class="sherif_home_main-product-good_block-info-description-in_basket-counter-button product_amount">
                                    <button class="basket_counter_button product_togglers" togglers="up"
                                            id_product="<?php echo e($product->id); ?>"><i class="fas fa-caret-up"></i></button>
                                    <button class="basket_counter_button product_togglers" togglers="down"
                                            id_product="<?php echo e($product->id); ?>"><i class="fas fa-caret-down"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-buy_by_click">
                            <a class="btn-sherif buy_by_click" href=""><span></span><i
                                        class="far fa-hand-point-up"></i></i>
                                <strong>Купить в один клик</strong></a>
                        </div>
                        <div class="sherif_home_main-product-good_block-info-description-abotu_manufactor">
                            <div class="sherif_home_main-product-good_block-info-description-abotu_manufactor-left">
                                <p>Производитель:</p>
                                <p>Страна произзводства:</p>
                            </div>
                            <div class="sherif_home_main-product-good_block-info-description-abotu_manufactor-right">
                                <p>Украина</p>
                                <p>Украина</p>
                            </div>
                        </div>

                        <div class="sherif_home_main-product-good_block-info-for_present">
                            <a href="" style="background-image: url(<?php echo e(asset('assets/img/pic/pick_up.jpg')); ?>);"
                               class="sherif_home_main-product-good_block-info-description-pick_up_goods-pic">
                                <img src="<?php echo e(asset('assets/img/icons/pick_up-icon.png')); ?>" alt="">
                                <h4>Подобрать товары того же цвета</h4>
                            </a>
                        </div>

                        <div class="sherif_home_main-product-good_block-info-description-pick_up_goods">
                            <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product">
                                <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-pic">
                                    <img src="img/product-page/product-page-description.jpg" alt="">
                                </div>
                                <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-description">
                                    <h3>Очки Revision тактические ACU (Olive)</h3>
                                </div>
                            </div>
                            <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain">
                                <h4>До конца акции осталось</h4>
                                <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-box">
                                    <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-number">
                                        <h2>28</h2>
                                        <h4>дней</h4>
                                    </div>
                                    <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-number">
                                        <h2>05</h2>
                                        <h4>часов</h4>
                                    </div>
                                    <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-number">
                                        <h2>17</h2>
                                        <h4>минут</h4>
                                    </div>
                                    <div class="sherif_home_main-product-good_block-info-description-pick_up_goods-product-time_remain-number">
                                        <h2>45</h2>
                                        <h4>секунд</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sherif_home_main-product-tabs">
                <ul class="nav nav-tabs">
                    <li><a data-toggle="tab" href="#description">Описание</a></li>
                    <li><a data-toggle="tab" href="#specifications">Характеристики</a></li>
                    <li><a data-toggle="tab" href="#video-review">Видеообзор</a></li>
                    <li class="active"><a data-toggle="tab" href="#reviews">Отзывы (<?php echo e(count($reviews)); ?>)</a></li>
                </ul>

                <div class="tab-content sherif_home_main-product-tabs-tab-content">
                    <div id="description" class="tab-pane fade">
                        <p>Description</p>
                    </div>
                    <div id="specifications" class="tab-pane fade">
                        <div class="sherif_home_main-product-tabs-tab-content-block">
                            <div class="sherif_home_main-product-tabs-tab-content-left">
                                <ul class="tab-content-characteristics">
                                    <li>
                                        <span class="text">Максимальная ширина печати</span>
                                    </li>
                                    <li>
                                        <span class="text">Технология печати</span>
                                    </li>
                                    <li>
                                        <span class="text">Разрешение</span>
                                    </li>
                                    <li>
                                        <span class="text">Интерфейсы подключения</span>
                                    </li>
                                    <li>
                                        <span class="text">Тип принтера</span>
                                    </li>
                                    <li>
                                        <span class="text">Вид</span>
                                    </li>
                                    <li>
                                        <span class="text">Тип печати</span>
                                    </li>
                                    <li>
                                        <span class="text">Скорость печати</span>
                                    </li>
                                    <li>
                                        <span class="text">Минимальная ширина этикетки</span>
                                    </li>
                                    <li>
                                        <span class="text">Максимальная ширина этикетки</span>
                                    </li>
                                    <li>
                                        <span class="text">Минимальная длина этикетки</span>
                                    </li>
                                    <li>
                                        <span class="text">Максимальная длина этикетки</span>
                                    </li>
                                    <li>
                                        <span class="text">Диаметр внутренней втулки ролика этикеток</span>
                                    </li>
                                    <li>
                                        <span class="text">Толщина этикетки с подложкой</span>
                                    </li>
                                    <li>
                                        <span class="text">Внешний диаметр ролика этикеток</span>
                                    </li>
                                    <li>
                                        <span class="text">Управление</span>
                                    </li>
                                    <li>
                                        <span class="text">Датчики</span>
                                    </li>
                                    <li>
                                        <span class="text">Рефлективный "черная метка"</span>
                                    </li>
                                    <li>
                                        <span class="text">EPL2, ZPL</span>
                                    </li>
                                    <li>
                                        <span class="text">Печать штрих-кодов</span>
                                    </li>
                                    <li>
                                        <span class="text">Процессор</span>
                                    </li>
                                    <li>
                                        <span class="text">Память</span>
                                    </li>
                                    <li>
                                        <span class="text">Опции</span>
                                    </li>
                                    <li>
                                        <span class="text">Комплектация</span>
                                    </li>
                                    <br>
                                    <br>
                                    <li>
                                        <span class="text">Индикация</span>
                                    </li>
                                    <li>
                                        <span class="text">Источник питания</span>
                                    </li>
                                    <li>
                                        <span class="text">Температура эксплуатации</span>
                                    </li>
                                    <li>
                                        <span class="text">Влажность при эксплуатации</span>
                                    </li>
                                    <li>
                                        <span class="text">Размеры</span>
                                    </li>
                                    <li>
                                        <span class="text">Вес</span>
                                    </li>
                                    <li>
                                        <span class="text">Цвет</span>
                                    </li>
                                    <li>
                                        <span class="text">Страна-производитель</span>
                                    </li>
                                    <li>
                                        <span class="text">Гарантия</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="sherif_home_main-product-tabs-tab-content-right">
                                <ul class="tab-content-characteristics-right">
                                    <li>
                                        <span class="page">54 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">Прямая термопечать</span>
                                    </li>
                                    <li>
                                        <span class="page">203 dpi</span>
                                    </li>
                                    <li>
                                        <span class="page">USB, RS-232, Ethernet</span>
                                    </li>
                                    <li>
                                        <span class="page">Настольные</span>
                                    </li>
                                    <li>
                                        <span class="page">Принтер этикеток</span>
                                    </li>
                                    <li>
                                        <span class="page">Черно-белая</span>
                                    </li>
                                    <li>
                                        <span class="page">102 мм/с</span>
                                    </li>
                                    <li>
                                        <span class="page">15 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">60 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">4 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">1727 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">25.4 мм, 38.1 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">0.06 - 0.2 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">127 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">Многофункциональная кнопка контроля FEED</span>
                                    </li>
                                    <li>
                                        <span class="page">Фиксированный датчик просвет между этикетками</span>
                                    </li>
                                    <li>
                                        <span class="page">Язык управления принтером</span>
                                    </li>
                                    <li>
                                        <span class="page">Автоматический выбор языка управления</span>
                                    </li>
                                    <li>
                                        <span class="page">Да</span>
                                    </li>
                                    <li>
                                        <span class="page">32-битный RISC-микропроцессор</span>
                                    </li>
                                    <li>
                                        <span class="page">4 МБ Flash ROM, 16 МБ SDRAM</span>
                                    </li>
                                    <li>
                                        <span class="page">Отделитель</span>
                                    </li>
                                    <li>
                                        <span class="page">Принтер, Втулка для сматывания отработанного риббона, Стандартный риббон, Сетевой шнур питания, Источник питания, Ттестовый рулон этикетки, СD (Включает ПО Qlabel, руководство пользователя)</span>
                                    </li>
                                    <li>
                                        <span class="page">Один двухцветный светодиодный индикатор (Зеленый, Красный)</span>
                                    </li>
                                    <li>
                                        <span class="page">110 - 220 В, 50 - 60 Гц</span>
                                    </li>
                                    <li>
                                        <span class="page">5°С - 40°С</span>
                                    </li>
                                    <li>
                                        <span class="page">30% - 85%</span>
                                    </li>
                                    <li>
                                        <span class="page">218 х 172 х 100 мм</span>
                                    </li>
                                    <li>
                                        <span class="page">1.2 кг</span>
                                    </li>
                                    <li>
                                        <span class="page">Черный</span>
                                    </li>
                                    <li>
                                        <span class="page">Тайвань</span>
                                    </li>
                                    <li>
                                        <span class="page">36 месяцев</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="video-review" class="tab-pane fade">
                        <p>Video</p>
                    </div>
                    <div id="reviews" class="tab-pane fade in active">
                        <?php echo $__env->make('Clients-page.partials.review', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
     </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('compiled_js'); ?>
    {"src" : "<?php echo e(asset('assets/js/Clients-scripts/reviews.js')); ?>", "async" : false},
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>