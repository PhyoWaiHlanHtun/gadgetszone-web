<div class="dropdown ms-1 topbar-head-dropdown header-item">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
        @if( Config::get('app.locale') == 'ch')
            <img id="header-lang-img" src="{{ asset('backend/images/flags/china.svg') }}" alt="Chinese Language" height="20" class="rounded">          
        @elseif( Config::get('app.locale') == 'jp')
            <img id="header-lang-img" src="{{ asset('backend/images/flags/jp.svg') }}" alt="Japanese Language" height="20" class="rounded">
        @elseif( Config::get('app.locale') == 'sp')
            <img id="header-lang-img" src="{{ asset('backend/images/flags/spain.svg') }}" alt="Spanish Language" height="20" class="rounded">
        @elseif( Config::get('app.locale') == 'hi')
            <img id="header-lang-img" src="{{ asset('backend/images/flags/in.svg') }}" alt="Hindi Language" height="20" class="rounded">                        
        @else
            <img id="header-lang-img" src="{{ asset('backend/images/flags/us.svg') }}" alt="English Language" height="20" class="rounded">
        @endif
        
    </button>
    
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item notify-item language py-2" data-lang="en"
            title="English">
            <img src="{{ asset('backend/images/flags/us.svg') }}" alt="user-image" class="me-2 rounded" height="18">
            <span class="align-middle">English</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'ch') }}" class="dropdown-item notify-item language" 
            title="Chinese">
            <img src="{{ asset('backend/images/flags/china.svg') }}" alt="flag" class="me-2 rounded" height="18">
            <span class="align-middle">中国人</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'jp') }}" class="dropdown-item notify-item language" 
            title="Japanese">
            <img src="{{ asset('backend/images/flags/jp.svg') }}" alt="flag" class="me-2 rounded" height="18">
            <span class="align-middle">日本</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'sp') }}" class="dropdown-item notify-item language" 
            title="Spain">
            <img src="{{ asset('backend/images/flags/spain.svg') }}" alt="flag" class="me-2 rounded" height="18">
            <span class="align-middle">España</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'hi') }}" class="dropdown-item notify-item language" 
            title="India">
            <img src="{{ asset('backend/images/flags/in.svg') }}" alt="flag" class="me-2 rounded" height="18">
            <span class="align-middle">हिन्दी</span>
        </a>

    </div>
</div>