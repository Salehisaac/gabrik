@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش عکس صفحه اصلی  </title>

@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">عکس های صفحه اصلی   </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">ویرایش عکس صفحه اصلی </li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        ویرایش عکس صفحه اصلی
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.main_image.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>


                    <form action="{{ route('admin.main_image.update' , $mainImage->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('PUT') }}
                        <section class="row">
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">عنوان عکس صفحه اصلی</label>
                                    <input type="text" class="form-control form-control-sm " name="title" id="title" value="{{ old('title' , $mainImage->title ) }}">
                                </div>
                                @error('title')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="status">وضعیت </label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status' , $mainImage->status) == 0) selected  @endif>غیر فعال </option>
                                        <option value="1" @if(old('status', $mainImage->status) == 1) selected @endif>فعال </option>
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

                            <section class="col-12 ">
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

                                            <div class="form-check">
                                                    <img src="{{asset($mainImage->image)}}" class="w-50 h-50" alt="">
                                            </div>


                                </section>


                            <section class="col-12 mt-sm-2 mt-md-2">
                                <div class="form-group">
                                    <label for="description">توضیحات </label>
                                    <textarea name="description" id="description"  class="form-control-sm form-control" rows="6">{{ old('description', html_entity_decode(strip_tags($mainImage->description))) }}</textarea>
                                </div>
                                @error('description')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1  rounded" role="alert">{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="">آدرس url</label>
                                    <div id="urlSelection">
                                        <select id="urlSelect" name="url_select" class="form-control form-control-sm mb-4">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}" @if(old('url_select', $mainImage->url) == $category->name) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <p id="urlInputText">اگر میخواهید آدرس دلخواه خود را وارد کنید این قسمت را پر کنید</p>
                                        <input id="urlInput" name="url" type="text" class="form-control form-control-sm" value="" placeholder="خودتان یک آدرس اضافه کنید">
                                    </div>
                                </div>
                                @error('url')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
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
    <script src=" {{asset('admin-assets/jalalidatepicker/persian-date.min.js')}} "></script>
    <script src=" {{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}} "></script>
    <script>
        CKEDITOR.replace('body');
        CKEDITOR.replace('summary');
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
        document.addEventListener("DOMContentLoaded", function() {
            // Get references to select and input elements
            var urlSelect = document.getElementById("urlSelect");
            var urlInput = document.getElementById("urlInput");

            // Add event listener to the select element
            urlSelect.addEventListener("change", function() {
                // Check if the selected option is the last one ("خودتان یک آدرس اضافه کنید")
                if (urlSelect.value === "خودتان یک آدرس اضافه کنید") {
                    // Show the input field and hide the select box
                    urlInput.style.display = "block";
                    urlSelect.style.display = "none";
                } else {
                    // Show the select box and hide the input field
                    urlInput.style.display = "none";
                    urlInput.value = null;
                    urlSelect.style.display = "block";
                }
            });
        });
    </script>

@endsection
