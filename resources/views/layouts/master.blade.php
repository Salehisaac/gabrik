<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head-tag')
</head>


    @include('layouts.header')
    @yield('head-tag')

<section class="body-container">

        <section id="main-body" class="main-body">

             @yield('content')

        </section>

</section>

    @include('layouts.script')
    @yield('script')

    <section class="toast-wrapper flex-row-reverse">
        @include('admin.alerts.toast.success')
        @include('admin.alerts.toast.error')
    </section>

    @include('admin.alerts.sweet-alert.success')
    @include('admin.alerts.sweet-alert.error')


</html>
