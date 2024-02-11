@extends('admin.layouts.master')

@section('head-tag')
    <title>افزودن نقش جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">نقش ها   </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد نقش جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد نقش جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.user.role.store') }}" method="post">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">عنوان نقش</label>
                                    <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name') }}">
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
                                    <input type="text" name="description" class="form-control form-control-sm " >
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


                            <section class="col-12">
                                <section class="row border-top mt-3 py-3">

                                    @foreach( $permissions as $key => $permission)

                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" style="float: right" name="permissions[]" value="{{ $permission->id }}" id="{{$permission->id}}"  checked >
                                            <label for="{{$permission->id}}" class="form-check-label me-4" >{{ $permission->name }}</label>
                                        </div>
                                        <div class="mt-2">
                                            @error('permissions.' . $key)
                                            <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                            @enderror
                                        </div>

                                    </section>



                                    @endforeach


                                </section>

                            </section>
                            </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection
