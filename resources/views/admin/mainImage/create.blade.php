
@extends('admin.layouts.master')

@section('head-tag')
    <title>اضافه کردن عکس صفحه اصلی جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp


            <li class="breadcrumb-item font-size-12"><a href="#">  عکس های صفحه اصلی  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">اضافه کردن عکس صفحه اصلی جدید </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        اضافه کردن عکس صفحه اصلی جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.main_image.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.main_image.store') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf



                                <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                    <div class="form-group">
                                        <label for="image">تصویر</label>
                                        <input name="image" id="image" type="file" class="form-control form-control-sm">
                                    </div>

                                    @error('image')
                                    <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                    @enderror

                                    @error('image')
                                    <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                    @enderror
                                </section>


                        <section class="col-12 col-md-6 mt-2">
                            <div class="form-group">
                                <label for="">عنوان تصویر</label>
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


                        <section class="col-12 mt-sm-2 mt-md-2">
                            <div class="form-group">
                                <label for="">توضیحات</label>
                                <textarea name="description" id="description"  class="form-control-sm form-control" rows="6" >
                                        {{ old('description') }}
                                </textarea>
                            </div>

                            @error('description')
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

                                @error('status')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                        <section class="col-12 col-md-6 mt-2">
                            <div class="form-group">
                                <label for="">آدرس url</label>
                                <div id="urlSelection">
                                    <select id="urlSelect" name="url_select" class="form-control form-control-sm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <input id="urlInput" name="url" type="text" class="form-control form-control-sm" value="{{ old('url') }}" placeholder="خودتان یک آدرس اضافه کنید">
                                </div>
                            </div>
                            @error('url')
                            <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>




                                <section class="col-12 mt-sm-2">
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
    <script>
        CKEDITOR.replace('description');
    </script>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Get references to select and input elements
                var urlSelect = document.getElementById("urlSelect");
                var urlInput = document.getElementById("urlInput");

                // Add event listener to the select element
                urlSelect.addEventListener("change", function() {
                    // Check if the selected option is the last one ("خودتان یک آدرس اضافه کنید")
                    if (urlSelect.value === "خودتان یک آدرس اضافه کنید") {
                        // Show the input field and hide the select box
                        urlInput.style.display = "block";
                        urlSelect.style.display = "none";
                    } else {
                        // Show the select box and hide the input field
                        urlInput.style.display = "none";
                        urlSelect.style.display = "block";
                    }
                });
            });
        </script>


@endsection
