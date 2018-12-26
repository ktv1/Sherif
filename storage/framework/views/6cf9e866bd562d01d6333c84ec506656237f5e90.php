<div class="container-fluid">

    <?php if(!isset($reviews)): ?>
        <div class="col-sm-12 text-center review-content">
            <h4>Отзывов для этого товара еще нет</h4>
        </div>
    <?php else: ?>
        <div class="col-sm-offset-1 col-sm-9 review-content">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="row">
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <figure class="thumbnail">
                        <img class="img-responsive" src="<?php echo e(isset($review->reviewer->avatar) ? '/storage/cache/175x175_' . $review->reviewer->avatar : '/image/avatar.png'); ?>" />
                    </figure>
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default arrow left">
                        <div class="panel-body">
                            <header class="review-header">
                                <div class="comment-user col-sm-6"><i class="fa fa-user"></i> <?php echo e($review->reviewer->name ?? $review->name); ?></div>
                                <time class="comment-date col-sm-6 text-right" datetime="<?php echo e(\Carbon\Carbon::parse($review->created_at)->format('Y-m-d')); ?>">
                                    <i class="far fa-clock"></i>
                                    <?php echo e(\Carbon\Carbon::parse($review->created_at)->format('Y-m-d')); ?>

                                </time>
                            </header>
                            <div class="comment-post col-sm-12">
                                <p><?php echo e($review->review); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

        <div class="review col-sm-offset-3 col-sm-6">
            <h3>Оставить отзыв</h3>
            <form method="post" class="form-horizontal" id="review_sent" <?php if(auth()->guard()->check()): ?> data-approved="<?php echo e(auth()->user()->id); ?>" <?php endif; ?>>
                <input type="hidden" name="pid" value="<?php echo e($product->id); ?>">

                <?php if(auth()->guard()->guest()): ?>
                <div class="form-group">
                    <label for="name">Имя <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">E-Mail</label> <small>&mdash; (не отображается на сайте)</small>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="review">Отзыв <span class="text-danger">*</span></label>
                    <textarea name="review" id="review" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">Отправить</button>
                    <button type="reset"  class="btn btn-default">Очистить</button>
                </div>
            </form>
        </div>
</div>