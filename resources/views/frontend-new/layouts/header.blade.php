<header id="header" class="header-v3 bg-w">
    <div class="topbar">
        <div class="container container-240">
            <div class="row flex">
                <div class="col-md-6 col-sm-6 col-xs-4 flex-left">
                    <div class="topbar-left">
                        {{-- <div class="element element-store hidden-xs hidden-sm">
                            <a id="label1" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('frontend/img/icon-map.png') }}" alt="">
                                <span>Store Location</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="label1">
                                <li><a href="#">New York</a></li>
                                <li><a href="#">California</a></li>
                                <li><a href="#">Los Angeles</a></li>
                            </ul>
                        </div> --}}
                        {{-- <div class="element hidden-xs hidden-sm">
                            <a href="#"><img src="{{ asset('frontend/img/icon-track.png') }}" alt=""><span>Track Your Order</span></a>
                        </div> --}}
                        {{-- <div class="element element-account hidden-md hidden-lg">
                            <a href="#">My Account</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-8 flex-right">
                    <div class="topbar-right">
                        <div class="element hidden-xs hidden-sm">
                            <a href="mailto:info@ecomezne.net"><i class="fa fa-envelope-o"></i> info@ecomezone.net</a>
                        </div>
                        @if( $url = checkAuth() )
                        <div class="element hidden-xs hidden-sm">
                            <a href="{{ $url }}"><i class="fa fa-user"></i> {{ __('frontend.account') }}</a>
                        </div>
                        <div class="element hidden-xs hidden-sm">
                            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> {{ __('frontend.logout') }}
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <div class="element hidden-xs hidden-sm">
                            <a href="{{ route('agent.login') }}"><i class="fa fa-sign-in"></i>
                                {{ __('frontend.agent_login') }}</a>
                        </div>
                        <div class="element hidden-xs hidden-sm">
                            <a href="{{ route('user.login') }}"><i class="fa fa-sign-in"></i>
                                {{ __('frontend.user_login') }}</a>
                        </div>
                        <div class="element hidden-xs hidden-sm">
                            <a href="{{ route('user.register') }}"><i class="fa fa-user"></i>
                                {{ __('frontend.sign_up') }} </a>
                        </div>
                        @endif
                        <div class="element element-leaguage">
                            <a id="label2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                @php $lang = Config::get('app.locale') @endphp
                                @if( $lang == 'ch')
                                    <img src="{{ asset('assets/images/flags/china.svg') }}" alt="" width="15px">
                                @elseif( $lang == 'jp')
                                    <img src="{{ asset('assets/images/flags/jp.svg') }}" alt="" width="15px">
                                @elseif( $lang == 'sp')
                                    <img src="{{ asset('assets/images/flags/spain.svg') }}" alt="" width="15px">
                                @elseif( $lang == 'hi')
                                    <img src="{{ asset('assets/images/flags/in.svg') }}" alt="" width="15px">
                                @elseif( $lang == 'ko')
                                    <img src="{{ asset('assets/images/flags/korean.svg') }}" alt="" width="15px">
                                @else
                                    <img src="{{ asset('assets/images/flags/us.svg') }}" alt="" width="15px">
                                @endif
                                <span class="ion-ios-arrow-down f-10 e-arrow"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="label2">
                                <li><a href="{{ route('lang.switch', 'en') }}">
                                    <img src="{{ asset('assets/images/flags/us.svg') }}" alt="" width="15px">English
                                </a></li>
                                <li><a href="{{ route('lang.switch', 'ch') }}">
                                    <img src="{{ asset('assets/images/flags/china.svg') }}" alt="" width="15px">中国人
                                </a></li>
                                <li><a href="{{ route('lang.switch', 'jp') }}">
                                    <img src="{{ asset('assets/images/flags/jp.svg') }}" alt="" width="15px">日本
                                </a></li>
                                <li><a href="{{ route('lang.switch', 'sp') }}">
                                    <img src="{{ asset('assets/images/flags/spain.svg') }}" alt="" width="15px">España
                                </a></li>
                                <li><a href="{{ route('lang.switch', 'hi') }}">
                                    <img src="{{ asset('assets/images/flags/in.svg') }}" alt="" width="15px">हिन्दी
                                </a></li>
                                <li><a href="{{ route('lang.switch', 'ko') }}">
                                    <img src="{{ asset('assets/images/flags/korean.svg') }}" alt="" width="15px">한국인
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-center">
        <div class="container container-240">
            <div class="row flex">
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 v-center header-logo">
                    <a href="#"><img src="{{ asset('frontend/img/logo/ecome-logo.png') }}" alt="" class="img-reponsive"></a>
                </div>
                <div class="col-lg-7 col-md-7 v-center header-search hidden-xs hidden-sm">
                {{-- <form method="get" class="searchform ajax-search" action="/search" role="search">
                    <input type="hidden" name="type" value="product">
                    <input type="text" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" name="q" class="form-control" placeholder="i’m shoping for...">
                    <ul class="list-product-search hidden-xs hidden-sm">
                        <li>
                            <a class="flex align-center" href="">
                                <div class="product-img">
                                    <img src="{{ asset('frontend/img/product/iphonex.jpg') }}" alt="">
                                </div>
                                <h3 class="product-title">Notebook Black Spire Smartphone Black 2.0</h3>
                            </a>
                        </li>
                        <li>
                            <a class="flex align-center" href="">
                                <div class="product-img">
                                    <img src="{{ asset('frontend/img/product/sound.jpg') }}" alt="">
                                </div>
                                <h3 class="product-title">Smartphone 6S 64GB LTE</h3>
                            </a>
                        <li>
                            <a class="flex align-center" href="">
                                <div class="product-img">
                                    <img src="{{ asset('frontend/img/product/phone4.jpg') }}" alt="">
                                </div>
                                <h3 class="product-title">Notebook Black Spire Smartphone Black 2.0</h3>
                            </a>
                        </li>
                        <li>
                            <a class="flex align-center" href="">
                                <div class="product-img">
                                    <img src="{{ asset('frontend/img/product/phone5.jpg') }}" alt="">
                                </div>
                                <h3 class="product-title">Smartphone 6S 64GB LTE </h3>
                            </a>
                        </li>
                        <li>
                            <a class="flex align-center" href="">
                                <div class="product-img">
                                    <img src="{{ asset('frontend/img/product/phone1.jpg') }}" alt="">
                                </div>
                                <h3 class="product-title">Notebook Black Spire Smartphone Black 2.0</h3>
                            </a>
                        </li>
                    </ul>
                    <div class="search-panel">
                        <a class="dropdown-toggle" data-toggle="dropdown" href='#'>All categories <span class="fa fa-caret-down"></span></a>
                        <ul id="category" class="dropdown-menu dropdown-category">
                            <li><a href="#">TV & Video</a></li>
                            <li><a href="#">Home Audio & Theater</a></li>
                            <li><a href="#">Camera, Photo & Video</a></li>
                            <li><a href="#">Cell Phones & Accessories</a></li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Car Electronics</a></li>
                            <li><a href="#">Electronics Showcase</a></li>
                        </ul>
                    </div>
                    <span class="input-group-btn">
                              <button class="button_search" type="button"><i class="ion-ios-search-strong"></i></button>
                    </span>
                </form> --}}
                {{-- <div class="tags">
                    <span>Most searched :</span>
                    <a href="#">umbrella</a>
                    <a href="#">hair accessories </a>
                    <a href="#">diamond</a>
                    <a href="#"> painting slime</a>
                    <a href="#">sunglasses</a>
                </div> --}}
            </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6 v-center header-sub">
                    <div class="right-panel">
                        {{-- <div class="header-sub-element hidden-xs hidden-sm">
                            <div class="sub-left">
                                <img src="{{ asset('frontend/img/icon-call.png') }}" alt="">
                            </div>
                            <div class="sub-right">
                                <span>Call Us Free</span>
                                <div class="phone">(+123) 456 789 </div>
                            </div>
                        </div> --}}
                        <div class="header-sub-element row">
                            {{-- <a class="hidden-xs hidden-sm" href=""><img src="{{ asset('frontend/img/icon-user.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('frontend/img/icon-heart.png') }}" alt=""></a> --}}
                            <a class="hidden-xs hidden-sm" href="https://drive.google.com/file/d/18LCADjZFH0GvkesSnyNwgR1ZtMfUaB61/view?usp=sharing">
                                <img src="{{ asset('assets/images/qrcode.png') }}" class="img img-thumbnail" style="width: 75px;height:auto;" alt="APK Download" />
                                <p class="text-center">Android</p>
                            </a>
                            <a href="#" class="hidden-xs hidden-sm">
                                <img src="{{ asset('assets/images/ios-qrcode.jpg') }}" class="img img-thumbnail" style="width: 75px;height:auto;" alt="IOS Download" />
                                <p class="text-center">IOS</p>
                            </a>
                            <div class="cart" style="margin-top:30px;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="label5">
                                    <img src="{{ asset('frontend/img/icon-cart.png') }}" alt="">
                                    <span class="count cart-count">0</span>
                                </a>
                                <div class="dropdown-menu dropdown-cart">
                                    <ul class="mini-products-list">
                                        <li class="item-cart">
                                            <div class="product-img-wrap">
                                                <a href="#"><img src="{{ asset('frontend/img/cart1.jpg') }}" alt="" class="img-reponsive"></a>
                                            </div>
                                            <div class="product-details">
                                                <div class="inner-left">
                                                    <div class="product-name"><a href="#">Harman Kardon Onyx Studio </a></div>
                                                    <div class="product-price">
                                                        $ 60.00 <span>( x2)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="e-del"><i class="ion-ios-close-empty"></i></a>
                                        </li>
                                        <li class="item-cart">
                                            <div class="product-img-wrap">
                                                <a href="#"><img src="{{ asset('frontend/img/cart1.jpg') }}" alt="" class="img-reponsive"></a>
                                            </div>
                                            <div class="product-details">
                                                <div class="inner-left">
                                                    <div class="product-name"><a href="#">Harman Kardon Onyx Studio </a></div>
                                                    <div class="product-price">
                                                        $ 60.00 <span>( x2)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="e-del"><i class="ion-ios-close-empty"></i></a>
                                        </li>
                                    </ul>
                                    <div class="bottom-cart">
                                        <div class="cart-price">
                                            <span>Subtotal</span>
                                            <span class="price-total">$ 120.00</span>
                                        </div>
                                        <div class="button-cart">
                                            <a href="#" class="cart-btn btn-viewcart">View Cart</a>
                                            <a href="#" class="cart-btn e-checkout btn-gradient">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="hidden-md hidden-lg icon-pushmenu js-push-menu">
                            <i class="fa fa-bars f-15"></i>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom hidden-xs hidden-sm">
        <div class="container container-240">
            <div class="row">
                {{-- <div class="col-lg-3 widget-verticalmenu">
                    <div class="navbar-vertical">
                        <button class="navbar-toggles"><span>All Departments</span></button>
                    </div>
                    <div class="vertical-wrapper">
                        <ul class="vertical-group">
                            <li class="vertical-item level1 mega-parent"><a href="#">New Arrivals</a></li>
                            <li class="vertical-item level1 mega-parent"><a href="#">Top 100 Best Seller <span class="h-ribbon e-red mg-l10">Hot</span></a></li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">TV & Video</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu v2 tvbg pd2 style1">
                                    <ul class="level1">
                                        <li class="level2 col-md-5">
                                            <a href="#">TVs by Type</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">4K Ultra HD</a></li>
                                                <li class="level3"><a href="#" title="">Smart TVs</a></li>
                                                <li class="level3"><a href="#" title="">LED & LCD TVs & amplifiers</a></li>
                                                <li class="level3"><a href="#" title="">OLED TVs</a></li>
                                                <li class="level3"><a href="#" title="">QLED/Quantum Dot TVs  </a></li>
                                            </ul>
                                            <a href="#">Blu-ray & DVD Players</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">4K Blu-ray Players</a></li>
                                                <li class="level3"><a href="#" title="">Streaming Blu-ray Players</a></li>
                                                <li class="level3"><a href="#" title="">3D Blu-ray Players</a></li>
                                                <li class="level3"><a href="#" title="">Portable Blu-ray Players</a></li>
                                                <li class="level3"><a href="#" title="">DVD Recorders</a></li>
                                            </ul>
                                        </li>
                                        <li class="level2 col-md-7">
                                            <a href="# ">Home Audio</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Home Theater Systems</a></li>
                                                <li class="level3"><a href="#" title="">Soundbars</a></li>
                                                <li class="level3"><a href="#" title="">Speakers</a></li>
                                                <li class="level3"><a href="#" title="">Receivers & Amplifiers</a></li>
                                                <li class="level3"><a href="#" title="">Premium Audio</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">Home Audi & Theater</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu v2 homebg pd2 style1">
                                    <ul class="level1">
                                        <li class="level2 col-md-4">
                                            <a href="#">Home theater</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Sound bars</a></li>
                                                <li class="level3"><a href="#" title="">Speakers</a></li>
                                                <li class="level3"><a href="#" title="">Receivers & amplifiers</a></li>
                                                <li class="level3"><a href="#" title="">Equalizers</a></li>
                                                <li class="level3"><a href="#" title="">Phono preamps  </a></li>
                                            </ul>
                                        </li>
                                        <li class="level2 col-md-4">
                                            <a href="# ">Speakers</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Bluetooth speakers</a></li>
                                                <li class="level3"><a href="#" title="">Ceiling & in-wall speakers</a></li>
                                                <li class="level3"><a href="#" title="">Digital music systems</a></li>
                                                <li class="level3"><a href="#" title="">Outdoor</a></li>
                                                <li class="level3"><a href="#" title="">Satellite speakers</a></li>
                                            </ul>
                                        </li>
                                        <li class="level2 col-md-4">
                                            <a href="#">Accessories</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Receivers & amplifiers</a></li>
                                                <li class="level3"><a href="#" title="">Cd & tape players</a></li>
                                                <li class="level3"><a href="#" title="">Tuners</a></li>
                                                <li class="level3"><a href="#" title="">Curntables</a></li>
                                                <li class="level3"><a href="#" title="">Receivers & adapters</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">Camera, Photo & Video</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu">
                                    <ul class="vertical-menu1">
                                        <li><a href="#">Car Audio</a></li>
                                        <li><a href="#">Radar Detectors</a></li>
                                        <li><a href="#">Car Safety & Security</a></li>
                                        <li><a href="#">Car Video</a></li>
                                        <li><a href="#">Two-Way Radios</a></li>
                                        <li><a href="#">CB Radios & Scanners</a></li>
                                        <li><a href="#">In-Dash Mounting Kits</a></li>
                                        <li><a href="#">Installation Accessories.</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">Cell Phones & Accessories</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu v2 phonebg pd2 style1">
                                    <ul class="level1">
                                        <li class="level2 col-md-4">
                                            <a href="#">Cell Phones</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Samsung Galaxy S8</a></li>
                                                <li class="level3"><a href="#" title="">iPhone 7/7 Plus</a></li>
                                                <li class="level3"><a href="#" title="">iPhone 6</a></li>
                                                <li class="level3"><a href="#" title="">Samsung Galaxy S7</a></li>
                                                <li class="level3"><a href="#" title="">Unlocked Phones</a></li>
                                            </ul>
                                            <a href="#">Cases</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">4Armbands</a></li>
                                                <li class="level3"><a href="#" title="">Armbands</a></li>
                                                <li class="level3"><a href="#" title="">Cases</a></li>
                                                <li class="level3"><a href="#" title="">Flip Cases</a></li>
                                                <li class="level3"><a href="#" title="">Holsters & Clips</a></li>
                                            </ul>
                                        </li>
                                        <li class="level2 col-md-8">
                                            <a href="# ">Accessories</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Batteries</a></li>
                                                <li class="level3"><a href="#" title="">Bluetooth Headsets</a></li>
                                                <li class="level3"><a href="#" title="">Bluetooth Speakers</a></li>
                                                <li class="level3"><a href="#" title="">Car Accessories</a></li>
                                                <li class="level3"><a href="#" title="">Chargers</a></li>
                                            </ul>
                                            <a href="# ">Connected Devices</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Tablets</a></li>
                                                <li class="level3"><a href="#" title="">Mobile Hotspots</a></li>
                                                <li class="level3"><a href="#" title="">Smart Watches</a></li>
                                                <li class="level3"><a href="#" title="">Wearable Technology</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">Headphones</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu v2 headphonebg pd3 style1">
                                    <ul class="level1">
                                        <li class="level2 col-md-6">
                                            <a href="#">Headphones</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">In-Ear & Earbud</a></li>
                                                <li class="level3"><a href="#" title="">On-Ear</a></li>
                                                <li class="level3"><a href="#" title="">Over-Ear</a></li>
                                                <li class="level3"><a href="#" title="">Wireless</a></li>
                                                <li class="level3"><a href="#" title="">Sports & Fitness</a></li>
                                            </ul>
                                        </li>
                                        <li class="level2 col-md-6">
                                            <a href="# ">Speaker System</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Complete Systems</a></li>
                                                <li class="level3"><a href="#" title="">Sound Bars</a></li>
                                                <li class="level3"><a href="#" title="">Surround Sound</a></li>
                                                <li class="level3"><a href="#" title="">Receivers & Amplifiers</a></li>
                                                <li class="level3"><a href="#" title="">Equalizers</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">Car Electronics</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu">
                                    <ul class="vertical-menu1">
                                        <li><a href="#">Car Audio</a></li>
                                        <li><a href="#">Radar Detectors</a></li>
                                        <li><a href="#">Car Safety & Security</a></li>
                                        <li><a href="#">Car Video</a></li>
                                        <li><a href="#">Two-Way Radios</a></li>
                                        <li><a href="#">CB Radios & Scanners</a></li>
                                        <li><a href="#">In-Dash Mounting Kits</a></li>
                                        <li><a href="#">Installation Accessories.</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">Electronics Showcase</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu">
                                    <ul class="vertical-menu1">
                                        <li><a href="#">Car Audio</a></li>
                                        <li><a href="#">Radar Detectors</a></li>
                                        <li><a href="#">Car Safety & Security</a></li>
                                        <li><a href="#">Car Video</a></li>
                                        <li><a href="#">Two-Way Radios</a></li>
                                        <li><a href="#">CB Radios & Scanners</a></li>
                                        <li><a href="#">In-Dash Mounting Kits</a></li>
                                        <li><a href="#">Installation Accessories.</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">Headphones</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu v2 headphonebg pd3 style1">
                                    <ul class="level1">
                                        <li class="level2 col-md-6">
                                            <a href="#">Headphones</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">In-Ear & Earbud</a></li>
                                                <li class="level3"><a href="#" title="">On-Ear</a></li>
                                                <li class="level3"><a href="#" title="">Over-Ear</a></li>
                                                <li class="level3"><a href="#" title="">Wireless</a></li>
                                                <li class="level3"><a href="#" title="">Sports & Fitness</a></li>
                                            </ul>
                                        </li>
                                        <li class="level2 col-md-6">
                                            <a href="# ">Speaker System</a>
                                            <ul class="menu-level-2">
                                                <li class="level3"><a href="#" title="">Complete Systems</a></li>
                                                <li class="level3"><a href="#" title="">Sound Bars</a></li>
                                                <li class="level3"><a href="#" title="">Surround Sound</a></li>
                                                <li class="level3"><a href="#" title="">Receivers & Amplifiers</a></li>
                                                <li class="level3"><a href="#" title="">Equalizers</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="vertical-item level1 vertical-drop"><a href="#">Car Electronics</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu">
                                    <ul class="vertical-menu1">
                                        <li><a href="#">Car Audio</a></li>
                                        <li><a href="#">Radar Detectors</a></li>
                                        <li><a href="#">Car Safety & Security</a></li>
                                        <li><a href="#">Car Video</a></li>
                                        <li><a href="#">Two-Way Radios</a></li>
                                        <li><a href="#">CB Radios & Scanners</a></li>
                                        <li><a href="#">In-Dash Mounting Kits</a></li>
                                        <li><a href="#">Installation Accessories.</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop"><a href="#">Electronics Showcase</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu">
                                    <ul class="vertical-menu1">
                                        <li><a href="#">Car Audio</a></li>
                                        <li><a href="#">Radar Detectors</a></li>
                                        <li><a href="#">Car Safety & Security</a></li>
                                        <li><a href="#">Car Video</a></li>
                                        <li><a href="#">Two-Way Radios</a></li>
                                        <li><a href="#">CB Radios & Scanners</a></li>
                                        <li><a href="#">In-Dash Mounting Kits</a></li>
                                        <li><a href="#">Installation Accessories.</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="vertical-item level1 vertical-drop mega-parent"><a href="#">All categlories</a>
                                <div class="menu-level-1 dropdown-menu vertical-menu v2 pd">
                                    <div class="row">
                                        <div class="col-md-4 text-center cate-item">
                                            <a href="#"><img src="{{ asset('frontend/img/megamenu/cate1.jpg') }}" alt="" class="img-reponsive"></a>
                                            <h3><a href="#">Mirrorless Cameras</a></h3>
                                        </div>
                                        <div class="col-md-4 text-center cate-item">
                                            <a href="#"><img src="{{ asset('frontend/img/megamenu/cate2.jpg') }}" alt="" class="img-reponsive"></a>
                                            <h3><a href="#">Lenses</a></h3>
                                        </div>
                                        <div class="col-md-4 text-center cate-item">
                                            <a href="#"><img src="{{ asset('frontend/img/megamenu/cate3.jpg') }}" alt="" class="img-reponsive"></a>
                                            <h3><a href="#">Photography Drones</a></h3>
                                        </div>
                                        <div class="col-md-4 text-center cate-item">
                                            <a href="#"><img src="{{ asset('frontend/img/megamenu/cate4.jpg') }}" alt="" class="img-reponsive"></a>
                                            <h3><a href="#">Sports & Action Cameras</a></h3>
                                        </div>
                                        <div class="col-md-4 text-center cate-item">
                                            <a href="#"><img src="{{ asset('frontend/img/megamenu/cate5.jpg') }}" alt="" class="img-reponsive"></a>
                                            <h3><a href="#">Optics</a></h3>
                                        </div>
                                        <div class="col-md-4 text-center cate-item">
                                            <a href="#"><img src="{{ asset('frontend/img/megamenu/cate6.jpg') }}" alt="" class="img-reponsive"></a>
                                            <h3><a href="#">Accessories</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-lg-12 widget-left">
                    <div class="flex lr">
                        <nav class="main-menu flex align-center">
                            {{-- <button type="button" class="icon-mobile e-icon-menu icon-pushmenu js-push-menu">
                                <span class="navbar-toggler-bar"></span>
                                <span class="navbar-toggler-bar"></span>
                                <span class="navbar-toggler-bar"></span>
                            </button> --}}
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav js-menubar">
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
                        </nav>
                        {{-- <div class="header-bottom-right hidden-xs hidden-sm">
                            <img src="{{ asset('frontend/img/icon-ship.png') }}" alt="" class="img-reponsive">
                            <span>Free Shipping on Orders $100</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
