@extends('front.layouts.main')

@section('main')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('images/banner.jpg') }});">
    <h2 class="ltext-105 cl0 txt-center">
        {{ __('contact.Kontak kami') }}
    </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-80">
    
    <div class="m-b-80">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10  w-full-md">
                
                <img src="{{ asset('images/contact.jpg') }}" class="w-full img-fluid" alt="">
            </div>
    
            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-20 p-lr-15-lg w-full-md">
                
    
                <div class="flex-w w-full p-b-22">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>
    
                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            {{ __('contact.Hubungi kami') }}
                            {{-- {{ GoogleTranslate::trans('Hubungi kami',\App::getLocale()) }} --}}
                        </span>
    
                        <p class="stext-115 cl1 size-213 p-t-8">
                            +62 812 1991 1125
                        </p>
                        <p class="stext-115 cl1 size-213 p-t-8">
                            +62 877-8021-4298
                        </p>
                        <p class="stext-115 cl1 size-213 p-t-8">
                            +62 821 6620 5114
                        </p>
                        <p class="stext-115 cl1 size-213 p-t-8">
                            +62 818 0797 8289
                        </p>
                        <p class="stext-115 cl1 size-213 p-t-8">
                            +62 878-7111-3718
                        </p>
                        <p class="stext-115 cl1 size-213 p-t-8">
                            +62 857 1863 1770
                        </p>
                        <p class="stext-115 cl1 size-213 p-t-8">
                            +62 812 9894 2978
                        </p>
                        <p class="stext-115 cl1 size-213 p-t-8">
                            +62 821 1223 4410
                        </p>
                    </div>
                </div>
    
                
            </div>
        </div>
    </div>

    <div>
        <div class="flex-w flex-tr">
            
    
            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-20 p-lr-15-lg w-full-md">
                <form action="/contact/send" method="POST">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        {{ __('contact.Kirimkan pesan kepada kami') }}
                        {{-- {{ GoogleTranslate::trans('Kirimkan pesan kepada kami', App::getLocale()) }} --}}
                    </h4>
    
                    <div class="bor8 m-b-10 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                            placeholder="{{ __('contact.Alamat email anda') }}" required>
                        {{-- <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                            placeholder="{{ GoogleTranslate::trans('Alamat email anda', App::getLocale()) }}"> --}}
                        <img class="how-pos4 pointer-none" src="{{ asset('assets/frontend/images/icons/icon-email.png') }}" alt="ICON">
                    </div>
    
                    <div class="bor8 m-b-20">
                        <input type="text" class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" name="name" placeholder="{{ __('contact.Nama anda') }}" required>
                    </div>
    
                    <div class="bor8 m-b-20">
                        <textarea class="stext-111 cl2 plh3 size-80 p-lr-28 p-tb-25" name="message"
                            placeholder="{{ __('contact.Bagaimana kami bisa membantu anda') }}" required></textarea>
                        {{-- <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
                            placeholder="{{ GoogleTranslate::trans('Bagaimana kami bisa membantu', App::getLocale()) }}"></textarea> --}}
                    </div>
    
                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        {{ __('contact.Kirim') }}
                        {{-- {{ GoogleTranslate::trans('Kirim',\App::getLocale()) }} --}}
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 w-full-md">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8987291690855!2d106.84140937480252!3d-6.
                144302993842682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f58d083c0fdf%3A0x94c8eb8dea74ea0c!2sPT.
                %20Matahari%20Teknologi%20Jaya%20(MatahariLED)!5e0!3m2!1sid!2sid!4v1706892273133!5m2!1sid!2sid" 
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" id="google_map"></iframe>
            </div>
        </div>
    </div>
    
</section>


<!-- Map -->
{{-- <div class="map">
    <div class="size-303" id="google_map" data-map-x="-6.144303" data-map-y="106.8414094" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div> --}}


{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8987291690855!2d106.84140937480252!3d-6.
144302993842682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f58d083c0fdf%3A0x94c8eb8dea74ea0c!2sPT.
%20Matahari%20Teknologi%20Jaya%20(MatahariLED)!5e0!3m2!1sid!2sid!4v1706892273133!5m2!1sid!2sid" 
width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
 referrerpolicy="no-referrer-when-downgrade" id="google_map"></iframe> --}}



@endsection