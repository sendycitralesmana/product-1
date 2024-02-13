@extends('front.layouts.main')

@section('main')

<!-- breadcrumb -->
<div class="container p-t-104">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Beranda
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/application" class="stext-109 cl8 hov-cl1 trans-04">
            Proyek
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $application->name }}
        </span>
    </div>
</div>


<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            {{-- <div class="item-slick3" data-thumb="{{ asset('assets/frontend/images/product-detail-01.jpg') }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('assets/frontend/images/product-detail-01.jpg') }}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="{{ asset('assets/frontend/images/product-detail-01.jpg') }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div> --}}
                            <div class="item-slick3" data-thumb="{{ asset('storage/image/application/' . $application->thumbnail) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('storage/image/application/' . $application->thumbnail) }}" alt="IMG-application">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="{{ asset('storage/image/application/' . $application->thumbnail) }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            @if ($images->count() > 0)
                                @foreach ($images as $image)
                                {{-- <div class="item-slick3" data-thumb="{{ asset('assets/frontend/images/product-detail-02.jpg') }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ asset('assets/frontend/images/product-detail-02.jpg') }}" alt="IMG-PRODUCT">
    
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ asset('assets/frontend/images/product-detail-02.jpg') }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div> --}}
                                <div class="item-slick3" data-thumb="{{ asset('storage/image/application/' . $image->thumbnail) }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ asset('storage/image/application/' . $image->thumbnail) }}" alt="IMG-PRODUCT">
    
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ asset('storage/image/application/' . $image->thumbnail) }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $application->name }}
                    </h4>

                    <span class="mtext-106 cl2">
                        Area: {{ $application->area }}
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        Waktu: {{ $application->time }}
                    </p>

                    <div class="stext-102 cl3 p-t-23">
                        {!! html_entity_decode($application->description) !!}
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            {{ $application->name }}
        </span>
    </div>
</section>


<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Produk terkait
            </h3>
        </div>

        @if ( $application->product->count() == 0 )
            <h3 class="text-center">-- Produk tidak ditemukan --</h3>
        @else
            <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">

                @foreach ($application->product as $relationship)
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('storage/image/product/'.$relationship->thumbnail) }}" alt="IMG-PRODUCT">

                            {{-- <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a> --}}
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/product/{{ $relationship->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $relationship->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endif

         
    </div>

</section>

<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Klien terkait
            </h3>
        </div>

        @if ( $application->client == null )
            <h3 class="text-center">-- Klien tidak ditemukan --</h3>
        @else
            <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('storage/image/product/'.$relationship->thumbnail) }}" alt="IMG-PRODUCT">

                            {{-- <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a> --}}
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                {{-- <a href="/product/{{ $relationship->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $relationship->name }}
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif

         
    </div>

</section>

@endsection
