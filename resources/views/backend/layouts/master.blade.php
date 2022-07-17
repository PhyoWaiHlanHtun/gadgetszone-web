<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Gadgets Zone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    @include('backend.layouts.css')
</head>

<body >
{{-- <div class="loader">
<div></div>
</div> --}}
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('backend.layouts.header')

        @if( Auth::guard('adminstaff')->check())

            @include('backend.layouts.sidebar.admin')

        @elseif( Auth::guard('agent')->check())

            @include('backend.layouts.sidebar.agent')

        @endif

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            <input type="hidden" name="locale" id="locale" value="{{ config('app.locale') }}">
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <script>document.write(new Date().getFullYear())</script> © Gadgets Zone.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


    @include('backend.layouts.script')
    
    {{-- <script>
        let loadTime = window.performance.timing.domContentLoadedEventEnd - window.performance.timing.navigationStart;
        console.log(loadTime);
        $(window).on('load',function(){
            $(".loader").fadeOut(loadTime);
            $("#layout-wrapper").fadeIn(loadTime);
        });

        $('form').on('submit', function(){
            $(".loader").fadeOut(loadTime);
            $("#layout-wrapper").fadeIn(loadTime);
        });

    </script> --}}
</body>

</html>
