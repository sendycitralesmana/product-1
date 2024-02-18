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

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    {{-- <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li> --}}

                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#information" role="tab">Klien</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Berkas</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">

                    <div class="tab-pane fade show active" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-md-4 m-lr-auto">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="card-img">
                                            <img src="{{ asset('storage/image/client/' . $application->client->thumbnail) }}" alt="" class="img-fluid" height="100px" width="100px">
                                        </div>
                                        <div class="card-title">
                                            {{ $application->client->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    {{-- @if ($application->client_id != null)
                        
                    <div class="tab-pane fade show active" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-9 col-lg-8 m-lr-auto">
                                <img src="{{ asset('storage/image/client/' . $application->client->thumbnail) }}" alt="" style="width: 200px; height: 200px">
                            </div>
                        </div>
                    </div>

                    @else

                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Tidak ada klien bersangkutan
                                        </span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif --}}

                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">

                        <div class="row">
                            @foreach ($files as $file)
                                @if ( $files->count() != null)
                                    <div class="col-md-4 m-lr-auto">
                                        <div class="card text-center">
                                            {{-- <div class="card-header">
                                            </div> --}}
                                            <div class="card-body">
                                                <div class="card-img">
                                                    <img src="{{ asset('images/pdf.png') }}" alt="" class="img-fluid" height="50px" width="50px">
                                                </div>
                                                <div class="card-title">
                                                    {{ $file->name }}
                                                </div>
                                                <div>
                                                    <a href="/application/file/download/{{ $file->id }}" class="btn text-white btn-sm" style="background-color: #ed7a07"><i class="fa fa-download"></i> Unduh</a>
                                                </div>
                                            </div>
                                            {{-- <div class="card-footer text-muted">
                                            Unduh
                                            </div> --}}
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-4 m-lr-auto">
                                        <h2 class="text-center">
                                            <b>Tidak ada berkas</b>
                                        </h2>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="images/avatar-01.jpg" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    Ariana Grande
                                                </span>

                                                <span class="fs-18 cl11">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                Quod autem in homine praestantissimum atque optimum est, id deseruit.
                                                Apud ceteros autem philosophos
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Add review -->
                                    <form class="w-full">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Add a review
                                        </h5>

                                        <p class="stext-102 cl6">
                                            Your email address will not be published. Required fields are marked *
                                        </p>

                                        <div class="flex-w flex-m p-t-50 p-b-23">
                                            <span class="stext-102 cl3 m-r-16">
                                                Your Rating
                                            </span>

                                            <span class="wrap-rating fs-18 cl11 pointer">
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <input class="dis-none" type="number" name="rating">
                                            </span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10"
                                                    id="review" name="review"></textarea>
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="name">Name</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text"
                                                    name="name">
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="email">Email</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email"
                                                    type="text" name="email">
                                            </div>
                                        </div>

                                        <button
                                            class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
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
                            <img src="{{ asset('storage/image/product/'.$relationship->thumbnail) }}" alt="IMG-PRODUCT" height="250px">

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

<!-- Related Client -->
{{-- <section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Klien terkait
            </h3>
        </div>

        @if ( $application->client == null )
            <h3 class="text-center">-- Klien tidak ditemukan --</h3>
        @else
        <div class="wrap-slick2">
            <div class="slick2">

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('storage/image/product/'.$relationship->thumbnail) }}" alt="IMG-PRODUCT">

                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif

         
    </div>

</section> --}}

@endsection
