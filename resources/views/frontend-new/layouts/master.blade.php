<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>E-come | Multi-Purpose HTML Template for Electronics Store</title>
    @include('frontend-new.layouts.css')
</head>

<body>
    <!-- push menu-->
    <div class="pushmenu menu-home5">
        <div class="menu-push">
            <span class="close-left js-close"><i class="icon-close f-20"></i></span>
            <div class="clearfix"></div>

            <ul class="nav-home5 js-menubar">
                <li class="level1 active hassub">
                    <a href="/">{{ __('frontend.home') }}</a>
                </li>
                <li class="level1">
                    <a href="{{ route('frontend.products') }}">{{ __('frontend.products') }} </a>
                </li>
                <li class="level1">
                    <a href="{{ route('frontend.diginvest') }}"> {{ __('frontend.investment') }}  </a>
                </li>
                <li class="level1">
                    <a href="{{ route('frontend.about') }}"> {{ __('frontend.about') }}  </a>
                </li>
                <li class="level1">
                    <a href="{{ route('frontend.contact') }}">{{ __('frontend.contact') }}</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end push menu-->
    <div class="h3-bg">
        <div class="wrappage">
            @include('frontend-new.layouts.header')
            @include('frontend-new.layouts.modal')
            <!-- /header -->
            @yield('content')
            @include('frontend-new.layouts.footer')
            <!-- /footer -->
        </div>
    </div>
    @include('frontend-new.layouts.script')
</body>

</html>
