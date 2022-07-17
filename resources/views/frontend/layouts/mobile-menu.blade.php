<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>
    <div class="user-panel">
        <ul>
            {{-- <li><a href="tel:0123456789"><i class="fa fa-phone"></i> 
                +012 3456 789
            </a></li> --}}
            <li><a href="mailto:info@gadgetszone.net"><i class="fa fa-envelope-o"></i> 
                info@gadgetszone.net</a></li>
            
            @if( $url = checkAuth() )                
                <li><a href="{{ $url }}"><i class="fa fa-user"></i> {{ __('frontend.account') }}</a></li>
                <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> {{ __('frontend.logout') }}</a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <li><a href="{{ route('agent.login') }}"><i class="fa fa-sign-in"></i> {{ __('frontend.agent_login') }} </a></li>
                <li><a href="{{ route('user.login') }}"><i class="fa fa-sign-in"></i> {{ __('frontend.user_login') }} </a></li>
                <li><a href="{{ route('user.register') }}"><i class="fa fa-user"></i> {{ __('frontend.sign_up') }} </a></li>
            @endif
        </ul>
    </div>
    <div class="inner customScroll">
        <div class="offcanvas-menu mb-4">
            <ul>                
                <li><a href="/"> {{ __('frontend.home') }} </a></li>
                <li><a href="{{ route('frontend.diginvest') }}"> {{ __('frontend.investment') }} </a></li>
                <li><a href="{{ route('frontend.products') }}"> {{ __('frontend.products') }} </a></li>
                <li><a href="{{ route('frontend.about') }}">{{ __('frontend.about') }}</a></li>
                <li><a href="{{ route('frontend.contact') }}">{{ __('frontend.contact') }}</a></li>
            </ul>
        </div>
        <!-- OffCanvas Menu End -->
        <div class="offcanvas-social mt-auto">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>