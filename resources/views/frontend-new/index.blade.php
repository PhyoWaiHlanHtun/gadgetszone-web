@extends('frontend-new.layouts.master')

@section('content')
<section class="all-s">
    <div class="ads-group v2 nospc">
        <div class="container container-240">
            <div class="row">
                {{-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 set-w hidden-xs hidden-sm "></div> --}}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="slide-home3">
                        <div class="e-slide v2 js-slider-3items">
                            @if (count($banners) != 0)
                            @foreach ($banners as $item)
                            <div class="e-slide-img">
                                <a href="#"><img src="{{ asset('assets/images/hero/bg/hero-bg-2.png') }}" alt=""></a>
                                <div class="slide-content v2">
                                    <p class="cate v2 white">Welcome to E-Come Zone</p>
                                    <h3 class="v2 white">{{ $item->title }}</h3>
                                    <a href="#" class="slide-btn e-yl-gradient white">Shop now<i
                                            class="ion-ios-arrow-forward"></i></a>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="e-slide-img">
                                <a href="#"><img src="{{ asset('frontend/img/slider/h3_s1.jpg') }}" alt=""></a>
                                <div class="slide-content v2">
                                    <p class="cate v2">Welcome to E-Come Zone</p>
                                    <h3 class="v2 ">Your Home <br>
                                        Smart Devices & <br>
                                         Best Solution </h3>
                                    <a href="#" class="slide-btn e-yl-gradient">Shop now<i
                                            class="ion-ios-arrow-forward"></i></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature -->
    <div class="feature v2">
        <div class="container container-240">
            <div class="feature-inside">
                <a href="{{ route('frontend.topup') }}" class="feature-block v2 text-center">
                    <div class="feature-block-img"><img src="{{ asset('assets/images/shortcut/topup2.png') }}" alt=""
                            class="img-reponsive" width="90px"></div>
                    <div class="feature-info v2">
                        <h3> {{ __('frontend.topup') }} </h3>
                    </div>
                </a>
                <a href="{{  route('frontend.withdrawal') }}" class="feature-block v2 text-center">
                    <div class="feature-block-img"><img src="{{ asset('assets/images/shortcut/withdrawal2.png') }}"
                            alt="" class="img-reponsive" width="90px"></div>
                    <div class="feature-info v2">
                        <h3> {{ __('frontend.withdrawal') }} </h3>
                    </div>
                </a>
                <a href="#" id="inviteReferral" class="feature-block v2 text-center">
                    <div class="feature-block-img"><img src="{{ asset('assets/images/shortcut/invite2.png') }}" alt=""
                            class="img-reponsive" width="90px"></div>
                    <div class="feature-info v2">
                        <h3> {{ __('frontend.invite_share') }} </h3>
                        <input type="hidden" id="referralCode" value="{{ (getReferralCode()) ?: 0 }}">
                    </div>
                </a>
            </div>
            <div class="feature-inside" style="margin-top: 30px">
                <a href="{{  route('frontend.about') }}" class="feature-block v2 text-center">
                    <div class="feature-block-img"><img src="{{ asset('assets/images/shortcut/about2.png') }}" alt=""
                            class="img-reponsive" width="90px"></div>
                    <div class="feature-info v2">
                        <h3> {{ __('frontend.about') }}</h3>
                    </div>
                </a>
                <a href="{{ route('frontend.ukarine') }}" class="feature-block v2 text-center">
                    <div class="feature-block-img"><img src="{{ asset('assets/images/shortcut/donation2.png') }}" alt=""
                            class="img-reponsive" width="90px"></div>
                    <div class="feature-info v2">
                        <h3> {{ __('frontend.donate_ukarine') }} </h3>
                    </div>
                </a>
                <a href="#" class="feature-block v2 text-center">
                    <div class="feature-block-img"><img src="{{ asset('assets/images/shortcut/topup2.png') }}" alt=""
                            class="img-reponsive" width="90px"></div>
                    <div class="feature-info v2">
                        <h3> {{ __('frontend.income') }} </h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Top product -->
    <div class="top-product-tab">
        <div class="container container-240">
            <div class="row">
                {{-- <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="filter filter-product e-category">
                        <h1 class="widget-blog-title">Top Products</h1>
                        <div class="owl-carousel owl-theme js-owl-post">
                            <div class="item">
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/phone4.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/sound.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/ring.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/macbookair.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/phone3.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/tv.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>

                            </div>

                            <div class="item">
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/phone4.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/sound.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/ring.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/macbookair.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/phone3.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/phone4.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/sound.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/ring.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/macbookair.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                                <div class="cate-item">
                                    <div class="product-img">
                                        <a href="#"><img src="{{ asset('frontend/img/product/phone3.jpg') }}" alt=""
                                                class="img-reponsive"></a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">Epson Home Cinema </a></h3>
                                        <div class="product-price v2"><span>$780.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12 col-sm-12  col-xs-12">
                    <div class="product-tab spc3">
                        <ul class="product-tab-sw v2">
                            <li class="active"><a data-toggle="tab" href="#feature" aria-expanded="true">$5 - $20</a></li>
                            <li class=""><a data-toggle="tab" href="#top-rated" aria-expanded="false">$50 - $100</a></li>
                            <li class=""><a data-toggle="tab" href="#most" aria-expanded="false">$1000+</a></li>
                        </ul>
                        <div class="tab-content" id='products'>
                            <div id="feature" class="tab-pane fade in active">
                                <div class="product-tab-pd owl-carousel owl-theme js-owl-product2">
                                    @if (count($first) > 0)
                                        @foreach( $first as $item )
                                            <div class="product-item">
                                                <div class="pd-bd product-inner">
                                                    <div class="product-img">
                                                        <a href="{{ route('frontend.single-product',$item->id) }}">
                                                            <img src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}"
                                                                alt="" class="img-reponsive">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="element-list element-list-middle">
                                                            <p class="product-cate">{{  $item->category->name }} </p>
                                                            <h3 class="product-title"><a href="#">{{  $item->name }}</a>
                                                            </h3>
                                                            <div class="product-bottom">
                                                                <div class="product-price"><span> $ {{ $item->price }}</span></div>
                                                                <a href="#" class="btn-icon btn-view">
                                                                    <span class="icon-bg icon-view"></span>
                                                                </a>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="product-item">
                                            <div class="pd-bd product-inner">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/product/sound.jpg" alt="" class="img-reponsive"></a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="element-list element-list-middle">
                                                        <p class="product-cate">No Product Data</p>
                                                        <h3 class="product-title"><a href="#">-</a></h3>
                                                        <div class="product-bottom">
                                                            <div class="product-price"><span>-</span></div>
                                                            <a href="#" class="btn-icon btn-view">
                                                        <span class="icon-bg icon-view"></span>
                                                    </a>
                                                        </div>
                                                        <div class="product-bottom-group">
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-cart"></span>
                                                    </a>
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-wishlist"></span>
                                                    </a>
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-compare"></span>
                                                    </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-button-group">
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-cart"></span>
                                                </a>
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-wishlist"></span>
                                                </a>
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-compare"></span>
                                                </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div id="top-rated" class="tab-pane fade">
                                <div class="product-tab-pd owl-carousel owl-theme js-owl-product2">
                                    @if (count($second) > 0)
                                        @foreach( $second as $item )
                                            <div class="product-item">
                                                <div class="pd-bd product-inner">
                                                    <div class="product-img">
                                                        <a href="{{ route('frontend.single-product',$item->id) }}">
                                                            <img src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}"
                                                                alt="" class="img-reponsive">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="element-list element-list-middle">
                                                            <p class="product-cate">{{  $item->category->name }} </p>
                                                            <h3 class="product-title"><a href="#">{{  $item->name }}</a>
                                                            </h3>
                                                            <div class="product-bottom">
                                                                <div class="product-price"><span> $ {{ $item->price }}</span></div>
                                                                <a href="#" class="btn-icon btn-view">
                                                                    <span class="icon-bg icon-view"></span>
                                                                </a>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="product-item">
                                            <div class="pd-bd product-inner">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/product/sound.jpg" alt="" class="img-reponsive"></a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="element-list element-list-middle">
                                                        <p class="product-cate">No Product Data</p>
                                                        <h3 class="product-title"><a href="#">-</a></h3>
                                                        <div class="product-bottom">
                                                            <div class="product-price"><span>-</span></div>
                                                            <a href="#" class="btn-icon btn-view">
                                                        <span class="icon-bg icon-view"></span>
                                                    </a>
                                                        </div>
                                                        <div class="product-bottom-group">
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-cart"></span>
                                                    </a>
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-wishlist"></span>
                                                    </a>
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-compare"></span>
                                                    </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-button-group">
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-cart"></span>
                                                </a>
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-wishlist"></span>
                                                </a>
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-compare"></span>
                                                </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div id="most" class="tab-pane fade">
                                <div class="product-tab-pd owl-carousel owl-theme js-owl-product2">
                                    @if (count($third) > 0)
                                        @foreach( $third as $item )
                                            <div class="product-item">
                                                <div class="pd-bd product-inner">
                                                    <div class="product-img">
                                                        <a href="{{ route('frontend.single-product',$item->id) }}">
                                                            <img src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}"
                                                                alt="" class="img-reponsive">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="element-list element-list-middle">
                                                            <p class="product-cate">{{  $item->category->name }} </p>
                                                            <h3 class="product-title"><a href="#">{{  $item->name }}</a>
                                                            </h3>
                                                            <div class="product-bottom">
                                                                <div class="product-price"><span> $ {{ $item->price }}</span></div>
                                                                <a href="#" class="btn-icon btn-view">
                                                                    <span class="icon-bg icon-view"></span>
                                                                </a>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="product-item">
                                            <div class="pd-bd product-inner">
                                                <div class="product-img">
                                                    <a href="#"><img src="img/product/sound.jpg" alt="" class="img-reponsive"></a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="element-list element-list-middle">
                                                        <p class="product-cate">No Product Data</p>
                                                        <h3 class="product-title"><a href="#">-</a></h3>
                                                        <div class="product-bottom">
                                                            <div class="product-price"><span>-</span></div>
                                                            <a href="#" class="btn-icon btn-view">
                                                        <span class="icon-bg icon-view"></span>
                                                    </a>
                                                        </div>
                                                        <div class="product-bottom-group">
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-cart"></span>
                                                    </a>
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-wishlist"></span>
                                                    </a>
                                                            <a href="#" class="btn-icon">
                                                        <span class="icon-bg icon-compare"></span>
                                                    </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-button-group">
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-cart"></span>
                                                </a>
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-wishlist"></span>
                                                </a>
                                                        <a href="#" class="btn-icon">
                                                    <span class="icon-bg icon-compare"></span>
                                                </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="homepage-banner" style="margin-top:30px">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="banner-img banner-img2">
                                    <a href="#"><img src="{{ asset('frontend/img/banner/h3_b2.jpg') }}" alt=""
                                            class="img-responsive"></a>
                                    <div class="h-banner-content v5">
                                        <p class="content-name">Kbox Controller</p>
                                        <p class="content-price">Sale up to 30%</p>
                                        <a href="#" class="btn-banner">Shop now<i class="ion-ios-arrow-forward"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="banner-img banner-img2">
                                    <a href="#"><img src="{{ asset('frontend/img/banner/h3_b3.jpg') }}" alt=""
                                            class="img-responsive"></a>
                                    <div class="h-banner-content v5">
                                        <p class="content-name">Smart Watch Seri 2</p>
                                        <p class="content-price">Sale up to 30%</p>
                                        <a href="#" class="btn-banner">Shop now<i class="ion-ios-arrow-forward"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Super Deal -->

    <div class="container container-240">
        <div class="slide-fullw">
            <div class="js-slider-home2">
                <div class="e-slide-img">
                    <img src="{{ asset('frontend/img/slider/h2_s1.jpg') }}" alt="">

                </div>
                <div class="e-slide-img">
                    <img src="{{ asset('frontend/img/slider/h2_s2.jpg') }}" alt="">

                </div>
                <div class="e-slide-img">
                    <img src="{{ asset('frontend/img/slider/h2_s3.jpg') }}" alt="">

                </div>
            </div>
        </div>
    </div>
    <!-- Super Deal end -->

    <div class="releases v2">
        <div class="container container-240">
            <div class="title-icon t-column mg-50">
                <div class="t-inside">
                    <img src="{{ asset('frontend/img/real.png') }}" alt="">
                </div>
                <h1>New releases</h1>
            </div>

            <div class="row">
                @foreach( $new as $item )
                    <div class="product-item">
                        <div class="pd-bd product-inner">
                            <div class="product-img">
                                <a href="{{ route('frontend.single-product',$item->id) }}">
                                    <img src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}"
                                        alt="" class="img-reponsive">
                                </a>
                            </div>
                            <div class="product-info">
                                <div class="element-list element-list-middle">
                                    <p class="product-cate">{{  $item->category->name }} </p>
                                    <h3 class="product-title"><a href="#">{{  $item->name }}</a>
                                    </h3>
                                    <div class="product-bottom">
                                        <div class="product-price"><span> $ {{ $item->price }}</span></div>
                                        <a href="#" class="btn-icon btn-view">
                                            <span class="icon-bg icon-view"></span>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner -->
    <div class="container container-240">
        <div class="banner-callus spc2 image-bd effect_img2">
            <a href="#"><img src="{{ asset('frontend/img/banner/h3_b1.jpg') }}" alt="" class="img-responsive"></a>
            <div class="box-center v2">
                <p>Free Shipping on Orders $50</p>
                <a href="#" class="btn-callus">Shop now</a>
            </div>
        </div>
    </div>
    <!-- e-category  -->
    <div class="e-category" id="commission">
        <div class="container container-240">
            <div class="section-title text-center" style="margin-bottom: 20px">
                <h2 class="title"> {{ __('frontend.news_line') }}</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="owl-carousel owl-theme owl-cate js-oneitem">

                        @forelse( $ads as $ad )

                            <?php $url = ( $ad->url ) ?: 'javascript:void(0)' ?>

                            <div class="slick-item">
                                <div class="sp-item">
                                    <a href="{{ $url }}">
                                        <img src="{{ asset(getImage($ad->image)) }}" alt="photo"
                                        class="img-reponsive">
                                    </a>

                                </div>
                            </div>

                            @empty

                            <div class="slick-item">
                                <div class="sp-item">
                                    <img src="{{ asset('frontend/img/single/sony.jpg') }}" alt="photo"
                                        class="img-reponsive">
                                </div>
                            </div>
                            <div class="slick-item">
                                <div class="sp-item">
                                    <img src="{{ asset('frontend/img/single/sony2.jpg') }}" alt="photo"
                                        class="img-reponsive">
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')



@endsection
