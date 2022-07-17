@if( Auth::user()->is_admin != 0 || Auth::guard('agent')->check() ) 
    <div class="dropdown topbar-head-dropdown ms-1 header-item">
        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class='bx bx-bell fs-22'></i>
            <span
                class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"> 
                {{ count(Auth::user()->unreadNotifications) }}
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
            aria-labelledby="page-header-notifications-dropdown">

            <div class="dropdown-head bg-primary bg-pattern rounded-top">
                <div class="p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 fs-16 fw-semibold text-white"> {{ __('main.notifications') }} </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="notificationItemsTabContent">
                <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                        @if( count(Auth::user()->unreadNotifications) > 0 )
                            @foreach ( Auth::user()->unreadNotifications->take(10) as $noti )
                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                @if( array_key_exists('topup', $noti->data) || array_key_exists('withdrawal', $noti->data) || array_key_exists('investment', $noti->data) )
                                                    <i class="bx bx-dollar-circle"></i>
                                                @elseif( array_key_exists('agent', $noti->data) || array_key_exists('user', $noti->data) )
                                                    <i class="bx bx-user-circle"></i>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="stretched-link">
                                                <h6 class="mt-0 mb-2 lh-base">
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
                                                </h6>
                                            </div>
                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span>
                                                    <i class="mdi mdi-clock-outline"></i> 
                                                    {{ $noti->created_at->diffForHumans() }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>                        
                            @endforeach

                        <div class="my-3 text-center">
                            <a href="{{ route('view.all-notifications') }}" class="btn btn-soft-success waves-effect waves-light">
                                {{ __('main.view_all_noti') }} 
                                <i class="ri-arrow-right-line align-middle"></i>
                            </a>
                        </div>

                        @else
                            <p class="my-2 text-center"> {{ __('main.no_new_noti') }} </p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endif