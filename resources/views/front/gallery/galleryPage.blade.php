@extends('front.layouts.main')

@section('main')

<!-- gallery -->
<div class="bg0 p-t-104 m-t-23 p-b-140">
    <div class="container">
        <div class="p-b-22">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Galeri
            </h3>
        </div>

        <div class="row isotope-grid gallery-lb">

            @foreach ($galleries as $gallery)
                
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-20 isotope-item {{ $gallery->gallery_category_id }}">
                <div class="item-slick2 p-l-10 p-r-10 p-t-10 p-b-10 " >
                    <div class="block2" style="height: 250px">
                        <div class="wrap-pic-w pos-relative hov-img0">
                            <img src="{{ asset('storage/image/gallery/'.$gallery->image) }}" alt="IMG-PRODUCT" height="250px">

                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                href="{{ asset('storage/image/gallery/'. $gallery->image) }}" title="{{ $gallery->name }}">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div class="p-3">
            {{ $galleries->links() }}
        </div>
    </div>
</div>

@endsection
