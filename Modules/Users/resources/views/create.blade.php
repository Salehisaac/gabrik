@extends('admin.layouts.master')

@section('head-tag')
    <title>افزودن ادمین جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">ادمین ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد ادمین جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد ادمین جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('users.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام</label>
                                    <input type="text" class="form-control form-control-sm" name="name" id="first_name" value="{{ old('name') }}">
                                </div>
                                @error('first_name')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">ایمیل</label>
                                    <input type="text" class="form-control form-control-sm " name="email" id="email" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">کلمه ی عبور</label>
                                    <input type="password" class="form-control form-control-sm " name="password" id="password" value="{{ old('password') }}">
                                </div>
                                @error('password')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">تکرار کلمه ی عبور</label>
                                    <input type="password" class="form-control form-control-sm " name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}">
                                </div>
                                @error('password_confirmation')
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

                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">نقش </label>
                                    <select name="role" id="role" class="form-control form-control-sm">
                                        <option value="admin" selected>ادمین</option>
                                    </select>
                                </div>

                                @error('role')
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
