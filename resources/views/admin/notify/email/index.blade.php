@extends('admin.layouts.master')

@section('head-tag')
    <title>ایمیل ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش اطلاع رسانی  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایمیل ها</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       ایمیل ها
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.notify.email.create') }}" class="btn btn-info btn-sm ">ایجاد اطلاعیه ایمیلی جدید</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان اطلاعیه</th>
                                <th scope="col">متن اطلاعیه</th>
                                <th scope="col">تاریخ ارسال</th>
                                <th scope="col">وضعیت</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach($emails as $key => $email)
                            <tr>
                                <th>{{ $key++ }}</th>
                                <td>{{ $email->subject }}</td>
                                <td>{{ $email->body }}</td>
                                <td> {{ jalaliDate($email->published_at) }} </td>
                                <td>
                                    <label>
                                        <input id="{{ $email->id }}" onchange="changeStatus({{ $email->id }})" data-url="{{ route('admin.notify.email.status', $email->id) }}" type="checkbox" @if ($email->status === 1)
                                            checked
                                            @endif>
                                    </label>
                                </td>
                                <td class="width-22-rem" style="text-align: left">
                                    <a href="{{ route('admin.notify.email.edit', $email->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <a href="{{ route('admin.notify.email-file.index', $email->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-file ms-1"></i>فایل های ضمیمه شده</a>

                                    <form class="d-inline" action="{{ route('admin.notify.email.destroy', $email->id) }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
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
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('ایمیل با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('ایمیل با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
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
