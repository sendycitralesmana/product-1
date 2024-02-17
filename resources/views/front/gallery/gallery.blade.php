<section class="sec-product bg0 p-t-100 p-b-50" id="gallery">
    <div class="container">
        <div class="p-b-22">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Galeri terbaru
            </h3>
        </div>

        <!-- Tab01 -->
        <div class="tab01">

            <!-- Tab panes -->
            <div class="tab-content p-t-10">
                <!-- - -->
                <div class="tab-pane fade show active"  role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2 gallery-lb">

                            @foreach ($galleries as $gallery)
                            
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 " >
                                <div class="block2" style="height: 250px">
                                    <div class="wrap-pic-w pos-relative hov-img0">
                                        
                                        <div class="shadow-lg">
                                            <img src="{{ asset('storage/image/gallery/'.$gallery->image) }}" alt="IMG-PRODUCT" height="250px">
                                        </div>

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ asset('storage/image/gallery/'. $gallery->image) }}" title="{{ $gallery->name }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>

        @if ($galleries->count() > 4)
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-22">
            <a href="/gallery" class="flex-c-m stext-101 cl5 size-103  bor1 hov-btn1 p-lr-15 trans-04 text-white" style="background-color: #ed7a07">
                Lihat Lebih <span class="fa fa-angle-double-right m-l-4"></span>
            </a>
        </div>  
        @endif

    </div>
</section>
