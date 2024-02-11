@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالای جدید </title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">کالا  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد کالای جدید</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد کالای جدید
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.market.product.store')  }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input name="name" value="{{old('name')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('name')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">تصویر کالا</label>
                                    <input name="image" type="file" class="form-control form-control-sm ">
                                </div>
                                @error('image')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">وزن کالا</label>
                                    <input name="weight" value="{{old('weight')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('weight')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">طول کالا</label>
                                    <input name="length" value="{{old('length')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('length')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">عرض کالا</label>
                                    <input name="width" value="{{old('width')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('width')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">ارتفاع کالا</label>
                                    <input name="height" value="{{old('height')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('height')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">قیمت کالا </label>
                                    <input name="price" value="{{old('price')}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('price')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">وضعیت </label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status') == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال </option>
                                    </select>
                                </div>


                                @error('status')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-2">
                                <div class="form-group">
                                    <label for="status">قابل فروش بودن </label>
                                    <select name="marketable" id="marketable" class="form-control form-control-sm">
                                        <option value="0" @if(old('marketable') == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('marketable') == 1) selected @endif>فعال </option>
                                    </select>
                                </div>

                                @error('marketable')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm " name="tags" id="tags" value="{{ old('tags') }}">
                                    <select name="" class="select2 form-control form-control-sm" id="select_tags" multiple>

                                    </select>
                                </div>
                                @error('tags')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="hidden" name="published_at" id="published_at" type="text" class="form-control form-control-sm" value="{{ old('published_at') }}">
                                    <input  name="" id="published_at_view" type="text" class="form-control form-control-sm" value="{{ old('published_at') }}">
                                </div>
                                @error('published_at')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="">توضیحات </label>
                                    <textarea name="introduction" id="introduction"   class="form-control-sm form-control" rows="6">
                                        {{old('introduction')}}
                                    </textarea>
                                </div>
                                @error('introduction')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-sm-2 ">
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

                            <section class="col-12 col-md-6 mt-sm-2 ">
                                <div class="form-group">
                                    <label for="">انتخاب برند</label>
                                    <select name="brand_id" id="brand_id" class="form-control form-control-sm">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" @if(old('category_id') == $brand->id ) selected  @endif>{{ $brand->original_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('brand_id')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror

                            </section>



                            <section class="col-12 border-top border-bottom py-3 mb-3">
                            <section class="row">
                                <section class="col-md-3 col-6">
                                <div class="form-group">

                                    <input type="text" name="meta_key[]" class="form-control form-control-sm " placeholder="ویژگی...">
                                </div>
                                </section>


                                <section class="col-md-3 col-6">
                                    <div class="form-group">
                                        <input type="text" name="meta_value[]" class="form-control form-control-sm " placeholder="مقدار...">
                                    </div>
                                </section>

                            </section>

                                <section class="col-12 mt-sm-2 mt-sm-2 mt-md-2">
                                    <button type="button" name="btn-copy" id="btn-copy" class="btn btn-success btn-sm">افزودن</button>
                                </section>
                            </section>


                                <section class="col-12 mt-sm-2 mt-sm-2 mt-md-2">
                                    <button type="submit"  class="btn btn-primary btn-sm">ثبت</button>
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
        CKEDITOR.replace('introduction');
    </script>

    <script>

        $(document).ready(function() {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if(tags_input.val()!== null && tags_input.val().length > 0)
            {
                default_data = default_tags.split(',');
            }
            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد کنید',
                tags:true,
                data: default_data
            });

            select_tags.children('option').attr('selected',true).trigger('change');

            $('#form').submit(function ( event){
                if(select_tags.val() !== null && select_tags.val().length > 0)
                {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })


        })
    </script>

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
                }

            });
        });
    </script>

    <script>
        $(function ()
        {
            $('#btn-copy').on('click',function()
            {
              var ele = $(this).parent().prev().clone(true);
              $(this).before(ele);
            })
        })
    </script>



@endsection

