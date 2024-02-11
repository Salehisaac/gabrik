@extends('admin.layouts.master')

@section('head-tag')
    <title> نمایش تراکنش </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">تراکنش ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">نمایش تراکنش</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        نمایش تراکنش
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.payment.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section class="card mb-3 ">
                    <section class="card-header text-white bg-custom-yellow">
                        {{ $payment->user->fullName}} - {{ $payment->user->id }}

                    </section>

                    <section class="card-body">
                        <h5 class="card-title">
                              مقدار تراکنش :   {{$payment->paymentable->amount}}    --------   بانک مربوطه : {{$payment->paymentable->gateway ?? '-'}}  -----  ای دی تراکنش : {{$payment->paymentable->transaction_id ?? '-'}}   -----  تاریخ پرداخت  : {{jalaliDate($payment->paymentable->pay_date) ?? '-'}}

                        </h5>
                    </section>

            </section>
        </section>
    </section>

@endsection
