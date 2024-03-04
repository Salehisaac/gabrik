@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش ویدیو اصلی  </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">ویدیو ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش ویدیو اصلی </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش ویدیو اصلی
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.video.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>


                    <form action="{{ route('admin.video.update' , $video->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('PUT') }}
                        <section class="row">

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2 ">
                                <div class="form-group">
                                    <label for="video">ویدیو </label>
                                    <input type="file" class="form-control form-control-sm " name="video" id="video">
                                </div>
                                @error('video')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                    </span>
                                @enderror

                                <a href="{{ asset('videos/' .$video->video) }}" class="btn btn-warning btn-sm" download>
                                    <i class="fa fa-download ms-1"></i>
                                </a>
                            </section>


                                <section class="col-12 mt-sm-2 mt-md-2">
                                    <div class="form-group">
                                        <label for="description">توضیحات </label>
                                        <textarea name="description" id="description"  class="form-control-sm form-control" rows="6">
                                        {{ old('description', $video->description) }}
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

    <script src=" {{asset('admin-assets/ckeditor/ckeditor.js')}} "></script>
    <script>
        CKEDITOR.replace('description');
    </script>

@endsection
