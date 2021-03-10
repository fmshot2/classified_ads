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

    @media (max-width: 768px){
        .col-lg-12.col-md-12.col-xs-12{
            padding-left: 0 !important;
            padding-right: 0 !important;
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
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, sequi. Enim obcaecati veniam voluptate, ipsa id error expedita asperiores molestias adipisci at omnis! Et, officiis doloremque repellat minus ad facilis possimus, cupiditate sit aliquid libero magnam, facere ab? Dignissimos eaque, sit expedita sapiente in aliquam perferendis eligendi ex pariatur consequatur molestias? Distinctio ea itaque doloribus eius vitae asperiores, ipsum harum maxime molestiae alias, aut ducimus modi. Rem voluptas animi consequuntur eos odio assumenda similique consectetur excepturi molestias soluta. Veritatis quod dignissimos excepturi repudiandae ad doloremque iste enim inventore eius eos voluptatum, expedita harum, modi reiciendis temporibus minima dolores?
                                            </div>

                                            <hr>
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
                                                            <label for="password_confirmation">Choose a Password</label>
                                                            <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>What do you want to do?</h6>
                                                        <div class="form-group">
                                                            <select class="form-control custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="role" required>
                                                                <option selected> Choose... </option>
                                                                <option value="seller"> Provide a service </option>
                                                                <option value="buyer"> I'm looking for a service </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            <input type="checkbox" name="terms" class="filled-in" required/>
                                                            <span>By registering you accept our <a href="{{route('terms')}}" target="_blank" style="color: blue">Terms of Use</a> and <a href="{{route('privacy')}}" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
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
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, sequi. Enim obcaecati veniam voluptate, ipsa id error expedita asperiores molestias adipisci at omnis! Et, officiis doloremque repellat minus ad facilis possimus, cupiditate sit aliquid libero magnam, facere ab? Dignissimos eaque, sit expedita sapiente in aliquam perferendis eligendi ex pariatur consequatur molestias? Distinctio ea itaque doloribus eius vitae asperiores, ipsum harum maxime molestiae alias, aut ducimus modi. Rem voluptas animi consequuntur eos odio assumenda similique consectetur excepturi molestias soluta. Veritatis quod dignissimos excepturi repudiandae ad doloremque iste enim inventore eius eos voluptatum, expedita harum, modi reiciendis temporibus minima dolores?
                                            </div>

                                            <hr>
                                            <h5 style="text-transform: uppercase; padding-bottom: 5px;">Register Here</h5>
                                            <form method="POST" action="{{ route('agent.register') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
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
                                                            <label class="form-label">Phone Number</label><small class="text-danger">*</small>
                                                            <input type="phone" placeholder="Phone Number" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                                            @if ($errors->has('phone'))
                                                                <span class="helper-text" data-error="wrong" data-success="right">
                                                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email Address</label><small class="text-danger">*</small>
                                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your email address" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Select your State</label><small class="text-danger">*</small>
                                                            <select class="form-control" required id="state" name="state" required>
                                                                <option value="">-- Select State --</option>
                                                                @if(isset($states))
                                                                    @foreach($states as $state)
                                                                        <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">LGA</label><small class="text-danger">*</small>
                                                            <select class="form-control" id="lgas" name="lga" required>
                                                                <option disabled selected>- Select Local Government -</option>
                                                            </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="identification_type">Identification Type</label><small class="text-danger">*</small>
                                                                    <select class="form-control" name="identification_type" required>
                                                                        <option selected disabled>- Select an option -</option>
                                                                        <option value="national_id">National ID</option>
                                                                        <option value="driver_license">Driver License</option>
                                                                        <option value="voter_id">Voter's Card</option>
                                                                        <option value="international_passport">International Passport</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label class="form-label">ID Number</label><small class="text-danger">*</small>
                                                                    <input type="text" class="form-control" name="identification_id" value="{{ old('identification_id') }}" placeholder="ID Number" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Choose Password</label><small class="text-danger">*</small>
                                                            <input type="password" class="form-control" name="password" placeholder="Password (min: 6 characters)" required>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
