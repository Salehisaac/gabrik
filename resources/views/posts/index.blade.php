@extends('layouts.master')

@section('head-tag')
    <title>گابریک سازه تابا</title>
    <link rel="stylesheet" href="{{ asset('css/nicepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Page-2.css') }}">
@endsection

@section('content')
    <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
    <section class="u-align-center u-clearfix u-section-1" id="sec-6ad1">

        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="data-layout-selected u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
                <div class="u-layout" style="">
                    <div class="u-layout-row" style="" >
                        <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-44 u-size-xs-60 u-image-1 rounded-image" style='background-image: url("{{asset($post->image)}}");' data-image-width="1080" data-image-height="1080">
                            <div class="u-container-layout u-valign-middle u-container-layout-1" src=""></div>
                        </div>
                        <div class="u-align-left u-container-style u-layout-cell u-palette-1-base u-right-cell u-size-16 u-size-xs-60 u-layout-cell-2 rounded-image" >
                            <div class="u-container-layout u-container-layout-2" dir="rtl">
                                <h2 class="u-align-left u-text u-text-1" dir="rtl">{{$post->title}}</h2>
                                <p class="u-align-left u-text u-text-2" dir="rtl">{{ strip_tags($post->content) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(json_decode($post->gallery !== null))
            <div class="u-expanded-width u-gallery u-layout-horizontal u-lightbox u-no-transition u-show-text-on-hover u-gallery-1">
                <div class="u-gallery-inner">
                    @foreach(json_decode($post->gallery) as $galleyImage)
                    <div class="u-effect-fade u-gallery-item u-gallery-item-1">
                        <div class="u-back-slide"><img class="u-back-image" src="{{asset($galleyImage)}}">
                        </div>
                        <div class="u-over-slide u-shading u-over-slide-1">

                        </div>
                    </div>
                    @endforeach
                </div>

                @if(count(json_decode($post->gallery)) > 3)
                <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
                    <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
                </a>
                <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
                    <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
                </a>
                @endif
            </div>
            @endif
        </div>

    </section>
    <section class="u-clearfix u-section-2" id="sec-6349">
        <div class="u-clearfix u-sheet u-sheet-1"><!--blog--><!--blog_options_json--><!--{"type":"Recent","source":"","tags":"","count":""}--><!--/blog_options_json-->
            <div class="u-blog u-expanded-width u-blog-1">
                <div class="u-list-control"></div>
                <div class="u-repeater u-repeater-1"><!--blog_post-->
                    @foreach($randomPosts as $randomPost)
                        <div class="u-align-left u-blog-post u-container-style u-repeater-item u-video-cover">
                            <div class="u-container-layout u-similar-container u-container-layout-1">
                                <div style="float: right;">
                                    <a class="u-post-header-link" href="{{ route('post.show' , $randomPost->id) }}">
                                        <img alt="" class="u-blog-control u-expanded-width u-image u-image-default u-image-1 rounded-image" src="{{ asset( $randomPost->image) }}">
                                    </a>
                                </div>
                                <h4 class="u-blog-control u-text u-text-1" style="float: right;">
                                    <a class="u-post-header-link" href="{{ route('post.show' , $randomPost->id) }}">{{ $randomPost->title }}</a>
                                </h4>
                                <br>
                                <div class="u-blog-control u-metadata u-text-grey-30 u-metadata-1" style="clear: right; float: right;">
                                    <span class="u-meta-date u-meta-icon">{{ jalaliDate($randomPost->created_at) }}</span>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="u-list-control"></div>
            </div><!--/blog-->
        </div>
    </section>
    <section class="u-align-center u-clearfix u-grey-5 u-section-3" id="sec-8898">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
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
                                    <a class="u-social-url" target="_blank" data-type="Instagram" title="Instagram" href=""><span class="u-icon u-social-icon u-social-instagram u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7eb4"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7eb4"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
                                    </a>
                                    <a class="u-social-url" target="_blank" data-type="LinkedIn" title="LinkedIn" href=""><span class="u-icon u-social-icon u-social-linkedin u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0e51"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-0e51"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
            C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
            H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path></svg></span>
                                    </a>
                                    <a class="u-social-url" target="_blank" data-type="Telegram" title="Telegram" href=""><span class="u-icon u-social-icon u-social-telegram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-5dfe"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-5dfe"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M18.4,53.2l64.7-24.9c3-1.1,5.6,0.7,4.7,5.3l0,0l-11,51.8c-0.8,3.7-3,4.6-6.1,2.8L53.9,75.8l-8.1,7.8
	c-0.9,0.9-1.7,1.6-3.4,1.6l1.2-17l31.1-28c1.4-1.2-0.3-1.9-2.1-0.7L34.2,63.7l-16.6-5.2C14,57.4,14,54.9,18.4,53.2L18.4,53.2z"></path></svg></span>
                                    </a>
                                    <a class="u-social-url" target="_blank" data-type="Email" title="Email" href=""><span class="u-icon u-social-email u-social-icon u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-13c6"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-13c6"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path id="path3864" fill="#FFFFFF" d="M27.2,28h57.6c4,0,7.2,3.2,7.2,7.2l0,0v42.7c0,3.9-3.2,7.2-7.2,7.2l0,0H27.2
	c-4,0-7.2-3.2-7.2-7.2V35.2C20,31.1,23.2,28,27.2,28 M56,52.9l28.8-17.8H27.2L56,52.9 M27.2,77.7h57.6V43.5L56,61.3L27.2,43.5V77.7z
	"></path></svg></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-cacc"><div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
        </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
        <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
            <span>Website Templates</span>
        </a>
        <p class="u-text">
            <span>created with</span>
        </p>
        <a class="u-link" href="" target="_blank">
            <span>Website Builder Software</span>
        </a>.
    </section>

    </body>
@endsection
