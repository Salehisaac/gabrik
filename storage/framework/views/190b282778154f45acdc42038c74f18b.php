<?php $__env->startSection('head-tag'); ?>
    <title>افزودن ادمین جدید</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">ادمین ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد ادمین جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد ادمین جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="<?php echo e(route('users.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="first_name" value="<?php echo e(old('name')); ?>">
                                </div>
                                <?php $__errorArgs = ['first_name'];
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


                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">ایمیل</label>
                                    <input type="text" class="form-control form-control-sm " name="email" id="email" value="<?php echo e(old('email')); ?>">
                                </div>
                                <?php $__errorArgs = ['email'];
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


                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">کلمه ی عبور</label>
                                    <input type="password" class="form-control form-control-sm " name="password" id="password" value="<?php echo e(old('password')); ?>">
                                </div>
                                <?php $__errorArgs = ['password'];
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

                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">تکرار کلمه ی عبور</label>
                                    <input type="password" class="form-control form-control-sm " name="password_confirmation" id="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
                                </div>
                                <?php $__errorArgs = ['password_confirmation'];
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


                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">وضعیت فعالسازی </label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" <?php if(old('status') == 0): ?> selected  <?php endif; ?>>غیر فعال </option>
                                        <option value="1" <?php if(old('status') == 1): ?> selected <?php endif; ?>>فعال </option>
                                    </select>
                                </div>

                                <?php $__errorArgs = ['status'];
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

                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">نقش </label>
                                    <select name="role" id="role" class="form-control form-control-sm">
                                        <option value="admin" selected>ادمین</option>
                                    </select>
                                </div>

                                <?php $__errorArgs = ['role'];
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saleh/Desktop/laravel/gabrik/Modules/Users/resources/views/create.blade.php ENDPATH**/ ?>