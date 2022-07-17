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
                <li class="menu-title"><span data-key="t-menu">
                    {{__('sidebar.menu') }}
                </span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/staff-dashboard')) active @endif" href="/home">
                        <i class="ri-honour-line"></i> <span data-key="t-dashboards">{{__('sidebar.dashboard') }}</span>
                    </a>
                </li>

                @if( Auth::user()->is_admin == 1 )

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/staff') || url()->current() == url('/backend/user')) active @endif" href="#staff" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="staff" >
                        <i class="ri-user-2-line"></i> <span data-key="t-staff"> {{__('sidebar.accounts') }} </span>
                    </a>
                    <div class="collapse menu-dropdown @if(str_contains(url()->current(), url('/backend/staff')) || str_contains(url()->current(), url('/backend/user')) || str_contains(url()->current(), url('/backend/agent'))) show @endif" id="staff">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('staff.index') }}" class="nav-link @if(url()->current() == url('/backend/staff')) active @endif" data-key="t-staff-list"> {{__('sidebar.staff_lists') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('staff.create') }}" class="nav-link @if(url()->current() == url('/backend/staff/create')) active @endif" data-key="t-staff-add"> {{__('sidebar.staff_add') }} </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('accountant.index') }}" class="nav-link @if(url()->current() == url('/backend/accountant')) active @endif" data-key="t-accountant-list"> {{__('sidebar.accountant_lists') }} </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('agent.index') }}" class="nav-link @if(url()->current() == url('/backend/agent')) active @endif" data-key="t-agent-list"> {{__('sidebar.agent_lists') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agent.create') }}" class="nav-link @if(url()->current() == url('/backend/agent/create')) active @endif" data-key="t-agent-add"> {{__('sidebar.agent_add') }} </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link @if(url()->current() == url('/backend/user')) active @endif" data-key="t-user-list"> {{__('sidebar.customer_lists') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.create') }}" class="nav-link @if(url()->current() == url('/backend/user/create')) active @endif" data-key="t-user-add"> {{__('sidebar.customer_add') }} </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/agent-error')) active @endif" href='/agent-error'>
                        <i class="ri-user-2-line"></i> <span data-key="t-user-list">
                            {{ __('sidebar.agent_error') }}
                        </span>
                    </a>
                </li>                

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#bonus-fine" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="bonus-fine" >
                        <i class="ri-user-2-line"></i> <span data-key="t-bonus-fine"> 
                            {{ __('sidebar.bonus_fine') }} </span>
                    </a>
                    <div class="collapse menu-dropdown" id="bonus-fine">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a href="/backend/bonus-and-fine" class="nav-link" data-key="t-staff-list"> {{ __('sidebar.bonus_fine_list') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.bonus.lists') }}" class="nav-link" data-key="t-staff-add"> {{ __('sidebar.bonus_list') }} </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('backend.fine.lists') }}" class="nav-link" data-key="t-accountant-list"> {{ __('sidebar.fine_list') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.bonus.history') }}" class="nav-link" data-key="t-staff-add"> {{ __('sidebar.bonus_history') }} </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('backend.fine.history') }}" class="nav-link" data-key="t-accountant-list"> {{ __('sidebar.fine_history') }} </a>
                            </li>
                        </ul>

                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/user-identity/pending')) active @endif" href='/backend/user-identity/pending'>
                        <i class="ri-bank-card-line"></i> <span data-key="t-user-list">{{__('sidebar.user_identity') }}</span>
                    </a>
                </li>
                @endif

                @if( Auth::user()->is_admin == 2 )
                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/user')) active @endif" href="{{ route('user.index') }}">
                        <i class="ri-user-2-line"></i> <span data-key="t-user-list">{{__('sidebar.customer_lists') }}</span>
                    </a>
                </li>
                @endif

                @if( Auth::user()->is_admin != 2 )
                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/categories')) active @endif" href="#product" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="product" >
                        <i class="ri-stack-line"></i> <span data-key="t-product">{{__('sidebar.products') }}</span>
                    </a>
                    <div class="collapse menu-dropdown @if(str_contains(url()->current(), url('/backend/categories')) || str_contains(url()->current(), url('/backend/types')) || str_contains(url()->current(), url('/backend/brands')) || str_contains(url()->current(), url('/backend/products'))) show @endif" id="product">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link @if(url()->current() == url('/backend/categories')) active @endif" data-key="t-staff-list"> {{__('sidebar.category_lists') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('types.index') }}" class="nav-link @if(url()->current() == url('/backend/types')) active @endif" data-key="t-staff-list">{{__('sidebar.sub_category_lists') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('brands.index') }}" class="nav-link @if(url()->current() == url('/backend/brands')) active @endif" data-key="t-staff-list"> {{__('sidebar.brand_lists') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products.index') }}" class="nav-link @if(url()->current() == url('/backend/products')) active @endif" data-key="t-staff-list"> {{__('sidebar.product_lists') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>

                @endif

                @if( Auth::user()->is_admin == 1 )

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/purchases')) active @endif" href="{{ route('backend.purchase.index') }}">
                        <i class="ri-archive-line"></i> <span data-key="t-purchase"> {{__('sidebar.purchases') }} </span>
                    </a>
                </li>

                @endif

                @if( Auth::user()->is_admin == 2 )

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#bank" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="bank" >
                        <i class="ri-bank-line"></i> <span data-key="t-bank"> {{__('sidebar.bank') }} </span>
                    </a>
                    <div class="collapse menu-dropdown" id="bank">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('bank.index') }}" class="nav-link" data-key="t-bank-list"> {{__('sidebar.bank_lists') }} </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('bank.create') }}" class="nav-link" data-key="t-bank-list"> {{__('sidebar.bank_add') }} </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#topup" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="topup" >
                        <i class="ri-money-dollar-box-line"></i> <span data-key="t-topup"> {{__('sidebar.topup') }} </span>
                    </a>
                    <div class="collapse menu-dropdown" id="topup">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('topup.pending') }}" class="nav-link" data-key="t-topup-list"> {{__('sidebar.topup_pending') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('topup.history') }}" class="nav-link" data-key="t-topup-list"> {{__('sidebar.topup_history') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#withdrawal" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="withdrawal" >
                        <i class="ri-money-dollar-box-line"></i> <span data-key="t-withdrawal"> {{__('sidebar.withdrawal') }} </span>
                    </a>
                    <div class="collapse menu-dropdown" id="withdrawal">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('withdrawal.pending') }}" class="nav-link" data-key="t-withdrawal-list"> {{__('sidebar.withdrawl_pending') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('withdrawal.history') }}" class="nav-link" data-key="t-withdrawal-list"> {{__('sidebar.withdrawl_history') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#invest" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="invest" >
                        <i class="ri-money-dollar-box-line"></i> <span data-key="t-invest"> {{__('sidebar.invest') }} </span>
                    </a>
                    <div class="collapse menu-dropdown" id="invest">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('invest.pending') }}" class="nav-link" data-key="t-invest-list"> {{__('sidebar.invest_pending') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('invest.history') }}" class="nav-link" data-key="t-invest-list"> {{__('sidebar.invest_history') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/donations')) active @endif" href="{{ route('backend.donation.index') }}">
                        <i class="ri-money-dollar-circle-line"></i> <span data-key="t-level"> {{__('sidebar.donations') }} </span>
                    </a>
                </li>

                @endif

                @if( Auth::user()->is_admin == 1 )

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/banner')) active @endif" href="{{ route('banner.index') }}">
                        <i class="ri-image-line"></i> <span data-key="t-banner"> {{__('sidebar.banner')}} </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/partners')) active @endif" href="{{ route('partner.index') }}">
                        <i class="ri-group-line"></i> <span data-key="t-level"> {{__('sidebar.partners') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/ads')) active @endif" href="{{ route('ads.index') }}">
                        <i class="ri-image-line"></i> <span data-key="t-level"> {{__('sidebar.home_ads') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/advertise')) active @endif" href="{{ route('advertise.index') }}">
                        <i class="ri-image-line"></i> <span data-key="t-level"> {{__('sidebar.advertise_popup') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/about')) active @endif" href="{{ route('about.index') }}">
                        <i class="ri-award-line"></i> <span data-key="t-contact"> {{ __('sidebar.about') }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @if(url()->current() == url('/backend/contact')) active @endif" href="{{ route('contact.index') }}">
                        <i class="ri-message-line"></i> <span data-key="t-contact"> {{__('sidebar.contact')}} </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
