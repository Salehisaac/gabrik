<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>Module: <?php echo config('posts.name'); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('posts::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saleh/Desktop/laravel/gabrik/Modules/Posts/resources/views/edit.blade.php ENDPATH**/ ?>