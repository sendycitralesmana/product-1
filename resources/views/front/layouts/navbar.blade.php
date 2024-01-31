<!-- Header -->
<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="{{ asset('storage/image/logo.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop ">
                    <ul class="main-menu">
                        <li class="{{ request()->is('/') ? 'active-menu' : '' }}">
                            <a href="/">Home</a>
                        </li>

                        <li class="{{ request()->is('product', 'product/*') ? 'active-menu' : '' }}">
                            <a href="/#product">Products</a>
                            <ul class="sub-menu">
                                <li><a href="/product">All Product</a></li>
                                @foreach ($productCategories as $productCategory)
                                <li><a href="/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <li class="{{ request()->is('application', 'application/*') ? 'active-menu' : '' }}">
                            <a href="/#application">Applications</a>
                        </li>

                        <li class="{{ request()->is('blog', 'blog/*') ? 'active-menu' : '' }}">
                            <a href="/#blog">Blogs</a>
                        </li>

                        <li class="{{ request()->is('about', 'about/*') ? 'active-menu' : '' }}">
                            <a href="/about">About</a>
                        </li>

                        <li class="{{ request()->is('contact', 'contact/*') ? 'active-menu' : '' }}">
                            <a href="/contact">Contact</a>
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
                <img src="{{ asset('storage/image/logo.png') }}" alt="IMG-LOGO">
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
            <li class="{{ request()->is('/') ? 'active-menu' : '' }}">
                <a href="/">Home</a>
            </li>

            <li class="{{ request()->is('product', 'product/*') ? 'active-menu' : '' }}">
                <a href="/#product">Products</a>
                <ul class="sub-menu">
                    <li><a href="/product">All Product</a></li>
                    @foreach ($productCategories as $productCategory)
                    <li><a href="/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            
            <li class="{{ request()->is('application', 'application/*') ? 'active-menu' : '' }}">
                <a href="/#application">Applications</a>
            </li>

            <li class="{{ request()->is('blog', 'blog/*') ? 'active-menu' : '' }}">
                <a href="/#blog">Blogs</a>
            </li>

            <li class="{{ request()->is('about', 'about/*') ? 'active-menu' : '' }}">
                <a href="/about">About</a>
            </li>

            <li class="{{ request()->is('contact', 'contact/*') ? 'active-menu' : '' }}">
                <a href="/contact">Contact</a>
            </li>
        </ul>
    </div>

</header>