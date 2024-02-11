@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش نقش </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">نقش ها   </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش نقش </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش نقش
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.user.role.update', $role->id) }}" method="post">

                        {{ method_field('PUT') }}
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">عنوان نقش</label>
                                    <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name', $role->name) }}">
                                </div>
                                @error('name')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>

                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">توضیح نقش</label>
                                    <input type="text" name="description" class="form-control form-control-sm " value="{{old('description', $role->description)}}">
                                </div>
                                @error('description')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>

                            <section class="col-12 col-md-2 mt-sm-2 mt-md-4">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>


                        </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection
