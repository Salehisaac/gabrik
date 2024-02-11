@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش تیکت ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">تیکت </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       تیکت ها
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="#" class="btn btn-info btn-sm disabled ">ایجاد تیکت</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نویسنده تیکت</th>
                                <th scope="col">عنوان تیکت</th>
                                <th scope="col">دسته تیکت</th>
                                <th scope="col">اولویت تیکت</th>
                                <th scope="col">ارجاع شده از :</th>
                                <th scope="col"> تیکت مرجع</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >

                        @foreach($tickets as $key =>$ticket)

                            <tr>
                                <th>{{$key +=1}}</th>
                                <td>{{ $ticket->user->FullName }}</td>
                                <td> {{ $ticket->subject }} </td>
                                <td>{{ $ticket->ticketcategory->name }}</td>
                                <td>{{ $ticket->ticketpriority->name }}</td>
                                <td>  {{$ticket->ticketadmin->user->fullname}} </td>
                                <td>  {{$ticket->ticket_id !== null ? $ticket->parent->subject : '-' }} </td>
                                <td class="width-16-rem" style="text-align: center">
                                    <a href="{{ route('admin.ticket.show', $ticket->id) }}" class="btn btn-info btn-sm "><i class="fa fa-eye ms-1"></i>نمایش</a>
                                    <a href="{{ route('admin.ticket.change', $ticket->id) }}" class="btn btn-success btn-sm "><i class="fa fa-check ms-1"></i>
                                        {{ $ticket->status ==1 ? 'باز کردن' : 'بستن' }}
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
