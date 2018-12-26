<input type="color" class="form-control" name="<?php echo e($row->field); ?>"
       value="<?php if(isset($dataTypeContent->{$row->field})): ?><?php echo e($dataTypeContent->{$row->field}); ?><?php else: ?><?php echo e(old($row->field)); ?><?php endif; ?>">
