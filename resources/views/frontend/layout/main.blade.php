<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Matahari LED</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front-end/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/css/style.css')}}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Preloader Start -->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder-logo.png" alt="">
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><i class="fa fa-phone"></i> 021-64703201 | 021-64703202</li>
                                        <li><i class="fa fa-envelope"></i> info@matahariled.co.id</li>
                                    </ul>
                                </div>
                                {{-- <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">

                                    {{-- logo-1
                                    <a href="/" class="big-logo"><img src=" {{ asset('storage/image/logoMled.png') }} "
                                    width="246" height="52"
                                    alt=""></a>
                                    logo-2
                                    <a href="/" class="small-logo"><img
                                            src=" {{ asset('storage/image/logoMled.png') }} " width="246" height="52"
                                            alt=""></a> --}}
                                </div>

                                <a href="/">
                                    <h3 style="color: white">Matahari LED</h3>
                                </a>

                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/product">Product</a>
                                                <ul class="submenu">
                                                    @foreach ($productCategories as $productCategory)
                                                    <li><a
                                                            href="/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a>
                                                    </li>

                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="/application">Application</a></li>
                                            <li><a href="/about">About Us</a></li>
                                            <li><a href="/post">Post</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            {{-- <div class="col-xl-2 col-lg-2 col-md-2">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="/contact" class="btn">Contact Now</a>
                                </div>
                            </div> --}}
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    @yield('main')

    <footer>
        <!-- Footer Start-->
        <div class="footer-main">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row  justify-content-between">
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                {{-- <div class="footer-logo">
                                    <a href="index.html"><img
                                            src=" {{ asset('assets/front-end/img/logo/logo2_footer.png') }}" alt=""></a>
                                </div> --}}
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <h1 style="color: white">Matahari LED</h1>
                                        <p>
                                            Rukan Multiguna Kemayoran Blok 5F
                                            Jl. Rajawali Selatan Raya C5 No. 2, Pademangan Timur, 
                                            Kecamatan Pademangan, Jakarta, 14410
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/product">Product</a></li>
                                        <li><a href="/application">Application</a></li>
                                        <li><a href="/about">About Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <ul>
                                        <li>Tel: +62-21-64703201</li>
                                        <li>Web: www.matahariled.co.id</li>
                                        <li>Email: info@matahariled.co.id</li>
                                        <li>Youtube: Matahariled Media</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- Form -->
                                {{-- <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part" novalidate="true">
                                            <input type="email" name="EMAIL" id="newsletter-form-email"
                                                placeholder=" Email Address " class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm">
                                                    SIGN UP
                                                </button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div> --}}
                                <!-- Map -->
                                {{-- <div class="map-footer">
                                    <img src="assets/img/gallery/map-footer.png" alt="">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Copy-Right -->
                    <div class="row align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());

                                    </script>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('assets/front-end/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('assets/front-end/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/front-end/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/front-end/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('assets/front-end/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('assets/front-end/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/front-end/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('assets/front-end/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('assets/front-end/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/front-end/js/animated.headline.js')}}"></script>
    <script src="{{asset('assets/front-end/js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('assets/front-end/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/front-end/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/front-end/js/jquery.sticky.js')}}"></script>

    <!-- counter , waypoint -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/front-end/js/jquery.counterup.min.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('assets/front-end/js/contact.js')}}"></script>
    <script src="{{asset('assets/front-end/js/jquery.form.js')}}"></script>
    <script src="{{asset('assets/front-end/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/front-end/js/mail-script.js')}}"></script>
    <script src="{{asset('assets/front-end/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('assets/front-end/js/plugins.js')}}"></script>
    <script src="{{asset('assets/front-end/js/main.js')}}"></script>

</body>

</html>
