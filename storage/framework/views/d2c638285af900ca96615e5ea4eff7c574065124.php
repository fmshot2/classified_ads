<div class="categories content-area-8 home-verified-business-section bg-grea-3" style="margin-top: 20px">
    <div class="service-detail-container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Hot Services</h1>
        </div>
        <?php if(isset($hotServices)): ?>
            <div class="row wow animated" style="visibility: visible;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <?php $__currentLoopData = $hotServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($hotService->badge_type == 1): ?>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                    <div class="agenttrusted-badges">
                                        <span class="text-warning" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                    </div>
                                    <a class="title title-dk hot-business-name" href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"  style="font-size: 16px;"><?php echo e(Str::limit($hotService->name, 21)); ?></a>
                                    <a class="title title-mb hot-business-name" href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"  style="font-size: 16px;"><?php echo e(Str::limit($hotService->name, 12)); ?></a>

                                    <a href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"><img class="d-block w-100 service_images" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($hotService->service_image); ?>" alt="<?php echo e($hotService->name); ?>">
                                    </a>
                                </div>
                            <?php elseif($hotService->badge_type == 2): ?>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                    <div class="agenttrusted-badges">
                                        <span class="text-success" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                    </div>
                                    <a class="title title-dk hot-business-name" href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"  style="font-size: 16px;"><?php echo e(Str::limit($hotService->name, 21)); ?></a>
                                    <a class="title title-mb hot-business-name" href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"  style="font-size: 16px;"><?php echo e(Str::limit($hotService->name, 12)); ?></a>

                                    <a href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"><img class="d-block w-100 service_images" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($hotService->service_image); ?>" alt="<?php echo e($hotService->name); ?>">
                                    </a>
                                </div>
                            <?php elseif($hotService->badge_type == 3): ?>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                    <div class="agenttrusted-badges">
                                        <span class="text-primary" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i> Basic</span>
                                    </div>
                                    <a class="title title-dk hot-business-name" href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"  style="font-size: 16px;"><?php echo e(Str::limit($hotService->name, 21)); ?></a>
                                    <a class="title title-mb hot-business-name" href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"  style="font-size: 16px;"><?php echo e(Str::limit($hotService->name, 12)); ?></a>

                                    <a href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"><img class="d-block w-100 service_images" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($hotService->service_image); ?>" alt="<?php echo e($hotService->name); ?>">
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                    <div class="agenttrusted-badges" style="margin-top: 25px">
                                    </div>
                                    <a class="title title-dk hot-business-name" href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"  style="font-size: 16px;"><?php echo e(Str::limit($hotService->name, 21)); ?></a>
                                    <a class="title title-mb hot-business-name" href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"  style="font-size: 16px;"><?php echo e(Str::limit($hotService->name, 12)); ?></a>

                                    <a href="<?php echo e(route('serviceDetail', $hotService->slug)); ?>"><img class="d-block w-100 service_images" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($hotService->service_image); ?>" alt="<?php echo e($hotService->name); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>









<div class="categories content-area-8 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Tourist Sites in Nigeria</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <a href="<?php echo e(route('allcities')); ?>" class="btn btn-outline-warning" style="border-radius: 20px">View all the Cities</a>
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
                                                        <a href="#"><?php echo e($tourist_attraction->name); ?></a>
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
                                                        <a href="#"><?php echo e($tourist_attraction->name); ?></a>
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
                                                        <a href="#"><?php echo e($tourist_attraction->name); ?></a>
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