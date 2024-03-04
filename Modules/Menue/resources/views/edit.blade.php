@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش منوی </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp

            <li class="breadcrumb-item font-size-12"><a href="#">منو   </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش منوی </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش منو
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.content.menu.update', $menu->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان منو</label>
                                    <input name="name" type="text" class="form-control form-control-sm " value="{{old('name', $menu->name)}}">
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
                                        @foreach($parent_menus as $parent_menu)
                                            <option value="{{ $parent_menu->id }}" @if(old('parent_id', $menu->parent_id) == $parent_menu->id ) selected  @endif>{{ $parent_menu->name }}</option>
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
                                    <input name="url" type="text" class="form-control form-control-sm" value="{{old('url', $menu->url)}}">
                                </div>
                                @error('url')
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
                                        <option value="0" @if(old('status', $menu->status) == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('status', $menu->status) == 1) selected @endif>فعال </option>
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
