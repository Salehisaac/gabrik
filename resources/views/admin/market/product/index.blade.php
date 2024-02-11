@extends('admin.layouts.master')

@section('head-tag')
    <title>کالا ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page"> کالا ها</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       کالا ها
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.product.create') }}" class="btn btn-info btn-sm ">ایجاد کالا جدید</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" style="height: 200px">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام کالا</th>
                                <th scope="col">تصویر کالا</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">دسته</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >
                        @foreach($products as $product)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}" width="100" height="50" class="max-height-2rem"></td>
                                <td>{{$product->price . 'تومان'}} </td>
                                <td>{{ $product->category->name }}</td>
                                <td class="width-9-rem" >
                                    <div class="dropdown text-center">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle text-center" role="button" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false" >
                                            <i class="fa fa-tools width-9-rem "> عملیات</i>
                                        </a>

                                        <div class="dropdown-menu" style="text-align: right" aria-labelledby="dropdownMenuLink">
                                            <a href="{{route('admin.market.gallery.index', $product->id)}}" class="dropdown-item text-right" style="font-size: .75rem"><i class="fa fa-images"></i> گالری </a>
                                            <a href="{{route('admin.market.product.color.index', $product->id)}}" class="dropdown-item text-right" style="font-size: .75rem"><i class="fa fa-list-ul"></i> رنگ کالا</a>
                                            <a href="{{ route('admin.market.guarantee.index', $product->id) }}" class="dropdown-item text-right" style="font-size: .75rem"><i class="fa fa-shield-alt"></i> گارانتی</a>
                                            <a href="{{ route('admin.market.product.edit', $product->id) }}" class="dropdown-item text-right" style="font-size: .75rem"><i class="fa fa-edit"></i> ویرایش  </a>
                                            <form action="{{ route('admin.market.product.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-right delete" style="font-size: .75rem"> <i class="fa fa-window-close"></i>حذف</button>
                                            </form>

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

@section('script')
    @include('admin.alerts.sweet-alert.delete-confirm', ['className' => 'delete'])
@endsection
