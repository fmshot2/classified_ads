@extends('layouts.app')
@section('title', 'Reset Password | ')

@section('content')

<style>
    .input-group input{
        padding: 10px 20px;
        font-size: 15px;
        outline: none;
        height: 50px;
        font-weight: 500;
        border: 1px solid transparent;
        background: #fff;
        box-shadow: 0 0 5px rgb(0 0 0 / 20%);
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
    }
    .input-group .input-group-text{
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        box-shadow: 5px 0 5px rgb(0 0 0 / 10%);
        border: 1px solid transparent;
        background: #fff;
        outline: none;
        z-index: 1;
    }
    .contact-section .form-section .form-group label {
        float: left;
        width: 100%;
        text-align: left;
        position: relative;
    }
    .contact-section .bg-img {
        min-height: 600px;
    }
    .contact-section .bg-img {
        background: rgba(0, 0, 0, 0.04) url('/efmobilemockup.jpg') top left repeat;
        background-size: cover;
        top: 0;
        bottom: 0;
        border-radius: 0 20px 20px 0;
        opacity: 1;
        width: 100%;
        z-index: 999;
        min-height: 496px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="contact-section">
    <div class="container">
        <div class="row login-box">
            <div class="col-lg-6 align-self-center pad-0">
                <div class="form-section align-self-center">
                    <h3>Reset Your Password</h3>
                    <div class="btn-section clearfix">
                        <a href="{{route('login')}}" class="link-btn btn-1 default-bg">Login</a>
                        <a href="{{route('register')}}" class="link-btn btn-1 default-bg">Register</a>
                        <a href="{{route('show_agent_Login')}}" class="link-btn btn-2 default-bg">Agent</a>
                    </div>
                    <div class="clearfix"></div>


                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <script>
                                    toastr.error({{ $error }})
                                </script>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif



                    @include('layouts.frontend_partials.status')

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group form-box">
                            <label for="">{{ __('E-Mail Address') }}</label>
                            <input type="email" name="email" value="{{ $email ?? old('email') }}" class="input-text @error('email') is-invalid @enderror" placeholder="Your Account Email Address" required autocomplete="email" autofocus>
                            @if ($errors->has('email'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" style="text-align: left !important">{{ __('New Password') }}</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="passwordField" class="form-control" placeholder="Password (min: 8 chars)" aria-label="Password" aria-describedby="Password" required autocomplete="new-password">
                                <div class="input-group-append" id="showpasswordtoggle" name="showpasswordtoggle" onclick="showPassword()">
                                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group form-box clearfix">
                            <label for="">{{ __('Confirm Password') }}</label>
                            <input class="input-text" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                        </div>

                        <div class="form-group clearfix mb-0">
                            <button type="submit" class="btn-md float-left" style="background-color: #cc8a19; color: #fff">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 bg-color-15 align-self-center pad-0 none-992 bg-img">
                {{-- <div class="info clearfix">
                    <div class="logo-2">
                        <a href="{{url('/')}}">
                            <img src="{{ asset('images') }}/{{$check_general_info == 0 ? $general_info->logo : '' }}"  class="cm-logo" alt="black-logo">
                        </a>
                    </div>
                    <div class="social-list">
                        <a href="{{ $check_general_info == 0 ? $general_info->facebook : '' }}" class="facebook-bg">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="{{ $check_general_info == 0 ? $general_info->twitter : '' }}" class="twitter-bg">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="{{ $check_general_info == 0 ? $general_info->instagram : '' }}" class="google-bg">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="#" class="linkedin-bg">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<script>
    function showPassword() {
        var passField = document.getElementById("passwordField");
        if (passField.type === "password") {
            passField.type = "text";
        } else {
            passField.type = "password";
        }
    }
</script>

@endsection
