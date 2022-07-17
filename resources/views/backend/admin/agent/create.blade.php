@extends('backend.layouts.master')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{__ ('sidebar.agent_add')}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('account-setting.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('main.agent') }}</li>
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
                        <h4 class="card-title mb-0 flex-grow-1"> {{__ ('sidebar.agent_add')}} </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('agent.store') }}" method="post">

                            @csrf

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="username" class="form-label">{{ __('account-setting.username') }}
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('username')is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="email" class="form-label">{{ __('account-setting.email') }}
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="phone" class="form-label">{{ __('account-setting.phone') }}
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="tel" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="password" class="form-label">{{ __('account-setting.password') }}
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control @error('password')is-invalid @enderror" id="password" name="password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="confirm-password" class="form-label">{{ __('account-setting.confirm_password') }}
                                        @error('confirm-password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control @error('confirm-password')is-invalid @enderror" id="confirm-password" name="confirm-password">
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary"> {{ __('main.submit')}} </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
