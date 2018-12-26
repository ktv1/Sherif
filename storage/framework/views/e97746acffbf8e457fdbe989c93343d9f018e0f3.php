<?php $__env->startSection('css'); ?>
    <style>

        #review_moderate .review-data {
            padding-top: 7px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="page-title"><i class="voyager-bubble-hear"></i>Отзывы</h1>
    </div>
    <div class="page-content browse container-fluid">
        <div class="row">
            <?php if(!isset($model)): ?>
                <h3 class="text-center">Отзывы отсутствуют</h3>
            <?php else: ?>
                <form class="form-horizontal col-md-offset-2 col-md-4" id="review_moderate" data-review-id="<?php echo e($model['id']); ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right">К товару:</label>
                        <div class="col-sm-8 review-data"><a href="<?php echo e($model['product']['URL']); ?>"><?php echo e($model['product']['name']); ?></a></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right">Имя:</label>
                        <div class="col-sm-8 review-data"><?php echo e($model['name']); ?></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right">E-Mail:</label>
                        <div class="col-sm-8 review-data"><?php echo e($model['email'] ?? 'Не указан'); ?></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right">Комментарий:</label>
                        <div class="col-sm-8 review-data"><?php echo e($model['review']); ?></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right" for="status">Статус:</label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control">
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val); ?>" <?php if($model['status'] == $val): ?> selected <?php endif; ?>><?php echo e($text); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right" for="response">Ответ:</label>
                        <div class="col-sm-8">
                            <textarea name="response" class="form-control" id="response" rows="10"><?php echo e($model['response']); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group hidden" id="response_published">
                        <label class="control-label col-sm-offset-4 col-sm-8 text-left" for="response_sent">
                            <input type="checkbox" name="sent"> - Опубликовать на сайте<br /><small>(Если указан E-Mail, будет отправлено автору)</small>
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('voyager::master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>