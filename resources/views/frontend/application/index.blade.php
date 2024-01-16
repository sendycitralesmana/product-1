<!-- Services Area Start -->
<div class="services-area1 section-padding30">
    <div class="container">
        {{-- section tittle --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle mb-55">
                    <div class="front-text">
                        <h2 class=""> Application</h2>
                    </div>
                    <span class="back-text">Application</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($applications as $application)
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-service-cap mb-30">
                    {{-- @foreach ($application->media as $media)
                        
                    @endforeach --}}
                    <div class="service-img">
                        @if ( $application->thumbnail != '')
                        <img src="{{asset('storage/image/application/'. $application->thumbnail)}}" alt="" width="290px" height="210px">
                        @else
                        <img src="{{asset('storage/image/default.png')}}" alt="" width="290px" height="210px">
                        @endif
                    </div>
                    <div class="service-cap">
                        <h4><a href="/application/{{ $application->id }}">{{ $application->name }}</a></h4>
                        <a href="/application/{{ $application->id }}" class="more-btn">Read More <i class="ti-plus"></i></a>
                    </div>
                    <div class="service-icon">
                        <img src=" {{ asset('assets/front-end/img/icon/services_icon1.png') }} " alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if ( $applications->count() > 3  )
        <a href="/application" class="btn red-btn2 ml-2">see more</a>
        @endif
    </div>
</div>
<!-- Services Area End -->