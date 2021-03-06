<header class="top-header none-992" style="display: flex; justify-content: center; background: linear-gradient(90deg, rgba(251,219,35,1) 52%, rgba(243,163,27,1) 66%);">
    <?php if($advertisements): ?>
        <div class="animate__animated animate__fadeInLeft">
            <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($advertisement->advert_location == 1): ?>
                    <a class="topnav-advert-slides topnav-advert-slides-hidden animate__animated animate__fadeInLeft" href="<?php echo e($advertisement->website_link ? $advertisement->website_link : '#'); ?>">
                        <img src="<?php echo e(asset('uploads/sponsored/'.$advertisement->banner_img)); ?>" alt="" style="margin: 0 auto">
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p>No Advert here</p>
    <?php endif; ?>
</header>

<style>
    /* Referral Image Slider  */
    .topnav-advert-slides { width: 100%; }
    .topnav-advert-slides-hidden { display : none; }
    /* Referral Image Slider Ends */
</style>

<script>
    /* Top Nav Slider  */
    addEventListener("load",() => { // "load" is safe but "DOMContentLoaded" starts earlier
        var index = 0;
        const slides = document.querySelectorAll(".topnav-advert-slides");
        const classHide = "topnav-advert-slides-hidden", count = slides.length;
        nextSlide();
        function nextSlide() {
            slides[(index ++) % count].classList.add(classHide);
            slides[index % count].classList.remove(classHide);
            setTimeout(nextSlide, 10000);
        }
    });
    /* Top Nav Slider Ends */
</script>

<!-- Top header start -->
<header class="top-header none-992" id="top-header-2" style="background-color: rgb(202, 131, 9);">
    <div class="container" id="scroll-top">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-7">
                <div class="list-inline">
                    <a href="tel: <?php echo e($check_general_info == 0 ? $general_info->hot_line : ''); ?> ">
                        Need Support? <i class="fa fa-phone"></i> <?php echo e($check_general_info == 0 ? $general_info->hot_line : ''); ?>

                    </a>
                    <a href="https://wa.me/<?php echo e($check_general_info == 0 ? $general_info->hot_line_3 : ''); ?>/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services." target="_blank">
                        |&emsp;<i class="fa fa-whatsapp animate__animated animate__heartBeat animate__infinite" style="color:#5af8ac; font-size: 16px"></i> WhatsApp
                    </a>
                    <a href="mailto: <?php echo e($check_general_info == 0 ? $general_info->support_email : ''); ?>">
                        |&emsp;<i class="fa fa-envelope"></i> <?php echo e($check_general_info == 0 ? $general_info->support_email : ''); ?>

                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-4 col-sm-5">
                <ul class="list-inline top-header-links pull-right">
                    <a class="text-warning" href="<?php echo e(route('aboutus')); ?>" id=""><i class="fa fa-group"></i> About</a>
                    <a class="text-warning" href="<?php echo e(route('contact')); ?>" id=""><i class="fa fa-envelope-open"></i> Contact</a>
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="text-warning" href="/login"><i class="fa fa-sign-in"></i> Login</a>
                        <a class="text-warning" href="/register"><i class="fa fa-user"></i> Register</a>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->role == 'seller'): ?>
                            <a class="text-warning" href="<?php echo e(route('seller.dashboard')); ?>"><i class="fa fa-user"></i> My Account</a>
                        <?php elseif(Auth::user()->role == 'buyer'): ?>
                            <a class="text-warning" href="<?php echo e(route('buyer.dashboard')); ?>"><i class="fa fa-user"></i> My Account</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="font-weight: 600; padding: 10px;"><i class="fa fa-power-off"></i> Logout</a>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</header>


<!-- Main header start -->
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logos" href="/">
                <img src="images/<?php echo e($check_general_info == 0 ? $general_info->logo : ''); ?>" style="height: 45px;" alt="logo">
                
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="mobile-top-navbar" id="scroll-top">
                <ul class="mbtn-links">
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="/login" class="sign-in">Login</a> or
                        <a href="/register" class="sign-in">Register</a>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->role == 'seller'): ?>
                            <a href="<?php echo e(route('seller.dashboard')); ?>"> Dashboard</a>
                        <?php endif; ?>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="font-weight: 600; color: rgb(253, 75, 75); border: 1px solid  rgb(255, 91, 91); padding: 10px;"><i class="fa fa-power-off"></i></a>
                    <?php endif; ?>
                </ul>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav header-ml">
                    <li class="nav-item">
                        <a href="<?php echo e(route('home')); ?>"  class="nav-link" >Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('allCategories')); ?>"  class="nav-link">Categories</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo e(route('faq')); ?>" id="">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#launchAgentModal" href="<?php echo e(route('allServices')); ?>"  class="nav-link">Become our Agent</a>
                    </li>

                    
                    
                </ul>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->role == 'seller'): ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="mr-3 navbar-top-post-btn">
                                <a class="btn btn-success" href="<?php echo e(route('seller.service.create')); ?>"><i class="fa fa-plus"></i> <span style="font-size: 15px !important;color:#fff">Post A Service</span></a>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="mr-3 navbar-top-post-btn">
                            <a class="btn btn-success" href="/login"><i class="fa fa-plus"></i> <span style="font-size: 15px !important;color:#fff">Post A Service</span></a>
                        </li>
                    </ul>
                <?php endif; ?>


                <?php if(auth()->guard()->check()): ?>
                    <ul class="navbar-nav ml-auto">
                        <?php if(Auth::user()->role == 'seller'): ?>
                            
                        <?php endif; ?>
                        <?php if(Auth::user()->role == 'buyer'): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="<?php echo e(route('buyer.dashboard')); ?>">My Account</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>

<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file)
        {
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImg").attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/layouts/frontend_partials/navbar.blade.php ENDPATH**/ ?>