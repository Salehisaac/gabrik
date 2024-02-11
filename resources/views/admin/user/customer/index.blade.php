@extends('admin.layouts.master')

@section('head-tag')
    <title>مشتری ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">مشتری ها </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       مشتری ها
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.user.customer.create') }}" class="btn btn-info btn-sm ">ایجاد مشتری جدید</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="position-relative" style="right: 20px">ایمیل</th>
                                <th scope="col" class="position-relative" style="right: 10px">شماره موبایل</th>
                                <th scope="col" class="position-relative" >نام</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">کد ملی</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">فعالسازی</th>
                                <th class="width-16-rem text-center position-relative"   scope="col"><i class="fa fa-cogs me-5" ></i>   تنظیمات</th>

                            </tr>
                        </thead>
                        <tbody >
                        @foreach($customers as $key =>$customer)
                            <tr>
                                <th>{{ $key+=1 }}</th>
                                <td>{{ $customer->email }}</td>
                                <td>{{$customer->mobile}}</td>
                                <td>{{$customer->first_name}}</td>
                                <td>{{$customer->last_name}}</td>
                                <td>{{ $customer->national_id }}</td>
                                <td>
                                    <label>
                                        <input id="{{ $customer->id }}-changeactivition" onchange="changeactivition({{ $customer->id }})" data-url="{{ route('admin.user.customer.activation', $customer->id) }}" type="checkbox" @if ($customer->activation === 1)
                                            checked
                                            @endif>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input id="{{ $customer->id }}" onchange="changeStatus({{ $customer->id }})" data-url="{{ route('admin.user.customer.status', $customer->id) }}" type="checkbox" @if ($customer->status === 1)
                                            checked
                                            @endif>
                                    </label>
                                </td>
                                <td class="width-22-rem" style="text-align: left">
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-person-booth ms-1"></i>نقش</a>
                                    <a href="{{ route('admin.user.customer.edit', $customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.user.customer.destroy', $customer->id) }}" method="post">
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
                            successToast('مشتری با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('مشتری با موفقیت غیر فعال شد')
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
        function changeactivition(id) {
            var element = $("#" + id + "-changeactivition")
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.activation) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('فعالسازی با موفقیت انجام شد')
                        }
                        else
                        {
                            element.prop('checked', false);
                            successToast(' غیر فعالسازی با موفقیت انجام شد')
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
