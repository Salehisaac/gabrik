<?php $__env->startSection('content'); ?>
    <h1>Edit</h1>

    <p>Module: <?php echo config('category.name'); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('category::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saleh/Desktop/laravel/gabrik/Modules/Category/resources/views/edit.blade.php ENDPATH**/ ?>