@extends('auth.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ __('frontend.sign_up') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.sign_up') }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- register area start -->
<div class="login-register-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <h4> {{ __('frontend.sign_up') }} </h4>
                    </div>

                    @include('frontend.partials.alert')

                    <div class="tab-content">
                        
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form action="{{ route('user.register.post') }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <input type="text" name="username" placeholder="{{ __('frontend.username') }}" class="@error('username') border-danger @enderror"  value="{{ old('username') }}"/>
                                        @error('username')
                                            <span class="text-danger" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input name="email" placeholder="{{ __('frontend.email') }}" type="email" class="@error('email') border-danger @enderror" value="{{ old('email') }}"/>
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input name="phone" placeholder="{{ __('frontend.phone') }}" type="tel" class="@error('phone') border-danger @enderror" value="{{ old('phone') }}"/>
                                        @error('phone')
                                            <span class="text-danger" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" name="password" placeholder="{{ __('frontend.password') }}" class="@error('password') border-danger @enderror" />
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" name="confirm-password" placeholder="{{ __('frontend.confirm_pass') }}" class="@error('confirm-password') border-danger @enderror" />
                                        @error('confirm-password')
                                            <span class="text-danger" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input name="referral" placeholder="{{ __('frontend.ref_code') }}" type="text" class="@error('referral') border-danger @enderror" value="{{ old('referral') }}" />
                                        @error('referral')
                                            <span class="text-danger" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="button-box">
                                        <button type="submit"><span>{{ __('frontend.sign_up') }}</span></button>
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
<!-- register area end -->

@endsection