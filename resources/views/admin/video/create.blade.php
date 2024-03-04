@extends('admin.layouts.master')

@section('head-tag')
    <title>اضافه کردن ویدیو جدید </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp


            <li class="breadcrumb-item font-size-12"><a href="#">  ویدیو </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">اضافه کردن ویدیو جدید </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        اضافه کردن ویدیو جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.video.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.video.store') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf



                                <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                    <div class="form-group">
                                        <label for="video">ویدیو</label>
                                        <input name="video" type="file" class="form-control form-control-sm">
                                    </div>

                                    @error('video')
                                    <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                    @enderror
                                </section>

                        <section class="col-12 mt-sm-2 mt-md-2">
                            <div class="form-group">
                                <label for="">توضیحات ویدیو </label>
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

@endsection
