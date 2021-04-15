
@extends('layouts.app')
@section('title', 'Register | ')

@section('content')
<style>
    /* Style the form */
    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 0;
    }
    .form-control {
        padding-left: 15px !important;
        border-radius: 0;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }

    .form-group label{
        text-align: left !important;
    }
    .contact-section .form-section {
        text-align: unset;
    }
    .contact-section .form-section h3, .form-section .btn {
        text-align: center;
    }
    .contact-section .form-section h3 {
        text-transform: uppercase;
        font-weight: 600
    }

    .tab .tabs-title{
        font-weight: 600
    }
    .tab .col-md-6 h5{
        font-weight: 600;
        font-size: 17px;
    }

    #submitBtn{
        display: none;
    }
    .tabActionBtn{
        width: 100%; display: flex; justify-content: flex-end;
    }
    .input-group-addon{
        border: 1px solid #ced4da;
        background-color: #fff;
        padding: .375rem .75rem;
        cursor: pointer;
    }

    @media(max-width: 768px){
        .contact-section .form-section h3 {
            font-weight: 600;
            font-size: 16px;
        }
        .tab .tabs-title{
            font-weight: 600;
            font-size: 14px;
        }
        .form-group .form-label {
            font-size: 13px !important;
        }

        .tabActionBtn{
            flex-direction: column;
            justify-content: center;

        }
        .tabActionBtn button{
            text-align: center;
            margin-bottom: 10px;
            width: 100%;
            margin: 10px 0;
        }
    }

</style>

    <div class="contact-section">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-12 align-self-center pad-0">
                    <div class="form-section clearfix">
                        <h3>Complete Your Agent Registration Here</h3>

                        <div class="clearfix"></div>

                           <!--  <form method="POST" action="{{ route('agent_Complete_Reg') }}">
                                @csrf

                                <div class="tab">
                                    <h4 class="tabs-title">Personal Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Your Full Name</label>
                                                        <input type="text" class="form-control" readonly name="name" value="{{ $agent_name }}" autofocus placeholder="Full Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email">Email Address</label>
                                                        <input type="email" readonly class="form-control" name="email" value="{{ $agent_email }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label class="form-label">Phone</label><small class="text-danger">*</small>
                                                       <input type="number" placeholder="Phone Number" class="form-control" name="phone" value="{{ old('phone') }}">
                                                       @if ($errors->has('phone'))
                                                           <span class="helper-text" data-error="wrong" data-success="right">
                                                               <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                                           </span>
                                                       @endif
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="identification_type">Identification Type</label><small class="text-danger">*</small>
                                                        <select class="form-control" name="identification_type">
                                                            <option selected disabled>- Select an option -</option>
                                                            <option value="national_id">National ID</option>
                                                            <option value="driver_license">Driver License</option>
                                                            <option value="voter_id">Voter's Card</option>
                                                            <option value="international_passport">International Passport</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label><small class="text-danger">*</small>
                                                        <select class="form-control" id="state" name="state">
                                                            <option value="">-- Select State --</option>
                                                            @if(isset($states))
                                                                @foreach($states as $state)
                                                                    <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Local Government</label><small class="text-danger">*</small>
                                                        <select class="form-control" id="city" name="city">
                                                            <option disabled selected>- Select a State -</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label class="form-label">Address</label><small class="text-danger">*</small>
                                                       <input type="text" class="form-control" name="address" placeholder="Enter House Address">
                                                       @if ($errors->has('address'))
                                                        <span class="helper-text" data-error="wrong" data-success="right">
                                                           <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                                        </span>
                                                       @endif
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">ID Number</label><small class="text-danger">*</small>
                                                        <input type="text" class="form-control" name="identification_id" value="{{ old('identification_id') }}" placeholder="ID Number" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <h5>Your Bank Details</h5>
                                                <div class="form-group">
                                                   <label class="form-label">Bank Name</label><small class="text-danger">*</small>
                                                   <input type="text" placeholder="Bank Name" class="form-control" name="bankname" value="{{ old('bankname') }}">
                                                   @if ($errors->has('bankname'))
                                                       <span class="helper-text" data-error="wrong" data-success="right">
                                                           <strong class="text-danger">{{ $errors->first('bankname') }}</strong>
                                                       </span>
                                                   @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label class="form-label">Bank Account Name</label><small class="text-danger">*</small>
                                                  <input type="text" placeholder="Account Name" class="form-control" name="accountname" value="{{ old('accountname') }}">
                                                  @if ($errors->has('accountname'))
                                                      <span class="helper-text" data-error="wrong" data-success="right">
                                                          <strong class="text-danger">{{ $errors->first('accountname') }}</strong>
                                                      </span>
                                                  @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <label class="form-label">Bank Account Number</label><small class="text-danger">*</small>
                                                   <input type="number" placeholder="Account Name" class="form-control" name="accountno" value="{{ old('accountno') }}">
                                                   @if ($errors->has('accountno'))
                                                       <span class="helper-text" data-error="wrong" data-success="right">
                                                           <strong class="text-danger">{{ $errors->first('accountno') }}</strong>
                                                       </span>
                                                   @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Choose Password</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Password</label><small class="text-danger">*</small>
                                                        <div class="input-group">
                                                            <input type="password" id="password" class="form-control" name="password" placeholder="Password (min: 6 characters)">
                                                            <button onclick="showPassword()" type="button" class="input-group-addon"><i class="fa fa-eye"></i></button>
                                                        </div>
                                                        @if ($errors->has('password'))
                                                        <span class="helper-text" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Confirm Password</label><small class="text-danger">*</small>
                                                        <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <label>
                                                <span class="text-success">You will be redirected to GTPAY to make your Agent Fee of <strong style="color: rgb(187, 84, 84)">&#8358;500</strong> only.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Circles which indicates the steps of the form: -->
                            <!--     <div style="text-align:center;margin-top:30px;margin-bottom:20px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>

                                <div class="tabActionBtn">
                                    <div>
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-md btn-info">Previous</button>
                                        <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-md btn-warning text-white">Next</button>
                                        <button type="submit" id="submitBtn" class="btn btn-md btn-warning text-white">Click To Make Payment</button>
                                    </div>
                                </div>
                            </form> -->
                            @livewire('agent.register', ['agent_email' => $agent_email, 'agent_name' => $agent_name])

                    </div>
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


    function showPassword() {
        var passField = document.getElementById("password");
        if (passField.type === "password") {
            passField.type = "text";
        } else {
            passField.type = "password";
        }
    }




    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        // document.getElementById("nextBtn").innerHTML = "Click To Make Payment";
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("submitBtn").style.display = "inline-block";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
        document.getElementById("nextBtn").style.display = "inline-block";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
    }

    function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
    }

    function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false:
        valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
    }

    function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
    }




 </script>
@endsection
