@extends('admin.layouts.master')

@section('head-tag')
    <title> نمایش نظر </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">نظرات  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">نمایش نظرها</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        نمایش نظر
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.content.comment.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section class="card mb-3 ">
                    <section class="card-header text-white bg-custom-yellow">
                        {{ $comment->user->name}} - {{ $comment->auther_id }}

                    </section>

                    <section class="card-body">
                        <h5 class="card-title">
                              کد پست :   {{$comment->commentable->id}}    --------   مشخصات پست : {{$comment->commentable->title}}  -----  دسته بندی : {{$comment->commentable->category->name}}

                        </h5>
                        <p class="card-text">{{ $comment->body }}</p>
                    </section>

                    @if($comment->parent_id == NULL)

                <section>

                    <form action=" {{ route('admin.content.comment.answer', $comment->id) }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group me-3 ">
                                    <label for="">پاسخ ادمین</label>
                                    <textarea name="body" class="form-control form-control-sm " rows="4"></textarea>
                                </div>
                                @error('body')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                                <section class="col-12 mt-sm-2 mb-2 me-3">
                                    <button class="btn btn-primary btn-sm">ثبت</button>
                                </section>
                            </section>

                    </form>

                </section>
                    @endif

            </section>
        </section>
    </section>

@endsection
@section('script')
            <script src=" {{asset('admin-assets/ckeditor/ckeditor.js')}} "></script>

            <script>
                CKEDITOR.replace('body');
            </script>
@endsection
