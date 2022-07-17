@extends('frontend.layouts.master')

@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area" style="background-image: url({{ asset('assets/images/about/product.png') }});">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.product_detail') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.products') }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- Product Details Area Start -->
<div class="product-details-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            @include('frontend.partials.alert')
            <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        @foreach (explode(',', $product->images) as $image)
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{ asset('storage/images/product/'.$image) }}" alt="">
                                <a class="venobox full-preview" data-gall="myGallery" href="{{ asset('storage/images/product/'.$image) }}">
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-container mt-20px zoom-thumbs slider-nav-style-1 small-nav">
                    <div class="swiper-wrapper">
                        @foreach (explode(',', $product->images) as $image)
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{ asset('storage/images/product/'.$image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content ml-25px">
                    <h2>{{ $product->name }}</h2>
                    <div class="pricing-meta">
                        <ul class="d-flex">
                            <li class="new-price">${{ $product->price }}</li>
                        </ul>
                    </div>
                    <div class="pro-details-quality">
                        <div class="pro-details-cart">
                            {{-- <button class="add-cart">Buy Now</button> --}}
                            <a href="{{  route('frontend.purchase', $product->id) }}" class="add-cart"> {{ __('frontend.buy') }}</a>
                        </div>
                    </div>
                    <p>{!! $product->description !!}</p>
                    <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                        <span>Brand :</span>
                        <ul class="d-flex">
                            <li>
                                <a href="#">{{ $product->brand?->name }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                        <span>Categories: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="#">{{ $product->category?->name }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                        <span>Tags: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="#">{{ $product->category?->name }}, </a>
                            </li>
                            <li>
                                <a href="#">{{ $product->type?->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area Start -->
<div class="product-area related-product">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center m-0">
                    <h2 class="title"> {{ __('frontend.related') }}</h2>
                </div>
            </div>
        </div>
        <!-- Section Title & Tab End -->
        <div class="row">
            <div class="col">
                <div class="new-product-slider swiper-container slider-nav-style-1">
                    <div class="swiper-wrapper">
                        @foreach ($related as $item)
                            <div class="swiper-slide">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="{{ route('frontend.single-product',$item->id) }}" class="image">
                                            <img src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}" alt="Product" />
                                            <img class="hover-image" src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}" alt="Product" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <span class="category"><a href="#">{{ $item->category->name }}</a></span>
                                        <h5 class="title"><a href="{{ route('frontend.single-product',$item->id) }}">{{ $item->name }}
                                            </a>
                                        </h5>
                                        <span class="price">
                                        <span class="new">${{ $item->price }}</span>
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-id="{{ $item->id }}" id="showProduct"><i class="pe-7s-look"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->
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

</script>

@endsection