@extends('admin.layouts.master')

@section('head-tag')
    <title>ادمین تیکت </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش تیکت ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ادمین تیکت </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">


                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام ادمین</th>
                                <th scope="col">ایمیل ادمین</th>

                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >

                        @foreach($admins as $key =>$admin)

                            <tr>
                                <th>{{$key +=1}}</th>
                                <td>{{ $admin->FullName }}</td>
                                <td> {{ $admin->email }} </td>
                                <td class="width-16-rem" style="text-align: center">
                                    <a href="{{route('admin.ticket.admin.set', $admin->id)}}" @if($admin->ticketAdmin == null) class="btn btn-success btn-sm" @endif @if($admin->ticketAdmin !== null) class="btn btn-danger btn-sm" @endif ><i class="fa fa-check ms-1"></i>
                                    {{ $admin->ticketAdmin == null ? 'اضافه' : 'حذف'}}
                                    </a>
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
