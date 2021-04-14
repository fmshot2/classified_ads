<?php if(session('fail')): ?>
    <script>
        toastr.error(<?php echo e(session('fail')); ?>)
    </script>
<?php endif; ?>

<?php if(session('success')): ?>
    <script>
        toastr.success(<?php echo e(session('success')); ?>)
    </script>
<?php endif; ?>


<?php if(session('success2')): ?>
    <script>
        toastr.success(<?php echo e(session('success2')); ?>)
    </script>
<?php endif; ?>






<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            toastr.error(<?php echo e($error); ?>)
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>




<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/layouts/frontend_partials/status.blade.php ENDPATH**/ ?>