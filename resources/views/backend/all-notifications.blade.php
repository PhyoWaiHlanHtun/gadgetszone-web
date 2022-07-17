@extends('backend.layouts.master')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('main.notifications') }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('dashboard.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('main.notifications') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end mb-3">
                                        <a href="{{ route('mark.all-read') }}" class="btn btn-primary">
                                            {{ __('main.mark_all_read') }}
                                        </a>
                                    </div>

                                    <div class="live-preview">
                                        <div class="list-group">
                                            @foreach ( $notifications as $noti )
                                            <a href="javascript:void(0);" class="list-group-item list-group-item-action">                                                
                                                <div class="d-flex mb-2 align-items-center">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                            @if( array_key_exists('topup', $noti->data) || array_key_exists('withdrawal', $noti->data) || array_key_exists('investment', $noti->data) )
                                                                <i class="bx bx-dollar-circle"></i>
                                                            @elseif( array_key_exists('agent', $noti->data) || array_key_exists('user', $noti->data))
                                                                <i class="bx bx-user-circle"></i>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <p class="mb-1">
                                                            @if( array_key_exists('topup', $noti->data) )
                                                                $ {{ $noti->data['topup']['amount'] }} topup from {{ $noti->data['topup']['user'] }} with {{ $noti->data['topup']['bank'] }}
                                                            @elseif( array_key_exists('withdrawal', $noti->data) )
                                                                $ {{ $noti->data['withdrawal']['amount'] }} withdrawal request from {{ $noti->data['withdrawal']['user'] }} with {{ $noti->data['withdrawal']['bank'] }}
                                                            @elseif( array_key_exists('investment', $noti->data) )
                                                                $ {{ $noti->data['investment']['amount'] }} investment from {{ $noti->data['investment']['user'] }} with {{ $noti->data['investment']['bank'] }}
                                                            @elseif( array_key_exists('agent', $noti->data) )
                                                                New Agent - {{ $noti->data['agent']['username'] }} is registered. 
                                                            @elseif( array_key_exists('user', $noti->data) )
                                                                New User - {{ $noti->data['user']['username'] }} is registered. 
                                                            @elseif( array_key_exists('identity', $noti->data) )
                                                                {{ $noti->data['identity'][
                                                                'user'] }} is uploaded ID Card. 
                                                            @endif
                                                        </p>
                                                        <span>
                                                            <i class="mdi mdi-clock-outline"></i> 
                                                            {{ $noti->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection