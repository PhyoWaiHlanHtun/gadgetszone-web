@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area" style="background-image: url({{ asset('assets/images/about/product.png') }});">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.products') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.products') }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- Shop Page Start  -->
<div class="shop-category-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    {{-- <p class="compare-product"> <span>12</span> Product Found of <span>30</span></p> --}}
                    <!-- Left Side End -->
                    <div class="shop-tab nav">
                        <button class="active" data-bs-target="#shop-grid" data-bs-toggle="tab">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </button>
                        <button data-bs-target="#shop-list" data-bs-toggle="tab">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </button>
                    </div>
                    <!-- Right Side Start -->
                    {{-- <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <!-- Single Wedge End -->
                        <div class="header-bottom-set dropdown">
                            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Default <i class="fa fa-angle-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="#">Name, A to Z</a></li>
                                <li><a class="dropdown-item" href="#">Name, Z to A</a></li>
                                <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                                <li><a class="dropdown-item" href="#">Price, high to low</a></li>
                                <li><a class="dropdown-item" href="#">Sort By new</a></li>
                                <li><a class="dropdown-item" href="#">Sort By old</a></li>
                            </ul>
                        </div>
                        <!-- Single Wedge Start -->
                    </div> --}}
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->
                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">
                    <!-- Tab Content Area Start -->
                    <div class="row">
                        <div class="col">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="shop-grid">
                                    <div class="row mb-n-30px">
                                        @forelse ($products as $item)
                                            <div class="md-w-20 sm-w-50 mb-30px">
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
                                        @empty
                                            <p class="text-center"> No Products Found. </p>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="tab-pane fade mb-n-30px" id="shop-list">
                                    @foreach ($products as $item)
                                        <div class="shop-list-wrapper mb-30px">
                                            <div class="row">
                                                <div class="col-md-5 col-lg-5 col-xl-4 mb-lm-30px">
                                                    <div class="product">
                                                        <div class="thumb">
                                                            <a href="{{ route('frontend.single-product',$item->id) }}" class="image">
                                                                <img src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}" alt="Product" />
                                                                <img class="hover-image" src="{{ asset('storage/images/product/'.explode(',',$item->images)[0]) }}" alt="Product" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-lg-7 col-xl-8">
                                                    <div class="content-desc-wrap">
                                                        <div class="content">
                                                            <span class="category"><a href="#">{{ $item->category->name }}</a></span>
                                                            <h5 class="title"><a href="{{ route('frontend.single-product',$item->id) }}">{{ $item->name }}</a></h5>
                                                            <p>{!! $item->description !!}</p>
                                                        </div>
                                                        <div class="box-inner">
                                                            <span class="price">
                                                            <span class="new">${{ $item->price }}</span>
                                                            </span>
                                                            <div class="actions">
                                                                <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-id="{{ $item->id }}" id="showProduct"><i class="pe-7s-look"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content Area End -->
                    <!--  Pagination Area Start -->
                    {{ $products->links('frontend.partials.pagination') }}
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
        </div>
    </div>
</div>
<!-- Shop Page End  -->

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
                                                <a href="/purchase/${data.product.id}" class="add-cart">{{ __('frontend.buy') }}</a>
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
