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
                    <h4 class="mb-sm-0">{{ __('contact.detail') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">
                                {{ __('contact.contact') }}
                            </a></li>
                            <li class="breadcrumb-item active">{{ __('contact.detail') }}</li>

                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h6 class="card-header">
                            {{ $contact->subject }}
                    </h6>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="card-text mb-5" style="text-align: justify">
                                {!! $contact->message !!}
                            </p>
                            <footer class="blockquote-footer">{{ $contact->name }} <<cite title="{{ $contact->email }}">{{ $contact->email }}</cite>></footer>
                        </blockquote>
                    </div>
                    <div class="card-footer">
                        <div class="remove">
                            <a href='#' class='btn btn-danger btn-sm ml-3' id='delete-btn' data-id="{{ $contact->id }}" data-type="contact" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
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
