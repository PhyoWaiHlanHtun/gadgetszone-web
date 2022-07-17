@extends('auth.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.agent') }} {{ __('frontend.login') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.login') }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- login area start -->
<div class="login-register-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <h4>{{ __('frontend.agent') }} {{ __('frontend.login') }}</h4>
                    </div>
                    @include('frontend.partials.alert')
                    <div class="tab-content">
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form action="{{ route('agent.login.post') }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <input type="text" name="email" placeholder="{{ __('frontend.email') }}" />
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" name="password" placeholder="{{ __('frontend.password') }}" />
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    @error('error')
                                        <span class="text-danger" role="alert">
                                            <strong> {{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox" />
                                            <a class="flote-none" href="javascript:void(0)">{{ __('frontend.remember') }}</a>
                                            {{-- <a href="#">Forgot Password ?</a> --}}
                                        </div>
                                        <button type="submit"><span>{{ __('frontend.login') }}</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login area end -->

@endsection