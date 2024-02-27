@extends('front.layouts.main')

@section('main')

    <!-- Search product -->
    {{-- <div class="card" >
        <div class="dis-none panel-search w-full p-t-10 p-b-10 p-l-30 p-r-30" 
            style="position: fixed; left: 0; right: 0; top: 80px; z-index: 999">
            <div class="bor8 dis-flex">
                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" style="background-color: white">
                    <i class="zmdi zmdi-search"></i>
                </button>
        
                <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" id="search" placeholder="Cari produk">
            </div>	
            <div id="result" class="p-t-10 searchData">
        
            </div>
        </div>
    </div> --}}

    <div id="result" class="p-t-10 searchData p-l-30 p-r-30" 
        style="position: fixed; left: 0; right: 0; top: 80px; z-index: 999">

    </div>

    {{-- Banner --}}
    @include('front.banner.banner')

    {{-- Category Products --}}
    {{-- @include('front.product.product') --}}

    {{-- About --}}
    @include('front.about.about')

    {{-- Our Applications --}}
    {{-- @include('front.application.application') --}}

    {{-- Our Gallery --}}
    @include('front.gallery.gallery')
    
    {{-- Our Blogs --}}
    {{-- @include('front.blog.blog') --}}

    {{-- Contact us --}}
    @include('front.contact.contact')
    
    {{-- Our Clients --}}
    {{-- @include('front.client.client') --}}

    {{-- Our Catalogue --}}
    @include('front.catalogue.catalogue')   


    
@endsection