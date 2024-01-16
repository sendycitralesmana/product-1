@extends('frontend.layout.main')

@section('main')

<!-- About Area Start -->
<section class="support-company-area fix pt-10 section-padding30">
    <div class="support-wrapper align-items-end">
        <div class="left-content">
            <!-- section tittle -->
            <div class="section-tittle section-tittle2 mb-55">
                <div class="front-text">
                    <h2 class="">{{ $client->name }}</h2>
                </div>
                <span class="back-text">{{ $client->name }}</span>
            </div>
            <div class="support-caption">
                {{-- <p class="pera-top">Mollit anim laborum duis au dolor in voluptcate velit ess cillum dolore eu lore dsu quality mollit anim laborumuis au dolor in voluptate velit cillu.</p>
                <p>Mollit anim laborum.Dvcuis aute iruxvfg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur sfwsignjnt occa cupidatat non aute iruxvfg dhjinulpadeserunt mollitemnth incididbnt ut;o5tu layjobore mofllit anim.</p>
                <a href="about.html" class="btn red-btn2">read more</a> --}}
                <p>{{ $client->link }}</p>
            </div>
        </div>
        <div class="right-content">
            <!-- img -->
            <div class="right-img">
                <img src="{{asset('storage/image/client/'. $client->image)}}" alt="" width="581px" height="418px">
            </div>
        </div>
    </div>
</section>
<!-- About Area End --> 

<!-- Services Area Start -->
<div class="services-area1 section-padding30">
    <div class="container">
        {{-- section tittle --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle mb-55">
                    <div class="front-text">
                        <h2 class="">{{ $client->name }} Application</h2>
                    </div>
                    <span class="back-text">Application</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($client->application as $application)
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-service-cap mb-30">
                    {{-- @foreach ($application->media as $media)
                    
                @endforeach --}}
                    <div class="service-img">
                        <img src="{{asset('storage/image/default.png')}}" alt="" width="290px" height="210px">
                        {{-- <img src="{{asset('storage/application/media'. $application->media->url)}}" alt=""
                        width="290px" height="210px"> --}}
                        
                    </div>
                    <div class="service-cap">
                        <h4><a href="/application/{{ $application->id }}">{{ $application->name }}</a></h4>
                        <a href="/application/{{ $application->id }}" class="more-btn">Read More <i
                                class="ti-plus"></i></a>
                    </div>
                    <div class="service-icon">
                        <img src=" {{ asset('assets/front-end/img/icon/services_icon1.png') }} " alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services Area End -->

@section('endsection')