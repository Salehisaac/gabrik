@extends('admin.layouts.master')

@section('head-tag')
    <title>نقش ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">نقش ها </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                   <h4>
                       نقش ها
                   </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.user.role.create') }}" class="btn btn-info btn-sm ">ایجاد نقش جدید</a>

                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text rounded" placeholder="جستجو">
                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="position-relative">نام نقش</th>
                                <th scope="col" class="text-center">دسترسی ها</th>
                                <th class="width-16-rem text-center position-relative"   scope="col"><i class="fa fa-cogs me-5" ></i>   تنظیمات</th>

                            </tr>
                        </thead>
                        <tbody >

                        @foreach($roles as $role)

                            <tr>
                                <th style="vertical-align: middle">{{$loop->iteration}}</th>
                                <td style="vertical-align: middle" >{{$role->name}}</td>
                                <td class="text-center">
                                    @if(empty($role->permissions()->get()->toArray()))
                                        <span class="text-danger">بدون سطح دسترسی</span>
                                    @endif
                                    @foreach($role->permissions as $permissions)

                                        {{$permissions->name}}
                                    <br>
                                    @endforeach

                                </td>
                                <td class="width-22-rem " style="text-align: left;vertical-align: middle"  >
                                    <a href="{{ route('admin.user.role.permission-form', $role->id) }}" class="btn btn-success btn-sm "><i class="fa fa-user-graduate ms-1"></i>دسترسی ها</a>
                                    <a href="{{ route('admin.user.role.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit ms-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.user.role.destroy', $role->id) }}" method="post">
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
