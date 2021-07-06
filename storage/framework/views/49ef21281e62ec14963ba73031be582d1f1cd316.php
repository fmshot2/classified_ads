<div class="footer-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 footer-cta-text">
          <h2><a href="<?php echo e(route('register')); ?>">Register Your Service Today!</a></h2>
          <span>Take advantage of our platform to showcase your skills and services to a wide range of clients.</span>
        </div>
        <div class="col-lg-4 footer-cta-btn text-center">
            <a class="btn btn-success" href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus"></i> Register Now!</a>
        </div>

      </div>
    </div>
</div>

<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
           <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="contact-info">
                        <li>
                            Email: <a href="mailto: <?php echo e($check_general_info == 0 ? $general_info->support_email : ''); ?>"> <?php echo e($check_general_info == 0 ? $general_info->support_email : ''); ?> </a>
                        </li>
                        <li>
                            Phone 1: <a href="tel:  <?php echo e($check_general_info == 0 ? $general_info->hot_line : ''); ?>">  <?php echo e($check_general_info == 0 ? $general_info->hot_line : ''); ?> </a>
                        </li>
                        <li>
                            Phone 2: <a href="tel: <?php echo e($check_general_info == 0 ? $general_info->hot_line_2 : ''); ?>"> <?php echo e($check_general_info == 0 ? $general_info->hot_line_2 : ''); ?> </a>
                        </li>
                        <li>
                            <a href="https://wa.me/<?php echo e($check_general_info == 0 ? $general_info->hot_line_3 : ''); ?>/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services." target="_blank"><i class="fa fa-whatsapp" style="color:#5af8ac; font-size: 17px"></i> WhatsApp Message</a>
                        </li>
                    </ul>
                    <ul class="social-list clearfix">
                        <li><a href=" <?php echo e($check_general_info == 0 ? $general_info->facebook : ''); ?> " target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href=" <?php echo e($check_general_info == 0 ? $general_info->twitter : ''); ?> " target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo e($check_general_info == 0 ? $general_info->linkedin : ''); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
           <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Useful Links</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="links">
                        <li class=" ">
                            <a href="<?php echo e(route('home')); ?>" class="grey-text text-lighten-3">Home</a>
                        </li>

                        <li class="">
                            <a href="<?php echo e(route('faq')); ?>" class="grey-text text-lighten-3">FAQs</a>
                        </li>

                        <li class=" ">
                            <a href="<?php echo e(route('contact')); ?>" class="grey-text text-lighten-3">Contact Us</a>
                        </li>

                        <li class="">
                            <a href="<?php echo e(route('terms-of-use')); ?>" class="grey-text text-lighten-3">Terms of Use</a>
                        </li>

                        <li class=" ">
                            <a href="<?php echo e(route('privacy')); ?>" class="grey-text text-lighten-3">Privacy Policy</a>
                        </li>

                         <li class="">
                            <a href="<?php echo e(route('advertisement')); ?>" class="grey-text text-lighten-3">Advertise With Us</a>
                        </li>

                        <li class="">
                            <a href="<?php echo e(route('benefits-of-efcontact')); ?>" class="grey-text text-lighten-3">Benefits of EFContact</a>
                        </li>

                        <li class="">
                            <a href="<?php echo e(route('allcities')); ?>" class="grey-text text-lighten-3">Tourist Sites in Nigeria</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Advertisement</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="popular-posts">
                        <?php if($advertisements): ?>
                            <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($advertisement->advert_location == 4 && $loop->index != 3): ?>
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <a class="title" href="<?php echo e($advertisement->website_link ? route('serviceDetail', $advertisement->website_link) : '#'); ?>"  style="font-size: 14px;"><img class="media-object" src="<?php echo e(asset('uploads/sponsored/'.$advertisement->banner_img)); ?>" alt="<?php echo e($advertisement->title); ?>" style="width: 250px; height: 65px"></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p>No advert here!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
 <form action="" method="POST">

                        </form>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="Subscribe-box">
                        <p>Subscribe to get the latest services.</p>
                        <form action="<?php echo e(route('subscribe')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>


                                <input type="email" required class="form-contact form-control" name="email" placeholder="Enter Your Email">
                                <button type="submit" name="submitNewsletter" class="btn btn-block text-white bg-warning">
                                    Subscribe
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <p class="copy">© 2021 EFContact <a href="https://www.efnetworks.com">Powered by EF Network Ltd. </a><a href="<?php echo e(route('terms-of-use')); ?>"> TERMS</a> | <a href="<?php echo e(route('terms-of-use')); ?>"> POLICIES</a></p>
            </div>
        </div>
    </div>
</footer>


<div class="footer-nav-area mobile-footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
      <div class="suha-footer-nav h-100">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class=" <?php echo e(Request::is('/') ? 'active' : ''); ?>"><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li class=" <?php echo e(Request::is('chat') ? 'active' : ''); ?>"><a href="#liveChatModal" data-backdrop="static" data-toggle="modal"><i class="fa fa-comments-o"></i>Live Chat</a></li>
            <li class=" <?php echo e(Request::is('service') ? 'active' : ''); ?>"><a href="<?php echo e(route('seller.service.create')); ?>" style=" font-weight: 700; border: 1px solid rgb(255, 205, 41); padding: 10px; border-radius: 500px"><i style="font-size: 18px;" class="fa fa-plus"></i>Post</a></li>
            <li class=" <?php echo e(Request::is('frequently-asked-questions') ? 'active' : ''); ?>"><a href="/frequently-asked-questions"><i class="fa fa-question-circle-o"></i>FAQ</a></li>

            <li class=" <?php echo e(Request::is('settings') ? 'active' : ''); ?>">
                <a href="#" id="moreLinkBtn" data-target="#moreLinkModal" data-toggle="modal"><i class="fa fa-ellipsis-v"></i>More</a>
            </li>
        </ul>
      </div>
    </div>
  </div>

    <div id="liveChatModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="liveChatModalFrame" class="embed-responsive-item" src="https://tawk.to/chat/5ff49fb2c31c9117cb6bba8f/1er9ovkca" allowfullscreen></iframe>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close Chat</button>
                </div>
            </div>
        </div>
    </div>

    <div id="subscribeBox" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subscribe Now!</h5>
                    
                </div>
                <div class="modal-body">
                    <p>Subscribe to get updates on our latest services.</p>
                    <form action="<?php echo e(route('subscribe')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="email" required class="form-contact form-control" name="email" placeholder="Enter Your Email">
                        <button type="submit" name="submitNewsletter" class="btn btn-block text-white bg-warning" style="margin-top: 10px">
                            Subscribe
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div id="moreLinkModal" class="modal fade moreLinkModal">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 0 !important; padding: 0">
                <div class="modal-body" style="padding: 0">
                    <ul>
                        <li><a href="<?php echo e(route('aboutus')); ?>">About Us</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Contact Us</a></li>
                        <li><a href="<?php echo e(route('allServices')); ?>">All Services</a></li>
                        <li><a href="<?php echo e(route('allCategories')); ?>">All Categories</a></li>
                        
                        <li><a href="<?php echo e(route('allcities')); ?>">Places in Nigeria</a></li>
                        <li><a href="<?php echo e(route('advertisement')); ?>">Advertise With Us</a></li>
                        <li><a data-toggle="modal" data-target="#launchAgentModal" href="#">Become our Agent</a></li>
                        <li><a data-toggle="modal" data-target="#subscribeBox" href="#">Subscribe Now!</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/layouts/frontend_partials/footer.blade.php ENDPATH**/ ?>