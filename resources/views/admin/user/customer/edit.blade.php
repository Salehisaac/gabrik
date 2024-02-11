@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش مشتری </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">مشتری ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش مشتری </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش مشتری
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.user.customer.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{ method_field('PUT') }}

                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام</label>
                                    <input type="text" class="form-control form-control-sm" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">
                                </div>
                                @error('first_name')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام خانوادگی</label>
                                    <input type="text" class="form-control form-control-sm " name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}">
                                </div>
                                @error('last_name')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>



                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for=""> تصویر </label>
                                    <input type="file" class="form-control form-control-sm " name="profile_photo_path" id="profile_photo_path">
                                </div>

                                <img src="{{asset($user->profile_photo_path)}}" width="100" height="50" alt="image" class="mt-2">

                                @error('profile_photo_path')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">وضعیت فعالسازی </label>
                                    <select name="activation" id="activation" class="form-control form-control-sm">
                                        <option value="0" @if(old('activation' , $user->activation) == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('activation', $user->activation) == 1) selected @endif>فعال </option>
                                    </select>
                                </div>

                                @error('activation')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-sm-2 mt-md-2">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection
