<!-- Content page -->
<section class=" p-t-70  m-t-40 m-b-20" id="contact">
    <div class="bg0 p-b-10 p-t-10" >

        <div>
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-10 p-lr-15-lg w-full-md contact-message">
                    <form action="/contact/send" method="POST">
                        @csrf
                        <div class="d-flex justify-content-between">
                            <h3 class=" cl2 p-b-16">
                                Kirim pesan kepada kami
                                {{-- {{ GoogleTranslate::trans('Tentang kami',\App::getLocale()) }} --}}
                            </h3>
                            <div class="">
                                <a title="Lihat Lebih" href="/contact" class="flex-c-m stext-101 cl5  bor1 hov-btn1 p-lr-15 trans-04 text-white" style="background-color: #ed7a07;">
                                     <span class="fa fa-angle-double-right m-l-4"></span>
                                </a>
                            </div>
                        </div>
        
                        <div class="bor8 m-b-10 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
                            
                            {{-- <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="{{ GoogleTranslate::trans('Alamat email anda', App::getLocale()) }}"> --}}
                            <img class="how-pos4 pointer-none" src="{{ asset('assets/frontend/images/icons/icon-email.png') }}" alt="ICON">
                        </div>
        
                        <div class="bor8 m-b-10">
                            <input type="text" class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" name="name" placeholder="{{ __('contact.Nama anda') }}" required>
                        </div>
        
                        <div class="bor8 m-b-10">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="message"
                                placeholder="{{ __('contact.Bagaimana kami bisa membantu anda') }}" required></textarea>
                            {{-- <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
                                placeholder="{{ GoogleTranslate::trans('Bagaimana kami bisa membantu', App::getLocale()) }}"></textarea> --}}
                        </div>
        
                        <button class="flex-c-m stext-101 cl0 size-121  bor1 hov-btn3 p-lr-15 trans-04 pointer text-white" style="background-color: #ed7a07">
                            {{ __('contact.Kirim') }}
                            {{-- {{ GoogleTranslate::trans('Kirim',\App::getLocale()) }} --}}
                        </button>
                    </form>
                </div>
    
                <div class="size-210 bor10 w-full-md">
                    <img src="{{ asset('images/contact.jpg') }}" class="w-full img-fluid h-full contact-img" alt="">
                </div>
            </div>
        </div>
    </div>

</section>