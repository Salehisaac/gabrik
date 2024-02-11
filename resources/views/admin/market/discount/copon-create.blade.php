@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کوپون تخفیف </title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">کوپون  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد تخفیف</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد کوپون تخفیف
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.discount.copan') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.market.discount.copanStore') }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">کد کوپون</label>
                                    <input name="code" value="{{old('code')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('code')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6  mt-2">
                                    <div class="form-group">
                                        <label for="">نوع کوپون</label>
                                        <select id="type" name="type" class="form-control form-control-sm">
                                            <option value="0" @if(old('type')==0) selected @endif >عمومی</option>
                                            <option value="1" @if(old('type')==1) selected @endif>خصوصی</option>
                                        </select>
                                    </div>
                                @error('type')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                                </section>

                            <section class="col-12 col-md-6  mt-2">
                                <div class="form-group">
                                    <label for="">کاربران</label>
                                    <select id="users" name="user_id" class="form-control form-control-sm" disabled>

                                        @foreach($users as $user)

                                        <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->fullname }}</option>

                                        @endforeach

                                    </select>
                                </div>
                                @error('user_id')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6  mt-2">
                                <div class="form-group">
                                    <label for="">نوع تخفیف</label>
                                    <select  name="amount_type" class="form-control form-control-sm">
                                        <option value="0" @if(old('amount_type')==0) selected @endif>درصدی</option>
                                        <option value="1" @if(old('amount_type')==1) selected @endif>عددی</option>
                                    </select>
                                </div>
                                @error('amount_type')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-2" >
                                <div class="form-group">
                                    <label for="">میزان تخفیف</label>
                                    <input name="amount"  value="{{old('amount')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('amount')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">حدااکثر تخفیف</label>
                                    <input name="discount_ceiling" value="{{old('discount_ceiling')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('discount_ceiling')
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
                                    <input type="hidden" name="start_date" id="start_date" type="text" class="form-control form-control-sm" value="{{ old('start_date') }}">
                                    <input  name="" id="start_date_view" type="text" class="form-control form-control-sm" value="{{ old('start_date') }}">
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
                                    <input type="hidden" name="end_date" id="end_date" type="text" class="form-control form-control-sm" value="{{ old('end_date') }}">
                                    <input  name="" id="end_date_view" type="text" class="form-control form-control-sm" value="{{ old('end_date') }}">
                                </div>
                                @error('end_date')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-2">
                                <div class="form-group">
                                    <label for="status">وضعیت </label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status') == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال </option>
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

    <script>
        $('#type').change(function(){

            if ($('#type').find(':selected').val() == '1')
            {
                $('#users').removeAttr('disabled');
            }

            else {
                $('#users').attr('disabled' , 'disabled');
            }
        })


    </script>

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
