<!-- Header -->
<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop ">
                    <ul class="main-menu">
                        <li class="" >
                            <a href="/" style="{{ request()->is('/') ? 'color: #f58742 !important' : '' }}">Home</a>
                        </li>

                        <li class="">
                            <a href="/#product" style="{{ request()->is('product', 'product/*') ? 'color: #f58742 !important' : '' }}">Products</a>
                            <ul class="sub-menu">
                                <li><a href="/product">All Product</a></li>
                                @foreach ($productCategories as $productCategory)
                                <li><a href="/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <li class="">
                            <a href="/#application" style="{{ request()->is('application', 'application/*') ? 'color: #f58742 !important' : '' }}">Applications</a>
                        </li>

                        <li class="">
                            <a href="/#blog" style="{{ request()->is('blog', 'blog/*') ? 'color: #f58742 !important' : '' }}">Blogs</a>
                        </li>

                        <li class="">
                            <a href="/about" style="{{ request()->is('about') ? 'color: #f58742 !important' : '' }}">About</a>
                        </li>

                        <li class="">
                            <a href="/contact" style="{{ request()->is('contact') ? 'color: #f58742 !important' : '' }}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
                    

                    {{-- <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                            data-notify="2">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-lr-19">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="IMG-LOGO">
            </a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
            {{-- <div class="flex-c-m h-full p-r-10">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div> --}}

            {{-- <div class="flex-c-m h-full p-lr-10 bor5">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                    data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div> --}}
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="">
                <a href="/" style="{{ request()->is('/') ? 'color: #f58742 !important' : '' }}">Home</a>
            </li>

            <li class="">
                <a href="/#product" style="{{ request()->is('product', 'product/*') ? 'color: #f58742 !important' : '' }}">Products</a>
                <ul class="sub-menu">
                    <li><a href="/product">All Product</a></li>
                    @foreach ($productCategories as $productCategory)
                    <li><a href="/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            
            <li class="">
                <a href="/#application" style="{{ request()->is('application', 'application/*') ? 'color: #f58742 !important' : '' }}">Applications</a>
            </li>

            <li class="">
                <a href="/#blog" style="{{ request()->is('blog', 'blog/*') ? 'color: #f58742 !important' : '' }}">Blogs</a>
            </li>

            <li class="">
                <a href="/about" style="{{ request()->is('about') ? 'color: #f58742 !important' : '' }}">About</a>
            </li>

            <li class="">
                <a href="/contact" style="{{ request()->is('contact') ? 'color: #f58742' : ''}}">Contact</a>
            </li>
        </ul>
    </div>

</header>