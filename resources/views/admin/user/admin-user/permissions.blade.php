@extends('admin.layouts.master')

@section('head-tag')
    <title>افزودن سطح دسترسی ادمین جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">ادمین ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد سطح دسترسی ادمین جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد سطح دسترسی ادمین جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.user.admin-user.permissions-store', $admin) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">سطوح دسترسی </label>
                                   <select multiple class="form-control form-control-sm" id="select_permissions" name="permissions[]">
                                       @foreach($permissions as $permission)
                                       <option value="{{ $permission->id }}" @foreach($admin->permissions as $adminPermissions) @if($adminPermissions->id === $permission->id) selected @endif @endforeach>{{ $permission->name }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                @error('permissions')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>



                                <section class="col-12 mt-sm-2 mt-md-2">
                                    <button class="btn btn-primary btn-sm">ثبت</button>
                                </section>
                            </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection

@section('script')
    <script>
        var select_roles = $('#select_permissions');
        select_roles.select2({
            placeholder: ' سطوح دسترسی را وارد نمایید',
            multiple: true,
            tags : true
        });
    </script>
@endsection
