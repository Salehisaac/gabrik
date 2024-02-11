@extends('admin.layouts.master')

@section('head-tag')
    <title>فرم ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">فرم ها </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       فرم ها
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.property.create') }}" class="btn btn-info btn-sm ">ایجاد فرم جدید</a>

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
                                <th scope="col">واحد اندازه گیری</th>
                                <th scope="col">دسته فرم</th>
                                <th class="width-22-rem text-center"  scope="col"><i class="fa fa-cogs me-5" ></i>   تنظیمات</th>

                            </tr>
                        </thead>
                        <tbody >

                        @foreach( $category_attributes as $category_attribute)

                            <tr>

                                <th>{{ $loop->iteration }}</th>
                                <td>{{$category_attribute->name}}</td>
                                <td>{{$category_attribute->unit}}</td>
                                <td>{{$category_attribute->category->name}}</td>
                                <td class="width-22-rem" style="text-align: left">
                                    <a href="{{ route('admin.market.property.value.index' , $category_attribute->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit ms-1"></i>ویژگی ها</a>
                                    <a href="{{ route('admin.market.property.edit' , $category_attribute->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.market.property.destroy', $category_attribute) }}" method="post">
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
