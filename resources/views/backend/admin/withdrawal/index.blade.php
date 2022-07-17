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
                    <h4 class="mb-sm-0">{{ __('payment.withdrawal_list') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('main.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('payment.withdrawals') }}</li>
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
                        <h4 class="card-title mb-0 flex-grow-1"> {{ __('payment.withdrawals')}} {{ $type_lang }} </h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="table-gridjs"></div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>

       @include('backend.partials.modal')

    </div>
    <!-- container-fluid -->
</div>

<input type="hidden" id="withdrawl_type" value="{{ $type }}">

@endsection

@section('script')

<!-- gridjs js -->
<script src="{{ asset('backend/libs/gridjs/gridjs.umd.js') }}"></script>
<!-- gridjs init -->
<script src="{{ asset('backend/js/datatable/withdrawal.js') }}"></script>

@endsection