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
                            <a href="/" style="{{ request()->is('/') ? 'color: #ed7a07 !important' : '' }}; ">
                                {{-- {{ __('navbar.Beranda') }} --}}
                                Beranda
                                {{-- {{ GoogleTranslate::trans('Beranda',\App::getLocale()) }} --}}
                            </a>
                        </li>

                        <li class="">
                            <a href="/#product" style="{{ request()->is('product', 'product/*') ? 'color: #ed7a07 !important' : '' }}">
                                {{-- {{ __('navbar.Produk') }} --}}
                                Produk
                                {{-- {{ GoogleTranslate::trans('Produk',\App::getLocale()) }} --}}
                            </a>
                            <ul class="sub-menu">
                                <li><a href="/product">
                                    {{-- {{ __('navbar.Semua produk') }} --}}
                                    Semua produk
                                    {{-- {{ GoogleTranslate::trans('Semua Produk',\App::getLocale()) }} --}}
                                </a></li>
                                @foreach ($productCategories as $productCategory)
                                    @if ($productCategory->product->count() > 0)
                                        <li>
                                            <a href="/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        
                        <li class="">
                            <a href="/#application" style="{{ request()->is('application', 'application/*') ? 'color: #ed7a07 !important' : '' }}">
                                {{-- {{ __('navbar.Proyek') }} --}}
                                Proyek
                                {{-- {{ GoogleTranslate::trans('Proyek',\App::getLocale()) }} --}}
                            </a>
                        </li>
                        
                        <li class="">
                            <a href="/#gallery" style="{{ request()->is('gallery', 'galery/*') ? 'color: #ed7a07 !important' : '' }}">
                                {{-- {{ __('navbar.Proyek') }} --}}
                                Galeri
                            </a>
                        </li>

                        <li class="">
                            <a href="/#blog" style="{{ request()->is('blog', 'blog/*') ? 'color: #ed7a07 !important' : '' }}">
                                {{-- {{ __('navbar.Berita') }} --}}
                                Artikel
                                {{-- {{ GoogleTranslate::trans('Berita',\App::getLocale()) }} --}}
                            </a>
                        </li>

                        <li class="">
                            <a href="/#about" style="{{ request()->is('about', '#about') ? 'color: #ed7a07 !important' : '' }}">
                                {{-- {{ __('navbar.Tentang Kami') }} --}}
                                Tentang Kami
                                {{-- {{ GoogleTranslate::trans('Tentang Kami',\App::getLocale()) }} --}}
                            </a>
                        </li>

                        <li class="">
                            <a href="/#contact" style="{{ request()->is('contact') ? 'color: #ed7a07 !important' : '' }}">
                                {{-- {{ __('navbar.Kontak Kami') }} --}}
                                Kontak Kami
                                {{-- {{ GoogleTranslate::trans('Kontak Kami',\App::getLocale()) }} --}}
                            </a>
                        </li>

                        {{-- <li class="">
                            <a href="https://wa.me/6285523782593" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                <i class="fa fa-whatsapp" style="font-size: 40px;"></i>
                            </a>
                        </li> --}}

                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
                    {{-- <div class="flex-c-m h-full p-r-24">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal1">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                    </div> --}}

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search m-r-30">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Cari ...
					</div>
                </div>

                <!-- Modal1 -->
                {{-- <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
                    <div class="overlay-modal1 js-hide-modal1"></div>

                    <div class="container">
                        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                                <img src="{{ asset('assets/frontend/images/icons/icon-close.png') }}" alt="CLOSE">
                            </button>



                            <div class="row">
                                <div class="col-md-12 p-lr-60">

                                    <form action="" class="" style="position: sticky">
                                        <div class="bor8 m-b-20 how-pos3-parent">
                                            <input class="stext-111 cl2 plh3 size-111 p-lr-28" type="text"
                                                name="search" id="search" placeholder="Cari produk">
                                        </div>
                                    </form>

                                    <div class="row isotope-grid" id="result">

                                        @foreach ($products as $product)
                                            
                                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product->product_category_id }}">
                                            <div class="block2">
                                                <div class="block2-pic hov-img0">
                                                    <img src="{{ asset('assets/frontend/images/product-01.jpg') }}" alt="IMG-PRODUCT">
                                                </div>
                            
                                                <div class="block2-txt flex-w flex-t p-t-14">
                                                    <div class="block2-txt-child1 flex-col-l ">
                                                        <a href="/product/{{ $product->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                            {{ $product->name }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        @endforeach


                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

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

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m" >
            <li class="">
                <a href="/" style="{{ request()->is('/') ? '' : '' }}">
                    Beranda
                    {{-- {{ GoogleTranslate::trans('Beranda',\App::getLocale()) }} --}}
                </a>
            </li>

            <li class="">
                <a href="/#product" style="{{ request()->is('product', 'product/*') ? '' : '' }}">
                    Produk
                    {{-- {{ GoogleTranslate::trans('Produk',\App::getLocale()) }} --}}
                </a>
                <ul class="sub-menu">
                    <li><a href="/product">Semua produk</a></li>
                    @foreach ($productCategories as $productCategory)
                    <li><a href="/product/category/{{ $productCategory->id }}">{{ $productCategory->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            
            <li class="">
                <a href="/#application" style="{{ request()->is('application', 'application/*') ? '' : '' }}">
                    Proyek
                    {{-- {{ GoogleTranslate::trans('Proyek',\App::getLocale()) }} --}}
                </a>
            </li>

            <li class="">
                <a href="/#galeri" style="{{ request()->is('galeri', 'galeri/*') ? '' : '' }}">
                    Galeri
                    {{-- {{ GoogleTranslate::trans('Proyek',\App::getLocale()) }} --}}
                </a>
            </li>

            <li class="">
                <a href="/#blog" style="{{ request()->is('blog', 'blog/*') ? '' : '' }}">
                    Artikel
                    {{-- {{ GoogleTranslate::trans('Berita',\App::getLocale()) }} --}}
                </a>
            </li>

            <li class="">
                <a href="/#about" style="{{ request()->is('about') ? '' : '' }}">
                    Tentang Kami
                    {{-- {{ GoogleTranslate::trans('Tentang Kami',\App::getLocale()) }} --}}
                </a>
            </li>

            <li class="">
                <a href="/contact" style="{{ request()->is('contact') ? 'color: black' : ''}}">
                    Kontak Kami
                    {{-- {{ GoogleTranslate::trans('Kontak Kami',\App::getLocale()) }} --}}
                </a>
            </li>
        </ul>
    </div>

</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $.ajaxSetup({ headers: { 'csrf-token': '{{ csrf_token() }}' } });
</script>

<script>
    $(document).ready(function(){
        
        $('#search').on('keyup', function(){
            var value = $(this).val();

            if(value){
                $('.allData').hide();
                $('.searchData').show();
            } else {
                $('.allData').show();
                $('.searchData').hide();
            }

            $.ajax({
                type: "GET",
                url: "/search",
                data: {'search':value},
                success: function(data) {
                    $('#result').html(data);
                }
            })
        })

    });
</script>