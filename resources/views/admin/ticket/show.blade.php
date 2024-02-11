@extends('admin.layouts.master')

@section('head-tag')
    <title> نمایش تیکت </title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            &nbsp / &nbsp
            <li class="breadcrumb-item font-size-12"><a href="#">بخش تیکت ها  </a></li>

            <li class="breadcrumb-item font-size-12"><a href="#">تیکت ها  </a></li>

            <li class="breadcrumb-item active font-size-12" aria-current="page">نمایش تیکت</li>
        </ol>
    </nav>

    <section class="row" style="height: 100%">

        <section class="col-12">
            <section class="main-body-container">

                <section class="main-body-container-header">

                    <h4>
                        نمایش تیکت
                    </h4>

                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">

                    <a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm ">بازگشت</a>

                </section>

                <section class="card mb-3 ">
                    <section class="card-header text-white bg-custom-pink">
                        {{$ticket->user->FullName}}-{{$ticket->user->id}}

                    </section>

                    <section class="card-body">
                        <h5 class="card-title">
                            {{ $ticket->subject }}
                        </h5>
                        <p class="card-text">{{ $ticket->description }}</p>
                    </section>

                <section>



                    <form action="{{ route('admin.ticket.store', $ticket->id) }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group me-3 ">
                                    <label for="">پاسخ تیکت</label>
                                    <textarea name="description" id="description" class="form-control form-control-sm " rows="4"></textarea>
                                </div>
                                @error('description')
                                <span>
                                    <strong class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                                <section class="col-12 mt-sm-2 mb-2 me-3">
                                    <button class="btn btn-primary btn-sm">ثبت</button>
                                </section>
                            </section>

                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection
