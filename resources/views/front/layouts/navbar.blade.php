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

                    {{-- <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search m-r-30">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Cari ...
					</div> --}}
                    <div class=" dis-flex m-r-30 rounded" style="border: 1px solid #e6e6e6; padding: 5px; ">
                        <button style="padding: 8px" class=" flex-c-m fs-16 cl2 hov-cl1 trans-04" style="background-color: white">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                
                        <input class="mtext-107 cl2 plh2 p-r-15" type="text" name="search" id="search" placeholder="Cari produk">
                    </div>	
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