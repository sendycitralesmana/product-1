@extends('frontend.layout.main')

@section('main')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<main>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background=" {{ asset('assets/front-end/img/hero/about.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8">
                        <div class="hero-cap hero-cap2 pt-120">
                            <h2>{{ $product->name }}</h2>
                            <h4 style="color: white">{!! html_entity_decode($product->description) !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Services Details Start -->
    <div class="services-details-area ">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </div>
    <!-- Services Details End -->
    
    <!-- Project Area Start -->
    <section class="project-area section-padding2" >
        <div class="container">
           <div class="project-heading ">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3">
                            <div class="front-text">
                                <h2 class="">{{ $product->name }} Detail</h2>
                            </div>
                            <span class="back-text">Product</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="properties__button">
                            <!--Nav Button  -->                                            
                            <nav> 
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false"> Applications </a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Images</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Files</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Videos</a>
                                    <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Variants</a>
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
                                    @foreach ($product->application as $application)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src=" {{ asset('assets/front-end/img/gallery/project1.png') }} " alt="">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                                <h4><a href="project_details.html">{{ $application->name }}</a></h4>
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
                                    @foreach ($imgProducts as $imgProduct)
                                        
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="{{asset('storage/product/media/'.$imgProduct->url)}}" alt="" width="290px" height="210px">
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
                                    @foreach ($fileProducts as $fileProduct)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                               <h4><a href="project_details.html">{{ $fileProduct->name }}</a></h4>
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
                                    @foreach ($videoProducts as $videoProduct)
                                        
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img src="assets/img/gallery/project1.png" alt="">
                                            </div>
                                            <div class="project-cap">
                                                <a href="project_details.html" class="plus-btn"><i class="ti-plus"></i></a>
                                               <h4><a href="project_details.html">{{ $videoProduct->url }}</a></h4>
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
                                <div class="row">
                                    @foreach ($variantProducts as $variantProduct)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-cap">
                                                <a href="/product/variant/{{ $variantProduct->id }}" class="plus-btn"><i>info</i></a>
                                               <h4><a href="/product/variant/{{ $variantProduct->id }}">{{ $variantProduct->name }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    @endforeach
                                </div>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>