@extends('admin.layouts.master')

@section('head-tag')
    <title>انبار</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">انبار  </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       انبار
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد انبار جدید</a>

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
                                <th scope="col">تصویر کالا</th>
                                <th scope="col">تعداد قابل فروش</th>
                                <th scope="col">تعداد رزرو شده</th>
                                <th scope="col">تعداد فروخته شده</th>
                                <th class="width-22-rem text-center"  scope="col"><i class="fa fa-cogs me-5" ></i>   تنظیمات</th>

                            </tr>
                        </thead>
                        <tbody >


                        @foreach($products as $product)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$product->name}}</td>
                                <td><img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}" width="100" height="50" class="max-height-2rem"></td>
                                <td>{{ $product->marketable_number }}</td>
                                <td>{{ $product->frozen_number }}</td>
                                <td>{{ $product->sold_number }}</td>
                                <td class="width-22-rem" style="text-align: left">
                                    <a href=" {{ route('admin.market.store.addToStore' , $product->id) }} " class="btn btn-primary btn-sm"><i class="fa fa-money-bill ms-1"></i>افزایش موجودی</a>
                                    <a href=" {{ route('admin.market.store.edit' , $product->id) }} " class="btn btn-warning btn-sm"><i class="fa fa-edit ms-1"></i>اصلاح موجودی</a>
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
