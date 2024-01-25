@extends('frontend.layout.main')

@section('main')

<main>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background=" {{ asset('storage/image/banner.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8">
                        <div class="hero-cap hero-cap2 pt-120">
                            <h2>About Us</h2>
                            {{-- <h4 style="color: white">{!! html_entity_decode($product->description) !!}</h4> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    @include('frontend.about.tentang_kami')

    @include('frontend.about.visi_misi')

</main>

@endsection
