@extends('backend.layouts.master')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('main.profile') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ authPosition() }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">

                @include('backend.partials.alert')

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1"> {{ __('main.user') }} {{ __('main.profile') }} </h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="username" class="form-label">{{ __('main.name') }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="email" class="form-label">{{ __('main.email') }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="phone" class="form-label">{{ __('main.phone') }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" readonly>
                            </div>
                        </div>
                        @if( Auth::guard('agent')->check())
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="phone" class="form-label">{{ __('main.ref_code') }}</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="referral" name="referral" value="{{ $user->referral }}" readonly>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection