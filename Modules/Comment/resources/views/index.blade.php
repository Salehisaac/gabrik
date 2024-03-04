@extends('admin.layouts.master')

@section('head-tag')
    <title>نظرات</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">نظرات </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       نظرات
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="#" class="btn btn-info btn-sm disabled ">ایجاد نظر</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نظر</th>
                                <th scope="col">پاسخ به</th>
                                <th scope="col">کد کاربر</th>
                                <th scope="col">نویسنده نظر</th>
                                <th scope="col">کد پست</th>
                                <th scope="col">پست</th>
                                <th scope="col"> وضعیت کامنت</th>
                                <th scope="col">وضعیت نمایش</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >

                        @foreach($comments as $key => $comment)
                            <tr>
                                <th>{{ $key += 1 }}</th>
                                <td>{{ strip_tags(\Illuminate\Support\Str::limit($comment->body, 10)) }}</td>
                                <td>{{ $comment->parent_id ? \Illuminate\Support\Str::limit($comment->parent->body, 10) : 'کامنت اصلی' }}</td>
                                <td>{{ $comment->author_id }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->commentable_id  }}</td>
                                <td>{{ $comment->commentable->title }}</td>
                                <td>{{ $comment->approved == 1 ? 'تایید شده'  :  'تایید نشده  '    }}</td>
                                <td>
                                    <label>
                                        <input id="{{ $comment->id }}" onchange="changeStatus({{ $comment->id }})" data-url="{{ route('admin.content.comment.status', $comment->id) }}" type="checkbox" @if ($comment->status === 1)
                                            checked
                                            @endif>
                                    </label>
                                </td>
                                <td class="width-16-rem" style="text-align: left">
                                    <a href="{{ route('admin.content.comment.show', $comment->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye ms-1"></i>نمایش</a>
                                    @if($comment->approved == 0)
                                        <form class="d-inline" action="{{ route('admin.content.comment.approved', $comment->id) }}" method="post">
                                            @csrf
                                            {{ method_field('put') }}
                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-check ms-1"></i>تایید</button>
                                        </form>
                                    @endif
                                    @if($comment->approved == 1)
                                        <form class="d-inline" action="{{ route('admin.content.comment.approved', $comment->id) }}" method="post">
                                            @csrf
                                            {{ method_field('put') }}
                                        <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-check ms-1"></i>عدم تایید</button>
                                        </form>
                                    @endif
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
                            successToast('نظر با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('نظر با موفقیت غیر فعال شد')
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



@endsection
