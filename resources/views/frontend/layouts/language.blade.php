<div class="nav-wrapper">
    <div class="sl-nav">
        <ul>
            <li>
                @php $lang = Config::get('app.locale')  @endphp
                @if( $lang == 'ch')
                    <img id="header-lang-img" src="{{ asset('assets/images/flags/china.svg') }}" alt="Chinese Language" height="20" class="rounded">
                @elseif( $lang == 'jp')
                    <img id="header-lang-img" src="{{ asset('assets/images/flags/jp.svg') }}" alt="Japanese Language" height="20" class="rounded">
                @elseif( $lang == 'sp')
                    <img id="header-lang-img" src="{{ asset('assets/images/flags/spain.svg') }}" alt="Spanish Language" height="20" class="rounded">
                @elseif( $lang == 'hi')
                    <img id="header-lang-img" src="{{ asset('assets/images/flags/in.svg') }}" alt="Hindi Language" height="20" class="rounded">
                @elseif( $lang == 'ko')
                    <img id="header-lang-img" src="{{ asset('assets/images/flags/korean.svg') }}" alt="Korean Language" height="20" class="rounded">
                @else
                    <img id="header-lang-img" src="{{ asset('assets/images/flags/us.svg') }}" alt="English Language" height="20" class="rounded">
                @endif
                <i class="fa fa-angle-down" aria-hidden="true"></i>
                <div class="triangle"></div>
                <ul>
                    <li>
                        <a href="{{ route('lang.switch', 'en') }}">
                            <img src="{{ asset('backend/images/flags/us.svg') }}" alt="flag" class="me-2 rounded sl-flag" height="18">
                            <span class="{{ $lang == 'en' ? 'active' : '' }}">English</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lang.switch', 'ch') }}">
                            <img src="{{ asset('backend/images/flags/china.svg') }}" alt="flag" class="me-2 rounded sl-flag" height="18">
                            <span class="{{ $lang == 'ch' ? 'active' : '' }}">中国人</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lang.switch', 'jp') }}">
                            <img src="{{ asset('backend/images/flags/jp.svg') }}" alt="flag" class="me-2 rounded sl-flag" height="18">
                            <span class="{{ $lang == 'jp' ? 'active' : '' }}">日本</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lang.switch', 'sp') }}">
                            <img src="{{ asset('backend/images/flags/spain.svg') }}" alt="flag" class="me-2 rounded sl-flag" height="18">
                            <span class="{{ $lang == 'sp' ? 'active' : '' }}">España</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lang.switch', 'hi') }}">
                            <img src="{{ asset('backend/images/flags/in.svg') }}" alt="flag" class="me-2 rounded sl-flag" height="18">
                            <span class="{{ $lang == 'hi' ? 'active' : '' }}">हिन्दी</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lang.switch', 'ko') }}">
                            <img src="{{ asset('backend/images/flags/korean.svg') }}" alt="flag" class="me-2 rounded sl-flag" height="18">
                            <span class="{{ $lang == 'ko' ? 'active' : '' }}">한국인</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
