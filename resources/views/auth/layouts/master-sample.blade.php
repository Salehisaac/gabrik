<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.layouts.head-tag')
    @yield('head-tag')
</head>

<body dir="rtl">





<main id="main-body-one-col" class="main-body">


        @yield('content')

</main>


@include('auth.layouts.script')
@yield('script')





</body>
</html>
