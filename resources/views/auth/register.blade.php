
@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="contact-section">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-6 align-self-center pad-0">
                    <div class="form-section clearfix">
                        <h3>Create an account</h3>
                        <div class="btn-section clearfix">
                            <a href="{{route('login')}}" class="link-btn active btn-1 default-bg">Login</a>
                            <a href="{{route('register')}}" class="link-btn  btn-1 active-bg">Register</a>

                            <a href="{{route('agentRegister')}}" class="link-btn active btn-2 default-bg"> Be an Agent</a>



                        </div>


                        <div class="clearfix"></div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group form-box">
                                <input id="name" type="text" class="input-text" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name" required>
                                @if ($errors->has('name'))
                                    <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group form-box">
                                <input id="email" type="email" placeholder="Email Address" class="input-text" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group form-box">
                                <input type="hidden" class="input-text" name="refer" value="{{$referParam}}">
                            </div>
                            <div class="form-group form-box clearfix">
                                <input id="password" type="password" class="input-text" name="password" placeholder="Password (min: 6 characters)" required>
                                @if ($errors->has('password'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
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

                <div class="col-lg-6 bg-color-15 align-self-center pad-0 p-3">
                    @if(isset($general_info->register_section_1_title))
                        <h6 class="text-center"> {{ $general_info->register_section_1_title ? $general_info->register_section_1_title : '' }} </h6>
                        <hr>
                        <p>
                            {!! $general_info->register_section_1 ? $general_info->register_section_1 : '' !!}
                        </p>
                    @endif
                    <!--h6 class="text-center">What I gain by joining Estate.ng</h6-->
                    <hr>
                    @if(isset($general_info->register_section_1_title))
                        <h6 class="text-center"> {{ $general_info->register_section_2_title ? $general_info->register_section_2_title : '' }} </h6>
                        <hr>
                        <p>
                            {!! $general_info->register_section_2 ? $general_info->register_section_2 : '' !!}
                        </p>
                    @endif

                    <hr>
                    @if(isset($general_info->register_section_2_title))
                        <h6 class="text-center"> {{ $general_info->register_section_3_title ? $general_info->register_section_3_title : '' }} </h6>
                        <hr>
                        <p>
                            {!! $general_info->register_section_3 ? $general_info->register_section_3 : '' !!}
                        </p>
                    @endif
                    {{-- <hr>
                    <div class="info clearfix">
                        <div class="logo-2">
                            <a href="{{url('/')}}">
                                <img src="logos/Logo.png" class="cm-logo" alt="black-logo">
                            </a>
                        </div>
                    </div> --}}
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
