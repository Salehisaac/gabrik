@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">دسته بندی</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       دسته بندی
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.category.create') }}" class="btn btn-info btn-sm ">ایجاد دسته بندی</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام دسته بندی</th>
                                <th scope="col">دسته والد</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody >

                        @foreach($productCategories as $productCategory)

                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $productCategory->name }}</td>
                                <td>{{$productCategory->parent_id ? $productCategory->parent->name : 'دسته اصلی'  }}</td>
                                <td class="width-16-rem" style="text-align: left">
                                    <a href="{{route('admin.market.category.edit', $productCategory->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.market.category.destroy', $productCategory->id) }}" method="post">
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
