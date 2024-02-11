@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش تنظیمات </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش تنظیمات  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">تنظیمات </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش تنظیمات</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش تنظیمات
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.setting.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>


                    <form action="{{ route('admin.setting.update' , $setting->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('PUT') }}
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">عنوان سایت</label>
                                    <input type="text" class="form-control form-control-sm " name="title" id="title" value="{{ old('title' , $setting->title ) }}">
                                </div>
                                @error('title')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">توضیحات سایت</label>
                                    <input type="text" class="form-control form-control-sm " name="description" id="description" value="{{ old('description' , $setting->description ) }}">
                                </div>
                                @error('description')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">کلمات کلیدی سایت</label>
                                    <input type="text" class="form-control form-control-sm " name="keywords" id="keywords" value="{{ old('keywords' , $setting->keywords ) }}">
                                </div>
                                @error('keywords')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">لوگو </label>
                                    <input type="file" class="form-control form-control-sm " name="logo" id="logo">
                                </div>
                                @error('logo')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">icon </label>
                                    <input type="file" class="form-control form-control-sm " name="icon" id="icon">
                                </div>
                                @error('icon')
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


