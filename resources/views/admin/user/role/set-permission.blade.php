@extends('admin.layouts.master')

@section('head-tag')
    <title>دسترسی های نقش </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">نقش ها   </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">دسترسی های نقش </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        دسترسی های نقش
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3">

                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>




                    <form action="{{ route('admin.user.role.permission-update' , $role->id) }}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <section class="row">





                            <section class="col-12">

                                <section class="row mt-3 py-3">

                                    <section class="col-12 col-md-5">
                                        <div class="form-group border-bottom mb-3">
                                            <lable for="">  نام نقش :</lable>
                                            <section class="mt-1 mb-1">{{ $role->name }}</section>
                                        </div>
                                    </section>


                                    <section class="col-12 col-md-5">
                                        <div class="form-group border-bottom mb-3">
                                            <lable for="">توضیح نقش :</lable>
                                            <section class="mt-1 mb-1">{{ $role->description }}</section>
                                        </div>
                                    </section>






                                    @php
                                        $rolePermissionsArray = $role->permissions->pluck('id')->toArray();
                                     @endphp


                                    @foreach( $permissions as $key => $permission)

                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" style="float: right" name="permissions[]" value="{{ $permission->id }}" id="{{$permission->id}}"  @if(in_array($permission->id,$rolePermissionsArray)) checked @endif >
                                            <label for="{{$permission->id}}" class="form-check-label me-4" >{{ $permission->name }}</label>
                                        </div>
                                        <div class="mt-2">
                                            @error('permissions.' . $key)
                                            <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                            @enderror
                                        </div>

                                    </section>



                                    @endforeach




                                </section>

                                <section class="col-12 col-md-2 mt-sm-2 mt-md-4 border-top">
                                    <button class="btn btn-primary btn-sm mt-2">ثبت</button>
                                </section>



                            </section>
                            </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection
