<!-- Content page -->
<section class=" p-t-70 m-t-40" id="about">
    <div class="bg2 p-t-30 p-b-30">
        <div class="container">
            <div class="row p-b-20">

                <div class="col-md-5 col-lg-4 m-lr-auto p-b-30">
                    <div class="how-bor1 ">
                        <div class="hov-img0 ">
                            {{-- <img src="{{ asset('storage/image/content/'. $aboutTK->thumbnail) }}" alt="IMG" class="img-fluid"> --}}
                            <img src="{{ asset('images/tentang.jpg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <div class="d-flex justify-content-between">
                            <h3 class=" cl2 p-b-16">
                                Tentang kami
                                {{-- {{ GoogleTranslate::trans('Tentang kami',\App::getLocale()) }} --}}
                            </h3>
                            <div class="">
                                <a title="Lihat Lebih" href="/about" class="flex-c-m stext-101 cl5  bor1 hov-btn1 p-lr-15 trans-04 text-white" style="background-color: #ed7a07;">
                                     <span class="fa fa-angle-double-right m-l-4"></span>
                                </a>
                            </div>
                        </div>
    
                        <div class=" cl6 p-b-26">
                            {!! html_entity_decode($aboutTK->description) !!}
                            {{-- {!! GoogleTranslate::trans( html_entity_decode($aboutTK->description) , App::getLocale()) !!} --}}
                        </div>
    
                    </div>
                </div>
    
                {{-- <div class="flex-c-m flex-w w-full m-t-40">
                    <a href="/blog" class="flex-c-m stext-101 cl5 size-103 bor1 hov-btn1 p-lr-15 trans-04 text-white" style="background-color: #ed7a07;">
                        Lihat lebih <span class="fa fa-angle-double-right m-l-4"></span>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</section>		