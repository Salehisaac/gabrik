<?php $__env->startSection('content'); ?>
    <h1>show</h1>

    <p>Module: <?php echo config('users.name'); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saleh/Desktop/laravel/gabrik/Modules/Users/resources/views/show.blade.php ENDPATH**/ ?>