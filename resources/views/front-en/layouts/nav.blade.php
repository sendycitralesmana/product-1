<!-- Header -->
<header class="">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    021-64703201 | 021-64703202
                </div>

                <div class="right-top-bar flex-w h-full">

                    {{-- <a href="/login" class="flex-c-m trans-04 p-lr-25">
                        My Account
                    </a> --}}

                    <a href="/" class="flex-c-m trans-04 p-lr-25">
                        ID
                    </a>

                    <a href="/en" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop" >
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="#" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop ">
                    <ul class="main-menu">
                        <li class="" >
                            <a href="/en" style="{{ request()->is('en') ? 'color: #f58742 !important' : '' }}">Home</a>
                        </li>

                        <li class="">
                            <a href="/en#product" style="{{ request()->is('en/product', 'en/product/*') ? 'color: #f58742 !important' : '' }}">Product</a>
                            <ul class="sub-menu">
                                <li><a href="/en/product">All product</a></li>
                                @foreach ($productCategories as $productCategory)
                                {{-- <li><a href="/en/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a></li> --}}
                                <li><a href="/en/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <li class="">
                            <a href="/en#application" style="{{ request()->is('en/application', 'en/application/*') ? 'color: #f58742 !important' : '' }}">Project</a>
                        </li>

                        <li class="">
                            <a href="/en#blog" style="{{ request()->is('en/blog', 'en/blog/*') ? 'color: #f58742 !important' : '' }}">Blog</a>
                        </li>

                        <li class="">
                            <a href="/en/about" style="{{ request()->is('en/about') ? 'color: #f58742 !important' : '' }}">About</a>
                        </li>

                        <li class="">
                            <a href="/en/contact" style="{{ request()->is('en/contact') ? 'color: #f58742 !important' : '' }}">Contact</a>
                        </li>
                    </ul>
                </div>	

                <!-- Icon header -->
                {{-- <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div> --}}
            </nav>
        </div>	
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="index.html"><img src="{{ asset('images/logo.png') }}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        {{-- <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div> --}}

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile fixed-top">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        My Account
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m" style="background-color: #f58742 !important">
            <li class="">
                <a href="/" style="{{ request()->is('/') ? 'color: black !important' : '' }}">Beranda</a>
            </li>

            <li class="">
                <a href="/#product" style="{{ request()->is('product', 'product/*') ? 'color: black !important' : '' }}">Produk</a>
                <ul class="sub-menu">
                    <li><a href="/product">All Product</a></li>
                    @foreach ($productCategories as $productCategory)
                    <li><a href="/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            
            <li class="">
                <a href="/#application" style="{{ request()->is('application', 'application/*') ? 'color: black !important' : '' }}">Proyek</a>
            </li>

            <li class="">
                <a href="/#blog" style="{{ request()->is('blog', 'blog/*') ? 'color: black !important' : '' }}">Berita</a>
            </li>

            <li class="">
                <a href="/about" style="{{ request()->is('about') ? 'color: black !important' : '' }}">About</a>
            </li>

            <li class="">
                <a href="/contact" style="{{ request()->is('contact') ? 'color: black' : ''}}">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    {{-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div> --}}
</header>