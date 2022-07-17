@extends('backend.layouts.master')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Referral Code Add</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Referral Code</li>
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
                        <h4 class="card-title mb-0 flex-grow-1"> Referral Code Add </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('referral.store') }}" method="post">
                            @csrf
                            
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="referral" class="form-label">Code
                                        @error('referral')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('referral')is-invalid @enderror" id="username" name="username" placeholder="Enter Username" value="{{ old('username') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="email" class="form-label">Email
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="phone" class="form-label">Phone
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="tel" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary"> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection