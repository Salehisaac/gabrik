@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش پست  </title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">پست ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش پست </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش پست
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('posts.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>


                    <form action="{{ route('posts.update' , $post->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('PUT') }}
                        <section class="row">
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">عنوان پست</label>
                                    <input type="text" class="form-control form-control-sm " name="title" id="title" value="{{ old('name' , $post->title ) }}">
                                </div>
                                @error('title')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="status">وضعیت </label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status' , $post->status) == '0') selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('status', $post->status) == '1') selected @endif>فعال </option>
                                    </select>
                                </div>

                                @error('status')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="commentable">قابل کامنت گذاری </label>
                                    <select name="commentable" id="commentable" class="form-control form-control-sm">
                                        <option value="1" @if(old('commentable' , $post->commentable) == '1') selected  @endif> هست </option>
                                        <option value="0" @if(old('commentable', $post->commentable) == '0') selected @endif>نیست </option>
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2 ">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category_id', $post->category) == $category->id ) selected  @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2 ">
                                <div class="form-group">
                                    <label for="">نوع</label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                            <option value="project" @if(old('type', $post->type) == 'project') selected  @endif>project</option>
                                        <option value="blog" @if(old('type', $post->type) == 'blog') selected  @endif>blog</option>
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2 ">
                                <div class="form-group">
                                    <label for="video">ویدیو </label>
                                    <input type="file" class="form-control form-control-sm " name="video" id="video">
                                </div>
                                @error('video')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                    </span>
                                @enderror

                                <a href="{{ asset('videos/' .$post->video) }}" class="btn btn-warning btn-sm" download>
                                    <i class="fa fa-download ms-1"></i>
                                </a>
                            </section>





                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2 ">
                                <div class="form-group">
                                    <label for="image">تصویر </label>
                                    <input type="file" class="form-control form-control-sm " name="image" id="image">
                                </div>
                                @error('image')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                                <section >
                                    <img src="{{ asset($post->image) }}" alt="" width="500" height="250" >
                                </section>





                            <section class="col-12 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="content">توضیحات </label>
                                    <textarea name="content" id="content"  class="form-control-sm form-control" rows="6">
                                        {{ old('content', $post->content) }}
                                    </textarea>
                                </div>
                                @error('content')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">خلاصه پست </label>
                                    <textarea name="summary" id="summary"  class="form-control-sm form-control" rows="6" >
                                        {{ old('summary', $post->summary) }}
                                    </textarea>
                                </div>

                                @error('summary')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                                <section class="col-12 mt-3">
                                    <div class="form-group">
                                        <label for="tags">تگ ها</label>
                                        <input type="hidden" class="form-control form-control-sm " name="tags" id="tags" value="{{ old('tags', $post->tags) }}">
                                        <select name="" class="select2 form-control form-control-sm" id="select_tags" multiple>

                                        </select>
                                        @error('tags')
                                        <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                        @enderror
                                    </div>

                                </section>

                            <section class="col-12 mt-sm-2 my-md-3">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection




@section('script')

    <script src=" {{asset('admin-assets/ckeditor/ckeditor.js')}} "></script>
    <script src=" {{asset('admin-assets/jalalidatepicker/persian-date.min.js')}} "></script>
    <script src=" {{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}} "></script>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('summary');
    </script>

    <script>

        $(document).ready(function() {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if(tags_input.val()!== null && tags_input.val().length > 0)
            {
                default_data = default_tags.split(',');
            }
            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد کنید',
                tags:true,
                data: default_data
            });

            select_tags.children('option').attr('selected',true).trigger('change');

            $('#form').submit(function ( event){
                if(select_tags.val() !== null && select_tags.val().length > 0)
                {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })


        })
    </script>

    <script>
        $(document).ready(function()
        {
            $('#published_at_view').persianDatepicker({
                autoClose: true,
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                persianDigit : true,
                onSelect: function(unixTimestamp) {
                    $('#published_at').val(unixTimestamp);
                }

            });
        });
    </script>

@endsection
