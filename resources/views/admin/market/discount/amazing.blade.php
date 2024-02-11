@extends('admin.layouts.master')

@section('head-tag')
    <title>فروش شگفت انگیز</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">فروش شگفت انگیز </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       فروش شگفت انگیز
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.discount.amazingSaleCreate') }}" class="btn btn-info btn-sm ">افزودن کالا به لیست فروش شگفت انگیز</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام کالا</th>
                                <th scope="col">درصد تخفیف</th>
                                <th scope="col">تاریخ شروع</th>
                                <th scope="col">تاریخ پایان</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >

                        @foreach($amazingSales as $amazingSale)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{ $amazingSale->product->name }}</td>
                                <td>{{ $amazingSale->percentage }}%</td>
                                <td>{{jalaliDate($amazingSale->start_date)}}</td>
                                <td>{{jalaliDate($amazingSale->end_date)}}</td>
                                <td class="width-16-rem" style="text-align: center">
                                    <a href="{{route('admin.market.discount.amazingSaleEdit', $amazingSale->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.market.discount.amazingSaleDestroy', $amazingSale->id) }}" method="post">
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

    @include('admin.alerts.sweet-alert.delete-confirm', ['className' => 'delete'])

@endsection
