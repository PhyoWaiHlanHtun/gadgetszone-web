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
                    <h4 class="mb-sm-0">{{ __('about.detail') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('about.index') }}">{{ __('about.about') }}</a></li>                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="card-title">
                                    {{ $about->title }}
                                </h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <span class="dark"> {{ __('about.para_no')}} - {{ $about->serial }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="text-align: justify">
                            {!! $about->para !!}
                        </p>
                        <div class="card-content">
                            @if ($about->status == 1)
                                <button class=" btn btn-primary btn-sm">Show</button>
                            @else
                                <button class=" btn btn-danger btn-sm">Hide</button>
                            @endif
                        </div>
                    </div>
                    @if ($about->image != '')
                        <div class="card-img">
                            <img src="{{ asset('storage/images/about/'.$about->image) }}" class=" img-fluid img-responsive" alt="">
                        </div>
                    @endif
                    <div class="card-footer">
                        <div class="remove">
                            <a class="btn btn-sm btn-success edit-item-btn" href="{{ route('about.edit',$about->id) }}">Edit</a>
                            <a href='#' class='btn btn-danger btn-sm ml-3' id='delete-btn' data-id="{{ $about->id }}" data-type="about" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        @include('backend.partials.modal')
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('backend/libs/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('backend/js/pages/ecommerce-product-details.init.js') }}"></script>

<!-- listjs init -->
<script src="{{ asset('backend/js/pages/listjs.init.js') }}"></script>

<!-- Sweet Alerts js -->
<script src="{{ asset('backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>

@endsection
