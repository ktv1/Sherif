<?php $__env->startSection('meta-tegs'); ?>
    <link rel="canonical" href="<?php echo e(url('/')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("css_files"); ?>
    loadCSS("<?php echo e(asset('assets/_header.css')); ?>");//Header Styles (compress & paste to header after release)
    <?php if($is_admin): ?>
        loadCSS("<?php echo e(asset('assets/css/_header_admin.css')); ?>");              //Header Styles (compress & paste to header after release)
    <?php endif; ?>
        loadCSS("<?php echo e(asset('assets/_main.css')); ?>");                //User Styles: Main

    loadCSS("<?php echo e(asset('assets/css/section/_main.css')); ?>");                //User Styles: Main
    <?php if($is_admin): ?>
        loadCSS("<?php echo e(asset('assets/css/_main_admin.css')); ?>");                //User Styles: Main
    <?php endif; ?>
    loadCSS("<?php echo e(asset('assets/css/section/_media.css')); ?>");               //User Styles: Media
    <?php if($is_admin): ?>
        loadCSS("<?php echo e(asset('assets/css/_media_admin.css')); ?>");               //User Styles: Media
    <?php endif; ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('header'); ?>
    <?php echo $header; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('left_sidebar'); ?>
    <?php echo $left_side_bar; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("main_column"); ?>
<!-- Main Sherif-Home-->

            <div class="sherif_center_column">
                <!-- include home_messages -->
                <?php echo $__env->make("layouts.partials.home_messages", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make("layouts.partials.top_alert", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php if(session()->has('links') && count(session('links'))!= 2): ?>
                    <?php echo $__env->make("layouts.partials.top_alert", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php endif; ?>




                <!--SHERIF SECTION-->
                    <ul class="sherif-breadcrumb">
                      <li><a href="index.html">Главная</a></li>
                      <li><span>Вы здесь <i class="fas fa-arrow-right"></i></span> <?php echo e($CurrentCategory->name); ?></li>
                    </ul>
                    <div class="sherif_home_main-box_section">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcatalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="<?php echo e(route('subCatalog', ['slug'=>$CurrentCategory->slug, 'subslug'=>$subcatalog->slug])); ?>">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('storage/'. $subcatalog->image)); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link"><?php echo e($subcatalog->name); ?><span class="section-number"> (7)</span></span>
                                </p>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('/assets/img/section/section2.png')); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link">Балаклавы<span class="section-number"> (12)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('/assets/img/section/section3.png')); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link" class="category-link">Берцы и другая военная обувь<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('/assets/img/section/section4.png')); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link">Бронежилеты<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('/assets/img/section/section5.png')); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link">Бронепластины, кевлар, бронесумки<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('/assets/img/section/section6.png')); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link">Военная форма и камуфляж<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('/assets/img/section/section7.png')); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link">Фурнитура форменная<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div> -->
                        <!-- <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('/assets/img/section/section8.png')); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link">Гидраторы и питьевые системы<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="<?php echo e(asset('/assets/img/section/section9.png')); ?>" alt="">
                                <p class="section-title">
                                    <span class="category-link">Головные уборы<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div> -->
                    </div>
                    <nav class="">
                            <ul class="pagination-sherif">
                                <li class=""><a href="#"><<</a></li>
                                <li class=""><a href="#"><</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a class="active-sherif" href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">8</a></li>
                                <li><a href="#">9</a></li>
                                <li><a class="active-sherif-dots" href="#"></a></li>
                                <li><a href="#">20</a></li>
                                <li><a class="active-sherif-dots" href="#"></a></li>
                                <li><a href="#">30</a></li>
                                <li><a class="active-sherif-dots" href="#"></a></li>
                                <li><a href="#">40</a></li>
                                <li><a class="active-sherif-dots" href="#"></a></li>
                                <li><a href="#">50</a></li>
                                <li><a href="#">></a></li>
                                <li><a href="#">>></a></li>
                            </ul><br>
                            <ul class="pagination-sherif tags-sherif">
                                <li><i class="fas fa-tags"></i></li>
                                <li><a href="#">tag1</a></li>
                                <li><a href="#">tag2</a></li>
                                <li><a href="#">tag3</a></li>
                                <li><a href="#">tag4</a></li>
                                <li><a href="#">tag5</a></li>
                                <li><a href="#">tag6</a></li>
                                <li><a href="#">tag7</a></li>
                                <li><a href="#">tag8</a></li>
                                <li><a href="#">tag9</a></li>
                            </ul>
                            
                        </nav>
                    <!--SHERIF SECTION END-->
            </div>
     
       
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>