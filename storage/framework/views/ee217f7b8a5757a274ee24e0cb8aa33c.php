<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="<?php echo e(route('admin.home')); ?>" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>


            <section class="sidebar-part-title">بخش محتوی</section>

            <a href="<?php echo e(route('admin.content.category.index')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی</span>
            </a>
            <a href="<?php echo e(route('posts.index')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پست ها</span>
            </a>

            <a href="<?php echo e(route('admin.video.index')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>ویدیو ها</span>
            </a>

            <a href="<?php echo e(route('admin.gallery.index')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>گالری ها</span>
            </a>

            <?php

            $unseenComments = Modules\Comment\App\Models\Comment::where('seen',0)->count();


            ?>

            <a href="<?php echo e(route('admin.content.comment.index')); ?>" class="sidebar-link">
                <?php if($unseenComments ===0): ?>
                <i class="fas fa-bars"></i>
                <span>نظرات</span>
                <?php endif; ?>
                <?php if($unseenComments !==0): ?>
                <section class=" d-flex justify-content-between">
                    <i class="fas fa-bars w-100" style="text-align: center"></i>
                    <span class="w-100" style="text-align: left">نظرات</span>
                <span><i class="fas fa-circle text-success comment-user-status"></i></span>

                </section>
                <?php endif; ?>
            </a>
            <a href="<?php echo e(route('admin.content.menu.index')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>منو</span>
            </a>
            <a href="<?php echo e(route('admin.content.faq.index')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سوالات متداول</span>
            </a>
            <a href="<?php echo e(route('admin.content.banner.index')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>بنر ها</span>
            </a>



            <section class="sidebar-part-title">بخش کاربران</section>


            <a href="<?php echo e(route('users.index')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>کاربران</span>
            </a>


            <section class="sidebar-part-title">تیکت ها</section>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>همه ی تیکت ها</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی تیکت ها</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اولویت تیکت ها</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>ادمین تیکت</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های جدید</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های باز</span>
            </a>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های بسته</span>
            </a>


            <section class="sidebar-part-title">تنظیمات</section>
            <a href="#" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تنظیمات</span>
            </a>

        </section>
    </section>
</aside>
<?php /**PATH /home/saleh/Desktop/laravel/gabrik/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>