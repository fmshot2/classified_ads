
<!DOCTYPE html>
<html lang="en">



@include('layouts.frontend_partials.head')

<body>

	@include('layouts.frontend_partials.navbar')

		@yield('content')

	@include('layouts.frontend_partials.footer')


    {{-- FEEDBACK MODULE  --}}
    <a href="#" data-toggle="modal" data-target="#launchFeedback" class="float-feedback  animate__animated animate__fadeInRight">
        <i class="fa fa-envelope"></i> Feedback
    </a>

    <style>
        h1, h2, h3, h5, h6{
            font-family: Poppins-Regular !important;
        }
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

        ul li{
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
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <h5 class="modal-title text-white" style="text-transform: uppercase">Become our Agent</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #fff">&times;</button>
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
                                                <p>An Efcontact Agent is anyone who wishes to make extra cash via the EFContact Platform by becoming a promoter of the EFContact platform.</p>

                                                <h4>How it works</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul>
                                                            <li>1. After registering as an agent with the sum of &#8358;500 which is the agent fee</li>
                                                            <li>2.	When You Are Approved, You Will Receive Your Agent Code Which You Will Use For All Your Transactions, Referrals And Commission Payments.</li>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="agentRegister" role="tabpanel" aria-labelledby="two-tab">
                                        <div class="card">
                                            <div class="card-body">

                                                <form method="POST" action="{{ route('agent.register') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Your Full Name</label><small class="text-danger">*</small>
                                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name" required>
                                                                @if ($errors->has('name'))
                                                                    <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email Address</label> <small class="text-success">Please Click The Verification
                                                                    Link In Your Email To Complete Your Registration</small>
                                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                                                placeholder="Your email address" required>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="submit" class="btn btn-lg btn-warning text-white">Submit</button>
                                                                </div>
                                                            </div>
                                                            <div style="margin-top: 20px;">
                                                                <div class="col-md-12">
                                                                    <small class="text-danger">If You Do Not Recieve A Verification Link In Your Email In The Next 10 Minutes, Please Contact Us Via Any of The Following Means:</small>
                                                                    <small class="text-danger">Did Not Recieve Link, <a href="">CLICK HERE</a> To Resend</small>
                                                                </div>
                                                                <div style="margin-top: 20px;">
                                                                    <ul style="list-style: none">
                                                                        <li>Call Us: 090123456789</li>
                                                                        <li>Whatsapp Us: 090123456789</li>
                                                                        <li>Email: support@efcontact.com</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
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
                            <button type="button" class="btn btn-md" data-dismiss="modal" style="background-color: #cc8a19; color: #fff">Close</button>
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
                <form id="feedbackForm" action="{{ route('feedback.form') }}" method="POST">
                    @csrf
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
    {{--//... FEEDBACK MODULE  --}}

    @if(Session::has('message'))
        <script>
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        </script>
    @endif


	<a class="scrollToTopBtn" id="page_scroller" style="position: fixed; z-index: 2147483647;"><i class="fa fa-chevron-up"></i></a>


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


        $(function() {
            document.addEventListener("scroll", handleScroll);
            // get a reference to our predefined button
            var scrollToTopBtn = document.querySelector(".scrollToTopBtn");

            function handleScroll() {
                var scrollableHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                var GOLDEN_RATIO = 0.5;

                if ((document.documentElement.scrollTop / scrollableHeight ) > GOLDEN_RATIO) {
                    //show button
                    scrollToTopBtn.style.display = "block";
                } else {
                    //hide button
                    scrollToTopBtn.style.display = "none";
                }
            }

            scrollToTopBtn.addEventListener("click", scrollToTop);

            function scrollToTop() {
                // window.scrollTo({
                //     top: 0,
                //     behavior: "smooth"
                // });

                $('body').animate({ scrollTop: top }, {duration: 2000});
            }
        });
    </script>

</body>

</html>
