@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد دسته بندی جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">دسته بندی  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ایجاد دسته بندی</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ایجاد دسته بندی
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.content.category.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{ route('admin.content.category.store') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6 my-2 mt-2">
                                <div class="form-group">
                                    <label for="name">نام دسته</label>
                                    <input type="text" class="form-control form-control-sm " name="name" id="name" value="{{ old('name') }}">
                                </div>
                                @error('name')
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

                            <section class="col-12 col-md-6 mt-md-2">
                                <div class="form-group">
                                    <label for="image">تصویر </label>
                                    <input type="file" class="form-control form-control-sm " name="image" id="image">
                                </div>
                                @error('image')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="description">توضیحات </label>
                                    <textarea name="description" id="description"  class="form-control-sm form-control" rows="6">
                                        {{ old('name') }}
                                    </textarea>
                                </div>
                                @error('description')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                                <section class="col-12 mt-sm-2 my-md-3">
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
    <script>
        CKEDITOR.replace('description');
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


@endsection
