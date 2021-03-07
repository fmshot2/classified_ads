
@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="contact-section">
    <div class="container">
        <div class="row login-box">
            <div class="col-lg-6 align-self-center pad-0">
                <div class="form-section clearfix">
                    <h3>Register here as Our Agent</h3>
                    <div class="btn-section clearfix">
                        <a href="{{route('login')}}" class="link-btn active btn-1 default-bg">Login</a>
                        <a href="{{route('login')}}" class="link-btn  btn-1 default-bg">Register</a>

                        <a href="{{route('agentRegister')}}" class="link-btn active btn-2 active-bg"> Be an Agent</a>

                    </div>

                    <div class="clearfix"></div>

                    <form method="POST" action="{{ route('agentRegister') }}">
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
                            <input id="phone" type="phone" placeholder="Phone Number" class="input-text" name="phone" value="{{ old('phone') }}" required>
                            @if ($errors->has('phone'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
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

                        <div class="form-group form-box">
                            <!-- <label class="form-label">Location</label><small class="text-danger">*</small> -->
                            <select class="form-control" required id="state"   name="state">
                                <option value="">-- Select State --</option>
                                @if(isset($states))
                                @foreach($states as $state)
                                <option id="state" value="{{$state->name}}"> {{ $state->name }}  </option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group form-box">
                            <!-- <label class="form-label">Local Government</label><small class="text-danger">*</small> -->
                            <select class="form-control" id="city" name="city" >
                                <option disabled selected>- Select Local Government -</option>
                            </select>
                        </div>

                        <div class="form-group form-box">
                            <input id="address" type="text" required value="{{ old('address') }}" class="form-control" name="address" placeholder="Enter your address here.">
                        </div>
                        <p>
                            <h6>Upload Driver's Licence, National Id or Voter's Card</h6>
                            <div class="form-group form-box">
                                <input id="add" type="file"  class="input-text" name="file">
                                @if ($errors->has('file'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong class="text-danger">{{ $errors->first('file') }}</strong>
                                </span>
                                @endif
                            </div>
                        </p>

                        <div class="form-group form-box">
                            <input type="hidden" class="input-text" name="refer" value="{{$referParam}}">
                        </div>
                          <div class="form-group form-box">
                            <small>Insert Agent  Code</small>
                            <input type="text" class="input-text" name="agentCode" value="{{ old('agentCode') }}">
                        </div>
                        <p>
                            <label>
                                <input type="checkbox" name="terms" class="filled-in" required/>
                                <span>By registering you accept our <a href="{{route('terms')}}" target="_blank" style="color: blue">Terms of Use</a> and <a href="{{route('privacy')}}" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
                            </label>
                        </p>
                        <div class="form-group clearfix mb-0">
                            <button type="submit" class="btn-md btn-warning float-left">Create Agent Account</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-lg-6 bg-color-15 align-self-center pad-0 p-3">
                @if(isset($general_info->register_section_1_title))
                <h6 class="text-center"> Who is An EFContact Agent? </h6>
                <hr>
                <p>
                    An Efcontact Agent is anyone who wishes to make extra cash via the EFContact Platform by becoming a promoter of the EFContact platform.
                </p>
                @endif
                <!--h6 class="text-center">What I gain by joining Estate.ng</h6-->
                <hr>
                @if(isset($general_info->register_section_1_title))
                <h6 class="text-center"> Are EFContact Agents paid? </h6>
                <hr>
                <p>
                 Yes. For each person that registers <span class="text-danger"> AND CREATES A SERVICE </span> using your agent code, you will recieve the sum of 100 NGN
             </p>
             <small class="text-danger">Note: The Person MUST create A Valid Service For You To Be Eligible For Payment</small>
             @endif

             <hr>
             @if(isset($general_info->register_section_2_title))
             <h6 class="text-center"> How Do I Get To Become An Agent? </h6>
             <hr>
             <p>
                To become an agent, visit <a class="text-warning" href="www.efcontact.com/register">EFContact Registration Page</a> and click on <a class="text-warning" href="www.efcontact.com/register text-warning">"Be Our Agent"</a>
            </p>
            @endif
            @if(isset($general_info->register_section_2_title))
            <h6 class="text-center"> How Can I learn More About This? </h6>
            <hr>
            <p>
                To learn more about an agents and payments, please visit <a class="text-warning" href="www.efcontact.com/faq">EFContact FAQ Page</a> or call <a href="tel:123-456-7890">090- 123-456-7890</a>
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
