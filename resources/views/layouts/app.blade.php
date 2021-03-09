
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

        @media (max-width: 768px){
            .float-feedback{
                width:90px;
                height:30px;
                font-size: 11px;
                padding: 7px 10px;
                top:60px;
            }
        }
    </style>

    <style>
        .tabbing-box .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #fff !important;
            border-radius: 50px !important;
            background: #FFC107 !important;
        }
        .tabbing-box .nav-tabs .nav-link:hover{
            border-radius: 50px !important;
        }
        .agent-registration-modal .form-group label, .checkbox label {
            font-size: 14px !important;
            font-weight: 600 !important;
        }
        .agent-registration-modal .form-group input, .agent-registration-modal .form-group select {
            border-radius: 0;
            font-size: 14px !important;
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
                    <form method="POST" action="{{ route('register') }}">
                        <div class="modal-body">
                            <div class="tabbing tabbing-box agent-registration-modal">
                                <ul class="nav nav-tabs" id="carTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#aboutAgent" role="tab" aria-controls="two" aria-selected="false">Who is an Agent?</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#agentRegister" role="tab" aria-controls="one" aria-selected="false">Register Here</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="carTabContent">
                                    <div class="tab-pane fade active show" id="aboutAgent" role="tabpanel" aria-labelledby="one-tab">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                        @if(isset($general_info->register_section_1_title))
                                                            <h6 class="text-center"> Who is An EFContact Agent? </h6>
                                                            <hr>
                                                            <p>
                                                                An Efcontact Agent is anyone who wishes to make extra cash via the EFContact Platform by becoming a promoter of the EFContact platform.
                                                            </p>
                                                        @endif

                                                        <hr>
                                                        @if(isset($general_info->register_section_1_title))
                                                            <h6 class="text-center"> Are EFContact Agents paid? </h6>
                                                            <hr>
                                                            <p>
                                                                Yes. For each person that registers <span class="text-danger"> AND CREATES A SERVICE </span> using your agent code, you will recieve the sum of 100 NGN
                                                            </p>
                                                            <small class="text-danger">Note: The Person MUST create A Valid Service For You To Be Eligible For Payment</small>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if(isset($general_info->register_section_2_title))
                                                            <h6 class="text-center"> How Do I Get To Become An Agent? </h6>
                                                            <hr>
                                                            <p>
                                                                To become an agent, visit <a class="text-warning" id="two-tab" data-toggle="tab" href="#agentRegister">EFContact Registration Page</a> and click on <a class="text-warning" href="#agentRegister" id="two-tab" data-toggle="tab">"Be Our Agent"</a>
                                                            </p>
                                                        @endif
                                                        @if(isset($general_info->register_section_2_title))
                                                            <h6 class="text-center"> How Can I learn More About This? </h6>
                                                            <hr>
                                                            <p>
                                                                To learn more about an agents and payments, please visit <a class="text-warning" href="www.efcontact.com/faq">EFContact FAQ Page</a> or call <a href="tel:123-456-7890">090- 123-456-7890</a>
                                                            </p>
                                                        @endif
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="agentRegister" role="tabpanel" aria-labelledby="two-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Your Full Name</label><small class="text-danger">*</small>
                                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name" required>
                                                            @if ($errors->has('name'))
                                                                <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Phone Number</label><small class="text-danger">*</small>
                                                            <input id="phone" type="phone" placeholder="Phone Number" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                                            @if ($errors->has('phone'))
                                                                <span class="helper-text" data-error="wrong" data-success="right">
                                                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email Address</label>
                                                            <input type="email" class="form-control" id="email" value="{{ old('email') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Mode of Identification</label><small class="text-danger">*</small>
                                                            <small class="form-text text-muted" style="margin-top: -10px">Upload Driver's Licence, National ID or Voter's Card</small>
                                                            <input id="add" type="file"  class="form-control" name="file" required>
                                                            @if ($errors->has('file'))
                                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('file') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Select your State</label><small class="text-danger">*</small>
                                                            <select class="form-control" required id="state" name="state" required>
                                                                <option value="">-- Select State --</option>
                                                                @if(isset($states))
                                                                    @foreach($states as $state)
                                                                        <option id="state" value="{{$state->name}}"> {{ $state->name }}  </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">LGA</label><small class="text-danger">*</small>
                                                            <select class="form-control" id="city" name="city" required>
                                                                <option disabled selected>- Select Local Government -</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Choose Password</label><small class="text-danger">*</small>
                                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password (min: 6 characters)" required>
                                                            @if ($errors->has('password'))
                                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Confirm Password</label><small class="text-danger">*</small>
                                                            <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label>
                                                            <input type="checkbox" name="terms" class="filled-in" required/>
                                                            <span>By registering you accept our <a href="{{route('terms')}}" target="_blank" style="color: blue">Terms of Use</a> and <a href="{{route('privacy')}}" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Create Account</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
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


	<a id="page_scroller" href="#scroll-top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-chevron-up"></i></a>

</body>

</html>
