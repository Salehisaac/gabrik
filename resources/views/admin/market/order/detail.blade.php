@extends('admin.layouts.master')

@section('head-tag')
    <title>جزییات سفارش</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page"> جزییات سفارش</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        جزییات سفارش
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">



                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" style="height: 200px">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col" style="position: relative;left: 30px " class="text-center">درصد فروش فوق العاده</th>
                            <th scope="col">مبلغ فروش فوق العاده</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">جمع قیمت محصول</th>
                            <th scope="col">مبلغ نهایی</th>
                            <th scope="col">رنگ</th>
                            <th scope="col">گارانتی</th>
                            <th scope="col">ویژگی</th>
                        </tr>
                        </thead>
                        <tbody >

                        @foreach($order->orderItems as $item)

                            <tr>

                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->singleProduct->name ?? '-' }}</td>
                                <td style="width: 8rem ;text-align: right" > {{$item->amazingSale->percentage ?? '-'}} % </td>
                                <td>{{$item->amazing_sale_discount_amount ?? '-'}}تومان </td>
                                <td>{{$item->number ?? '-'}} </td>
                                <td>{{$item->final_product_amount ?? '-'}} تومان </td>
                                <td>{{$item->final_total_amount ?? '-'}} تومان </td>
                                <td>{{$item->color->color_name ?? '-'}}</td>
                                <td>{{$item->guarantee->name ?? '-'}}</td>
                                <td>
                                    @forelse($item->orderItemAttributes as $attribute)
                                        {{$attribute->categoryAttribute->name ?? '-'}}
                                        :
                                        {{$attribute->categoryValue->value ?? '-'}}
                                    @empty
                                    @endforelse
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
