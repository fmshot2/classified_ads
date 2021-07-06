<div class="recently-properties content-area-12 home-recently-properties">
    <div class="services-2 content-area-5">
        <div class="row container-fluid hm-top-row">
            <div class="col-lg-3 col-md-2 fea-ser-mobile fea-ser-tablet">
                <div class="sidebar-right">
                    <div class="footer-item clearfix container-fluid">
                        <br/>
                        <div class="s-border" style="margin-top: -15px;"></div>
                        <div class="m-border"></div>
                        <h5 style="margin-top: -15px; text-transform: uppercase">Featured Services</h5>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                    </div>

                    <div class="popular-posts featured-service-hm">
                         <?php if(isset($featuredServices)): ?>
                            <?php $__currentLoopData = $featuredServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->index < 16): ?>
                                    <div class="media p-2">
                                        <a href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>">
                                            <div class="media-left">
                                                <img class="media-object" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($featuredService->service_image); ?>" alt="sub-properties">
                                            </div>
                                        </a>
                                        <div class="media-body align-self-center">
                                            <h3 class="media-heading"><a href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->name, 30)); ?></a></h3>

                                            <p class="fea-ad-hm-location"><strong>Location:</strong> <a href="<?php echo e(route('serviceDetail', $featuredService->slug)); ?>"><?php echo e(Str::limit($featuredService->state, 30)); ?></a></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 desktop-cat-col">
                <div class="main-title">
                    <h3>What service are you looking for?</h3>
                </div>
                <div class="">
                    <div class="row" style="visibility: visible;">
                        <?php if(isset($categories)): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2 service-info-5 card" style="padding: 5px;background: #fff; margin: 0 0 0 0; border: 0; border-radius: 0">
                                    <div style="border: 1px solid rgba(0,0,0,.125);width: 100%;margin: 0;padding: 15px;">
                                        <div class="cat-image-icon">
                                            <a href="<?php echo e(route('services', $category->slug)); ?>" >
                                                <div style="border-radius: 50px;">
                                                    <img class="" src="<?php echo e(asset('images')); ?>/<?php echo e($category->image); ?>" style=" border-radius: 10px;" alt="<?php echo e($category->name); ?>">
                                                </div>
                                            </a>

                                            <a style="font-weight: 500 !important" href="<?php echo e(route('services', $category->slug)); ?>" >
                                                <h6><?php echo e($category->name); ?></h6>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mobile-cat-col">
                <div class="main-title">
                    <h2>What service are you looking for?</h2>
                </div>
                <div class="sidebar-right" style="width: 100%; padding: 15px;">
                    <div class="row wow animated" style="visibility: visible;" style="margin: 0; padding: 0; width: 100%">
                        <?php if(isset($categories)): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-4 col-xs-2" style="margin: 0; padding: 10px; width: 100%">
                                    <div class="service-info-5" style="margin: 0; padding: 10px; width: 100%; border: 1px solid rgba(0,0,0,.125);">
                                        <div class="cat-image-icon">
                                            <a href="<?php echo e(route('services', $category->slug)); ?>" >
                                                <div style="border-radius: 50px">
                                                    <img class="" src="<?php echo e(asset('images')); ?>/<?php echo e($category->image); ?>" style=" border-radius: 10px; width: 50px" alt="<?php echo e($category->name); ?>">
                                                </div>
                                            </a>

                                            <a href="<?php echo e(route('services', $category->slug)); ?>">
                                                <h6 class="cat-title" style="margin-top: 5px;"><?php echo e($category->name); ?></h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 tablet-cat-col d-none">
                <div class="main-title">
                    <h1>What service are you looking for?</h1>
                </div>
                <div class="sidebar-right" style="width: 100%; padding: 15px;">
                    <div class="row wow animated" style="visibility: visible;" style="margin: 0; padding: 0; width: 100%">
                        <?php if(isset($categories)): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-3 col-xs-2" style="margin: 0; padding: 10px; width: 100%">
                                    <div class="service-info-5" style="margin: 0; padding: 10px; width: 100%">
                                        <div class="cat-image-icon">
                                            <a href="<?php echo e(route('services', $category->slug)); ?>" >
                                                <div style="border-radius: 50px">
                                                    <img class="" src="<?php echo e(asset('images')); ?>/<?php echo e($category->image); ?>" style=" border-radius: 10px; width: 50px" alt="<?php echo e($category->name); ?>">
                                                </div>
                                            </a>

                                            <a href="<?php echo e(route('services', $category->slug)); ?>">
                                                <h6  class="cat-title"><?php echo e($category->name); ?></h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 fea-ser-tablet">
                <div class="sidebar-right">
                    <div class="footer-item clearfix container-fluid">
                        <br/>
                        <div class="s-border" style="margin-top: -15px;"></div>
                        <div class="m-border"></div>
                    </div>
                    <div class="popular-posts featured-ad-hm-list">
                        <div class="container">
                            <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="4000">
                                
                                <div class="carousel-inner">
                                    <?php if($advertisements): ?>
                                        <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($advertisement->advert_location == 3): ?>
                                                <div class="carousel-item <?php echo e($loop->index == 0 ? 'active' : ''); ?>">
                                                    <img class="d-block mx-auto img-fluid" src="<?php echo e(asset('uploads/sponsored/'.$advertisement->banner_img)); ?>" alt="<?php echo e($advertisement->brand_name); ?>">
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <p>No Advert here!</p>
                                    <?php endif; ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="footer-item clearfix container-fluid" style="margin-top:20px">
                        <br/>
                        <h6 style="margin-top: -15px; text-transform: uppercase">Trending Services</h6>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                    </div>

                    <div class="popular-posts featured-ad-hm-list" style="margin-top: -10px">
                        <?php if(isset($trendingServices)): ?>
                        <?php $__currentLoopData = $trendingServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trendingService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->index < 14): ?>
                                <div class="media p-2">
                                    <a href="<?php echo e(route('serviceDetail', $trendingService->slug)); ?>">
                                        <div class="media-left">
                                            <img class="d-block mx-auto img-fluid" src="<?php echo e(asset('uploads/services')); ?>/<?php echo e($trendingService->service_image); ?>" alt="First slide">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <p class="fea-ad-hm-location tt-capitalize"><strong><?php echo e(Str::limit($trendingService->name, 30)); ?></strong>
                                            </p>
                                            <p class="fea-ad-hm-location"><strong>Location:</strong> <?php echo e(Str::limit($trendingService->state, 30)); ?></a></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    .vert .carousel-item-next.carousel-item-left,
    .vert .carousel-item-prev.carousel-item-right {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    .vert .carousel-item-next,
    .vert .active.carousel-item-right {
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100% 0);
    }
    .vert .carousel-item-prev,
    .vert .active.carousel-item-left {
        -webkit-transform: translate3d(0,-100%, 0);
        transform: translate3d(0,-100%, 0);
    }
</script>
<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/frontend_section/category.blade.php ENDPATH**/ ?>