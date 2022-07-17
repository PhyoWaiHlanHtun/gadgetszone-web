@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area" style="background-image: url({{ asset('assets/images/about/contact.png') }});">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.contact_us') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.contact_us') }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- Contact Area Start -->
<div class="contact-area">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                @include('frontend.partials.alert')
                <div class="col-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title">{{ __('frontend.send_quest') }}</h2>
                        </div>
                        <form class="contact-form-style" action="{{ route('frontend.contact.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input name="name" placeholder="{{ __('frontend.name') }}" type="text" required/>
                                </div>
                                <div class="col-lg-6">
                                    <input name="email" placeholder="{{ __('frontend.email') }}" type="email" required/>
                                </div>
                                <div class="col-lg-12">
                                    <input name="subject" placeholder="{{ __('frontend.subject') }}" type="text" required/>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <textarea name="message" placeholder="{{ __('frontend.message') }}" required></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">{{ __('frontend.send_msg') }}</button>
                            </div>
                        </form>
                        {{-- <p class="form-messege">
                        </p> --}}
                    </div>
                </div>
                <div class="col-12">
                    <div class="contact-info">
                        <div class="single-contact">
                            <div class="icon-box">
                                {{-- <img src="assets/images/icons/contact-1.png" alt=""> --}}
                                <i class="pe-7s-home"></i>
                            </div>
                            <div class="info-box">
                                <h5 class="title">{{ __('frontend.address_1') }}</h5>
                                <p> {{ __('frontend.address_2') }} <br>
                                    {{ __('frontend.address_3') }} </p>
                            </div>
                        </div>
                        <div class="single-contact">
                            <div class="icon-box">
                                {{-- <img src="assets/images/icons/contact-2.png" alt=""> --}}
                                <i class="pe-7s-check"></i>
                            </div>
                            <div class="info-box">
                                <h5 class="title">{{ __('frontend.reg') }}</h5>
                                <p><a href="javascript:void(0)">{{ __('frontend.reg_1') }}</a></p>
                                <p><a href="javascript:void(0)">{{ __('frontend.reg_2') }}</a></p>
                            </div>
                        </div>
                        <div class="single-contact m-0">
                            <div class="icon-box">
                                {{-- <img src="assets/images/icons/contact-3.png" alt=""> --}}
                                <i class="pe-7s-mail-open"></i>
                            </div>
                            <div class="info-box">
                                <h5 class="title">{{ __('frontend.email_web') }}</h5>
                                <p><a href="mailto:walmartnequatortech@gmail.com">walmartnequatortech@gmail.com</a></p>
                                <p><a href="https://gadgetszone.net" target="_blank">gadgetszone.net</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Area End -->

<!-- map Area Start -->
<div class="contact-map">
    <div id="mapid">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.9006382974408!2d-0.07369948486384861!3d51.515038879636414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761cb54b483e5d%3A0x5efef6c1fc3b504f!2sNew%20Drum%20St%2C%20London%20E1%207AT%2C%20UK!5e0!3m2!1sen!2ssg!4v1652795943549!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                {{-- <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a> --}}
            </div>
        </div>
    </div>
</div>
<!-- map Area End -->

@endsection
