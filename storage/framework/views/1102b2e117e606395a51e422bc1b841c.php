<?php $__env->startSection('head-tag'); ?>
    <title>ویرایش ادمین </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">ادمین ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش ادمین </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش ادمین
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="<?php echo e(route('users.update', $user->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <?php echo e(method_field('PUT')); ?>


                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?php echo e(old('name', $user->name)); ?>">
                                </div>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <?php echo e($message); ?>

                                    </strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </section>

                            <section class="col-12 mt-sm-2 mt-md-2">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saleh/Desktop/laravel/gabrik/Modules/Users/resources/views/edit.blade.php ENDPATH**/ ?>