
<!DOCTYPE html>
<html lang="en">

@include('layouts.frontend_partials.head')

<body>

	@include('layouts.frontend_partials.navbar')
    <!-- @include('layouts.frontend_partials.status') -->


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
                        <h5 class="modal-title text-white" style="text-transform: uppercase">Agent Info</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #fff">&times;</button>
                    </div>
                        <div class="modal-body">
                            <div class="tabbing tabbing-box agent-registration-modal">
                                <ul class="nav nav-tabs" id="carTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#aboutAgent" role="tab" aria-controls="two" aria-selected="false">Agent Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#agentRegister" role="tab" aria-controls="one" aria-selected="false" style="margin-left: 3px">Request Form</a>
                                    </li>
                                     <li class="nav-item">
                                        <a class="nav-link" id="three-tab" data-toggle="tab" href="#agentBenefit" role="tab" aria-controls="three" aria-selected="false" style="margin-left: 3px">Agent Benefits</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="carTabContent">
                                    <div class="tab-pane fade active show" id="aboutAgent" role="tabpanel" aria-labelledby="one-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                {{-- <p>An Efcontact Agent is anyone who wishes to make extra cash via the EFContact Platform by becoming a promoter of the EFContact platform.</p> --}}

                                                {{-- <h4>How it works</h4> --}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul>
                                                            {{-- <li>1. After registering as an agent with the sum of &#8358;500 which is the agent fee</li>
                                                            <li>2.	When You Are Approved, You Will Receive Your Agent Code Which You Will Use For All Your Transactions, Referrals And Commission Payments.</li>
                                                            <li>2.	You Will Receive Your Commission Every Two Weeks.</li>
                                                            <li>3.	You Have A Chance Of Making At Minimum Income Of Between &#8358;50,000 To &#8358;100,000 Monthly.</li>
                                                            <li>4.	When You Are Approved, You Can Recruit People Under You (Sub-Agents) Or Refer Them
                                                                To Us And When Anyone Subscribes You Get &#8358;100 Each.  We Will Issue To You A Daily Report On Your Sub-Agents And
                                                                 Activities. See Chart Below For Commission Scales.</li> --}}

                                                            <li>We are happy to work with you and offer to you one of the best marketing careers in the country, where you have an opportunity to make millions of Naira yearly.</li>
                                                            <li><strong>Note:</strong> The registration to be an agent on EFContact will attract a fee of <strong>&#8358;500.</strong></li>
                                                            <li>To become our agent, you will be required to fill out the form below and be accepted by the company. When we receive your online request, a reference code and another form would be sent to you to finalize your application.</li>
                                                            <li>EFContact provides an opportunity for a part-time agent to make on average &#8358;50,000.00 monthly and a full time agent to make on average &#8358;100,000.00  or monthly. On top of your basic commission, there are other incentives which may generate millions of Naira to you yearly.</li>
                                                            <li>When you are approved, you will receive your agent code and a dashboard. The dashboard is where all your activities and daily income are displayed.  We pay commissions weekly not monthly.  You will also be able to refer people to
                                                                market the EFcontact and make extra money on top of your own sales. If you are interested please click <a  id="two-tab" data-toggle="tab" href="#agentRegister" role="tab" aria-controls="one" aria-selected="false" href="#" style="color: #cc8a19; font-weight: 700">HERE</a> :</li>
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
                                                                <label for="email">Email Address</label><small class="text-danger">*</small> <small class="text-success">(A Link Will Be Sent To Your Email Address To Complete Your Registration)</small>
                                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                                                placeholder="Enter A Valid Email Address" required>
                                                                @if ($errors->has('email'))
                                                                <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="phone">Phone Number</label>
                                                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                                                placeholder="Enter Your Phone Number" required>
                                                                @if ($errors->has('phone'))
                                                                <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="submit" class="btn btn-lg btn-warning text-white">Submit</button>
                                                                    <!-- <small class="">Or,
                                                                        <a type="submit" class="text-success">CLICK HERE</a> To Resend Link</small> -->
                                                                </div>
                                                            </div>
                                                            <div style="margin-top: 20px;">
                                                                <div class="col-md-12">
                                                                    <small class="text-danger">Please, If You Are Not Contacted In Ten Days after Your Request
                                                                        , Kindly Contact Us Again At, <a href="mailto:agent@efcontact.com">agent@efcontact.com</a>
                                                                        or call <a href="tel:{{ $general_info->hot_line ? $general_info->hot_line : '' }}">{{ substr($general_info->hot_line,0,4).'-'.substr($general_info->hot_line,4,3).'-'.substr($general_info->hot_line,7,5) }}</a>
                                                                        When you send this contact, kindly indicate the day of your first request or the reference code sent to you
                                                                        . Be aware that the position
                                                                        is limited per state so rush your application
                                                                         soonest before the positions are filled.
                                                                        </small>
                                                                    {{-- <small class="text-danger">Did Not Recieve Link,
                                                                        <a href="">CLICK HERE</a> To Resend</small> --}}
                                                                </div>
                                                                <div style="margin-top: 20px;">
                                                                    <ul style="list-style: none">


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="agentBenefit" role="tabpanel" aria-labelledby="three-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            {!! $pages_contents->benefit_of_efcontact ? $pages_contents->benefit_of_efcontact : '' !!}
                                                    </div>

                                                </div>
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
                            <textarea name="userfeedback" id="userfeedback" class="form-control" cols="30" rows="5" placeholder="Tell us your experience on this website..." style="border-radius: 0"></textarea>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('agent-reg-success'))
    <script>
        Swal.fire({
            title: 'Thank you!',
            html: "{!! Session::get('agent-reg-success') !!}",
            icon: 'success',
            confirmButtonText: 'Close'
        })
    </script>
@endif




    @yield('script')


    {{-- livewirescript --}}
    @livewireScripts



</body>

</html>
