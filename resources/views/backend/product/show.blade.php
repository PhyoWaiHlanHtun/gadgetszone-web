@extends('backend.layouts.master')

@section('css')
    <link href="{{ asset('backend/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('product.product_detail') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('product.product') }}</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        @include('backend.layouts.msg')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-lg-5">
                            <div class="col-xl-4 col-md-8 mx-auto">
                                <div class="product-img-slider sticky-side-div">
                                    <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                        <div class="swiper-wrapper">
                                            @foreach(explode(',',$product->images) as $img)
                                            <div class="swiper-slide text-center d-flex justify-content-center">
                                                <img class="img-fluid d-block" alt="Product Image" src="{{ asset('storage/images/product/'.$img) }}">
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <!-- end swiper thumbnail slide -->
                                    <div class="swiper product-nav-slider mt-2">
                                        <div class="swiper-wrapper">
                                            @foreach(explode(',',$product->images) as $img)
                                            <div class="swiper-slide">
                                                <div class="nav-slide-item ">
                                                    <img src="{{ asset('storage/images/product/'.$img) }}" alt="Product Image"
                                                        class="img-fluid d-block" />
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- end swiper nav slide -->
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-8">
                                <div class="mt-xl-0 mt-5">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h4> {{ $product->name }}</h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div><a href="#" class="text-primary d-block">
                                                    {{ $product->category?->name }}
                                                </a></div>
                                                <div class="vr"></div>
                                                <div><a href="#" class="text-primary d-block">
                                                    {{ $product->type?->name }}
                                                </a></div>
                                                <div class="vr"></div>
                                                <div><a href="#" class="text-primary d-block">
                                                    {{ $product->brand?->name }}
                                                </a></div>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-light" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="ri-pencil-fill align-bottom"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="p-2 border border-dashed rounded">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-2">
                                                        <div
                                                            class="avatar-title rounded bg-transparent text-success fs-24">
                                                            <i class="ri-money-dollar-circle-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-1">Price :</p>
                                                        <h5 class="mb-0">$ {{ $product->price }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>



                                    <div class="mt-4 text-muted">
                                        <h5 class="fs-15">Description :</h5>
                                        <p>{!! $product->description !!}</p>
                                    </div>

                                    <!-- product-content -->

                                    <!-- end card body -->
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>

    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('backend/libs/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('backend/js/pages/ecommerce-product-details.init.js') }}"></script>

@endsection
