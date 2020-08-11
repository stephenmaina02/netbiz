<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Icon -->
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nivo-lightbox.css')}}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

</head>

<body style="background-color: #dff8e3">

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a href="{{ route('public.home') }}" class="navbar-brand"><img src="{{ asset('images/netbiz_logo.png') }}" alt="" style="max-width: 185px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
                        <li class="nav-item active">
                            <a class="nav-link" href="#hero-area">
                              Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feature">
                             How to Earn
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">
                             Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#contact">
                            Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                             FAQ
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Hero Area Start -->
        <div id="hero-area" class="hero-area-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="contents text-center">
                            <h2 class="head-title wow fadeInUp">Register, invite & network <br> Earn at your comfort</h2>
                            <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                                <a href="{{ route('register') }}" class="btn btn-common">Register</a>
                                <a href="{{ route('login') }}" class="btn btn-secondary">LOGIN</a>
                            </div>
                        </div>
                        <div class="img-thumb text-center wow fadeInUp" data-wow-delay="0.6s">
                            <img class="img-fluid" src="assets/img/mlm.png" style="max-width: 570px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

    </header>
    <!-- Header Area wrapper End -->

    <!-- Feature Section Start -->
    <div id="feature">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text-wrapper">
                        <div>
                            <h2 class="title-hl wow fadeInLeft" data-wow-delay="0.3s">Who we are.</h2>
                            <p class="mb-4">Netbiz Agency is Network Marketing platform where you earn by refering your friends to use our platform. We also offer marketing services at affordable rates</p>
                            <!--<a href="#" class="btn btn-common">More About Us</a>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 padding-none feature-bg">
                    <div class="feature-thumb">
                        <div class="feature-content">
                            <h4>How to Earn</h4>
                        </div>
                        <div class="feature-item wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="icon">
                                <i class="lni lni-circle-plus"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Create an account</h3>
                                <p>Start by creating an account in our platform. You will need to verify you email before you can login </p>
                            </div>
                        </div>
                        <div class="feature-item wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
                            <div class="icon">
                                <i class="lni lni-coin"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Pay the registration fee</h3>
                                <p>After registering with us you will pay an activation amount of Kshs 1000. This amount can be paid partially. Your account will be active once you have fully paid the registration fee.  </p>
                            </div>
                        </div>
                        <div class="feature-item wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                            <div class="icon">
                                <i class="lni lni-users"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Invite and earn</h3>
                                <p>Once you account is active you will get an invitation link to refer friends to our </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Section End -->

    <!-- Services Section Start -->
    <section id="services" class="section-padding bg-gray">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Our Services</h2>
                <p>A desire to help and empower others through:</p>
            </div>
            <div class="row">
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                        <div class="icon">
                            <i class="lni lni-network"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Network Marketing</a></h3>
                            <p>Register, pay registration fee, invite and earn</p>
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.9s">
                        <div class="icon">
                            <i class="lni lni-customer"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Advertising</a></h3>
                            <p>Advertise your products or services through our platform</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.4s">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <h1>Contacts us</h1>
                    <div class="contact-block">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="5" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button">
                                        <button class="btn btn-common" id="form-submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="contact-right-area wow fadeIn">
                        <div class="contact-title">
                            <h1>Our Location & Contact Details</h1>
                        </div>
                        <div class="contact-right">
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="lni lni-map-marker"></i>
                                </div>
                                <p>Address: Waylink Building, Mogotio Road, Nakuru Rongai District, Kampi Ya Moto. P.O Box 3270, 20108 - Rongai</p>
                            </div>
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="lni lni-envelope"></i>
                                </div>
                                <p><a href="#">Email:  info@netbizagency.co.ke</a></p>
                            </div>
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="lni lni-phone"></i>
                                </div>
                                <p><a href="#">Phone:  +254 700 700 700</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Copyright Section Start -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-xs-12">
                    <div class="footer-logo">
                        <img src="{{ asset('images/netbiz_logo.png') }}" alt="Netbiz" style="max-width: 150px">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="social-icon text-center">
                        <a class="instagram" href="https://chat.whatsapp.com/HzUPFWGWHjhCFtYgBdjSjf" target="_blank"><i class="lni lni-whatsapp"></i></a>
                        <a class="linkedin" href="https://t.me/joinchat/J01GrxbVPb5JcoevllfU_A" target="_blank"><i class="lni lni-telegram"></i></a>
                        <a class="facebook" href="#"><i class="lni lni-facebook"></i></a>
                        <a class="twitter" href="#"><i class="lni lni-twitter"></i></a>
                        <a class="instagram" href="#"><i class="lni lni-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-xs-12">
                    <p class="float-right">All right reserverd by &copy; <a href="/">Netbiz Agency 2020</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
        <i class="lni lni-arrow-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets/js/jquery-min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.mixitup.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nav.js')}}"></script>
    <script src="{{asset('assets/js/scrolling-nav.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/nivo-lightbox.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets/js/contact-form-script.min.js')}}"></script>

</body>

</html>
