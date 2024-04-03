@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد منوی جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">منو   </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد منوی جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد منوی جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.content.menu.store') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان منو</label>
                                    <input name="name" type="text" class="form-control form-control-sm " value="{{old('name')}}">
                                </div>
                                @error('name')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 ">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="parent_id" id="parent_id" class="form-control form-control-sm">
                                        <option value="">منوی اصلی</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" @if(old('parent_id') == $menu->id ) selected  @endif>{{ $menu->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('parent_id')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
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
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
