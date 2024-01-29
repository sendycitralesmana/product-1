@extends('frontend.layout.main')

@section('main')

<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background=" {{ asset('storage/image/banner.jpg') }} ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2>Products</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Products</a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <section style="padding: 20px; margin-top: 140px">
        <h2 class="text-center">Product Category</h2>
        <div class="row text-center" style="padding: 20px;">
            <div class="col-6 col-md-4 col-lg-3 py-2">
                <a href="/product" class="btn btn-block">Show all</a>
            </div>
            @foreach ($productCategories as $productCategory)
                <div class="col-6 col-md-4 col-lg-3 py-2">
                    <a href="/product/category/{{ $productCategory->id }}" class="btn btn-block">
                        {{ $productCategory->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Services Area Start -->
    <div class="services-area1 mt-20">
        <div class="container">
            {{-- section tittle --}}
            <div class="row">
                @foreach ($products as $product)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-service-cap mb-30">
                        {{-- @foreach ($product->media as $media)
                        
                    @endforeach --}}
                        <div class="service-img">
                            @if ( $product->thumbnail != null)
                                <img src="{{asset('storage/image/product/'. $product->thumbnail)}}" alt="" width="290px" height="210px" alt="">
                            @else
                                <img src="{{asset('storage/image/default.png')}}" alt="" width="290px" height="210px" alt="">
                            @endif
                            {{-- <img src="{{asset('storage/product/media'. $product->media->url)}}" alt=""
                            width="290px" height="210px"> --}}
                            
                        </div>
                        <div class="service-cap">
                            <h4><a href="/product/{{ $product->id }}">{{ $product->name }}</a></h4>
                            <a href="/product/{{ $product->id }}" class="more-btn">Read More</i></a>
                        </div>
                        <div class="service-icon">
                            <img src=" {{ asset('assets/front-end/img/icon/services_icon1.png') }} " alt="">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="my-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    <!-- Services Area End -->

</main>

@endsection
