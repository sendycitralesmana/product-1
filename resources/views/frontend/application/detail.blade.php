@extends('frontend.layout.main')

@section('main')

<main>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background=" {{ asset('storage/image/banner.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8">
                        <div class="hero-cap hero-cap2 pt-120">
                            <h2>Detail Application</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a > {{ $application->name }} </a></li>
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
    <div class="services-details-area mt-140 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single-services mb-60 mt-40">
                        <div class="details-img mb-40">
                            @if ( $application->thumbnail != null)
                                <img src="{{asset('storage/image/application/'.$application->thumbnail)}}" height="544" alt="">
                            @endif
                        </div>
                        <div class="details-caption">
                            <h3>{{ $application->area }}</h3>
                            <p>{{ $application->time }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Details End -->
    <!-- Project Area Start -->
    <section class="project-area" >
        <div class="container">
           <div class="project-heading ">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3">
                            <div class="front-text">
                                <h2 class="">Detail</h2>
                            </div>
                            <span class="back-text">Application</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="properties__button">
                            <!--Nav Button  -->                                            
                            <nav> 
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false"> Products </a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Images</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Files</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Videos</a>
                                    <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Client</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
           </div>
            <div class="row">
                <div class="col-12">
                    <!-- Nav Card -->
                    <div class="tab-content active" id="nav-tabContent">
                        <!-- card ONE -->
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                            <div class="project-caption">
                                <div class="row">
                                    @foreach ($application->product()->paginate(3) as $product)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src=" {{ asset('assets/front-end/img/gallery/project1.png') }} " alt="">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                <h4><a href="project_details.html">{{ $product->name }}</a></h4>
                                                {{-- <h4><a href="project_details.html">Factory</a></h4> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Card TWO -->
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="project-caption">
                                <div class="row">
                                    @foreach ($mediaApps as $mediaApp)
                                        
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="{{asset('storage/application/media/'.$mediaApp->url)}}" alt="" width="290px" height="210px">
                                            </div>
                                            {{-- <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                               <h4><a href="project_details.html">{{ $mediaApp->name }}</a></h4>
                                            </div> --}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Card THREE -->
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="project-caption">
                                <div class="row">
                                    @foreach ($fileApps as $fileApp)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                               <h4><a href="project_details.html">{{ $fileApp->name }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- card FUR -->
                        <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                            <div class="project-caption">
                                <div class="row">
                                    @foreach ($videoApps as $videoApp)
                                        
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="assets/img/gallery/project1.png" alt="">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                               <h4><a href="project_details.html">{{ $videoApp->url }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- card FIVE -->
                        <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                            <div class="project-caption">
                                @if ($application->client !== null)
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                
                                                <img src="{{asset('storage/image/client/'.$application->client->image)}}" alt="" width="290px" height="210px">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                               {{-- <h4><a href="project_details.html">{{ $application->client->name }}</a></h4> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                <!-- End Nav Card -->
                </div>
            </div>
        </div>
    </section>
    <!-- Project Area End -->
</main>

@endsection
