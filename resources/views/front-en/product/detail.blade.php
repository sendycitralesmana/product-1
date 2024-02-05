@extends('front-en.layouts.main')

@section('main')

<!-- breadcrumb -->
<div class="container p-t-104">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/product/category/{{ $product->category->id }}" class="stext-109 cl8 hov-cl1 trans-04">
            {{ $product->category->name }}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $product->name }}
        </span>
    </div>
</div>


<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">

        {{-- @if ($product->variant->count() > 1)
        <div class="row">
            <div class="col-md-6 col-lg-5 p-b-30">

            </div>
            <div class="col-md-6 col-lg-7 p-b-30">
                <form action="/product/{{ $product->id }}">

                    <div class="flex-w flex-r-m p-b-10">
                        <div class="size-203 flex-c-m respon6 order-2">
                            <button type="submit" class="btn btn-outline-secondary btn-sm">Select Variant</button>
                        </div>
    
                        <div class="size-204 respon6-next">
                            <div class="rs1-select2 bor8 bg0">
                                <select class="js-select2" name="variant" required>
                                    <option value="">Choose an option</option>
                                    @foreach ($product->variant as $variant)
                                    <option value="{{ $variant->id }}">{{ $variant->name }}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
            
        @endif --}}

        <div class="row">
            <div class="col-md-6 col-lg-5 p-b-30">
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
                            <div class="item-slick3" data-thumb="{{ asset('storage/image/product/' . $product->thumbnail) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('storage/image/product/' . $product->thumbnail) }}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="{{ asset('storage/image/product/' . $product->thumbnail) }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            @if ( $images->count() > 0 )
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
                                    <div class="item-slick3" data-thumb="{{asset('storage/product/media/'.$image->url)}}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{asset('storage/product/media/'.$image->url)}}" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{asset('storage/product/media/'.$image->url)}}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if ( $videos->count() > 0 )
                                @foreach ($videos as $video)
                                @endforeach
                            @endif

                            {{-- <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="images/product-detail-02.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div> --}}

                            {{-- <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="images/product-detail-03.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-7 p-b-30">
                
                @if ( $productVariant == null )
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        Variant produk tidak ditemukan
                    </h4>
                @else
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $product->name }}
                    </h4>

                    <span class="mtext-106 cl2">
                        @if ($minPrice == $maxPrice)
                            Rp. {{ number_format($minPrice, 2, ",", ".") }}
                        @else
                            Rp. {{  number_format($minPrice, 2, ",", ".") }} - Rp. {{ number_format($maxPrice, 2, ",", ".") }}
                        @endif
                    </span>

                    <div class="stext-102 cl3 p-t-23">
                        {!! html_entity_decode($product->description) !!}
                    </div>

                    <!--  -->
                    {{-- <div class="p-t-24">
                        <div class="flex-w flex-r-m p-b-20">
                            <div class="size-203 flex-c-m respon6">
                                <b>Long</b>
                            </div>

                            <div class="size-204 respon6-next">
                                {{ $productVariant->long }}
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-20">
                            <div class="size-203 flex-c-m respon6">
                                <b>Weight</b>
                            </div>

                            <div class="size-204 respon6-next">
                                {{ $productVariant->weight }}
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-20">
                            <div class="size-203 flex-c-m respon6">
                                <b>Width</b>
                            </div>

                            <div class="size-204 respon6-next">
                                {{ $productVariant->width }}
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-20">
                            <div class="size-203 flex-c-m respon6">
                                <b>Height</b>
                            </div>

                            <div class="size-204 respon6-next">
                                {{ $productVariant->height }}
                            </div>
                        </div>

                    </div> --}}

                </div>
                @endif

                
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
                        <a class="nav-link active" data-toggle="tab" href="#information" role="tab">Spesifikasi</a>
                    </li>

                    {{-- <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li> --}}
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    {{-- <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <div class="stext-102 cl6">
                                {!! html_entity_decode($product->description) !!}
                            </div>
                        </div>
                    </div> --}}

                    <!-- - -->
                    @if ($productVariant != null)
                        
                    <div class="tab-pane fade show active" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-9 col-lg-8 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">

                                    @if ($product->variant->count() > 1)

                                    <li class="flex-w flex-t p-b-7">
                                    <form action="/product/{{ $product->id }}" class="m-b-20">
                                        <select name="variant" id="" class="form-control" onchange="la(this.value)" required>
                                            <option value="">-- Pilih Variant ( {{ $product->variant->count() }} available )  --</option>
                                            @foreach ($product->variant as $variant)
                                                <option value="?variant={{ $variant->id }}">{{ $variant->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>

                                    <script>
                                        function la(id){
                                            window.location.href = `/product/{{$product->id}}` + id
                                        }
                                    </script>
                                    </li>

                                    @endif

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Variant
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $productVariant->name }}
                                        </span>
                                    </li>
                                    
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Price
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $productVariant->price }}
                                        </span>
                                    </li>
                                    
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Long
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $productVariant->long }}
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Weight
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $productVariant->weight }}
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Width
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $productVariant->width }}
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Height
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $productVariant->height }}
                                        </span>
                                    </li>

                                    @foreach ($specifications as $specification)

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            {{ $specification->specification->name }}
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $specification->value }}
                                        </span>
                                    </li>

                                    @endforeach

                                </ul>
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
                                            Tidak ada specification detail
                                        </span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            {{ $product->name }}
        </span>

        <span class="stext-107 cl6 p-lr-25">
            Category: {{ $product->category->name }}
        </span>
    </div>
</section>


@if ( $productR->where('id', '!=', $product->id)->count() > 0 )
        
    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Produk terkait
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                    @foreach ($productR->where('id', '!=', $product->id) as $related)
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                {{-- <img src="{{ asset('assets/frontend/images/product-01.jpg') }}" alt="IMG-PRODUCT"> --}}
                                <img src="{{ asset('storage/image/product/' . $related->thumbnail) }}" alt="IMG-PRODUCT">

                                {{-- <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a> --}}
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="/product/{{ $related->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $related->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>

@endif

@if ( $product->application->count() > 0 )
   
    <!-- Relationship  -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Proyek terkait
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                    @foreach ($product->application as $application)
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                {{-- <img src="{{ asset('assets/frontend/images/product-01.jpg') }}" alt="IMG-PRODUCT"> --}}
                                <img src="{{ asset('storage/image/application/'. $application->thumbnail) }}" alt="IMG-PRODUCT">

                                {{-- <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a> --}}
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="/application/{{ $application->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $application->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>
    
@endif


@endsection
