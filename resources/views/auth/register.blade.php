
@extends('layouts.app')
@section('title', 'Register')

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
</style>

    <div class="contact-section">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-6 align-self-center pad-0">
                    <div class="form-section clearfix">
                        <h3>Create an account</h3>
                        <div class="btn-section clearfix">
                            <a href="{{route('login')}}" class="link-btn active btn-1 default-bg">Login</a>
                            <a href="{{route('register')}}" class="link-btn btn-1 active-bg">Register</a>
                            <a data-toggle="modal" data-target="#launchAgentModal" href="#" class="link-btn btn-2 default-bg">Agent</a>

                        </div>

                        <div class="clearfix"></div>
                       
                          @livewire('user.register', ['referParam' => $referParam])
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

{{-- reg with paystack --}}
<script>
    base_Url = "{{url('/')}}"


   function regWithPaystack1(){

   var _token = $("input[name='_token']").val();

   var name = $("#name").val();
   var email = document.getElementById('email').value //$("#email").val();
   var password = $("#password").val();
   var refer = $("#refer").val();
   var role = $("#role").val();
   var agent_code = $("#agent_code").val();
    // console.log(new_id);
        console.log(email);




    var handler = PaystackPop.setup({
      key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
      email: email,
      amount: 2000000,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

        metadata: {
         custom_fields: [
         {
          display_name: "Mobile Number",
          variable_name: "mobile_number",
          value: "+2348012345678"
        }
        ]
      },
      callback: function(response){
        var ref_no1 = response.reference;
    });*/
    $.ajax({
      type:'POST',
                      url: "{{ route('createpaypaystack2') }}",
                      // url: base_Url + '/provider/service/createpay/',
                      data: {_token:_token, email:email, password:password, refer:refer, role:role, agent_code:agent_code},
                      success: function(data) {
                        alert(data);
                        console.log(data);
                      }
                    });
         //   alert('success. transaction ref is ' + response.reference);
       },
       onClose: function(){
        alert('window closed');
      }
    });
    handler.openIframe();
  }
  </script>


@endsection
