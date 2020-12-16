
@extends('layouts.app')
@section('title')
Register
@endsection
@section('content')

<!-- Contact section start -->
<div class="contact-section">

    <div class="container">
        <div class="row login-box">
            <div class="col-lg-6 align-self-center pad-0">
                <div class="form-section clearfix">
                    <h3>Create an account</h3>
                    <div class="btn-section clearfix">
                        <a href="{{route('login')}}" class="link-btn active btn-1 default-bg">Login</a>
                        <a href="{{route('register')}}" class="link-btn btn-2 active-bg">Register</a>
                    </div>
{{--
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br/>
                    @endif

                    --}}

                    <div class="clearfix"></div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group form-box">
                            <input id="name" type="text" class="input-text" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name">
                            @if ($errors->has('name'))
                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group form-box">
                            <input id="email" type="email" placeholder="Email Address" class="input-text" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                                                         <!-- <div class="form-group form-box">
                                                            <label for="state"> Choose Your State </label>
                                                            <select class="form-control" id="state" name="state">

                                                              @foreach($states as $state)
                                                              <option value="{{ $state->name }}"> {{ $state->name }} </option> 
                                                              @endforeach

                                                          </select>
                                                           @if ($errors->has('state'))
                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                            @endif
                                                      </div>-->
                         <div class="form-group form-box clearfix">
                            <input id="password" type="password" class="input-text" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group form-box clearfix">
                            <input class="input-text" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                        </div>

                        <p>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-12">
                                   <div class="captcha">
                                    <span>{!! captcha_img('math') !!}</span>   
                                    <button type="button" class="btn btn-success"><i class="fa fa-refresh refresh" ></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-12">
                               <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required></div>

                               @if ($errors->has('captcha'))
                               <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>  Invalid answer </strong>  {{-- $errors->first('captcha') --}}
                            </span>
                            @endif


                        </div>
                        <h6>Account Type</h6>
                        <div class="col-lg-12">
                            <div class="form-group">
                              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="role" required>
                                <option selected> Choose... </option>
                                <option value="seller"> Seller </option>
                                <option value="buyer"> Buyer </option>
                            </select>

                        </div>
                    </div>
                </p>

                <p>
                    <label>
                        <input type="checkbox" name="terms" class="filled-in" required/>
                        <span>By registering you accept our <a href="{{route('terms')}}" target="_blank" style="color: blue">Terms of Use</a> and <a href="{{route('privacy')}}" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
                    </label>
                </p>
                <div class="form-group clearfix mb-0">
                    <button type="submit" class="btn-md btn-warning float-left">Create Account</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6 bg-color-15 align-self-center pad-0 none-992 p-3">
        <h6 class="text-center">Register to start posting</h6>
        <hr>
        <p>
            Estate.ng is the leading real estate property center platform in Nigeria. with a web-based platform for property retails and sales.
            We provide user with the best property search experience both online and offline by connecting them with legitimate and verified real estate agents.
        </p>
        <h6 class="text-center">What I gain by joining Estate.ng</h6>
        <hr>
        <ol>
            <li>Post as many properties as you can</li>
            <li>Gain access to phone numbers of unlimited number of clients</li>
            <li>Never forget an inspection with the inspection reminder</li>
            <li>Gain access to real estate agents all over Nigeria</li>
            <li>Market directly to clients through multiple online channels</li>
            <li>Market your properties on real estate gazzettes and publications.</li>
        </ol>
        <h6 class="text-center">Account Types:</h6>
        <ol>
            <li>Individual: searching for property</li>
            <li>Property Owner: Landlords</li>
            <li>Agent: Middleman between a buyer and propert owner</li>
            <li>Property Developer: entrepreneurs who carry out real estate development.</li>
        </ol>
        <hr>
        <div class="info clearfix">
            <div class="logo-2">
                <a href="{{url('/')}}">
                    <img src="logos/Logo.png" class="cm-logo" alt="black-logo">
                </a>
            </div>
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
</script>



@endsection




