<?php $__env->startSection("main_banner"); ?>
    <div class="sherif_home_main-box_slider slider">
    <?php if(isset($banner)): ?>
        <?php $__currentLoopData = $banner->bannerImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bannerImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
                $bannerposition = \App\Models\BannerImages::i()->getBannerImageLink($bannerImage->id);
           // dd($bannerposition)
             ?>
            <div class="slide item">
                <div class="slide-content" style="background-image: url('<?php echo e(Illuminate\Support\Facades\Storage::url(get_image_cache($bannerImage->image, $banner->width, $banner->height))); ?>')">
                    <?php if(($bannerImage->type == '1-1') && isset($bannerImage->bannerLinkPosition[0])): ?>
                        <a href="<?php echo e($bannerImage->bannerLinkPosition[0]->link); ?>">
                            <div class="col-sm-12" style="background-color: #0a2b1d; position: absolute; left: 0; height: 100%; opacity: 0.2;">
                                <!--<img class="d-block w-100"  alt="First slide [800x400]" src="<?php echo e(asset('/assets/img/slider/FirstSlide.png')); ?>" data-holder-rendered="true">-->
                            </div>
                        </a>
                    <?php elseif(($bannerImage->type == '2-2') && (isset($bannerposition[7])) && (isset($bannerposition[8]))): ?>
                        <a href="<?php echo e($bannerposition[7]); ?>">
                            <div class="col-sm-6" style="background-color: #0a2b1d; position: absolute; left: 0; height: 100%; opacity: 0.2;">

                            </div>
                        </a>
                        <a href="<?php echo e($bannerposition[8]); ?>">
                            <div class="col-sm-6" style="background-color: #1a0dab; position: absolute; right: 0; height: 100%; opacity: 0.2">

                            </div>
                        </a>
                        <!--<img class="d-block w-100" src="<?php echo e(Illuminate\Support\Facades\Storage::url(get_image_cache($bannerImage->image, $banner->width, $banner->height))); ?>" alt="First slide"  data-holder-rendered="true">-->
                    <?php elseif(($bannerImage->type == '6-6') /*&& (isset($bannerposition[1])) && (isset($bannerposition[2]))*/): ?>
                        <div class="col-sm-6" style="position: absolute; left: 0; height: 100%;">
                            <a href="<?php echo e($bannerposition[1]); ?>">
                                <div class="col-sm-12" style="background-color: #042b01; position: relative; left: 0; height: 33.3333%; opacity: 0.2;">

                                </div>
                            </a>
                            <a href="<?php echo e($bannerposition[2]); ?>">
                                <div class="col-sm-12" style="background-color: #00ab1b; position: relative; left: 0; height: 33.3333%; opacity: 0.2">

                                </div>
                            </a>
                            <a href="<?php echo e($bannerposition[3]); ?>">
                                <div class="col-sm-12" style="background-color: #1a0dab; position: relative; left: 0; height: 33.3333%; opacity: 0.2">

                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6" style="position: absolute; right: 0; height: 100%;">
                            <a href="<?php echo e($bannerposition[4]); ?>">
                                <div class="col-sm-12" style="background-color: #042b01; position: relative; right: 0; height: 33.3333%; opacity: 0.2;">

                                </div>
                            </a>
                            <a href="<?php echo e($bannerposition[5]); ?>">
                                <div class="col-sm-12" style="background-color: #00ab1b; position: relative; right: 0; height: 33.3333%; opacity: 0.2">

                                </div>
                            </a>
                            <a href="<?php echo e($bannerposition[6]); ?>">
                                <div class="col-sm-12" style="background-color: #1a0dab; position: relative; right: 0; height: 33.3333%; opacity: 0.2">

                                </div>
                            </a>
                        </div>
                        <!--<img class="d-block w-100" src="<?php echo e(Illuminate\Support\Facades\Storage::url(get_image_cache($bannerImage->image, $banner->width, $banner->height))); ?>" alt="First slide" data-holder-rendered="true">-->
                    <?php else: ?>
                    <!--Slide start-->
                        <div class="slide item">
                            <div class="slide-content" style="background-image: url('<?php echo e(asset('/assets/img/slider/FirstSlide.png')); ?>');">
                            </div>
                        </div>
                        <!--Slide end -->
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <!--Slide start-->
            <div class="slide item">
                <div class="slide-content" style="background-image: url('<?php echo e(asset('/assets/img/slider/FirstSlide.png')); ?>');">
                </div>
            </div>
            <!--Slide end -->
    <?php endif; ?>
    </div>
<?php echo $__env->yieldSection(); ?>