@extends('front.layouts.main')

@section('main')

<!-- breadcrumb -->
<div class="container p-t-30">
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
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="slider-for">
                    <div>
                        <img src="{{ asset('storage/image/application/'. $application->thumbnail) }}" alt="" style="height: 350px" class="img-fluid rounded">
                    </div>
                    @if ( $images->count() > 0 )
                        @foreach ($images as $image)
                            <div>
                                <img src="{{ asset('storage/application/media/'.$image->url) }}" alt="" style="height: 350px" class="img-fluid rounded">
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="slider-nav mt-3">
                    <div style="">
                        <img src="{{ asset('storage/image/application/'. $application->thumbnail) }}" alt="" 
                            style="padding:5px; height: 100px; display: block; margin-left: auto; margin-right: auto;" 
                            class="img-fluid rounded"> 
                    </div>
                    @if ( $images->count() > 0 )
                        @foreach ($images as $image)
                            <div style="">
                                <img src="{{ asset('storage/application/media/'.$image->url) }}" alt=""
                                    style="padding:5px; height: 100px; display: block; margin-left: auto; margin-right: auto;"
                                    class="img-fluid rounded">    
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6 col-lg-7 p-b-30">
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
                                @if ( $application->client_id == null )
                                <h4 class="mtext-105 cl2 js-name-detail p-b-14 text-center">
                                    <b>-- Tidak ada klien --</b>
                                </h4>
                                @else
                                <div class="card text-center">
                                        <div class="card-body">
                                            <div class="card-img">
                                                <img src="{{ asset('storage/image/client/' . $application->client->image) }}" alt="" class="img-fluid" height="100px" width="100px">
                                            </div>
                                            <div class="card-title">
                                                {{ $application->client->name }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade pl-4 pr-4" id="reviews" role="tabpanel">
                        <div class="row">
                            @if ( $files->count() == 0 )
                            <div class="col-md-12 m-lr-auto">
                                <h4 class="text-center">
                                    <b>-- Tidak ada berkas --</b>
                                </h4>
                            </div>
                            @else
                            @foreach ($files as $file)
                            <div class="col-md-4 m-lr-auto">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="card-img">
                                            <img src="{{ asset('images/pdf.png') }}" alt="" class="img-fluid rounded"
                                                height="50px" width="50px">
                                        </div>
                                        <div class="card-title">
                                            {{ $file->name }}
                                        </div>
                                        <div>
                                            <a href="/product/file/download/{{ $file->id }}"
                                                class="btn text-white btn-sm" style="background-color: #ed7a07"><i
                                                    class="fa fa-download"></i> Unduh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
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
                            <img src="{{ asset('storage/image/product/'.$relationship->thumbnail) }}" alt="IMG-PRODUCT" 
                            style="height: 250px" class="img-fluid rounded">

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
