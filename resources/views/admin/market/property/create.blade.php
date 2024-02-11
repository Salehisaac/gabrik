@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد فرم کالای جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">فرم کالا  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد فرم کالای جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد فرم کالای جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.property.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.market.property.store') }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام فرم</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control form-control-sm ">
                                </div>

                                @error('name')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        @foreach($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}" @if(old('category_id') == $productCategory->id ) selected  @endif>{{ $productCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">واحد اندازه گیری فرم</label>
                                    <input type="text" name="unit" value="{{old('unit')}}" class="form-control form-control-sm ">
                                </div>

                                @error('unit')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>
                                <section class="col-12 mt-sm-2">
                                    <button class="btn btn-primary btn-sm">ثبت</button>
                                </section>
                            </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection
