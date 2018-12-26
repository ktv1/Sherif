<?php $__env->startSection('css'); ?>
    <style>
        .text-inline {
            white-space: nowrap;
        }

        #reviews a {
            text-decoration: none;
            font-size: 13px;
        }

        #reviews td {
            vertical-align: middle;
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
                <div class="container-fluid">
                    <div class="btn-group pull-right" id="type_filter">
                        <button type="button" class="btn btn-primary" data-type="">Все</button>
                        <button type="button" class="btn btn-primary" data-type="Новый">Новые</button>
                        <button type="button" class="btn btn-primary" data-type="Одобрен">Одобренные</button>
                        <button type="button" class="btn btn-primary" data-type="Заблокирован">Заблокированные</button>
                    </div>
                </div>
                <table id="reviews" class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th class="th-sm">Статус</th>
                        <th class="th-sm">Имя</th>
                        <th class="th-sm">E-Mail</th>
                        <th class="th-sm">Товар</th>
                        <th class="th-sm">Отзыв</th>
                        <th class="th-sm">Менеджер</th>
                        <th class="th-sm">Комментарий</th>
                        <th class="th-sm">Отвечен</th>
                        <th class="th-sm">Добавлен</th>
                        <th class="th-sm">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="<?php echo e($item['status'] == 'blocked' ? 'text-danger' : ($item['status'] == 'new' ? 'text-success' : 'text-basic')); ?>">
                                <?php echo e($statuses[$item['status']]); ?>

                            </td>
                            <td>
                                <?php if(isset($item['uid'])): ?>
                                    <a href="<?php echo e(route('voyager.users.show', ['id'=>$item['uid']])); ?>"><?php echo e($item['name']); ?></a>
                                <?php else: ?>
                                    <?php echo e($item['name']); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($item['email']); ?>

                            </td>
                            <td class="text-inline">
                                <a href="<?php echo e(url($item['product']['URL'])); ?>" target="_blank"><?php echo e($item['product']['name']); ?></a>
                            </td>
                            <td>
                                <?php echo e(str_limit($item['review'], $limit = 100, $end = '...')); ?>

                            </td>
                            <td>
                                <?php if(isset($item['manager']['id'])): ?>
                                    <a href="<?php echo e(route('voyager.users.show', ['id'=>$item['manager']['id']])); ?>"><?php echo e($item['manager']['name']); ?></a>
                                <?php else: ?>
                                    <?php echo e($item['manager']['name']); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(str_limit($item['response'], $limit = 100, $end = '...')); ?>

                            </td>
                            <td>
                                <?php echo e($item['sent'] ? 'Да' : 'Нет'); ?>

                            </td>
                            <td class="text-inline">
                                <?php echo e(\Carbon\Carbon::parse($item['created_at'])->format('Y-m-d')); ?>

                            </td>
                            <td>
                                <a href="<?php echo e(route('voyager.product-reviews.moderate', ["id"=>$item["id"]])); ?>"
                                   title="Edit"
                                   class="btn btn-sm btn-primary edit">

                                    <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Модерировать</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('voyager::master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>