<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Goggles Ecommerce Category Bootstrap responsive Web Template | Shop :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="{{asset('assets/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('assets/css/login_overlay.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('assets/css/style6.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{asset('assets/css/shop.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui1.css')}}">
    <link href="{{asset('assets/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('assets/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
          rel="stylesheet">

</head>

<body>
@include('frontend.partials.navbar')
@include('frontend.partials.breadcrumb')
<!--/shop-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3">New Arrivals for you </h3>
            <div class="row">
                @include('frontend.partials.sidebar')

                @yield('content')

            </div>

        </div>
    </div>
</section>
@include('frontend.partials.footer')
<!--jQuery-->
<script src="{{asset('assets/js/jquery-2.2.3.min.js')}}"></script>
<!-- newsletter modal -->
<!--search jQuery-->
<script src="{{asset('assets/js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{asset('assets/js/classie-search.js')}}"></script>
<script src="{{asset('assets/js/demo1-search.js')}}"></script>
<!--//search jQuery-->
<!-- cart-js -->
<script src="{{asset('assets/js/minicart.js')}}"></script>
<script>
    googles.render();
    googles.cart.on('googles_checkout', function (evt) {
        var items, len, i;
        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script>
<!-- //cart-js -->
<script>
    $(document).ready(function () {
        $(".button-log a").click(function () {
            $(".overlay-login").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });
    });
    $('.overlay-close1').on('click', function () {
        $(".overlay-login").fadeToggle(200);
        $(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
        open = false;
    });
</script>
<!-- carousel -->
<!-- price range (top products) -->
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script>
    //<![CDATA[
    $(window).load(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 9000,
            values: [50, 6000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

    }); //]]>
</script>
<!-- //price range (top products) -->

<script src="{{asset('assets/js/owl.carousel.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                900: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                    margin: 20
                }
            }
        })
    })
</script>

<!-- //end-smooth-scrolling -->


<!-- dropdown nav -->
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //dropdown nav -->
<script src="{{asset('assets/js/move-top.js')}}"></script>
<script src="{{asset('assets/js/easing.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 900);
        });
    });
</script>
<script>
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!--// end-smoth-scrolling -->

<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<!-- js file -->

@stack('custom-js')
</body>

</html>