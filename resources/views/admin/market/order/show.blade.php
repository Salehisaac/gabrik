@extends('admin.layouts.master')

@section('head-tag')
    <title>مشاهده فاکتور</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page"> مشاهده فاکتور</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       مشاهده فاکتور
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">


                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" id="printable" style="height: 200px">
                        <thead>
                            <tr>
                                <th scope="col">#</th>


                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >



                            <tr class="table-primary">
                                <th>{{ $order->id }}</th>
                                <td style="width: 10rem" class="text-left">
                                    <a href="" id="print" class="btn btn-dark btn-sm text-white"><i class="fa fa-print">چاپ</i></a>
                                    <a href="{{route('admin.market.order.detail', $order->id)}}" class="btn btn-warning btn-sm text-dark" ><i class="fa fa-book">جزییات</i></a>
                                </td>
                            </tr>

                            <tr class="border-bottom">
                                <th>نام مشتری</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->user->fullname ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>آدرس</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->address->address ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>شهر</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->address->city->name ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>کد پستی</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->address->postal_code ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>شماره پلاک</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->address->no ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>شماره واحد</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->address->unit ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>نام گیرنده</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->address->fullname ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>شماره موبایل</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->address->mobile_number ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>نوع پرداخت</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->payment_type_value }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>وضعیت پرداخت</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->payment_status_value }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>مبلغ ارسال</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->delivery_amount ?? '-' }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>وضعیت ارسال</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->delivery_status_value }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>تاریخ ارسال</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ jalaliDate($order->delivery_time) }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>مجمع مبلغ سفارش (بدون تخفیف)</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->order_final_amount }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>مجمع تمامی مبلغ تخفیفات</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->order_discount_amount }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>مبلغ تخفیف همه محصولات</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->order_total_products_discount_amount }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>مبلغ نهایی</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{$order->order_final_amount - $order->order_discount_amount}} تومان</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>بانک</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->payment->paymentable->gateway ?? '-' }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>کوپون استفاده شده</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->copan->code ?? '-' }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>تخفیف کد تخفیف</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->order_copan_discount_amount ?? '-' }}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>تخفیف عمومی استفاده شده</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->commonDsicount->title ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>مبلغ تخفیف عمومی استفاده شده</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->order_common_discount_amount ?? '-'}}</td>
                            </tr>

                            <tr class="border-bottom">
                                <th>وضعیت سفارش</th>
                                <td class="text-left font-weight-bolder" style="text-align: left">{{ $order->order_status_value }}</td>
                            </tr>




                        </tbody>
                    </table>
            </section>
            </section>
        </section>
    </section>


@endsection

@section('script')

    <script>
        var printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function(){
            printContent('printable');
        })

        function printContent(el) {
            var restorePage = $('body').html();
            var printContent = $('#' + el).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').html(restorePage);
        }
    </script>

@endsection
