<!-- Blog -->
<section class="sec-blog bg0 p-t-60 p-b-90" id="application">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1">
                {{ __('home.Proyek dikerjakan') }}
            </h3>
        </div>

        <div class="row">

            @foreach ($applications as $application)
            <div class="col-sm-6 col-md-4 p-b-40">
                <div class="blog-item">
                    <div class="hov-img0">
                        <a href="blog-detail.html">
                            <img src="{{ asset('storage/image/application/'. $application->thumbnail) }}" alt="IMG-BLOG" height="250px">
                        </a>
                    </div>

                    <div class="p-t-15">
                        <div class="stext-107 flex-w p-b-14">
                            <span class="m-r-3">
                                <span class="cl4">
                                    Area
                                </span>

                                <span class="cl5">
                                    {{ $application->area }}
                                </span>
                            </span>

                            <span>
                                <span class="cl4">
                                    Waktu
                                </span>

                                <span class="cl5">
                                    {{ $application->time }}
                                </span>
                            </span>
                        </div>

                        <h4 class="p-b-12">
                            <a href="/application/{{ $application->id }}" class="mtext-101 cl2 hov-cl1 trans-04">
                                {{ $application->name }}
                            </a>
                        </h4>

                        <div class="stext-108 cl6" style="overflow: hidden;
                        text-overflow: ellipsis;
                        -webkit-line-clamp: 2;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;">
                            {!! html_entity_decode($application->content) !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        @if ($applicationC->count() > 3)
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-35">
            <a href="/application" class="flex-c-m stext-101 cl5 size-103  bor1 hov-btn1 p-lr-15 trans-04 text-white" style="background-color: #ed7a07">
                Lihat lebih <span class="fa fa-angle-double-right m-l-4"></span>
            </a>
        </div>
        @endif
        
    </div>
</section>