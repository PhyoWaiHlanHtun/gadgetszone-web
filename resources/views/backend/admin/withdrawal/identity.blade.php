@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/libs/gridjs/theme/mermaid.min.css') }}">
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('main.withdrawal') }} {{ __('main.detail') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('main.withdrawal') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->       
        
        <div class="row">
            <div class="col-lg-12">

                @include('backend.partials.alert')

                @if( $data->withdrawal->status == 0 )
                <div class="d-flex justify-content-end mb-3">
                    <a href='#' class='btn btn-success me-2 my-2' id='withdrawal-btn' data-id="{{ $data->withdrawal_id }}" data-status="1" data-type="withdrawal" data-bs-toggle="modal" data-bs-target="#withdrawlModal"> Accept </a>
                                
                    <a href='#' class='btn btn-danger my-2' id='withdrawal-btn' data-id="{{ $data->withdrawal_id }}" data-status="2" data-type="withdrawal" data-bs-toggle="modal" data-bs-target="#withdrawlModal"> Reject </a>
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1"> {{ __('account-setting.cus_detail') }} </h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td> Username </td>
                                <td> - </td>
                                <td> {{ $user->username }} </td>
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td> - </td>
                                <td> {{ $user->email }} </td>
                            </tr>
                            <tr>
                                <td> Payment Type </td>
                                <td> - </td>
                                <td> {{ $data->withdrawal->bank->name }} </td>
                            </tr>
                            <tr>
                                <td> User Withdrawal Address </td>
                                <td> - </td>
                                <td> {{ $data->withdrawal->account }} </td>
                            </tr>
                            <tr>
                                <td> Withdrawal Amount </td>
                                <td> - </td>
                                <td> $ {{ $data->withdrawal->amount }} </td>
                            </tr>
                            <tr>
                                <td> Withdrawal From </td>
                                <td> - </td>
                                <td> {{ $data->withdrawal->type_format }} </td>
                            </tr>
                            <tr>
                                <td> Date </td>
                                <td> - </td>
                                <td> {{ $data->withdrawal->withdrawl_date }} </td>
                            </tr>
                        </table>

                        <div class="mt-5">
                            <h4> User Identity </h4>

                            @if( $user->identity )
                            <table class="table">
                                <tr>
                                    <td> ID Name </td>
                                    <td> : </td>
                                    <td> {{ $data->name }} </td>
                                </tr>
                                <tr>
                                    <td> ID Number </td>
                                    <td> : </td>
                                    <td> {{ $data->number }} </td>
                                </tr>
                                <tr>
                                    <td> Front ID Card </td>
                                    <td> : </td>
                                    <td> <img src="{{ asset(getImage($data->front)) }}" alt="Front ID Card" class="img-fluid" width="300"> </td>
                                </tr>
                                <tr>
                                    <td> Back ID Card </td>
                                    <td> : </td>
                                    <td> <img src="{{ asset(getImage($data->back)) }}" alt="Back ID Card" class="img-fluid" width="300"> </td>
                                </tr>
                                <tr>
                                    <td> Photo with ID Card </td>
                                    <td> : </td>
                                    <td> <img src="{{ asset(getImage($data->selfie)) }}" alt="Photo with ID Card" class="img-fluid" width="300"> </td>
                                </tr>
                                <tr>
                                    <td> Withdrawal Address </td>
                                    <td> : </td>
                                    <td> {{ $data->address }} </td>
                                </tr>
                            </table>
                            @else
                                <p> No Data Available.</p>
                            @endif
                        </div>                        

                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>       
        @include('backend.partials.modal')
    </div>
    <!-- container-fluid -->
</div>

@endsection