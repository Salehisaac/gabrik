@extends('admin.layouts.master')

@section('head-tag')
    <title>اصلاح موجودی انبار</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">انبار</a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">اصلاح موجودی انبار</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        اصلاح موجودی انبار
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.market.store.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section>

                    <form action="{{route('admin.market.store.update' , $product->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <section class="row">
                            <section class="col-12 mt-3 ">
                                <div class="form-group">
                                    <label for="">تعداد قابل فروش</label>
                                    <input name="marketable_number" value="{{old('marketable_number', $product->marketable_number)}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('marketable_number')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-3 ">
                                <div class="form-group">
                                    <label for="">تعداد فروخته شده</label>
                                    <input name="sold_number" value="{{old('sold_number', $product->sold_number)}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('sold_number')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="">تعداد رزرو شده</label>
                                    <input name="frozen_number" value="{{old('frozen_number', $product->frozen_number)}}" type="text" class="form-control form-control-sm ">
                                </div>
                                @error('frozen_number')
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

@section('script')

    <script src=" {{asset('admin-assets/ckeditor/ckeditor.js')}} "></script>
    <script>
        CKEDITOR.replace('body');
    </script>


@endsection
