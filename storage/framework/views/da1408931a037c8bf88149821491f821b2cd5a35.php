<div class="sherif_left_column">
    <div class="sherif_sidebar_catalog">
        <div class="sherif_sidebar_catalog-title">
            <h2>Каталог:</h2>
        </div>
        <div class="sherif_sidebar_catalog-content">
            <!-- <div id="accordion" class="panel-group promotion">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#catalog_promotions" data-parent="#accordion" data-toggle="collapse"><span></span>Акции</a>
                            <span class="sherif_sidebar_catalog-content_amount">
	                                    	(5)
	                                    </span>
                        </h4>
                    </div>
                    <div id="catalog_promotions" class="panel-collapse collapse out">
                        <div class="panel-body">
                            <div class="link_box">
                                <a id="edit_profile_user">Text</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php $__currentLoopData = $Global_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($status != "None" && $status == $gc->slug): ?>
                    <?php  $toggle = "in" ?>
                <?php else: ?>
                    <?php  $toggle = "out" ?>
                <?php endif; ?>
                
                <div id="accordion" class="panel-group">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="<?php echo e(route('catalog', ['slug'=>$gc->slug])); ?>"><?php echo e($gc->name); ?></a>
                                <a href="#catalog_<?php echo e($gc->slug); ?>" data-parent="#accordion" data-toggle="collapse"><span></span><i class="fas fa-sort-down"></i></a>
                                <span class="sherif_sidebar_catalog-content_amount">(50)</span>
                            </h4>
                        </div>
                        <div id="catalog_<?php echo e($gc->slug); ?>" class="panel-collapse collapse <?php echo e($toggle); ?>">
                            <div class="panel-body">
                                <ul>
                                    <?php $__currentLoopData = $Sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($gc->id == $sc->parent_id): ?>
                                            <li><div class="link_box">
                                            <a href="<?php echo e(route('subCatalog', ['slug'=>$gc->slug, 'subslug'=>$sc->slug])); ?>" id="edit_profile_user"><?php echo e($sc->name); ?></a>
                                            <span class="sherif_sidebar_catalog-content_panel_amount">
                                                (29)
                                            </span>
                                             </div></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>     
</div>
