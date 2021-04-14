
<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>


<div class="contact-section mt-0">
    <div class="container">
        <h3 class="text-center" style="color: #ca8309;">EF Contact Group Registeration</h3>
        <div class="login-box">
            <div class="col-md-12 align-self-center pad-0">
                <div class="form-section clearfix row">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.group-registeration')->html();
} elseif ($_instance->childHasBeenRendered('xvd3LeR')) {
    $componentId = $_instance->getRenderedChildComponentId('xvd3LeR');
    $componentTag = $_instance->getRenderedChildComponentTagName('xvd3LeR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xvd3LeR');
} else {
    $response = \Livewire\Livewire::mount('user.group-registeration');
    $html = $response->html();
    $_instance->logRenderedChild('xvd3LeR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/auth/group-registeration.blade.php ENDPATH**/ ?>