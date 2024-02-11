@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد مقدار فرم کالای جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">فرم کالا  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد مقدار فرم کالای جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد مقدار فرم کالای جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.property.value.index' , $categoryAttribute->id) }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.market.property.value.store' , $categoryAttribute->id) }}" method="post">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label for="">انتخاب محصول</label>
                                    <select name="product_id" id="product_id" class="form-control form-control-sm">
                                        @foreach($categoryAttribute->category->products as $product)
                                            <option value="{{ $product->id }}" @if(old('product_id') == $product->id ) selected  @endif>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product_id')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>



                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">مقدار</label>
                                    <input type="text" name="value" value="{{old('value')}}" class="form-control form-control-sm ">
                                </div>

                                @error('value')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">میزان افزایش قیمت کالا</label>
                                    <input name="price_increase" value="{{old('price_increase')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('price_increase')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">نوع </label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option value="0" @if(old('type') == 0) selected  @endif>ساده </option>
                                        <option value="1" @if(old('type') == 1) selected @endif>انتخابی </option>
                                    </select>
                                </div>

                                @error('type')
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
