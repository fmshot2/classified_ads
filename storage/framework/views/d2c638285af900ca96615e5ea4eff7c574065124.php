









 <div class="categories content-area-8 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Tourist Sites in Nigeria</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <a href="<?php echo e(route('allcities')); ?>" class="btn btn-outline-warning" style="border-radius: 20px">View all the Sites</a>
                </div>
            </div>
        </div>
        <div class="row wow animated" style="visibility: visible;">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <?php if($tourist_attractions): ?>
                        <?php $__currentLoopData = $tourist_attractions->shuffle(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tourist_attraction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first || $loop->index == 1): ?>
                                <div class="col-sm-6 col-pad">
                                    <div class="category">
                                        <div class="category_bg_box cat-1-bg" style="background-image: url(<?php echo e(asset('cities_images/'.$tourist_attraction->thumb)); ?>);">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#"><?php echo e($tourist_attraction->states); ?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($loop->index == 2): ?>
                                <div class="col-sm-12 col-pad">
                                    <div class="category">
                                        <div class="category_bg_box cat-3-bg" style="background-image: url(<?php echo e(asset('cities_images/'.$tourist_attraction->thumb)); ?>);">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#"><?php echo e($tourist_attraction->states); ?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
            </div>
                            <?php elseif($loop->index == 3): ?>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-pad d-none d-xl-block d-lg-block">
                                    <div class="category">
                                        <div class="category_bg_box category_long_bg cat-4-bg" style="background-image: url(<?php echo e(asset('cities_images/'.$tourist_attraction->thumb)); ?>);">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#"><?php echo e($tourist_attraction->states); ?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
        </div>
    </div>







</div>
<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/frontend_section/popular.blade.php ENDPATH**/ ?>