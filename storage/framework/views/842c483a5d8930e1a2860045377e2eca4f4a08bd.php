<div class="modal fade in" id="<?php echo e($name); ?>" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?php echo e($title); ?></h4>
            </div>
            <form id="savePersonalForm">
                <div class="modal-body">
                    <div class="row">
                        <?php echo e($slot); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo e($buttons); ?>

                </div>
            </form>
        </div>
    </div>
</div>