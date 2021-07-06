<form wire:submit.prevent='save_user'>

    <div class="form-group form-box col-md-6">
        <label>Group Code</label>
        <input type="text" class="input-text" name="group_code" autofocus placeholder="Enter Group Code" wire:model='group_code'>
        @error('group_code')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group form-box col-md-6">
        <label>Referal <small>(optional)</small> </label>
        <input type="text" class="input-text" name="refer" autofocus placeholder="Referal" wire:model='refer'>
        @error('refer')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group form-box col-md-6">
        <label>Agent Code <small>(optional)</small> </label>
        <input type="text" class="input-text" name="agent_code" autofocus placeholder="Agent Code" wire:model='agent_code'>
        @error('agent_code')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group form-box col-12">
        <hr />
    </div>

    <div class="form-group form-box col-md-6">
        <label>Full Name</label>
        <input type="text" class="input-text" name="name" autofocus placeholder="Full Name" wire:model='name'>
        @error('name')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group form-box col-md-6">
        <label>Email</label>
        <input type="text" class="input-text" name="email" placeholder="Email" wire:model='email'>
        @error('email')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group form-box col-md-6">
        <label>Phone Number</label>
        <input type="text" class="input-text" name="phone" placeholder="Phone Number" wire:model='phone'>
        @error('phone')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group form-box col-md-6">
        <label>Password</label>
        <input type="password" class="input-text" name="password" placeholder="Password (min: 6 chars)" wire:model='password'>
        @error('password')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group form-box col-md-6">
        <label>Confirm Password</label>
        <input type="password" class="input-text" name="name" placeholder="Confirm Password" wire:model='password_confirmation'>
    </div>

    <p>
        <label>
            <input type="checkbox" name="terms" class="filled-in" wire:model='terms' />
            <span>By registering you accept our <a href="{{route('terms-of-use')}}" target="_blank" style="color: blue">Terms of Use</a> and <a href="{{route('privacy-policy')}}" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
        </label>
        @error('terms')
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </p>

    <div id="spinner-container" wire:loading wire:target="save_user">
        <div class="spinner" style=font-size:16px>
            <div class="head">

            </div>
        </div>

        <strong>We are creating your account, please wait...</strong>
    </div>

    <div>
        @if (session()->has('message'))
        <div class="alert alert-success" style="color: white;">
            {{ session('message') }}
        </div>
        @endif
    </div>

    <div>
        @if (session()->has('error'))
        <div class="alert alert-danger" style="color: white;">
            {{ session('error') }}
        </div>
        @endif
    </div>

    <div id="btn-container" class="form-group clearfix mb-0" wire:loading.remove wire:target="save_user">
        <button id="paystack_btn_control1" type="submit" class="btn-md float-left" style="background-color: #cc8a19; color: #fff">Create Account</button>
    </div>
</form>

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