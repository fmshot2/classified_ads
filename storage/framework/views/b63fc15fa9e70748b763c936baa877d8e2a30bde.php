<?php if(session('fail')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?php echo e(session('fail')); ?>

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>

<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<?php echo e(session('success')); ?>

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>


<?php if(session('success2')): ?>
<p><?php echo e(session('success2')); ?></p>
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<?php echo e(session('success2')); ?>

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>






<?php if($errors->any()): ?>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li><?php echo e($error); ?></li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/layouts/frontend_partials/status.blade.php ENDPATH**/ ?>