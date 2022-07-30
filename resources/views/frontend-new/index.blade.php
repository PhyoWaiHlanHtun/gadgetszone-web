@extends('frontend.layouts.master')

@section('content')

 <!-- Hero/Intro Slider Start -->
 <div class="section" style="height: 50%;">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            <!-- Single slider item -->
            @if (count($banners) != 0)
                @foreach ($banners as $item)
                    <div class="hero-slide-item slider-height swiper-slide bg-color1" data-bg-image="{{ asset('assets/images/hero/bg/hero-bg-2.png') }}">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-top sm-top-view">
                                    <div class="hero-slide-content slider-animated-1 pt-5">
                                        <span class="category">Welcome To Gadgets Zone</span>
                                        <h2 class="title-1">{{ $item->title }}</h2>
                                        <a href="{{ url('/products') }}" class="btn btn-primary text-capitalize">Shop All Devices</a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                                    <div class="show-case">
                                        <div class="hero-slide-image">
                                            <img src="{{ asset('storage/images/banner/'.$item->image) }}" class="img img-fluid img-responsive" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <!-- Single slider item -->
            <div class="hero-slide-item slider-height swiper-slide bg-color1" data-bg-image="assets/images/hero/bg/hero-bg-2.png">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category">Welcome To Gadgets Zone</span>
                                <h2 class="title-1">Your Home <br>
                                Smart Devices & <br>
                                 Best Solution </h2>
                                <a href="#" class="btn btn-primary text-capitalize">Shop All Devices</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                            <div class="show-case">
                                <div class="hero-slide-image">
                                    <img src="assets/images/hero/inner-img/hero-1-2.webp" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<!-- Hero/Intro Slider End -->

<!-- Donate Start -->
<div class="donate-area style-one pt-70px pb-50px">
    <div class="container">
        <div class="row">
            <a href="{{ route('frontend.ukarine') }}" class="col-md-12">
                <div class="shortcut-tabs p-3">
                    {{-- <i class="pe-7s-smile"></i> --}}
                    <img src="{{ asset('assets/images/shortcut/donation2.png') }}" alt="donation to ukarine kids" width="80" class="d-flex mx-auto">
                    <span> {{ __('frontend.donate_ukarine') }} </span>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- Donate End -->

<!-- Shortcut Tab Area Start -->
<div class="shortcut-area style-one mt-30px pb-50px">
    <div class="container">
        <div class="row">
            <a href="{{ route('frontend.topup') }}" class="md-w-20 sm-w-20">
                <div class="shortcut-tabs p-2">
                    <img src="{{ asset('assets/images/shortcut/topup2.png') }}" alt="shortcut image" width="80" class="d-flex mx-auto">
                    <span> {{ __('frontend.topup') }} </span>
                </div>
            </a>
            <a href="{{ route('frontend.withdrawal') }}" class="md-w-20 sm-w-20">
                <div class="shortcut-tabs p-2">
                    <img src="{{ asset('assets/images/shortcut/withdrawal2.png') }}" alt="shortcut image" width="80" class="d-flex mx-auto">
                    <span> {{ __('frontend.withdrawal') }} </span>
                </div>
            </a>

            <a href="#"  id="inviteReferral" class="md-w-20 sm-w-20">
                <div class="shortcut-tabs p-2">
                    <img src="{{ asset('assets/images/shortcut/invite2.png') }}" alt="shortcut image" width="80" class="d-flex mx-auto">
                    <span> {{ __('frontend.invite') }} </span>
                    <input type="hidden" id="referralCode" value="{{ (getReferralCode()) ?: 0 }}">
                </div>
            </a>

            <a href="{{ checkAuth() }}" class="md-w-20 sm-w-20">
                <div class="shortcut-tabs p-2">
                    <img src="{{ asset('assets/images/shortcut/account2.png') }}" alt="shortcut image" width="80" class="d-flex mx-auto">
                    <span> {{ __('frontend.account') }} </span>
                </div>
            </a>
            <a href="{{ route('frontend.about') }}" class="md-w-20 sm-w-20">
                <div class="shortcut-tabs p-2">
                    <img src="{{ asset('assets/images/shortcut/about2.png') }}" alt="shortcut image" width="80" class="d-flex mx-auto">
                    <span> {{ __('frontend.about') }} </span>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- Shortcut Area End -->

<!-- Product Area Start -->
<div class="product-area pt-50px pb-100px">
    <div class="container">
        <!-- Section Title Start -->
        <div class="row pt-70px">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">{{ __('frontend.new_prods') }}</h2>
                </div>
            </div>
        </div>
        <!-- Section Title End -->
        <div class="row" id="new-products">
            @include('frontend.new-products')       
        </div>

        <!-- Ads area start -->
        <div class="row pt-70px">
            <div class="col-12">
                <div class="section-title text-center mb-0">
                    <h2 class="title"> {{ __('frontend.news_line') }}</h2>
                </div>
                <div class="ads-slider swiper-container mb-30px">
                    <div class="swiper-wrapper align-items-center">

                        @forelse( $ads as $ad )

                        <?php $url = ( $ad->url ) ?: 'javascript:void(0)' ?>

                        <div class="swiper-slide brand-slider-item text-center">
                            <a href="{{ $url }}"><img class=" img-fluid" src="{{ asset(getImage($ad->image)) }}" alt="image" /></a>
                        </div>

                        @empty

                        <div class="swiper-slide brand-slider-item text-center">
                            <a href="javascript:void(0)"><img class=" img-fluid" src="/default.png" alt="image" /></a>
                        </div>

                        @endforelse

                    </div>
                </div>
            </div>
        </div>

        <!-- Ads area end -->

        <!-- Section Title Start -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">{{ __('frontend.spec_prods') }}</h2>
                </div>
            </div>
        </div>
        <!-- Section Title End -->
        <div class="row mb-n-30px" id="special-products">
            @include('frontend.special-products')        
        </div>
    </div>
</div>
<!-- Product Area End -->

<!-- Banner Area Start -->
<div class="banner-area style-one pt-50px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single-banner nth-child-1">
                    <img src="{{ asset('assets/images/banner/3.webp') }}" alt="">
                    <div class="banner-content nth-child-1">
                        <h3 class="title">Smart Watch For <br>
                        Your Hand</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-banner nth-child-2 mb-30px mb-lm-30px mt-lm-30px ">
                    <img src="{{ asset('assets/images/banner/4.webp') }}" alt="">
                    <div class="banner-content nth-child-2">
                        <h3 class="title">Headphones</h3>
                    </div>
                </div>
                <div class="single-banner nth-child-2">
                    <img src="{{ asset('assets/images/banner/5.webp') }}" alt="">
                    <div class="banner-content nth-child-3">
                        <h3 class="title">Smartphone</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

<!-- Fashion Area Start -->
<div class="fashion-area" data-bg-image="{{ asset('assets/images/fashion/fashion.png') }}">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 text-center">
                <h2 class="title"> <span>Smart Fashion</span> With Smart Devices </h2>
            </div>
        </div>
    </div>
</div>
<!-- Fashion Area End -->

<!-- Feature product area start -->
<div class="feature-product-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">{{ __('frontend.feature') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 mb-md-35px mb-lm-35px">
                <div class="single-feature-content">
                    <div class="feature-image">
                        <img src="{{ asset('assets/images/feature-image/headphone.png') }}" alt="">
                    </div>
                    <div class="top-content">
                        <h4 class="title"><a href="#">Bluetooth Headphone </a></h4>
                    </div>
                    {{-- <div class="bottom-content">
                        <div class="deal-timing">
                            <div data-countdown="2021/09/15"></div>
                        </div>
                        <a href="#" class="btn btn-primary  m-auto"> Shop
                            Now </a>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="feature-right-content">
                    <div class="image-side">
                        <img src="{{ asset('assets/images/feature-image/watch.png') }}" alt="">
                        {{-- <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                            class="pe-7s-cart"></i></button> --}}
                    </div>
                    <div class="content-side">
                        {{-- <div class="deal-timing">
                            <span>End In:</span>
                            <div data-countdown="2021/09/15"></div>
                        </div> --}}
                        <div class="prize-content">
                            <h5 class="title"><a href="javascript:void(0)">Ladies Smart Watch</a></h5>

                        </div>
                        <div class="product-feature">
                            <ul>
                                <li>Predecessor : <span>None.</span></li>
                                <li>Support Type : <span>Neutral.</span></li>
                                <li>Cushioning : <span>High Energizing.</span></li>
                                <li>Total Weight : <span> 300gm</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="feature-right-content mt-30px">
                    <div class="image-side">
                        <img src="{{ asset('assets/images/feature-image/phone.png') }}" alt="">
                        {{-- <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                            class="pe-7s-cart"></i></button> --}}
                    </div>
                    <div class="content-side">
                        {{-- <div class="deal-timing">
                            <span>End In:</span>
                            <div data-countdown="2021/09/15"></div>
                        </div> --}}
                        <div class="prize-content">
                            <h5 class="title"><a href="javascript:void(0)">Ladies Smart Watch</a></h5>
                        </div>
                        <div class="product-feature">
                            <ul>
                                <li>Predecessor : <span>None.</span></li>
                                <li>Support Type : <span>Neutral.</span></li>
                                <li>Cushioning : <span>High Energizing.</span></li>
                                <li>Total Weight : <span> 300gm</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature product area End -->

<!-- Brand area start -->

<div class="brand-area pt-50px pb-100px">
    <div class="container">
        <div class="section-title text-center mb-3">
            <h2 class="title">{{ __('frontend.partners') }}</h2>
        </div>
        <div class="brand-slider swiper-container">
            <div class="swiper-wrapper align-items-center">
                @foreach ( $partners as $partner )
                <div class="swiper-slide brand-slider-item text-center">
                    <a href="javascript:void(0)"><img class=" img-fluid" src="{{ asset(getImage($partner->image)) }}" alt="image" /></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Brand area end -->

@endsection

@section('script')

<script>

    let baseUri = window.location.origin;
    $(document).on('click','#showProduct', function (event) {
        event.preventDefault();
        let id = $(this).data('id');
        let url = '{{ route("single.api",[":id"]) }}';
        url = url.replace(':id',id);
        let modal = document.getElementById('productModal');
        fetch(url)
            .then(response => response.json())
            .then(data => {
                let images = data.product.images.split(',');
                modal.innerHTML =`
                <div class="modal-dialog modal-dialog-centered" role="document" id="swiperImages">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                                    <!-- Swiper -->
                                    <div class="swiper-container product-thumbnail-slider gallery-top" >
                                        <div class="swiper-wrapper">
                                            ${
                                                images.map(item => `<div class="swiper-slide"><img class="img-responsive m-auto" src="${baseUri}/storage/images/product/${item}" alt=""></div>` ).join('')
                                            }
                                        </div>
                                    </div>
                                    <div class="swiper-container product-nav-slider gallery-thumbs mt-20px slider-nav-style-1 small-nav">
                                        <div class="swiper-wrapper">
                                            ${
                                                images.map(item => `<div class="swiper-slide"><img class="img-responsive m-auto" src="${baseUri}/storage/images/product/${item}" alt=""></div>` ).join('')
                                            }
                                        </div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-buttons">
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                                    <div class="product-details-content quickview-content">
                                        <h2>${data.product.name}</h2>
                                        <div class="pricing-meta">
                                            <ul class="d-flex">
                                                <li class="new-price">$ ${data.product.price}</li>
                                            </ul>
                                        </div>
                                        <div class="pro-details-quality">
                                            <div class="pro-details-cart">
                                                <a href="/purchase/${data.product.id}" class="add-cart">Buy Now</a>
                                            </div>
                                        </div>
                                        <p>${data.product.description}</p>
                                        <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                            <span>Categories: </span>
                                            <ul class="d-flex">
                                                <li>
                                                    <a href="#">${data.product.category.name} </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                            <span>Brand: </span>
                                            <ul class="d-flex">
                                                <li>
                                                    <a href="#">${data.product.brand?.name}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="payment-img">
                                            <a href="#"><img src="${baseUri}/assets/images/icons/payment.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                $('#productModal').modal('show');

                var productNavSlider = new Swiper(".product-nav-slider",{
                    loop:!1,
                    spaceBetween:10,
                    slidesPerView:3,
                    freeMode:!0,
                    watchSlidesProgress:!0
                }),

                productThubnailSlider = new Swiper(".product-thumbnail-slider",{
                    loop:!1,
                    spaceBetween:2,
                    navigation:{
                        nextEl:".swiper-button-next",
                        prevEl:".swiper-button-prev"
                    },
                    thumbs:{
                        swiper:productNavSlider
                    }});
            });

    });

    new Swiper('.ads-slider.swiper-container', {
        slidesPerView: 2,
        speed: 1500,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        }
    });

$(document).ready(function(){

    $(document).on('click', '#new-products .page-link', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var _token = $("input[name=_token]").val();
     $.ajax({
         url:"{{ route('pagination.new-products.fetch') }}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#new-products').html(data);
         }
       });
    });

    $(document).on('click', '#special-products .page-link', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var _token = $("input[name=_token]").val();
     $.ajax({
         url:"{{ route('pagination.special-products.fetch') }}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#special-products').html(data);
         }
       });
    });

});

</script>

@endsection


