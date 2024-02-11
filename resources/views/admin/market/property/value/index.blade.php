@extends('admin.layouts.master')

@section('head-tag')
    <title>مقدار فرم ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">فرم ها </li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">مقدار فرم کالا </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       مقدار فرم کالا
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.property.value.create' , $categoryAttribute->id) }}" class="btn btn-info btn-sm ">ایجاد مقدار فرم جدید</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام فرم</th>
                                <th scope="col">نام محصول</th>
                                <th scope="col">مقدار</th>
                                <th scope="col">افزایش قیمت</th>
                                <th scope="col">نوع</th>
                                <th class="width-22-rem text-center" style="position: relative;left: 20px"  scope="col"><i class="fa fa-cogs me-5"></i>   تنظیمات</th>

                            </tr>
                        </thead>
                        <tbody >

                        @foreach( $categoryAttribute->values as $value)

                            <tr>

                                <th>{{ $loop->iteration }}</th>
                                <td>{{$categoryAttribute->name}}</td>
                                <td>{{$value->product->name}}</td>
                                <td>{{json_decode($value->value)->value}}</td>
                                <td>{{json_decode($value->value)->price_increase}}</td>
                                <td>{{$value->type == 0 ? 'ساده' : 'انتخابی'}}</td>
                                <td class="width-16-rem" style="text-align: center">
                                    <a href="{{route('admin.market.property.value.edit' , ['categoryAttribute' => $categoryAttribute->id , 'value' => $value->id ])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{route('admin.market.property.value.destroy' , ['categoryAttribute' => $categoryAttribute->id , 'value' => $value->id ])}}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
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
