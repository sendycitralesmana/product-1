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
                            <h2>Detail Variant</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="#"> {{ $variant->name }} </a></li> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Services Details Start -->
    <div class="services-details-area mt-140 mb-140">
        <div class="container">
            <div class="variant">
                <h2 class="mb-2" style="border-bottom: 3px solid #bebfc2; padding-bottom:15px">Variant</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="single-services d-flex" style="border-bottom: 2px solid #bebfc2; padding:2px; margin-top: 10px">
                            <div class="spec-title" style="width: 30%">
                                <h5> Name : </h5> 
                            </div>
                            <div class="spec-desc">
                                <p> {{ $variant->name }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-services d-flex" style="border-bottom: 2px solid #bebfc2; padding:2px; margin-top: 10px">
                            <div class="spec-title" style="width: 30%">
                                <h5> Price : </h5> 
                            </div>
                            <div class="spec-desc">
                                <p> {{ $variant->price }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-services d-flex" style="border-bottom: 2px solid #bebfc2; padding:2px; margin-top: 10px">
                            <div class="spec-title" style="width: 30%">
                                <h5> Long : </h5> 
                            </div>
                            <div class="spec-desc">
                                <p> {{ $variant->long }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-services d-flex" style="border-bottom: 2px solid #bebfc2; padding:2px; margin-top: 10px">
                            <div class="spec-title" style="width: 30%">
                                <h5> Weight : </h5> 
                            </div>
                            <div class="spec-desc">
                                <p> {{ $variant->weight }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-services d-flex" style="border-bottom: 2px solid #bebfc2; padding:2px; margin-top: 10px">
                            <div class="spec-title" style="width: 30%">
                                <h5> Width : </h5> 
                            </div>
                            <div class="spec-desc">
                                <p> {{ $variant->width }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-services d-flex" style="border-bottom: 2px solid #bebfc2; padding:2px; margin-top: 10px">
                            <div class="spec-title" style="width: 30%">
                                <h5> Height : </h5> 
                            </div>
                            <div class="spec-desc">
                                <p> {{ $variant->height }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ( $variant->spec->count() != 0)
            <div class="specification mt-80">
                <h2 class="mb-2" style="border-bottom: 3px solid #bebfc2; padding-bottom:15px">Specification</h2>
                <div class="row">
                    @foreach ($variantSpecs as $variantSpec)
                        <div class="col-md-6">
                            <div class="single-services d-flex" style="border-bottom: 2px solid #bebfc2; padding:2px; margin-top: 10px">
                                <div class="spec-title" style="width: 30%">
                                    <h5> {{ $variantSpec->specification->name }} : </h5> 
                                </div>
                                <div class="spec-desc">
                                    <p> {{ $variantSpec->value }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- Services Details End -->

</main>

@endsection
