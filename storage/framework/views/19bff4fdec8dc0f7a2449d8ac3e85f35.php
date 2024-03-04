<?php $__env->startSection('head-tag'); ?>
    <title>خانه</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/Home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/nicepage.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en" dir="rtl" >
    <section class="u-clearfix u-image u-shading u-section-1" id="carousel_8387" data-image-width="1980" data-image-height="1320">
        <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
            <div class="u-align-right u-container-align-left u-container-style u-group u-white u-group-1" style="direction: rtl;">
                <div class="u-container-layout u-valign-middle u-container-layout-1" style="margin-right: 10px">
                    <h3 class="u-align-right u-text u-text-1">شرکت گابریک سازه تابا</h3>
                    <p class="u-align-right u-text u-text-2">شرکت گابریک سازه تابا از سال ۱۳۸۸ بر روی روش های گوناگون صنعتی سازی ساختمان بررسی و نهایتا تولید صنعتی مسکن به روش قالب ماندگار را انتخاب نمود. تاکنون دهها پروژه ساختمانی در سراسر کشور را با این روش اجرا نموده است.
                        در سه سال اخیر استفاده از سازه کانتینری علی الخصوص جهت ساخت مدرسه در مناطق محروم کشور مد نظر بوده که چندین پروژه با این متد اجرا نموده است.</p>
                    <a href="https://nicepage.review" class="u-active-black u-align-right u-border-none u-btn u-btn-round u-button-style u-hover-black u-palette-1-base u-radius-50 u-text-active-white u-text-hover-white u-btn-2" dir="rtl" style="font-family: 'Iran Sans', Tahoma, Arial, sans-serif; text-align: right; margin-right: 150px; padding: 10px 20px; font-size: 12px;">ارتباط با ما</a>
                </div>
            </div>
        </div>
    </section>
    <section class="u-clearfix u-section-9" id="sec-d70c">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                            <!-- Video Player -->
                            <video controls id="videoPlayer" class="u-expanded-width u-video u-video-1" autoplay loop playsinline>
                                <source src="<?php echo e('videos/' . $video[0]->video); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <!-- End of Video Player -->

                        </div>
                        <div class="u-container-align-center u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                            <div class="u-container-layout u-valign-middle u-container-layout-2">
                                <h2 class="u-align-center u-text u-text-default u-text-1"><?php echo e($video[0]->title); ?></h2>
                                <p class="u-align-center u-text u-text-default u-text-2" style="width: 400px"><?php echo e(html_entity_decode(strip_tags($video[0]->description))); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="u-clearfix u-container-align-center-md u-container-align-center-xl u-white u-section-3" id="carousel_125f">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h2 class="u-align-center u-text u-text-default u-text-1">Our Projects</h2>
            <p class="u-align-center u-text u-text-2"> Our projects stem from a commitment to the transformative role of ideas and their power to establish new realities that engage this world.</p>
            <div class="u-expanded-width-lg u-expanded-width-md u-palette-1-base u-shape u-shape-rectangle u-shape-1"></div>
            <div class="u-gallery u-layout-grid u-lightbox u-no-transition u-show-text-on-hover u-gallery-1">
                <div class="u-gallery-inner u-gallery-inner-1">
                    <?php $__currentLoopData = json_decode($galleries[0]['gallery']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="u-effect-fade u-gallery-item">
                        <div class="u-back-slide" data-image-width="1380" data-image-height="920">
                            <img class="u-back-image u-expanded" src="<?php echo e($galleryImage); ?>">
                        </div>
                        <div class="u-over-slide u-shading u-over-slide-1"></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <a href="https://nicepage.review" class="u-active-black u-align-center u-border-none u-btn u-btn-round u-button-style u-hover-black u-palette-1-base u-radius-50 u-text-active-white u-text-hover-white u-btn-2">Contact Us</a>
        </div>
    </section>
    <section class="u-align-center u-clearfix u-container-align-center u-palette-1-base u-section-4" id="carousel_455e">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h2 class="u-align-center u-text u-text-default u-text-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="0"> 900 residential projects</h2>
            <p class="u-align-center u-text u-text-2" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="u-align-center u-container-align-center-lg u-container-align-center-xl u-container-style u-list-item u-repeater-item u-shape-round u-top-left-radius-20 u-video-cover u-white u-list-item-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                                <a href="<?php echo e(route('post.show' , $project->id)); ?>">
                                    <img class="u-expanded-width u-image u-image-1" src="<?php echo e($project->image); ?>" alt="" data-image-width="740" data-image-height="925">
                                </a>
                                <h5 class="u-align-center u-text u-text-3"> <?php echo e($project->title); ?></h5>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
    </section>
    <section class="u-clearfix u-section-5" id="carousel_0588">
        <div class="u-expanded-width u-palette-1-base u-shape u-shape-rectangle u-shape-1"></div>
        <img src="images/782.jpg" class="u-align-left u-image u-image-default u-image-1" data-image-width="1380" data-image-height="920">
        <div class="u-align-left u-container-align-left u-container-style u-group u-palette-5-dark-3 u-shape-rectangle u-group-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h2 class="u-align-left u-text u-text-1"> We provide architects services in London</h2>
                <p class="u-align-left u-text u-text-2">Egestas purus viverra accumsan in nisl nisi. Enim nec dui nunc mattis enim ut. Consequat interdum varius sit amet mattis vulputate enim nulla. Fusce ut placerat orci nulla pellentesque dignissim enim sit amet.</p>
                <p class="u-align-left u-text u-text-3">Image from <a href="https://www.freepik.com/photos/business" class="u-active-none u-border-1 u-border-no-left u-border-no-right u-border-no-top u-border-white u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-1" target="_blank">Freepik</a>
                </p>
                <a href="https://nicepage.dev" class="u-active-palette-5-dark-2 u-align-left u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-dark-2 u-radius-50 u-text-active-white u-text-hover-white u-white u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">read more</a>
            </div>
        </div>
    </section>
    <section class="u-clearfix u-container-align-center u-section-6" id="carousel_e840">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h2 class="u-align-center u-text u-text-default u-text-1">Awards </h2>
            <p class="u-align-center u-text u-text-default u-text-2"> These core values define who we are and the work we do.</p>
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <div class="u-border-2 u-border-grey-15 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-1">
                            <h4 class="u-text u-text-default u-text-3"> 2022</h4>
                            <p class="u-text u-text-4"> RIBA Awards 2022 - Shortlisted&nbsp;<br>Archdaily - Building of the Year / Shortlisted<br>Brick Development Association Awards - Architects’ Choice / Winner <br>Brick Development Association Awards - Craftsmanship / Shortlisted <br>Dezeen Awards - Rural House / Longlisted<br>
                            </p>
                        </div>
                    </div>
                    <div class="u-border-2 u-border-grey-15 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-2">
                            <h4 class="u-text u-text-default u-text-5"> 2019</h4>
                            <p class="u-text u-text-6"> Sunday Times Awards - Architect of the Year / Winner <br>Sunday Times Awards - Small Development / Winner <br>Sunday Times Awards - Large House / Commendation <br>Architizer A+ Awards - Architecture + Brick / Winner <br>Architects Journal Specification Awards - Winner <br>Architects Journal Awards - Manser Medal / Shortlisted
                            </p>
                        </div>
                    </div>
                    <div class="u-border-2 u-border-grey-15 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-3">
                            <h4 class="u-text u-text-default u-text-7"> 2018</h4>
                            <p class="u-text u-text-8"> RIBA Awards 2020 - Shortlisted<br>London Design Awards - Silver Medal / Winner<br>BD Young Architect of the Year Award / Shortlisted<br>New London Architecture Awards - Conserving / Shortlisted
                            </p>
                        </div>
                    </div>
                    <div class="u-border-2 u-border-grey-15 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-4">
                            <h4 class="u-text u-text-default u-text-9"> 2017</h4>
                            <p class="u-text u-text-10"> British Construction Industry Awards - Housing Project / Shortlisted <br>New London Architecture Awards - Best Homes / Shortlisted <br>What House? Awards / Best Exterior / Bronze Medal <br>Brick Development Association Awards - Small development / Winner
                            </p>
                        </div>
                    </div>
                    <div class="u-border-2 u-border-grey-15 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-5">
                            <h4 class="u-text u-text-default u-text-11"> 2016</h4>
                            <p class="u-text u-text-12">Sunday Times Awards - Large House / Commendation <br>Architizer A+ Awards - Architecture + Brick / Winner <br>Architects Journal Specification Awards - Winner <br>Architects Journal Awards - Manser Medal / Shortlisted
                            </p>
                        </div>
                    </div>
                    <div class="u-border-2 u-border-grey-15 u-border-no-left u-border-no-right u-border-no-top u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-6">
                            <h4 class="u-text u-text-default u-text-13"> 2015</h4>
                            <p class="u-text u-text-14"> FX Awards - Breakthrough Talent of the Year / Winner <br>London Design Awards - Silver Medal / Winner <br>Sunday Times Awards - Best Home / Winner <br>Sunday Times Awards - Manser Medal / Shortlisted
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="https://nicepage.review" class="u-active-black u-align-center u-border-none u-btn u-btn-round u-button-style u-hover-black u-palette-1-base u-radius-50 u-text-active-white u-text-hover-white u-btn-1">Read more</a>
        </div>
    </section>
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-cacc">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
        </div>
    </footer>

    </body>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saleh/Desktop/laravel/gabrik/resources/views/home.blade.php ENDPATH**/ ?>