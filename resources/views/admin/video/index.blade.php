@extends('admin.layouts.master')

@section('head-tag')
    <title>ویدیو اصلی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویدیو اصلی </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       ویدیو اصلی
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.video.create') }}" class="btn btn-info btn-sm">اضافه کردن ویدیو</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ویدیو</th>
                                <th scope="col">توضیحات ویدیو</th>
                                <th scope="col"> اضافه شده توسط </th>
                                <th scope="col">وضعیت نمایش</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >

                        @foreach($videos as $key => $video)

                            <tr>
                                <th>{{ $key += 1 }}</th>
                                <td><a href="{{ asset('videos/' .$video->video) }}" class="btn btn-warning btn-sm" download><i class="fa fa-download ms-1"></i></a></td>
                                <td>{{ strip_tags(\Illuminate\Support\Str::limit($video->description , 30)) }} ...</td>

                                <td>{{ $video->user->name }}</td>

                                <td>
                                    <label>
                                        <input id="{{ $video->id }}" onchange="changeStatus({{ $video->id }})" data-url="{{ route('admin.video.status', $video->id) }}" type="checkbox" @if ($video->status === '1')
                                            checked
                                            @endif>
                                    </label>
                                </td>
                                <td class="width-16-rem" style="text-align: left">
                                    <a href="{{ route('admin.video.edit', $video->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.video.destroy', $video->id) }}" method="post">
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
            var element = $("#" + id);
            var url = element.attr('data-url');
            var isChecked = element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (isChecked) {
                            // Uncheck all other checkboxes except the current one
                            $('input[type="checkbox"]').not(element).prop('checked', false);
                            successToast('ویدیو با موفقیت فعال شد');
                        } else {
                            successToast('ویدیو با موفقیت غیر فعال شد');
                        }
                    } else {
                        element.prop('checked', !isChecked);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است');
                    }
                },
                error: function() {
                    element.prop('checked', !isChecked);
                    errorToast('ارتباط برقرار نشد');
                }
            });
        function successToast(message){

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-bs-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).fadeOut(5500).queue(function() {
                    $(this).remove();
                })
            }

            function errorToast(message){

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-bs-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).fadeOut(5500).queue(function() {
                    $(this).remove();
                })
            }
        }
    </script>

    @include('admin.alerts.sweet-alert.delete-confirm', ['className' => 'delete'])



@endsection
