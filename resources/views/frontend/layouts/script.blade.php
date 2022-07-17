<!-- Global Vendor, plugins JS -->
<!-- JS Files
============================================ -->
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/scrollUp.js') }}"></script>
<script src="{{ asset('assets/js/plugins/venobox.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/mailchimp-ajax.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

@yield('script')

<script>
    $(document).ready(function () {
        if( $("#advertise").val() == false && $("#auth").val() == 'false'){
            $("#regModal").modal("show");
        }

        if( $("#advertise").val() == true ){
            $("#adsModal").modal("show");
        }

        $('#adsModal').on('hidden.bs.modal', function () {
            if( $("#auth").val() == 'false'){
                $("#regModal").modal("show");
            }
        })
    });
</script>
