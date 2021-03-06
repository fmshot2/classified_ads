

<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>
    <div class="contact-section">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-6 align-self-center pad-0">
                    <div class="form-section clearfix">
                        <h3>Create an account</h3>
                        <div class="btn-section clearfix">
                            <a href="<?php echo e(route('login')); ?>" class="link-btn active btn-1 default-bg">Login</a>
                            <a href="<?php echo e(route('register')); ?>" class="link-btn btn-2 active-bg">Register</a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- <form method="POST" action="<?php echo e(route('register')); ?>"> -->
                        <form method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group form-box">
                                <input id="name" type="text" class="input-text" name="name" value="<?php echo e(old('name')); ?>" autofocus placeholder="Full Name" required>
                                <?php if($errors->has('name')): ?>
                                    <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                        <strong class="text-danger"><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group form-box">
                                <input id="email" type="email" placeholder="Email Address" class="input-text" name="email" value="<?php echo e(old('email')); ?>" required>
                                <?php if($errors->has('email')): ?>
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group form-box">
                                <input type="hidden" class="input-text" name="refer" value="<?php echo e($referParam); ?>">
                            </div>
                            <div class="form-group form-box clearfix">
                                <input id="password" type="password" class="input-text" name="password" placeholder="Password (min: 6 characters)" required>
                                <?php if($errors->has('password')): ?>
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong class="text-danger"><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="" style="float: left; margin-top: -15px; margin-bottom: 20px; margin-left: 20px; font-size: 14px">
                                    <input type="checkbox" onclick="showPassword()" style="float: left;">Show Password
                                </label>
                            </div><div class="clearfix"></div>
                            <div class="form-group form-box clearfix">
                                <input class="input-text" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                            </div>

                            <p>
                                <h6>What do you want to do?</h6>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="role" required>
                                            <option selected> Choose... </option>
                                            <option value="seller"> Provide a service </option>
                                            <option value="buyer"> I'm looking for a service </option>
                                        </select>
                                    </div>
                                </div>
                            </p>
                            <p>
                            <div class="form-group form-box">
                            <h6>Where you referred by our agent?</h6>
                                <input id="agent_code" type="text" placeholder="Enter Agent Code (If Available)" class="input-text" name="agent_code" value="<?php echo e(old('agent_code')); ?>">
                                <?php if($errors->has('agent_code')): ?>
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong class="text-danger"><?php echo e($errors->first('agent_code')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            </p>
                            <p>
                                <label>
                                    <input type="checkbox" name="terms" class="filled-in" required/>
                                    <span>By registering you accept our <a href="<?php echo e(route('terms')); ?>" target="_blank" style="color: blue">Terms of Use</a> and <a href="<?php echo e(route('privacy')); ?>" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
                                </label>
                            </p>
                            <div class="form-group clearfix mb-0">
                                <button type="submit" class="btn-md btn-warning float-left">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 bg-color-15 align-self-center pad-0 p-3">
                    <?php if(isset($general_info->register_section_1_title)): ?>
                        <h6 class="text-center"> <?php echo e($general_info->register_section_1_title ? $general_info->register_section_1_title : ''); ?> </h6>
                        <hr>
                        <p>
                            <?php echo $general_info->register_section_1 ? $general_info->register_section_1 : ''; ?>

                        </p>
                    <?php endif; ?>
                    <!--h6 class="text-center">What I gain by joining Estate.ng</h6-->
                    <hr>
                    <?php if(isset($general_info->register_section_1_title)): ?>
                        <h6 class="text-center"> <?php echo e($general_info->register_section_2_title ? $general_info->register_section_2_title : ''); ?> </h6>
                        <hr>
                        <p>
                            <?php echo $general_info->register_section_2 ? $general_info->register_section_2 : ''; ?>

                        </p>
                    <?php endif; ?>

                    <hr>
                    <?php if(isset($general_info->register_section_2_title)): ?>
                        <h6 class="text-center"> <?php echo e($general_info->register_section_3_title ? $general_info->register_section_3_title : ''); ?> </h6>
                        <hr>
                        <p>
                            <?php echo $general_info->register_section_3 ? $general_info->register_section_3 : ''; ?>

                        </p>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('.refresh').click(function(){
            $.ajax({
                type:'GET',
                url:'refreshcaptcha',
                success:function(data){
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

<script>
    function showPassword() {
        var passField = document.getElementById("password");
        if (passField.type === "password") {
            passField.type = "text";
        } else {
            passField.type = "password";
        }
    }
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/auth/register.blade.php ENDPATH**/ ?>