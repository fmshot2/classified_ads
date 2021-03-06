
<!DOCTYPE html>
<html lang="en">



<?php echo $__env->make('layouts.frontend_partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

	<?php echo $__env->make('layouts.frontend_partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->make('layouts.frontend_partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
    <a href="#" data-toggle="modal" data-target="#launchFeedback" class="float-feedback  animate__animated animate__fadeInRight">
        <i class="fa fa-envelope"></i> Feedback
    </a>

    <style>
        .float-feedback{
            position:fixed;
            width:120px;
            height:50px;
            top:90px;
            right:0;
            background-color:#03A84E;
            color:#FFF;
            font-size: 14px;
            text-align:center;
            font-weight: 400 !important;
            box-shadow: 2px 2px 3px rgba(7, 7, 7, 0.493);
            padding: 15px 10px;
            border-bottom-left-radius: 50px;
            border-top-left-radius: 50px;
            z-index: 99999;
            transition: background-color 1s;
        }
        .float-feedback:hover{
            background-color:#0e8543;
            color: rgb(230, 227, 227);
        }
        .my-float{
            margin-top:22px;
        }

        .tabbing-box .nav-item .nav-link{
            border: 1px solid #CA8309;
            margin-right: 3px;
        }
        .tabbing-box .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #fff !important;
            border-radius: 50px !important;
            background: #CA8309  !important;
        }
        .tabbing-box .nav-tabs .nav-link:hover{
            border-radius: 50px !important;
            background: #CA8309  !important;
        }
        .agent-registration-modal .form-group label, .checkbox label {
            font-size: 14px !important;
            font-weight: 600 !important;
        }
        .agent-registration-modal .form-group input, .agent-registration-modal .form-group select {
            border-radius: 0;
            font-size: 14px !important;
        }

        thead tr th{
            font-size: 14px !important;
        }


        tbody tr td{
            font-size: 13px !important;
        }

        @media (max-width: 768px){
            .float-feedback{
                width:90px;
                height:30px;
                font-size: 11px;
                padding: 7px 10px;
                top:60px;
            }
            .tabbing-box .nav-item .nav-link{
                font-size: 12px;
            }
        }
    </style>

    <!-- Modal -->
    <div>
        <div id="launchAgentModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="text-transform: uppercase">Become our Agent</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        <div class="modal-body">
                            <div class="tabbing tabbing-box agent-registration-modal">
                                <ul class="nav nav-tabs" id="carTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#aboutAgent" role="tab" aria-controls="two" aria-selected="false">Who is an Agent?</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#agentRegister" role="tab" aria-controls="one" aria-selected="false" style="margin-left: 3px">Register Here</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="carTabContent">
                                    <div class="tab-pane fade active show" id="aboutAgent" role="tabpanel" aria-labelledby="one-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul>
                                                            <li>1.	When You Are Approved, You Will Receive Your Agent Code Which You Will Use For All Your Transactions, Referrals And Commission Payments.</li>
                                                            <li>2.	You Will Receive Your Commission Every Two Weeks.</li>
                                                            <li>3.	You Have A Chance Of Making At Minimum Income Of Between N50,000 To N100,000 Monthly.</li>
                                                            <li>4.	When You Are Approved, You Can Recruit People Under You (Sub-Agents) Or Refer Them To Us And When Anyone Subscribes You Get N100 Each.  We Will Issue To You A Daily Report On Your Sub-Agents And Activities. See Chart Below For Commission Scales.</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul>
                                                            <li>5.	You Can Work At Anytime You Want, Create Your Schedule Or Use This To Suppliment Your Income.</li>
                                                            <li>6.	You Can Make An Extra 20% On Any Other Adverts Request By Your Subscribers.  Say For An Example Your Subscriber Buys An Advert Of N100,000 A Month, You Will Make An Additional N20,000.00 Monthly. If That Advert Is For A Year You Will Make N240,000.00 On That Case Alone. If You Have Five Of Such In A Year It Is N24000 X 5= N1,200,000.00. Upon That You Will Still Get Commissions On Adverts And Your Recruits. We Estimated That A Good Agent Should Average N5,000,000.00  Yearly.</li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>WEEKLY SALES  BY YOU</th>
                                                                        <th>N200 EACH SALE</th>
                                                                        <th>YOUR  TOTAL RECRUITS</th>
                                                                        <th>1ST LEVEL N100</th>
                                                                        <th>2ND LEVEL</th>
                                                                        <th>N50</th>
                                                                        <th>TOTAL WEEKLY INCOME</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <tr>
                                                                        <td>50 X N200</td>
                                                                        <td>N10,000</td>
                                                                        <td>100 X 1 sell </td>
                                                                        <td>10,000</td>
                                                                        <td>100 X 50</td>
                                                                        <td>5000</td>
                                                                        <td>25,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>100 X N200</td>
                                                                        <td>N20,000</td>
                                                                        <td>200 X 1 sell</td>
                                                                        <td>20,000</td>
                                                                        <td>100 X 50</td>
                                                                        <td>5000</td>
                                                                        <td>45,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>50 X N200</td>
                                                                        <td>N40,000</td>
                                                                        <td>400 X 1 sell </td>
                                                                        <td>40,000</td>
                                                                        <td>200 X 50</td>
                                                                        <td>10,000</td>
                                                                        <td>90,000</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <p>
                                                            Efcontact Is A Product Which Anybody Can Sell From Home And Outdoor. Due To The Simplicity Of Enrolling Subscribers Online, By Phone Calls Or Visting Businesses. Our Experience Is That An Average Agent Shall Register 25 Subscribers Daily Or 150 Subscribers Weekly Working 6 Days A Work. <br> If An Agent Can Maintain This, It Will Result In Average Weekly Income Of N30,000.00, Plus Other Incomes From Sub-Agents And Advertisements By Subscribers Which Our Sales Handbook Will Explain More. <br>
                                                            All These The Agent Will Find On His/Her Own Dashboard- See Daily Income Displayed And Make Commission Withdrawals Request Online. Nothing Hidden And Very Transparent.

                                                        </p>
                                                    </div>


                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="agentRegister" role="tabpanel" aria-labelledby="two-tab">
                                        <div class="card">
                                            <div class="card-body">

                                                <form method="POST" action="<?php echo e(route('agent.register')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Your Full Name</label><small class="text-danger">*</small>
                                                                <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" autofocus placeholder="Full Name" required>
                                                                <?php if($errors->has('name')): ?>
                                                                    <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                        <strong class="text-danger"><?php echo e($errors->first('name')); ?></strong>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label class="form-label">Phone Number</label><small class="text-danger">*</small>
                                                                <input type="phone" placeholder="Phone Number" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" required>
                                                                <?php if($errors->has('phone')): ?>
                                                                    <span class="helper-text" data-error="wrong" data-success="right">
                                                                        <strong class="text-danger"><?php echo e($errors->first('phone')); ?></strong>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div> -->
                                                            <div class="form-group">
                                                                <label for="email">Email Address</label><small class="text-danger">*</small>
                                                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Your email address" required>
                                                            </div>

                                                         <!--    <div class="form-group">
                                                                <label class="form-label">Select your State</label><small class="text-danger">*</small>
                                                                <select class="form-control" required id="state" name="state" required>
                                                                    <option value="">-- Select State --</option>
                                                                    <?php if(isset($states)): ?>
                                                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($state->name); ?>"> <?php echo e($state->name); ?>  </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div> -->
                                                        </div>
                                                        <div class="col-md-6">
                                                           <!--  <div class="form-group">
                                                                <label class="form-label">LGA</label><small class="text-danger">*</small>
                                                                <select class="form-control" id="lgas" name="lga" required>
                                                                    <option disabled selected>- Select Local Government -</option>
                                                                </select>
                                                            </div> -->
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                  <!--   <div class="form-group">
                                                                        <label class="form-label" for="identification_type">Identification Type</label><small class="text-danger">*</small>
                                                                        <select class="form-control" name="identification_type" required>
                                                                            <option selected disabled>- Select an option -</option>
                                                                            <option value="national_id">National ID</option>
                                                                            <option value="driver_license">Driver License</option>
                                                                            <option value="voter_id">Voter's Card</option>
                                                                            <option value="international_passport">International Passport</option>
                                                                        </select>
                                                                    </div> -->
                                                                </div>
                                                                <div class="col-md-5">
                                                                  <!--   <div class="form-group">
                                                                        <label class="form-label">ID Number</label><small class="text-danger">*</small>
                                                                        <input type="text" class="form-control" name="identification_id" value="<?php echo e(old('identification_id')); ?>" placeholder="ID Number" required>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Choose Password</label><small class="text-danger">*</small>
                                                                <input type="password" class="form-control" name="password" placeholder="Password (min: 6 characters)" required>
                                                                <?php if($errors->has('password')): ?>
                                                                <span class="helper-text" data-error="wrong" data-success="right">
                                                                    <strong class="text-danger"><?php echo e($errors->first('password')); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Confirm Password</label><small class="text-danger">*</small>
                                                                <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                                                            </div>
                                                        </div>

                                                      <!--   <div class="col-md-12">
                                                            <label>
                                                                <input type="checkbox" name="terms" class="filled-in" required/>
                                                                <span>By registering you accept our <a href="<?php echo e(route('terms')); ?>" target="_blank" style="color: blue">Terms of Use</a> and <a href="<?php echo e(route('privacy')); ?>" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
                                                            </label>
                                                        </div> -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-lg btn-warning pull-right text-white">Register</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-md btn-default text-dark" data-dismiss="modal">Close</button>
                        </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="launchFeedback" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Do you have a feedback for us?</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="feedbackForm" action="<?php echo e(route('feedback.form')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea name="userfeedback" id="userfeedback" class="form-control" cols="30" rows="5" placeholder="Tell us your experience on this site..." style="border-radius: 0"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="submitFeedback()" class="btn btn-warning" data-dismiss="modal">Send</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        function submitFeedback() {
            $.ajax({
                url: '/user-feedback',
                type: 'post',
                dataType: 'json',
                data: $('form#feedbackForm').serialize(),
                success: function(data) {
                    $('#userfeedback').val('')
                    toastr.success('Feedback sent! Thank You.')
                },
                error: function(error){
                    toastr.error('Feedback not sent! Try again.')
                    console.log(error)
                }
            });
        }
    </script>
    

    <?php if(Session::has('message')): ?>
        <script>
            var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
            switch(type){
                case 'info':
                    toastr.info("<?php echo e(Session::get('message')); ?>");
                    break;

                case 'warning':
                    toastr.warning("<?php echo e(Session::get('message')); ?>");
                    break;

                case 'success':
                    toastr.success("<?php echo e(Session::get('message')); ?>");
                    break;

                case 'error':
                    toastr.error("<?php echo e(Session::get('message')); ?>");
                    break;
            }
        </script>
    <?php endif; ?>


	<a id="page_scroller" href="#scroll-top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-chevron-up"></i></a>


    <script>
        $('#state').on('change',function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type:"GET",
                    url: '/api/get-city-list/'+stateID,
                    success:function(res){
                        if(res){
                            $("#lgas").empty();
                            $.each(res,function(key,value){
                                $("#lgas").append('<option value="'+value+'">'+value+'</option>');
                            });

                        }else{
                            $("#lgas").empty();
                        }
                    }
                });
            }else{
                $("#lgas").empty();
            }
        });
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/layouts/app.blade.php ENDPATH**/ ?>