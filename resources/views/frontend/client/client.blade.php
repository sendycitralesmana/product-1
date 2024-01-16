@extends('frontend.layout.main')

@section('main')

<!-- Project Area Start -->
<section class="project-area  section-padding30">
    <div class="container">
       <div class="project-heading mb-35">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle3">
                        <div class="front-text">
                            <h2 class=""> Client</h2>
                        </div>
                        <span class="back-text">Client</span>
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
                                @foreach ($clients as $client)
                                <div class="col-lg-3 col-md-4">
                                    <div class="single-project mb-30">
                                        <div class="project-img">
                                            <img src="{{asset('storage/image/client/'. $client->image)}}" alt="" width="150px" height="150px">
                                        </div>
                                        <div class="project-cap">
                                            <a href="/client/{{ $client->id }}" class="plus-btn"><i>info</i></a>
                                            <h4><a href="/client/{{ $client->id }}">{{ $client->name }}</a></h4>
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

@endsection