@extends('admin.layouts.master')

@section('head-tag')
    <title>پست ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">پست ها</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        پست ها
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('posts.create') }}" class="btn btn-info btn-sm ">ایجاد پست</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان پست</th>
                            <th scope="col">دسته</th>
                            <th>اسلاگ</th>
                            <th>عکس</th>
                            <th>ویدیو</th>
                            <th>نوع</th>
                            <th>تگ ها</th>
                            <th>وضعیت</th>
                            <th>کامنت گذاری</th>
                            <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody >

                        @foreach($posts as $key => $post)

                            <tr>

                                <th>{{ $key +=1 }}</th>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @php
                                        if (!empty($post->category->name))
                                            echo $post->category->name;
                                        else
                                            echo 'وجود ندارد';

                                    @endphp




                                </td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <img src="{{ asset($post->image) }}" alt="" width="50" height="50">
                                </td>



                                <td>
                                    <a href="{{ asset('videos/' .$post->video) }}" class="btn btn-warning btn-sm" download>
                                        <i class="fa fa-download ms-1"></i>
                                    </a>
                                </td>


                                <td>{{ $post->type }}</td>

                                <td>{{ $post->tags }}</td>

                                <td>
                                    <label>
                                        <input id="{{ $post->id }}" onchange="changeStatus({{ $post->id }})" data-url="{{ route('posts.status', $post->id) }}" type="checkbox" @if ($post->status === '1')
                                            checked
                                            @endif>
                                    </label>
                                </td>

                                <td>
                                    <label>
                                        <input id="{{ $post->id }}-commentable" onchange="commentable({{ $post->id }})" data-url="{{ route('posts.commentable', $post->id) }}" type="checkbox" @if ($post->commentable === '1')
                                            checked
                                            @endif>
                                    </label>
                                </td>

                                <td class="width-16-rem" style="text-align: left">

                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <a href="{{ route('posts.gallery', $post->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-photo-video ms-1"></i>گالری</a>
                                    <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt ms-1"></i>حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach



                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>


@endsection

@section('script')

    <script type="text/javascript">
        function changeStatus(id) {
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error: function () {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });
            function successToast(message) {

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-bs-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).fadeOut(5500).queue(function () {
                    $(this).remove();
                })
            }

            function errorToast(message) {

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-bs-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).fadeOut(5500).queue(function () {
                    $(this).remove();
                })
            }

        }
    </script>

    <script>
        function commentable(id) {
            var element = $("#" + id + "-commentable")
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.commentable) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('امکان درج نظر با موفقیت فعال شد')
                        }
                        else
                        {
                            element.prop('checked', false);
                            successToast('امکان درج نظر با موفقیت غیر فعال شد')
                        }
                    }
                    else
                    {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error: function () {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });


            function successToast(message) {

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-bs-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).fadeOut(5500).queue(function () {
                    $(this).remove();
                })
            }

            function errorToast(message) {

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-bs-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).fadeOut(5500).queue(function () {
                    $(this).remove();
                })
            }

        }
    </script>

    @include('admin.alerts.sweet-alert.delete-confirm', ['className' => 'delete'])


@endsection
