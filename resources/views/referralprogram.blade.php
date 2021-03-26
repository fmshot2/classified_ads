@extends('layouts.app')
@section('title', 'Referral Program | ')
@section('content')

<style>
    .btn-warning{
        background-color: #CA8309 !important
    }
    .btn-warning:hover{
        background-color: #f5a824 !important;
        cursor: pointer;
    }
    .card-body h5{
        font-family: Poppins-Regular;
        font-weight: 600;
        font-size: 18px;
        margin-top: 10px
    }
    .card-body p{
        font-size: 15px;
    }
    .tabbing-box .card-body ul{
        list-style-type: disc;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 40px;
    }

    @media (max-width: 768px){
        .col-lg-12.col-md-12.col-xs-12{
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        ul div img{
            width: 100%;
        }
    }
</style>

<div class="main">
    <div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/allcatbg.jpeg')}});">
        <div class="container">
            <div class="page-name">
                <div class="sub-banner-text-content">
                    <h1>Referral Program</h1>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><span>/</span>Referral Program</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="properties-section-body content-area categories-pg-section">
        <div class="service-detail-container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <!-- grid properties start -->
                    <div class="services-2 categories-pg-area content-area-5 bg-grea-3">
                        <div class="tabbing tabbing-box agent-registration-modal">
                            <ul class="nav nav-tabs" id="carTab" role="tablist" style="padding: 10px;">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#aboutreferral" role="tab" aria-controls="two" aria-selected="false">Referral Program</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="two-tab" data-toggle="tab" href="#efagent" role="tab" aria-controls="one" aria-selected="false" style="margin-left: 3px">EFContact Agent</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="carTabContent" style="padding-left: 10px; padding-right: 10px">
                                <div class="tab-pane fade active show" id="aboutreferral" role="tabpanel" aria-labelledby="one-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div style="padding-bottom: 30px;">
                                                <p>Get rewarded up to N50 for every person you refer to register on EFContact.com</p>
                                                <ul style="list-style: none">
                                                    <li>* No referral limits - You can refer as many people as you want.</li>
                                                    <li>* Bonus credited instantly - You will receive your bonus immediately once your friend completes the registration.</li>
                                                </ul>

                                                <h6>How do I get started?</h6>
                                                <ul style="list-style: none">
                                                    <li>* Register your account - You don't need to have a service or product to sell before you can register on EFContact, you can also register as "Looking for a service" and you will get your referral link and start earning.</li>
                                                    <li>* Fill the registration form</li>
                                                    <li>* Payment - If you register as a "Service provider", you will be redirected to our secured payment page where you will pay a sum of N200 for 1 Month subscription, or N1200 for 6 Months subscription, or 2400 for 1-year subscription.</li>
                                                </ul>
                                                <p><strong>Note that this step does not apply to you if you register as "Looking for a service"</strong></p>

                                                <h6>How do I refer people to register on EFContact?</h6>
                                                <p>Once your registration is complete, you can follow the steps below to refer people to register.</p>

                                                <ul style="list-style: none">
                                                    <li><strong>Step 1.</strong> Get your referral link - Log in to your efcontact.com account and navigate to your dashboard</li>
                                                    <div style="width: 100%; margin-bottom: 20px"><img src="{{ asset('referbtn.jpg') }}" alt=""></div>
                                                    <li><strong>Step 2.</strong> Copy your referral link</li>
                                                    <div style="width: 100% margin-bottom: 20px"><img src="{{ asset('referlink.jpg') }}" alt=""></div>
                                                </ul>
                                                <p><strong>Now you can share your referral link on WhatsApp, Facebook, Twitter or anywhere</strong></p>

                                                <h6>How do I get paid?</h6>
                                                <p>You will get a notification on your dashboard once your earning has reached the withdrawal threshold</p>

                                                <h6>How much is the minimum earning threshold?</h6>
                                                <p>N1000 is the minimum earning threshold and you can withdraw only on any Friday. <br> For more information about our Referral Program, send us an email at info@efcontact.com</p>
                                                <p>What are you waiting for? Fill the form below and start earning</p>
                                            </div>

                                            <h5 style="text-transform: uppercase; padding-bottom: 5px;">Create Account</h5>
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-box">
                                                            <label for="name">Your Full Name</label>
                                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name" required>
                                                            @if ($errors->has('name'))
                                                                <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-box">
                                                            <label for="email">Your Email Address</label>
                                                            <input id="email" type="email" placeholder="Email Address" class="form-control" name="email" value="{{ old('email') }}" required>
                                                            @if ($errors->has('email'))
                                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-box clearfix">
                                                            <label for="password">Choose a Password</label>
                                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password (min: 6 characters)" required>
                                                            @if ($errors->has('password'))
                                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-box clearfix">
                                                            <label for="password_confirmation">Confirm Password</label>
                                                            <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                                                        </div>
                                                    </div>

                                                    <select hidden class="form-control custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="role" required>
                                                        <option value="seller" selected> Provide a service </option>
                                                    </select>

                                                    <div class="col-md-6">
                                                        @if(!$referParam)
                                                            <div class="form-group form-box">
                                                                <label>Where you referred by our agent?</label>
                                                                <input id="agent_code" type="text" placeholder="Enter Agent Code (Optional)" class="form-control" name="agent_code" value="{{ old('agent_code') }}">
                                                                @if ($errors->has('agent_code'))
                                                                    <span class="helper-text" data-error="wrong" data-success="right">
                                                                        <strong class="text-danger">{{ $errors->first('agent_code') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6" style="margin-top: 20px">
                                                        <label>
                                                            <input type="checkbox" name="terms" class="filled-in" required/>
                                                            <span>By registering you accept our <a href="{{route('terms-of-use')}}" target="_blank" style="color: blue">Terms of Use</a> and <a href="{{route('privacy-policy')}}" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix mb-0">
                                                    <button type="submit" class="btn-md btn-warning float-right">Create Account</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="efagent" role="tabpanel" aria-labelledby="two-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div style="padding-bottom: 30px;">
                                                <p>An Efcontact Agent is anyone who wishes to make extra cash via the EFContact Platform by becoming a promoter of the EFContact platform.</p>

                                                <h5>How it works</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul style="list-style: none">
                                                            <li>1.	When You Are Approved, You Will Receive Your Agent Code Which You Will Use For All Your Transactions, Referrals And Commission Payments.</li>
                                                            <li>2.	You Will Receive Your Commission Every Two Weeks.</li>
                                                            <li>3.	You Have A Chance Of Making At Minimum Income Of Between N50,000 To N100,000 Monthly.</li>
                                                            <li>4.	When You Are Approved, You Can Recruit People Under You (Sub-Agents) Or Refer Them To Us And When Anyone Subscribes You Get N100 Each.  We Will Issue To You A Daily Report On Your Sub-Agents And Activities. See Chart Below For Commission Scales.</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul style="list-style: none">
                                                            <li>5.	You Can Work At Anytime You Want, Create Your Schedule Or Use This To Suppliment Your Income.</li>
                                                            <li>6.	You Can Make An Extra 20% On Any Other Adverts Request By Your Subscribers.  Say For An Example Your Subscriber Buys An Advert Of N100,000 A Month, You Will Make An Additional N20,000.00 Monthly. If That Advert Is For A Year You Will Make N240,000.00 On That Case Alone. If You Have Five Of Such In A Year It Is N24000 X 5= N1,200,000.00. Upon That You Will Still Get Commissions On Adverts And Your Recruits. We Estimated That A Good Agent Should Average N5,000,000.00  Yearly.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <h5 style="text-transform: uppercase; padding-bottom: 5px;">Register Here</h5>
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
                                                            <label for="email">Email Address</label><small class="text-danger">*</small> <small class="text-success">(A Link Will Be
                                                                Sent To Your Email Address To Complete Your Registration)</small>
                                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                                            placeholder="Enter A Valid Email Address" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">Phone Number</label>
                                                            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                                            placeholder="Enter Your Phone Number" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-lg btn-warning text-white">Submit</button>
                                                                <small class="">Or,
                                                                    <a href="#" class="text-success">CLICK HERE</a> To Resend Link</small>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 20px;">
                                                            <div class="col-md-12">
                                                                <small class="text-danger">Please, If You Are Not Contacted In Ten Days after Your Request
                                                                    , Kindly Contact Us Again At, <a href="mailto:agent@efcontact.com">agent@efcontact.com</a>
                                                                    or call <a href="tel:08091114444">08091114444</a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
