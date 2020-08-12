<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') | {{config('app.name')}}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/line-icons.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nivo-lightbox.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mixitup.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact-form-script.min.js') }}"></script>

  </head>
  <body>

    <!-- Header Section Start -->
    <header id="hero-area">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a href="{{ route('public.home') }}" class="navbar-brand"><img src="{{ asset('images/netbiz_logo.png') }}" alt="" style="max-width: 185px"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
          <div class="collapse navbar-collapse menu-white" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('public.home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('public.faq') }}">FAQ</a>
              </li>
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              @endguest

              @auth

              <li class="nav-item">
                <a class="nav-link active" href="{{ route('account.home') }}">Dashboard</a>
              </li>

              @endauth
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Header Section End -->

    <!-- Page header Start -->
    <section class="page-header">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <div class="breadcrumb-wrapper text-center">
              <h2>@yield('page_title')</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Page header End -->

    <!-- Blog Section Start  -->
    <div id="blog-single">
      <div class="container">

        @yield('content')


      </div>
    </div>
    <!-- Blog Section End  -->

    <!-- Copyright Section Start -->
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-3 col-xs-12">
            <div class="footer-logo">
              <img src="{{ asset('images/netbiz_logo.png') }}" style="max-width: 175px">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="social-icon text-center">
              <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
              <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
              <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
              <a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-5 col-xs-12">
            <p class="float-right">Copyright &copy; Netbiz Agency 2020</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Copyright Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-arrow-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->


  </body>
</html>
