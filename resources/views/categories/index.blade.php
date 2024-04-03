@extends('layouts.master')

@section('head-tag')
    <title>{{ $category->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nicepage.css') }}">
@endsection

@section('content')
    <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
    <section class="u-align-center u-clearfix u-container-align-center u-image u-shading u-section-1" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)) , url('{{ asset( $category->image ) }}')" id="sec-e02b" data-image-width="1080" data-image-height="1080">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <h1 class="u-align-center u-text u-text-default u-text-1">{{$category->name}}</h1>
            <p class="u-align-center u-large-text u-text u-text-variant u-text-2 mb-3">{!! $category->description !!}</p>
            <a href="https://nicepage.com/wordpress-themes" class="u-btn u-button-style u-btn-1" style="display: block; width: 200px; margin: 0 auto;border-radius: 10px;margin-bottom: 50px">بیشتر بندانید</a>
        </div>
    </section>
    <section class="u-clearfix u-grey-5 u-section-2" id="sec-6681">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    @foreach($postCategories as $postCategory)
                        <div class="u-container-align-center u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-video-cover u-white" style="background-color: #e5e5e5">
                            <div class="u-container-layout u-similar-container u-valign-top-xl u-container-layout-1">
                                <img alt="" class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-1" data-image-width="2000" data-image-height="1333" src="{{ asset($postCategory->image) }}" style="border-radius: 10px">
                                <h5 class="u-align-center u-text u-text-default u-text-1" style="margin-bottom: 10px;">{{$postCategory->title}}</h5>
                                <div class="button-container">
                                    <p class="u-align-center u-text u-text-default u-text-2 custom-paragraph" >{!!$postCategory->summary!!}</p>
                                    <a href="{{ route('post.show', $postCategory->slug) }}" class="u-align-center u-btn u-button-style u-btn-1 custom-button" style="display: inline-block;margin-top: 5px;border-radius: 10px">اطلاعات بیشتر</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
        <a class="u-link" href="https://nicepage.best" target="_blank">
            <span>Website Builder</span>
        </a>.
    </section>

    </body>
@endsection
