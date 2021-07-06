<?php $__env->startComponent('mail::message'); ?>
# Your registration was successful!
## <strong>These are your details for backup</strong>

<p><strong>Full Name: </strong> <?php echo e($name ? $name : 'Name not provided!'); ?></p>
<p><strong>Email: </strong> <?php echo e($email ? $email : 'Name not provided!'); ?></p>
<p><strong>Password: </strong> <?php echo e($password ? $password : 'Name not provided!'); ?></p>
<p><strong>Account Type: </strong> <?php echo e($accountType == 'agent' ? 'EFContact Agent' : ''); ?></p>

<?php $__env->startComponent('mail::button', ['url' => route('agent_Complete_Reg', ['email'=> $email])]); ?>
Click here to complete your agent registeration
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::panel'); ?>
EFContact. Your Pathway To Greatness. 😃
<?php if (isset($__componentOriginal78a7183c9f5e577b074162f44312b5a9c6fd7b4c)): ?>
<?php $component = $__componentOriginal78a7183c9f5e577b074162f44312b5a9c6fd7b4c; ?>
<?php unset($__componentOriginal78a7183c9f5e577b074162f44312b5a9c6fd7b4c); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<strong><?php echo e(config('app.name')); ?></strong>
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/emails/agents/register.blade.php ENDPATH**/ ?>