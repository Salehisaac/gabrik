<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>Module: <?php echo config('category.name'); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('category::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saleh/Desktop/laravel/gabrik/Modules/Category/resources/views/index.blade.php ENDPATH**/ ?>