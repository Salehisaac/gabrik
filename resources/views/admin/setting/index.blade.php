@extends('admin.layouts.master')

@section('head-tag')
    <title> تنظیمات</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">تنظیمات </a></li>


        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       تنظیمات
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان سایت</th>
                                <th scope="col">توضیحات سایت</th>
                                <th scope="col">کلمات کلیدی سایت</th>
                                <th scope="col">لوگو سایت</th>
                                <th scope="col">آیکون سایت</th>

                                <th class="width-22-rem text-center"  scope="col"><i class="fa fa-cogs me-5" ></i>   تنظیمات</th>

                            </tr>
                        </thead>
                        <tbody >

                            <tr>
                                <th>1</th>
                                <td>{{ $setting->title }}</td>
                                <td>{{ $setting->description }}</td>
                                <td>{{ $setting->keywords }}</td>
                                <td><img src="{{ asset($setting->logo) }}" width="100" height="50" alt=""></td>
                                <td><img src="{{ asset($setting->icon) }}" width="100" height="50" alt=""></td>

                                <td class="width-22-rem" style="text-align: center">
                                    <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                </td>
                            </tr>





                        </tbody>
                    </table>
            </section>
            </section>
        </section>
    </section>


@endsection
