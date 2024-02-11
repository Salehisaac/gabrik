@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش فروش شگفت انگیز </title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">کوپون  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">فروش شگفت انگیز  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش فروش شگفت انگیز
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.discount.amazingSale') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>



                    <form action="{{ route('admin.market.discount.amazingSaleUpdate', $amazingSale->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <section class="row">

                            <section class="col-12 col-md-6 mt-sm-2 ">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <select name="product_id" id="product_id" class="form-control form-control-sm">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" @if(old('product_id', $amazingSale->product_id) == $product->id ) selected  @endif>{{ $product->name }}</option>
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

                            <section class="col-12 col-md-6 mt-2" >
                                <div class="form-group">
                                    <label for="">درصد تخفیف</label>
                                    <input name="percentage" value="{{old('percentage', $amazingSale->percentage)}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('percentage')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">تاریخ شروع</label>
                                    <input type="hidden" name="start_date" id="start_date" type="text" class="form-control form-control-sm" value="{{ old('start_date', $amazingSale->start_date) }}">
                                    <input  name="" id="start_date_view" type="text" class="form-control form-control-sm" value="{{ old('start_date', $amazingSale->start_date) }}">
                                </div>
                                @error('start_date')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">تاریخ پایان</label>
                                    <input type="hidden" name="end_date" id="end_date" type="text" class="form-control form-control-sm" value="{{ old('end_date', $amazingSale->end_date) }}">
                                    <input  name="" id="end_date_view" type="text" class="form-control form-control-sm" value="{{ old('end_date', $amazingSale->end_date) }}">
                                </div>
                                @error('end_date')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12  mt-2">
                                <div class="form-group">
                                    <label for="status">وضعیت </label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status', $amazingSale->status) == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('status', $amazingSale->status) == 1) selected @endif>فعال </option>
                                    </select>
                                </div>
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

@section('script')

    <script src=" {{asset('admin-assets/ckeditor/ckeditor.js')}} "></script>
    <script src=" {{asset('admin-assets/jalalidatepicker/persian-date.min.js')}} "></script>
    <script src=" {{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}} "></script>

    <script>
        $(document).ready(function()
        {
            $('#start_date_view').persianDatepicker({
                autoClose: true,
                format: 'YYYY/MM/DD',
                altField: '#start_date',
                persianDigit : true,
                onSelect: function(unixTimestamp) {
                    $('#start_date').val(unixTimestamp);
                }

            });
        });
    </script>

    <script>
        $(document).ready(function()
        {
            $('#end_date_view').persianDatepicker({
                autoClose: true,
                format: 'YYYY/MM/DD',
                altField: '#end_date',
                persianDigit : true,
                onSelect: function(unixTimestamp) {
                    $('#end_date').val(unixTimestamp);
                }

            });
        });
    </script>
@endsection
