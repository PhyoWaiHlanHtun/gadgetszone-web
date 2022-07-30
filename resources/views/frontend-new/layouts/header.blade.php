<header>
    <!-- Header top area start -->
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <div class="welcome-text"></div>
                </div>
                <div class="col d-none d-lg-block">
                    <div class="top-nav py-2">
                        <ul>
                            {{-- <li><a href="tel:0123456789"><i class="fa fa-phone"></i>
                                +012 3456 789</a></li> --}}
                            <li><a href="mailto:info@gadgetszone.net"><i class="fa fa-envelope-o"></i> info@gadgetszone.net</a>
                            </li>

                            @if( $url = checkAuth() )
                            <li><a href="{{ $url }}"><i class="fa fa-user"></i> {{ __('frontend.account') }}</a></li>
                            <li><a href="#"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                        class="fa fa-sign-out"></i> {{ __('frontend.logout') }}</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @else
                            <li><a href="{{ route('agent.login') }}"><i class="fa fa-sign-in"></i> 
                                {{ __('frontend.agent_login') }}</a></li>
                            <li><a href="{{ route('user.login') }}"><i class="fa fa-sign-in"></i> 
                                {{ __('frontend.user_login') }}</a></li>
                            <li><a href="{{ route('user.register') }}"><i class="fa fa-user"></i> 
                                {{ __('frontend.sign_up') }} </a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header top area end -->
    <!-- Header action area start -->
    <div class="header-bottom  d-none d-lg-block">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col">
                    <div class="header-logo">
                        <a href="/"><img src="{{ asset('assets/images/logo/logo3.png') }}" alt="Site Logo" /></a>
                    </div>
                </div>
                <div class="col-lg-4 col">
                    <div class="header-actions">
                        {{-- Language --}}
                        @include('frontend.layouts.language')

                        
                        <div class="col-lg-7 col">
                            <div class="header-actions">                        
                                <a href="https://drive.google.com/file/d/18LCADjZFH0GvkesSnyNwgR1ZtMfUaB61/view?usp=sharing"><img src="{{ asset('assets/images/qrcode.png') }}" class="img img-thumbnail" style="width: 75px;height:auto;" alt="Site Logo" /><p>Android</p></a>
                                <a href="#" >
                                    <img src="{{ asset('assets/images/ios-qrcode.jpg') }}" class="img img-thumbnail" style="width: 75px;height:auto;" alt="IOS Download" />
                                    <p class="text-center">IOS</p>
                                </a>
                                <a href="#offcanvas-cart"
                                    class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                    <i class="pe-7s-cart"></i>
                                    @if (Auth::guard('user')->check())
                                    <span class="header-action-num">
                                        {{ count(purchased()) }}
                                    </span>
                                    @endif
                                </a>
                                <a href="#offcanvas-mobile-menu"
                                    class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header action area end -->
    <!-- Header action area start -->
    <div class="header-bottom d-lg-none sticky-nav style-1">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col">
                    <div class="header-logo">
                        <a href="/"><img src="{{ asset('assets/images/logo/logo3.png') }}" alt="Site Logo" /></a>
                    </div>
                </div>
                <div class="col-lg-3 col">
                    <div class="header-actions">

                        {{-- Language --}}
                        @include('frontend.layouts.language')                        

                        <a href="#offcanvas-cart"
                            class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                            <i class="pe-7s-cart"></i>
                            @if (Auth::guard('user')->check())
                            <span class="header-action-num">
                                {{ count(purchased()) }}
                            </span>
                            @endif
                        </a>
                        <a href="#offcanvas-mobile-menu"
                            class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="pe-7s-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header action area end -->
    <!-- header navigation area start -->
    <div class="header-nav-area d-none d-lg-block sticky-nav">
        <div class="">
            <div class="header-nav" >
                <div class="main-menu position-relative" style="background-color: #0db14b;">
                    <ul>
                        <li><a href="/"> {{ __('frontend.home') }} </a></li>
                        <li><a href="{{ route('frontend.diginvest') }}"> {{ __('frontend.investment') }} </a></li>
                        <li><a href="{{ route('frontend.products') }}"> {{ __('frontend.products') }} </a></li>
                        <li><a href="{{ route('frontend.about') }}">{{ __('frontend.about') }}</a></li>
                        <li><a href="{{ route('frontend.contact') }}">{{ __('frontend.contact') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
