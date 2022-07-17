<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend/images/logo3.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/images/logo3.png') }}" alt="" width="100">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend/images/logo3.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/images/logo3.png') }}" alt="" width="100">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">{{__('sidebar.menu') }}</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/staff-dashboard')) active @endif" href="/home">
                        <i class="ri-honour-line"></i> <span data-key="t-dashboards">{{__('sidebar.dashboard') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/staff') || url()->current() == url('/backend/user')) active @endif" href="#staff" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="staff" >
                        <i class="ri-user-2-line"></i> <span data-key="t-staff">{{__('sidebar.accounts') }} </span>
                    </a>
                    <div class="collapse menu-dropdown @if(str_contains(url()->current(), url('/backend/staff')) || str_contains(url()->current(), url('/backend/user')) || str_contains(url()->current(), url('/backend/agent'))) show @endif" id="staff">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link @if(url()->current() == url('/backend/user')) active @endif" data-key="t-user-list"> {{__('sidebar.customer_lists') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.create') }}" class="nav-link @if(url()->current() == url('/backend/user/create')) active @endif" data-key="t-user-add"> {{__('sidebar.customer_add') }}  </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.customer-tree') }}" class="nav-link @if(url()->current() == url('/backend/customer-tree')) active @endif" data-key="t-user-tree"> {{__('sidebar.customer_tree') }}  </a>
                            </li>

                        </ul>
                    </div>
                </li>

                </li>            
                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/user-identity/pending')) active @endif" href='/backend/user-identity/pending'>
                        <i class="ri-bank-card-line"></i> <span data-key="t-user-list">{{__('sidebar.user_identity') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
