<form wire:submit.prevent='validate_form'>
    {{-- End form for paystack pay --}}
    {{-- {{ csrf_field() }} --}}

    <div class="form-group form-box">
        <input type="text" class="input-text" name="name"  autofocus placeholder="Full Name" wire:model='name'>

        @error('name')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group form-box">
        <input type="text" placeholder="Email Address" class="input-text"  wire:model='email'>
        @if ($errors->has('email'))
        <span class="helper-text" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <div class="input-group mb-3">
            <input type="password" name="password" id="passwordField" class="form-control" placeholder="Password (min: 6 chars)" aria-label="Password" aria-describedby="Password" wire:model='password'>
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
        <input class="input-text" placeholder="Confirm Password" type="password" wire:model='password_confirmation'>
    </div>

    <p>
        <h6>What do you want to do?</h6>
        <div class="col-lg-12">
            <div class="form-group">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" wire:model='role'>
                    <option selected> Choose... </option>
                    <option value="seller"> Provide a service </option>
                    <option value="buyer"> I'm looking for a service </option>
                </select>
            </div>
            @error('role')
            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </p>
    <p>
    @if(!$referParam)
    <div class="form-group form-box">
    <h6 class="text-center">Where you referred by our agent?</h6>
        <input id="agent_code" type="text" placeholder="Enter Agent Code (Optional)" class="input-text" wire:model='agent_code'>
        @if ($errors->has('agent_code'))
        <span class="helper-text" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $errors->first('agent_code') }}</strong>
        </span>
        @endif
    </div>
    @endif
    </p>
    <p>
        <label>
            <input type="checkbox" name="terms" class="filled-in" wire:model='terms'/>
            <span>By registering you accept our <a href="{{route('terms-of-use')}}" target="_blank" style="color: blue">Terms of Use</a> and <a href="{{route('privacy-policy')}}" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
        </label>
        @error('terms')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </p>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div id="spinner-container" class="d-none">
        <div class="spinner" style=font-size:16px>
            <div class="head">

            </div>
          </div>

        <strong>We are creating your account, please wait...</strong>
    </div>

    <div id="btn-container" class="form-group clearfix mb-0">
        {{-- btn for without pay --}}
        {{-- <button type="submit" class="btn-md float-left" style="background-color: #cc8a19; color: #fff">Create Account</button> --}}
        {{-- btn for pay --}}
        <script src="https://js.paystack.co/v1/inline.js"></script>

        <button id="paystack_btn_control1" type="submit" class="btn-md float-left" style="background-color: #cc8a19; color: #fff">Create Account</button>

        <small id="error_msg_paystack1" class="text-danger"></small>
    </div>
</form>


 <form wire:submit.prevent='validate_form'>
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
                                <div style="text-align:center;margin-top:30px;margin-bottom:20px;">
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
                            </form>

























<script>
window.addEventListener('pay_with_paystack', event => {
    // alert('Name updated to: ' + event.detail.newName);
    let handler = PaystackPop.setup({
        key: event.detail.data.key, // Replace with your public key
        email: event.detail.data.email,
        amount: event.detail.data.amount,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1),
        onClose: function(){
            alert('Window closed.');
        },
        callback: function(response){
            $('#spinner-container').removeClass("d-none");
            $('#spinner-container').addClass('d-block')
            $('#btn-container').addClass('d-none')
            Livewire.emit('verifyPaystackAmount', response)
        }
    });
    handler.openIframe();
})
</script>

<style>

    .spinner {
      width: 30px;
      height: 30px;
      border-top: 10px solid #ff0000;
      border-right: 10px solid transparent;
      animation: spinner 0.4s linear infinite;
      border-radius: 50%;
      margin: auto;
    }
    .head {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin-left: 10px;
      margin-top: 10px;
      background-color: #ff0000;
    }
    @keyframes spinner {
      to {
        transform: rotate(360deg);
      }
    }

    </style>
