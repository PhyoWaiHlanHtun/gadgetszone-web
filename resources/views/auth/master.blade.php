<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gadgets Zone </title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="E Commerce Website">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/logo-mini.png') }}" />

    @include('frontend.layouts.css')
    @yield('style')
</head>

<body>

    <div class="main-wrapper">

        @include('frontend.layouts.header')

        <!-- offcanvas overlay start -->
        <div class="offcanvas-overlay"></div>
        <!-- offcanvas overlay end -->

        @include('frontend.layouts.rightside')

        <!-- OffCanvas Menu Start -->
        @include('frontend.layouts.mobile-menu')
        <!-- OffCanvas Menu End -->

        @yield('content')

        <!-- Footer Area Start -->
        @include('frontend.layouts.footer')
        <!-- Footer Area End -->
    </div>

    {{-- @include('frontend.layouts.modal') --}}

    <input type="hidden" name="auth" id="auth" value="'false'">

    @include('frontend.layouts.script')

</body>

</html>
