<div class="blog content-area bg-grea-3 bg-grea-3-hft hm-feat-ser-mid-sec">
    <div class="service-detail-container">
            <!-- Main title -->
        <div class="main-title" style="margin-top: -50px;">
            <h1> Featured Services </h1>
        </div>



        <?php if(isset($featuredServices)): ?>
            <div class="row row-flex">
                <?php $__currentLoopData = $featuredServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->index < 30 && $featuredService->badge_type == 1): ?>
                        <a href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>" class="property-img">
                            <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo e($featuredService->is_featured == 1 ? ' Super' : ''); ?></span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize;">
                                                <?php echo e(Str::limit($featuredService->user->name, 10)); ?>

                                            </p>
                                        </div>
                                        <img class="d-block w-100 service_images" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($featuredService->service_image); ?>" alt="<?php echo e($featuredService->name); ?>">

                                    </div>
                                    <div class="detail">
                                        <div>
                                            <a class="title title-dk" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 21)); ?></a>
                                            <a class="title title-mb" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 12)); ?></a>
                                        </div>

                                        <ul class="d-flex flex-row justify-content-between info">
                                            <li>
                                                <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> <?php echo e($featuredService->likes->count()); ?> Like<?php echo e($featuredService->likes->count() > 1 ? 's' : ''); ?>

                                            </li>
                                            <li>
                                                <a class="pull-right" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>">
                                                    <i class="fa fa-map-marker text-warning"></i> <?php echo e(Str::limit($featuredService->state, 5)); ?>

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php elseif($loop->index < 30 && $featuredService->badge_type == 2): ?>
                        <a href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>" class="property-img">
                            <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i><?php echo e($featuredService->is_featured == 1 ? ' Moderate' : ''); ?></span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                <?php echo e(Str::limit($featuredService->user->name, 10)); ?>

                                            </p>
                                        </div>
                                        <img class="d-block w-100 service_images" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($featuredService->service_image); ?>" alt="<?php echo e($featuredService->name); ?>">

                                    </div>
                                    <div class="detail">
                                        <div>
                                            <a class="title title-dk" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 21)); ?></a>
                                            <a class="title title-mb" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 12)); ?></a>
                                        </div>

                                        <ul class="d-flex flex-row justify-content-between info">
                                            <li>
                                                <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> <?php echo e($featuredService->likes->count()); ?> Like<?php echo e($featuredService->likes->count() > 1 ? 's' : ''); ?>

                                            </li>
                                            <li>
                                                <a class="pull-right" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>">
                                                    <i class="fa fa-map-marker text-warning"></i> <?php echo e(Str::limit($featuredService->state, 5)); ?>

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php elseif($loop->index < 30 && $featuredService->badge_type == 3): ?>
                        <a href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>" class="property-img">
                            <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-primary"><i class="fa fa-star"></i><?php echo e($featuredService->is_featured == 1 ? ' Basic' : ''); ?></span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                <?php echo e(Str::limit($featuredService->user->name, 10)); ?>

                                            </p>
                                        </div>
                                        <img class="d-block w-100 service_images" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($featuredService->service_image); ?>" alt="<?php echo e($featuredService->name); ?>">

                                    </div>
                                    <div class="detail">
                                        <div>
                                            <a class="title title-dk" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 21)); ?></a>
                                            <a class="title title-mb" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 12)); ?></a>
                                        </div>

                                        <ul class="d-flex flex-row justify-content-between info">
                                            <li>
                                                <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> <?php echo e($featuredService->likes->count()); ?> Like<?php echo e($featuredService->likes->count() > 1 ? 's' : ''); ?>

                                            </li>
                                            <li>
                                                <a class="pull-right" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>">
                                                    <i class="fa fa-map-marker text-warning"></i> <?php echo e(Str::limit($featuredService->state, 5)); ?>

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>" class="property-img">
                            <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                <?php echo e(Str::limit($featuredService->user->name, 10)); ?>

                                            </p>
                                        </div>
                                        <img class="d-block w-100 service_images" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($featuredService->service_image); ?>" alt="<?php echo e($featuredService->name); ?>">

                                    </div>
                                    <div class="detail">
                                        <div>
                                            <a class="title title-dk" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 21)); ?></a>
                                            <a class="title title-mb" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 12)); ?></a>
                                        </div>

                                        <ul class="d-flex flex-row justify-content-between info">
                                            <li>
                                                <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> <?php echo e($featuredService->likes->count()); ?> Like<?php echo e($featuredService->likes->count() > 1 ? 's' : ''); ?>

                                            </li>
                                            <li>
                                                <a class="pull-right" href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>">
                                                    <i class="fa fa-map-marker text-warning"></i> <?php echo e(Str::limit($featuredService->state, 5)); ?>

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

    
</div>

<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/frontend_section/feature.blade.php ENDPATH**/ ?>