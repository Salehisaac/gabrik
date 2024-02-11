@extends('admin.layouts.master')

@section('head-tag')
    <title>سفارشات</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page"> سفارشات</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       سفارشات
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد سفارش جدید</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" style="height: 200px">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">کد سفارش</th>
                                <th scope="col">مجموع مبلغ سفارش (بدون تخفیف)</th>
                                <th scope="col">مجموع تمامی مبلغ تخفیفات</th>
                                <th scope="col">مبلغ تخفیف همه ی محصولات</th>
                                <th scope="col">مبلغ نهایی</th>
                                <th scope="col">وضعیت پرداخت</th>
                                <th scope="col">شیوه ی پرداخت</th>
                                <th scope="col">بانک</th>
                                <th scope="col">وضعیت ارسال</th>
                                <th scope="col">شیوه ی ارسال</th>
                                <th scope="col">وضعیت سفارش</th>

                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >

                        @foreach($orders as $order)

                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $order->id }}</td>
                                <td> {{$order->order_final_amount}} تومان </td>
                                <td>{{$order->order_discount_amount}}تومان </td>
                                <td>{{$order->order_total_products_discount_amount}} تومان </td>
                                <td>{{$order->order_final_amount - $order->order_discount_amount}} تومان </td>
                                <td>{{ $order->payment_status_value }}</td>
                                <td>{{ $order->payment_type_value }}</td>
                                <td>{{$order->payment->paymentable->gateway ?? '-'}}</td>
                                <td>{{ $order->delivery_status_value }}</td>
                                <td>{{$order->delivery->name}}</td>
                                <td>{{ $order->order_status_value }}</td>
                                <td class="width-8-rem" style="text-align: left">
                                    <div class="dropdown " >
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-tools "> عملیات</i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="{{route('admin.market.order.show', $order->id)}}" class="dropdown-item text-right" style="font-size: .75rem"><i class="fa fa-images"></i> مشاهده فاکتور</a>
                                            <a href="{{ route('admin.market.order.changeSendStatus', $order->id) }}" class="dropdown-item text-right" style="font-size: .75rem"><i class="fa fa-list-ul"></i> تغییر وضعیت ارسال</a>
                                            <a href="{{ route('admin.market.order.changeOrderStatus', $order->id) }}" class="dropdown-item text-right" style="font-size: .75rem"><i class="fa fa-edit"></i> تغییر وضعیت سفارش</a>
                                            <a href="{{ route('admin.market.order.cancelOrder', $order->id) }}" class="dropdown-item text-right" style="font-size: .75rem"><i class="fa fa-window-close"></i> باطل کردن سفارش</a>
                                        </div>
                                    </div>
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
