@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش گالری  </title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">پست ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش گالری </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش گالری
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('posts.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <section class="row">
                        <section class="col-12">
                            @if(json_decode($post->gallery) !== null)
                            @forelse(json_decode($post->gallery) as $gallery)
                                <img src="{{ asset($gallery) }}" class="px-3 py-3 " style="border-radius:8%" alt="" width="500" height="250" >

                            @empty
                                <h2 class="text-danger">در گالری شما عکس وجود ندارد اگر مایل هستید به آن عکس اضافه کنید</h2>
                            @endforelse
                            @else
                                <h2 class="text-danger">در گالری شما عکس وجود ندارد اگر مایل هستید به آن عکس اضافه کنید</h2>
                            @endif
                        </section>
                    </section>


                    <form action="{{ route('posts.update.gallery' , $post->id) }}" method="post" enctype="multipart/form-data" id="form">
                        {{ method_field('PUT') }}
                        @csrf
                        <section class="col-12 col-md-6 mt-sm-2 mt-md-2 w-100">
                            <div class="form-group">
                                <label for="gallery[]">تغییر گالری </label>
                                <input type="file" class="form-control form-control-sm " name="gallery[]" id="gallery[]" multiple>
                            </div>
                            @error('gallery.*')
                            <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror

                            @if(!empty(json_decode($post->gallery)))

                            <section class="col-12 mt-sm-2 my-md-3 d-flex justify-content-center">

                            <form class="d-inline" action="{{ route('posts.gallery.delete', $post->id) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                                <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt ms-1"></i>حذف گالری</button>
                            </form>

                            </section>

                            @endif

                            <section class="col-12 mt-sm-2 my-md-3 d-flex justify-content-center">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>


                    </form>

            </section>
        </section>
    </section>

@endsection

@section('script')
    @include('admin.alerts.sweet-alert.delete-confirm', ['className' => 'delete'])
@endsection









