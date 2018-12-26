<div class="container-fluid">

    <?php if(!isset($reviews)): ?>
        <div class="col-sm-12 text-center review-content">
            <h4>Отзывов для этого товара еще нет</h4>
        </div>
    <?php else: ?>
        <div class="col-sm-offset-1 col-sm-9 review-content">
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="review-data">
                    <div class="info">
                        <div class="product"><span>Отзыв к товару:</span> <a href="<?php echo e($review['product']['URL']); ?>"><?php echo e($review['product']['name']); ?></a></div>
                        <div class="status"><span>Статус:</span>
                            <?php if($review['status'] == 'new'): ?>
                                <text>На модерации</text>
                            <?php elseif($review['status'] == 'blocked'): ?>
                                <text class="text-danger">Заблокирован</text>
                            <?php else: ?>
                                <text class="text-success">Опубликован</text>
                            <?php endif; ?>
                        </div>
                    </div>
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="/storage/cache/175x175_<?php echo e(auth()->user()->avatar); ?>" />
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="review-header">
                                        <div class="comment-user col-sm-6"><i class="fa fa-user"></i> <?php echo e(auth()->user()->name); ?></div>
                                        <time class="comment-date col-sm-6 text-right" datetime="<?php echo e(\Carbon\Carbon::parse($review['created_at'])->format('Y-m-d')); ?>">
                                            <i class="far fa-clock"></i>
                                            <?php echo e(\Carbon\Carbon::parse($review['created_at'])->format('Y-m-d')); ?>

                                        </time>
                                    </header>
                                    <div class="comment-post col-sm-12">
                                        <p><?php echo e($review['review']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>