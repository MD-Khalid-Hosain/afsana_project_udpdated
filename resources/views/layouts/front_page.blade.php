<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Program Organization</title>

        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <!-- CSS Global -->
        <link href="{{ asset('homepage_assets/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('homepage_assets/assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('homepage_assets/assets/plugins/prettyphoto/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ asset('homepage_assets/assets/plugins/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('homepage_assets/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">

        <link href="{{ asset('homepage_assets/assets/plugins/owlcarousel2/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('homepage_assets/assets/plugins/owlcarousel2/assets/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('homepage_assets/assets/plugins/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('homepage_assets/assets/plugins/countdown/jquery.countdown.css') }}" rel="stylesheet">

        <link href="{{ asset('homepage_assets/assets/css/theme.css') }}" rel="stylesheet">
        <link href="{{ asset('homepage_assets/assets/css/custom.css') }}" rel="stylesheet">

        @yield('header_script')


    </head>
    <body id="home" class="wide body-light multipage">

        <!-- Preloader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Wrap all content -->
        <div class="wrapper">
            <!-- HEADER -->
            <header class="header fixed">

                <!-- Top Line -->
                <div class="top-line">
                    <div class="container">
                        <ul class="user-menu">
                              @guest
                                <li style="float: left; border-left: solid 1px #c3c9ce; padding: 0 10px; line-height: 50px;"><a href="{{ route('register') }}"  data-toggle="modal"><i class="fa fa-file-text-o"></i> Register Now</a>

                                <li style="float: left; border-left: solid 1px #c3c9ce; padding: 0 10px; line-height: 50px;"><a href="{{ route('login') }}" data-toggle="modal"><i class="fa fa-user"></i> Login</a></li>
                            @else
                              <ul class="sf-menu nav">
                                  <li><a href="{{ route('register') }}"  data-toggle="modal"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                                      <ul>
                                       
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Sign Out</a>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                      @csrf
                                              </form>
                                          </li>

                                      </ul>
                                    </li>
                              </ul>

                              @endguest
                        </ul>

                    </div>
                </div>
                <!-- /Top Line -->

                <div class="container">
                    <div class="header-wrapper clearfix">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('home_page') }}" class="scroll-to">
                                <span class="fa-stack">
                                    <i class="fa logo-hex fa-stack-2x"></i>
                                    <i class="fa logo-fa fa-map-marker fa-stack-1x"></i>
                                </span>
                                Online Program Organization
                            </a>
                        </div>
                        <!-- /Logo -->

                        <!-- Navigation -->
                        <div id="mobile-menu"></div>
                        <nav class="navigation closed clearfix">

                            <ul class="sf-menu nav">
                                <li class="active">
                                    <a href="{{ route('home_page') }}">Home</a>

                                </li>
                                <li>
                                    <a href="{{route('home_page')}}">Events</a>
                                    <ul>
                                        @foreach ($event_lists as $event_list)
                                        <li><a href="{{ route('event_details', $event_list->id) }}">{{ $event_list->events_title }}</a></li>
                                      @endforeach
                                    </ul>
                                </li>
                                @guest
                                  @else
                                    <li><a href="{{ route('booking_details') }}">My Booking History</a></li>
                                @endguest



                            </ul>
                        </nav>
                        <!-- /Navigation -->

                    </div>
                </div>
            </header>
            <!-- /HEADER -->

            <!-- Content area -->
                <div class="content-area">

                  @yield('content')



                </div>
            <!-- /Content area -->

            <!-- FOOTER -->
<footer class="footer">

    <div class="footer-meta footer-meta-alt">
        <div class="container">

            <div class="row">
                <div class="col-md-9 col-sm-6">
                    <ul class="footer-menu">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Developers</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Cookies</a></li>
                        <li>All Rights Reserved</li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</footer>
<!-- /FOOTER -->

<div class="to-top"><i class="fa fa-angle-up"></i></div>


<!-- /Wrap all content -->

<!-- Popup: Login -->
<div class="modal fade login-register" id="popup-login" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

    <div class="form-background">
        <div class="col-sm-6 popup-form">
            <div class="form-header color">
                <h1 class="section-title">
                    <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
                    <span class="title-inner">Login</span>
                </h1>
            </div>
            <form method="post" action="#" class="registration-form alt" name="registration-form-alt" id="registration-form-alt">
                <div class="row">
                    <div class="col-sm-12 form-alert"></div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" placeholder="User Name" title="" data-toggle="tooltip" class="form-control input-name" data-original-title="Name is required">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text"  placeholder="Password"  title="" data-toggle="tooltip" class="form-control input-password" data-original-title="Password">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-theme btn-block submit-button" data-animation-delay="100" data-animation="flipInY"> Log in <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="form-footer color">
                <a href="#" class="popup-password"> Lost your password?</a>
            </div>
        </div>

        <div class="popup-form col-sm-6">
            <div class="form-header color">
                <h1 class="section-title">
                    <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-ticket fa-stack-1x"></i></span></span>
                    <span class="title-inner">Register</span>
                </h1>
            </div>
            <form method="post" action="#" class="registration-form alt" name="registration-form-alt" id="registration-form-alt">
                <div class="row">
                    <div class="col-sm-12 form-alert"></div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" placeholder="User Name" title="" data-toggle="tooltip" class="form-control input-name" data-original-title="Name is required">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text"  placeholder="E-mail"  title="" data-toggle="tooltip" class="form-control input-password" data-original-title="Password">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-theme btn-block submit-button" data-animation-delay="100" data-animation="flipInY"> Register Now <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

</div>
<!-- /Popup: Login -->

    <!--[if lt IE 9]><script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script><![endif]-->

    <script src="{{ asset('homepage_assets/assets/plugins/jquery/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/jquery-ui-1.11.4.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/modernizr.custom.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/superfish/js/superfish.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/placeholdem.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/jquery.smoothscroll.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/smooth-scrollbar.min.js') }}"></script>

    <!-- JS Page Level -->
    <script src="{{ asset('homepage_assets/assets/plugins/owlcarousel2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/countdown/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('homepage_assets/assets/plugins/isotope/jquery.isotope.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

    <!--<script src="assets/js/theme-ajax-mail.js"></script>-->
    <script src="{{ asset('homepage_assets/assets/js/theme.js') }}"></script>



    <script type="text/javascript">
        "use strict";
        jQuery(document).ready(function () {
            theme.init();
            theme.initMainSlider();
            theme.initCountDown();
            theme.initPartnerSlider();
            theme.initImageCarousel();
            theme.initTestimonials();
            theme.initCorouselSlider4();
            theme.initCorouselSlider3();
            theme.initGoogleMap();
        });
        jQuery(window).load(function () {
            theme.initAnimation();
        });

        jQuery(window).load(function () {
            jQuery('body').scrollspy({offset: 100, target: '.navigation'});
        });
        jQuery(window).load(function () {
            jQuery('body').scrollspy('refresh');
        });
        jQuery(window).resize(function () {
            jQuery('body').scrollspy('refresh');
        });

        jQuery(document).ready(function () {
            theme.onResize();
        });
        jQuery(window).load(function () {
            theme.onResize();
        });
        jQuery(window).resize(function () {
            theme.onResize();
        });

        jQuery(window).load(function () {
            if (location.hash != '') {
                var hash = '#' + window.location.hash.substr(1);
                if (hash.length) {
                    jQuery('html,body').delay(0).animate({
                        scrollTop: jQuery(hash).offset().top - 44 + 'px'
                    }, {
                        duration: 1200,
                        easing: "easeInOutExpo"
                    });
                }
            }
        });

    </script>
    @yield('footer_script')

</body>

</html>
