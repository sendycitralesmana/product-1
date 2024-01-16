@extends('frontend.layout.main')

@section('main')

<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background=" {{ asset('assets/front-end/img/hero/about.jpg') }} ">
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

    <!-- Services Area Start -->
    <div class="services-area1 section-padding30">
        <div class="container">
            {{-- section tittle --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-55">
                        <div class="front-text">
                            <h2 class="">{{ $productCategory->name }} Product</h2>
                        </div>
                        <span class="back-text">Product</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-service-cap mb-30">
                        {{-- @foreach ($product->media as $media)
                        
                    @endforeach --}}
                        <div class="service-img">
                            <img src="{{asset('storage/image/default.png')}}" alt="" width="290px" height="210px">
                            {{-- <img src="{{asset('storage/product/media'. $product->media->url)}}" alt=""
                            width="290px" height="210px"> --}}
                            
                        </div>
                        <div class="service-cap">
                            <h4><a href="/product/{{ $product->id }}">{{ $product->name }}</a></h4>
                            <a href="/product/{{ $product->id }}" class="more-btn">Read More <i
                                    class="ti-info" title="info"></i></a>
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
