@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پست جدید </title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">پست ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد پست جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد پست جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.content.post.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.content.post.store') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf

                        <section class="row">
                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">عنوان پست</label>
                                    <input name="title" id="title" type="text" class="form-control form-control-sm " value="{{ old('title') }}">
                                </div>

                                @error('title')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>



                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">وضعیت </label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status') == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال </option>
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">قابل کامنت گذاری </label>
                                    <select name="commentable" id="commentable" class="form-control form-control-sm">
                                        <option value="0" @if(old('commentable') == 1) selected  @endif> هست </option>
                                        <option value="1" @if(old('commentable') == 0) selected @endif>نیست </option>
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 ">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        @foreach($postCategories as $postCategory)
                                        <option value="{{ $postCategory->id }}" @if(old('category_id') == $postCategory->id ) selected  @endif>{{ $postCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 ">
                                <div class="form-group">
                                    <label for="">تصویر </label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image" multiple>
                                </div>
                                @error('image')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                                <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                    <div class="form-group">
                                        <label for="">تاریخ انتشار</label>
                                        <input type="hidden" name="published_at" id="published_at" type="text" class="form-control form-control-sm" value="{{ old('published_at') }}">
                                        <input  name="" id="published_at_view" type="text" class="form-control form-control-sm" value="{{ old('published_at') }}">
                                    </div>
                                    @error('date')
                                    <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                    @enderror
                                </section>

                            <section class="col-12  mt-3">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm " name="tags" id="tags" value="{{ old('tags') }}">
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

                            <section class="col-12 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">خلاصه پست </label>
                                    <textarea name="summary" id="summary"  class="form-control-sm form-control" rows="6" >
                                        {{ old('summary') }}
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

                            <section class="col-12 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">متن پست </label>
                                    <textarea name="body" id="body"  class="form-control-sm form-control" rows="6" >
                                        {{ old('body') }}
                                    </textarea>
                                </div>

                                @error('body')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>

                                <section class="col-12 mt-sm-2 mt-md-3">
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
        CKEDITOR.replace('body');
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
