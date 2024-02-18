<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('admin.layouts.head-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head-tag'); ?>

</head>

<body dir="rtl">

    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <section class="body-container">

        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <section id="main-body" class="main-body">

            <?php echo $__env->yieldContent('content'); ?>

        </section>
    </section>


    <?php echo $__env->make('admin.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>

    <section class="toast-wrapper flex-row-reverse">


    </section>





</body>
</html>
<?php /**PATH /home/saleh/Desktop/laravel/gabrik/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>