<!-- Global Vendor, plugins JS -->
<!-- JS Files
============================================ -->
<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick.js') }}"></script>
<script src="{{ asset('frontend/js/countdown.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="{{ asset('frontend/js/app.js') }}"></script>
@yield('script')

<script>
$('#products .owl-carousel').owlCarousel({
    autoplay: true,
    loop: true,
    margin:10,
    items: 5,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:false,
            loop:false
        }
    }
  });

  $('#commission .owl-carousel').owlCarousel({
    autoplay: true,
    loop: true,
    margin:10,
    items: 2,
  });
</script>
