@extends('frontend.layout.main')

@section('main')

<main>

    @include('frontend.banner.index')
    {{-- @include('frontend.product.index') --}}

    <section style="padding: 20px;">
        <h2 class="text-center">Product Category</h2>
        <div class="row text-center" style="padding: 20px;">
            <div class="col" style="margin: 3px">
                <a href="/product" class="btn btn-block">Show all</a>
            </div>
            @foreach ($productCategories as $productCategory)
                <div class="col" style="margin: 3px">
                    <a href="/product/category/{{ $productCategory->id }}" class="btn btn-block">
                        {{ $productCategory->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- About Area Start -->
    <section class="support-company-area fix pt-10 mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-55">
                        <div class="front-text">
                            <h2 class=""> {{ $aboutC->title }} </h2>
                        </div>
                        <span class="back-text">Matahari Led</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="support-wrapper align-items-end">
            <div class="left-content">
                <!-- section tittle -->
                <div class="support-caption">
                    {!! html_entity_decode($aboutC->description) !!}
                </div>
            </div>
            <div class="right-content">
                <!-- img -->
                <div class="right-img">
                    <img src=" {{ asset('assets/front-end/img/gallery/safe_in.png') }}" alt="">
                </div>
                <div class="support-img-cap text-center">
                    <span>2005</span>
                    <p>Since</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    @include('frontend.application.index')

    <!-- contact with us Start -->
    <section class="contact-with-area" data-background=" {{ asset('assets/front-end/img/gallery/section-bg2.jpg') }} ">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-9 offset-xl-1 offset-lg-1">
                    <div class="contact-us-caption">
                        <div class="team-info mb-30 pt-45">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle4">
                                <div class="front-text">
                                    <h2 class=""> {{ $vimiC->title }} </h2>
                                </div>
                                {{-- <span class="back-text">Matahari LED</span> --}}
                            </div>
                            {!! html_entity_decode($vimiC->description) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact with us End-->

    <!-- CountDown Area Start -->
    <div class="count-area">
        <div class="container">
            <div class="count-wrapper count-bg" data-background=" {{ asset('assets/front-end/img/gallery/section-bg3.jpg') }} ">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="count-clients">
                            <div class="single-counter">
                                <div class="count-number">
                                    <span class="counter">{{ $products->count() }}</span>
                                </div>
                                <div class="count-text">
                                    <p>Products</p>
                                    <h5>Data</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="count-clients">
                            <div class="single-counter">
                                <div class="count-number">
                                    <span class="counter">{{ $applications->count() }}</span>
                                </div>
                                <div class="count-text">
                                    <p>Applications</p>
                                    <h5>Data</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="count-clients">
                            <div class="single-counter">
                                <div class="count-number">
                                    <span class="counter">{{ $clients->count() }}</span>
                                </div>
                                <div class="count-text">
                                    <p>Clients</p>
                                    <h5>Data</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CountDown Area End -->

    @include('frontend.client.index')

</main>

@endsection
