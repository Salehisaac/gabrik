@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش اطلاعیه پیامکی جدید</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش اطلاع رسانی  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">پیامک ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش اطلاعیه پیامکی جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش اطلاعیه پیامکی جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.notify.sms.update', $sms->id) }}" method="post"  id="form">
                        @csrf
                        {{ method_field('PUT') }}
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان پیامک</label>
                                    <input name="title" type="text" class="form-control form-control-sm " value="{{ old('title', $sms->title) }}">
                                </div>

                                @error('title')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="hidden" name="published_at" id="published_at" type="text" class="form-control form-control-sm" value="{{  $sms->published_at }}">
                                    <input  name="published_at_view" id="published_at_view" type="text" class="form-control form-control-sm" value="{{  $sms->published_at }}">
                                </div>
                                @error('published_at')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">وضعیت </label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status', $sms->status) == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('status', $sms->status) == 1) selected @endif>فعال </option>
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">متن پیامک </label>
                                    <textarea name="body" id="body"  class="form-control-sm form-control" rows="6" >
                                        {{ old('body', $sms->body) }}
                                    </textarea>
                                </div>

                                @error('body')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
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
@section('script')

    <script src=" {{asset('admin-assets/ckeditor/ckeditor.js')}} "></script>
    <script src=" {{asset('admin-assets/jalalidatepicker/persian-date.min.js')}} "></script>
    <script src=" {{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}} "></script>


    <script>
        $(document).ready(function()
        {
            $('#published_at_view').persianDatepicker({
                autoClose: true,
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                persianDigit : true,
                onSelect: function(unixTimestamp) {
                    $('#published_at').val(unixTimestamp);
                },
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                },

            });
        });
    </script>

@endsection


