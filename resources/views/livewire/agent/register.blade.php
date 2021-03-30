

<form wire:submit.prevent='validate_form2'>
    @if($tab === 1)
    <div class="">
        <h4 class="tabs-title">Personal Details</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Your Full Name</label>
                            <input type="text" class="form-control" readonly name="name" wire:model='agent_name' autofocus placeholder="Full Name" required>
                            @error('agent_name')
                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                            	<strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" readonly class="form-control" wire:model="agent_email">
                            @if ($errors->has('agent_email'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                            	<strong class="text-danger">{{ $errors->first('agent_email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                         <label class="form-label">Phone</label><small class="text-danger">*</small>
                         <input type="number" placeholder="Phone Number" class="form-control" wire:model="phone">
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
                        <select class="form-control" wire:model='identification_type'>
                            <option selected >- Select an option -</option>
                            <option value="national_id">National ID</option>
                            <option value="driver_license">Driver License</option>
                            <option value="voter_id">Voter's Card</option>
                            <option value="international_passport">International Passport</option>
                        </select>
                    </div>
                    @if ($errors->has('phone'))
                    <span class="helper-text" data-error="wrong" data-success="right">
                       <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                   </span>
               @endif                    
           </div>
           </div>
       </div>
       <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">State</label><small class="text-danger">*</small>
                    <select class="form-control" id="statee" wire:model='state_id'>
                        <option value="">- Select State -</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}"> {{ $state->name }}  </option>
                        @endforeach
                    </select>
                    @if ($errors->has('state_id'))
                    <span class="helper-text" data-error="wrong" data-success="right">
                     <strong class="text-danger">{{ $errors->first('state_id') }}</strong>
                 </span>
                 @endif
             </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Local Government</label><small class="text-danger">*</small>
                <select class="form-control" id="city" wire:model='city_id' @if(!$cities) disabled="" @endif>
                    <option value="" selected>- Select a Local Government -</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}"> {{ $city->name }}  </option>
                    @endforeach
                </select>
                @if ($errors->has('city_id'))
                <span class="helper-text" data-error="wrong" data-success="right">
                 <strong class="text-danger">Please input your Local Government</strong>
             </span>
             @endif
         </div>
     </div>
     <div class="col-md-12">
        <div class="form-group">
         <label class="form-label">Address</label><small class="text-danger">*</small>
         <input type="text" class="form-control" wire:model='address' placeholder="Enter House Address">
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
        <input type="text" class="form-control" wire:model='identification_id' placeholder="ID Number" >
    </div>
    @if ($errors->has('identification_id'))
    <span class="helper-text" data-error="wrong" data-success="right">
     <strong class="text-danger">{{ $errors->first('identification_id') }}</strong>
 </span>
 @endif
</div>
</div>
</div>
</div>
</div>
@endif

@if($tab === 2)
<div class="">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <h5>Your Bank Details</h5>
                <div class="form-group">
                 <label class="form-label">Bank Name</label><small class="text-danger">*</small>
                 <input type="text" placeholder="Bank Name" class="form-control" wire:model='bankname'>
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
              <input type="text" placeholder="Account Name" class="form-control" wire:model='accountname'>
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
         <input type="number" placeholder="Account Number" class="form-control" wire:model='accountno'>
         @if ($errors->has('accountno'))
         <span class="helper-text" data-error="wrong" data-success="right">
             <strong class="text-danger">{{ $errors->first('accountno') }}</strong>
         </span>
         @endif
     </div>
 </div>
</div>
<div class="col-md-6">
    <h5>Choose Passwords</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Password</label><small class="text-danger">*</small>
                <div class="input-group">
                    <input type="password" id="password" class="form-control" wire:model='password'>
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
                <input class="form-control" placeholder="Confirm Password" type="password" wire:model='password_confirmation'>
            </div>
            @if ($errors->has('password_confirmation'))
            <span class="helper-text" data-error="wrong" data-success="right">
                <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <label>
            <span class="text-success">You will be redirected to our payments page to provide your Agent Fee of <strong style="color: rgb(187, 84, 84)">&#8358;500</strong> only.</span>
        </label>
    </div>
</div>
</div>
@endif

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:30px;margin-bottom:20px;">
    <span class="step"></span>
    <span class="step"></span>
</div>

<div id="tabActionBtn" class="tabActionBtn">
    <div>
        <button type="button" id="prevBtn" wire:click="change_tab(1)" class="btn btn-md btn-info">Previous</button>
    @if($tab === 1)
        <button type="button" id="nextBtn" wire:click="change_tab(2)" class="btn btn-md btn-warning text-white">Next</button>
     @endif
    @if($tab === 2)

        <button type="submit" class="btn btn-md btn-warning text-white">Click To Make Payment</button>
     @endif
    </div>
</div>

<div id="spinner-container" class="d-none">
    <div class="spinner" style=font-size:16px>
        <div class="head">

        </div>
    </div>

    <strong>We are creating your account, please wait...</strong>
</div>
        <script src="https://js.paystack.co/v1/inline.js"></script>

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
            $('#tabActionBtn').addClass('d-none')
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
