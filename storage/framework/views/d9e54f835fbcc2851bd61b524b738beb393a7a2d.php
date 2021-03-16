<div class="banner homepage-top-banner" id="banner">
	<div id="bannerCarousole" class="carousel slide" data-ride="carousel" data-interval="5000">
		<div class="carousel-inner">
            <?php if($sliders ?? ''): ?>
                <?php $__empty_1 = true; $__currentLoopData = $sliders ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="carousel-item banner-max-height <?php echo e($loop->index == 0 ? 'active' : ''); ?>">
                        <img class="d-block w-100" src="<?php echo e(asset('uploads/sliders')); ?>/<?php echo e($slider->image ?? ''); ?>" alt="<?php echo e($slider->title ?? ''); ?>">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <?php if($slider->buttonlocation != 'nobutton'): ?>
                                        <?php if($slider->buttonlocation == 'left'): ?>
                                            <div class="btn-sections btn-sections-left">
                                                <a href="<?php echo e($slider->links ?? ''); ?>" class="btn btn-lg btn-warning text-white"><?php echo e($slider->buttontext ?? ''); ?></a>
                                            </div>
                                        <?php elseif($slider->buttonlocation == 'right'): ?>
                                            <div class="btn-sections btn-sections-right">
                                                <a href="<?php echo e($slider->links ?? ''); ?>" class="btn btn-lg btn-warning text-white"><?php echo e($slider->buttontext ?? ''); ?></a>
                                            </div>
                                        <?php else: ?>
                                            <div class="btn-sections btn-sections-center">
                                                <a href="<?php echo e($slider->links ?? ''); ?>" class="btn btn-lg btn-warning text-white"><?php echo e($slider->buttontext ?? ''); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No Slider</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
	</div>

	<a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
		<span class="slider-mover-left" aria-hidden="true">
			<i class="fa fa-angle-left"></i>
		</span>
	</a>
	<a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
		<span class="slider-mover-right" aria-hidden="true">
			<i class="fa fa-angle-right"></i>
		</span>
	</a>
</div>
<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/frontend_section/carousel.blade.php ENDPATH**/ ?>