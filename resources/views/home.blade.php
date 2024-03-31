@extends('layouts.master')


@section('head-tag')
    <title>خانه</title>
    <link rel="stylesheet" href="{{ asset('css/Home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nicepage.css') }}">
@endsection

@section('content')
    <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en" dir="rtl" >
    <section class="u-carousel u-slide u-block-9522-1" id="carousel-21db" data-interval="5000" data-u-ride="carousel">
        <div class="u-carousel-inner" role="listbox">
            <div class="u-active u-align-center u-carousel-item u-clearfix u-image u-shading u-section-1-1" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)) , url('{{ asset( $mainImages[0]->image ) }}')" data-image-width="1980" data-image-height="1114">
                <div class="u-clearfix u-sheet u-sheet-1">
                    <h1 class="u-align-center u-text u-title u-text-1">{!! $mainImages[0]->title !!}</h1>
                    <p class="u-align-center u-large-text u-text u-text-variant u-text-2">{!! $mainImages[0]->description !!}</p>
                </div>
            </div>
            @for($i=1 ;  $i<count($mainImages) ; $i++)
            <div class="u-align-center u-carousel-item u-clearfix u-image u-shading u-section-1-2" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)),url('{{ asset( $mainImages[$i]->image ) }}')" data-image-width="1980" data-image-height="1114">
                <div class="u-clearfix u-sheet u-sheet-1">
                    <h1 class="u-align-center u-text u-title u-text-1">{!!$mainImages[$i]->title!!}</h1>
                    <p class="u-align-center u-large-text u-text u-text-variant u-text-2">{!! $mainImages[$i]->description !!}</p>
                </div>
            </div>
            @endfor
        </div>
        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-text-grey-30 u-block-9522-3" href="#carousel-21db" role="button" data-u-slide="prev">
        <span aria-hidden="true">
          <svg class="u-svg-link" viewBox="0 0 477.175 477.175"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                    c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg>
        </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-text-grey-30 u-block-9522-4" href="#carousel-21db" role="button" data-u-slide="next">
        <span aria-hidden="true">
          <svg class="u-svg-link" viewBox="0 0 477.175 477.175"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                    c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg>
        </span>
            <span class="sr-only">Next</span>
        </a>
    </section>
    @if(!($video->isEmpty()))
    <section class="u-clearfix u-section-9" id="sec-d70c">
        <div class="u-clearfix u-sheet u-sheet-1" style="width: 1440px !important;">
            <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                            <!-- Video Player -->
                            <video controls id="videoPlayer" class="u-expanded-width u-video u-video-1" autoplay loop playsinline>
                                <source src="{{'videos/' . $video[0]->video}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <!-- End of Video Player -->

                        </div>
                        <div class="u-container-align-center u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                            <div class="u-container-layout u-valign-middle u-container-layout-2">
                                <h2 class="u-align-center u-text u-text-default u-text-1">{{$video[0]->title}}</h2>
                                <p class="u-align-center u-text u-text-default u-text-2" style="width: 400px">{!! ($video[0]->description) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(!($galleries->isEmpty()))
    <section class="u-clearfix u-container-align-center-md u-container-align-center-xl u-white u-section-3" id="carousel_125f">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h2 class="u-align-center u-text u-text-default u-text-1">پروژه های ما</h2>
            <p class="u-align-center u-text u-text-2">  شرکت گابریک سازه تابا با کمتر از نیم قرن تجربه با افتخار به تولید مملکت کمک میکند</p>
            <div class="u-expanded-width-lg u-expanded-width-md u-palette-1-base u-shape u-shape-rectangle u-shape-1"></div>
            <div class="u-gallery u-layout-grid u-lightbox u-no-transition u-show-text-on-hover u-gallery-1">
                <div class="u-gallery-inner u-gallery-inner-1">
                    @foreach(json_decode($galleries[0]['gallery']) as $galleryImage)
                    <div class="u-effect-fade u-gallery-item">
                        <div class="u-back-slide" data-image-width="1380" data-image-height="920">
                            <img class="u-back-image u-expanded" src="{{$galleryImage}}">
                        </div>
                        <div class="u-over-slide u-shading u-over-slide-1"></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <a href="https://nicepage.review" class="u-active-black u-align-center u-border-none u-btn u-btn-round u-button-style u-hover-black u-palette-1-base u-radius-50 u-text-active-white u-text-hover-white u-btn-2">Contact Us</a>
        </div>
    </section>
    @endif
    <section class="u-clearfix u-section-7" id="sec-b8e3">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <div class="u-align-center u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                            <div alt="" class="u-image u-image-circle u-image-1" src="" data-image-width="500" data-image-height="500"></div>
                            <h5 class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-1">سعید آل اسحاق </h5>
                            <p class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-2">مدیر عامل</p>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
                            <div alt="" class="u-image u-image-circle u-image-2" src="" data-image-width="500" data-image-height="500"></div>
                            <h5 class="u-text u-text-3">سید مصطفی حسینی بیان</h5>
                            <p class="u-text u-text-4">Accountant-auditor</p>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                            <div alt="" class="u-image u-image-circle u-image-3" src="" data-image-width="500" data-image-height="500"></div>
                            <h5 class="u-text u-text-5">Betty Nilson</h5>
                            <p class="u-text u-text-6">Chief Accountant</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="u-align-center u-clearfix u-container-align-center u-palette-1-base u-section-4" id="carousel_455e">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h2 class="u-align-center u-text u-text-default u-text-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="0"> بیش از 150 پروژه موفق در سرار کشور</h2>
            <p class="u-align-center u-text u-text-2" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="250"> شرکت گابریک سازه تابا با کمتر از نیم قرن تجربه با افتخار به تولید مملکت کمک میکند</p>
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    @foreach($projects as $project)
                        <div class="u-align-center u-container-align-center-lg u-container-align-center-xl u-container-style u-list-item u-repeater-item u-shape-round u-top-left-radius-20 u-video-cover u-white u-list-item-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                                <a href="{{ route('post.show' , $project->slug) }}">
                                    <img class="u-expanded-width u-image u-image-1" src="{{ $project->image }}" alt="" data-image-width="740" data-image-height="925">
                                </a>
                                <h5 class="u-align-center u-text u-text-3"> {{ $project->title }}</h5>
                            </div>
                        </div>
                    @endforeach
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
    <section class="u-align-center u-clearfix u-grey-5 u-section-6" id="sec-8898">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1" >
            <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-gutter-0 u-layout">
                    <div class="u-layout-row">
                        <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1">
                            <div class="u-container-layout u-valign-middle u-container-layout-1">
                                <h2 class="u-text u-text-default u-text-1">Follow us</h2>
                            </div>
                        </div>
                        <div class="u-align-center u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                            <div class="u-container-layout u-valign-middle u-container-layout-2">
                                <div class="u-social-icons u-spacing-10 u-social-icons-1">
                                    <a class="u-social-url" target="_blank" data-type="Instagram" title="Instagram" href="">
                                        <span class="u-icon u-social-icon u-social-instagram u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7eb4"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7eb4"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
                                    </a>
                                    <a class="u-social-url" target="_blank" data-type="LinkedIn" title="LinkedIn" href="">
                                        <span class="u-icon u-social-icon u-social-linkedin u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0e51"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-0e51"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7 C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5 H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path></svg></span>
                                    </a>
                                    <a class="u-social-url" target="_blank" data-type="Telegram" title="Telegram" href="">
                                        <span class="u-icon u-social-icon u-social-telegram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-5dfe"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-5dfe"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M18.4,53.2l64.7-24.9c3-1.1,5.6,0.7,4.7,5.3l0,0l-11,51.8c-0.8,3.7-3,4.6-6.1,2.8L53.9,75.8l-8.1,7.8c-0.9,0.9-1.7,1.6-3.4,1.6l1.2-17l31.1-28c1.4-1.2-0.3-1.9-2.1-0.7L34.2,63.7l-16.6-5.2C14,57.4,14,54.9,18.4,53.2L18.4,53.2z"></path></svg></span>
                                    </a>
                                    <a class="u-social-url" target="_blank" data-type="Email" title="Email" href="">
                                        <span class="u-icon u-social-email u-social-icon u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-13c6"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-13c6"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path id="path3864" fill="#FFFFFF" d="M27.2,28h57.6c4,0,7.2,3.2,7.2,7.2l0,0v42.7c0,3.9-3.2,7.2-7.2,7.2l0,0H27.2c-4,0-7.2-3.2-7.2-7.2V35.2C20,31.1,23.2,28,27.2,28 M56,52.9l28.8-17.8H27.2L56,52.9 M27.2,77.7h57.6V43.5L56,61.3L27.2,43.5V77.7z"></path></svg></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-cacc">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
        </div>
    </footer>

    </body>
@endsection








