@extends('admin.layouts.master')

@section('head-tag')
    <title>عکس کالا ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page"> کالا ها</li>

            <li class="breadcrumb-item active font-size-12" aria-current="page"> عکس کالا ها</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       عکس کالا ها
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.gallery.create', $product->id) }}" class="btn btn-info btn-sm ">ایجاد رنگ جدید</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام کالا</th>
                                <th scope="col">عکس کالا</th>


                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >

                        @foreach($product->images as $image)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $product->name }}</td>
                                <td>
                                     <img src="{{asset($image->image['indexArray'][$image->image['currentImage']])}}" width="100" height="50">

                                </td>


                                <td class="width-16-rem" style="text-align: center">

                                    <form class="d-inline" action="{{ route('admin.market.gallery.destroy', ['product' => $product->id , 'gallery' => $image->id]) }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" style="width: 120px" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
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
