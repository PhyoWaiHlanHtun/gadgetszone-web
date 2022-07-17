@if ($message = Session::get('success'))
    <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
        <strong>Success</strong>
        - {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
        <strong>Error</strong>
        - {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
        <strong>Warning</strong>
        - {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif