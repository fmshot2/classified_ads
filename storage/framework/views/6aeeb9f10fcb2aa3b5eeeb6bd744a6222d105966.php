<form wire:submit.prevent='save_user'>

    <div class="form-group form-box col-md-6">
        <label>Group Code</label>
        <input type="text" class="input-text" name="group_code" autofocus placeholder="Enter Group Code" wire:model='group_code'>
        <?php $__errorArgs = ['group_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group form-box col-md-6">
        <label>Agent Code (optional)</label>
        <input type="text" class="input-text" name="agent_code" autofocus placeholder="Agent Code" wire:model='agent_code'>
        <?php $__errorArgs = ['agent_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group form-box col-12">
        <hr />
    </div>

    <div class="form-group form-box col-md-6">
        <label>Full Name</label>
        <input type="text" class="input-text" name="name" autofocus placeholder="Full Name" wire:model='name'>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group form-box col-md-6">
        <label>Email</label>
        <input type="text" class="input-text" name="email" placeholder="Email" wire:model='email'>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group form-box col-md-6">
        <label>Password</label>
        <input type="password" class="input-text" name="password" placeholder="Password (min: 6 chars)" wire:model='password'>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group form-box col-md-6">
        <label>Confirm Password</label>
        <input type="password" class="input-text" name="name" placeholder="Confirm Password" wire:model='password_confirmation'>
    </div>

    <p>
        <label>
            <input type="checkbox" name="terms" class="filled-in" wire:model='terms' />
            <span>By registering you accept our <a href="<?php echo e(route('terms-of-use')); ?>" target="_blank" style="color: blue">Terms of Use</a> and <a href="<?php echo e(route('privacy-policy')); ?>" target="_blank" style="color: blue"> Privacy</a> and agree that we and our selected partners may contact you with relevant offers and services.</span>
        </label>
        <?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="helper-text text-danger" data-error="wrong" data-success="right">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </p>

    <div id="spinner-container" wire:loading wire:target="save_user">
        <div class="spinner" style=font-size:16px>
            <div class="head">

            </div>
        </div>

        <strong>We are creating your account, please wait...</strong>
    </div>

    <div>
        <?php if(session()->has('message')): ?>
        <div class="alert alert-success" style="color: white;">
            <?php echo e(session('message')); ?>

        </div>
        <?php endif; ?>
    </div>

    <div>
        <?php if(session()->has('error')): ?>
        <div class="alert alert-danger" style="color: white;">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
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

    @keyframes  spinner {
        to {
            transform: rotate(360deg);
        }
    }
</style><?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/livewire/user/group-registeration.blade.php ENDPATH**/ ?>