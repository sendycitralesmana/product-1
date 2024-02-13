@extends('front.layouts.main')

@section('main')

<!-- Title page -->
{{-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('assets/frontend/images/bg-01.jpg') }});">
    <h2 class="ltext-105 cl0 txt-center">
        Blog
    </h2>
</section> --}}


<!-- Content page -->
<section class="bg0 p-t-104 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">

                    @foreach ($posts as $post)
                        
                        <!-- item blog -->
                        <div class="p-b-63">
                            <a href="/blog/{{ $post->id }}" class="hov-img0 how-pos5-parent">
                                {{-- <img src="{{ asset('assets/frontend/images/blog-04.jpg') }}" alt="IMG-BLOG"> --}}
                                <img src="{{ asset('storage/image/post/'. $post->thumbnail) }}" alt="IMG-BLOG">

                                <div class="flex-col-c-m size-123 bg9 how-pos5">
                                    <span class="ltext-107 cl2 txt-center">
                                        {{ $post->created_at->format('d') }}
                                    </span>

                                    <span class="stext-109 cl3 txt-center">
                                        {{ $post->created_at->format('M Y') }}
                                    </span>
                                </div>
                            </a>

                            <div class="p-t-32">
                                <h4 class="p-b-15">
                                    <a href="/blog/{{ $post->id }}" class="ltext-108 cl2 hov-cl1 trans-04">
                                        {{ $post->title }}
                                    </a>
                                </h4>

                                <div class="stext-117 cl6" style="
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    -webkit-line-clamp: 2;
                                    display: -webkit-box;
                                    -webkit-box-orient: vertical;
                                ">
                                    {!! html_entity_decode($post->content) !!}
                                </div>

                                <div class="flex-w flex-sb-m p-t-18">
                                    <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                        <span>
                                            <span class="cl4">Oleh</span> {{ $post->user->name }}
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        </span>

                                        <span>
                                            {{-- 8 Comments --}}
                                            {{ $post->comment->count() }} Comments
                                        </span>
                                    </span>

                                    <a href="/blog/{{ $post->id }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                        Lanjut baca

                                        <i class="fa fa-long-arrow-right m-l-9"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach


                    <!-- Pagination -->
                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7 justify-content-between">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <form action="/public/blog" method="GET">
                        <div class="bor17 of-hidden pos-relative">
                            <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="title"
                                placeholder="Cari berita..." required>
    
                            <button type="submit" class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Kategori
                        </h4>

                        <ul>
                            <li class="bor18">
                                <a href="/blog" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        Lihat semua
                                    </span>

                                    <span>
                                        ({{ $postC->count() }})
                                    </span>
                                </a>
                            </li>
                            @foreach ($postCategories as $category)
                                <li class="bor18">
									<a href="/public/blog/category/{{ $category->id }}" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											{{ $category->name }}
										</span>

										<span>
											()
										</span>
									</a>
								</li>
                                @endforeach
                            {{-- @if ($postCategories->count() > 0)

                            @foreach ($postCategories as $category)
                                <li class="bor18">
                                    <a href="/public/blog/category/{{ $category->id }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                                
                            @endif --}}
                        </ul>
                    </div>

                    {{-- <div class="p-t-65">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Featured Products
                        </h4>

                        <ul>
                            <li class="flex-w flex-t p-b-30">
                                <a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
                                    <img src="images/product-min-01.jpg" alt="PRODUCT">
                                </a>

                                <div class="size-215 flex-col-t p-t-8">
                                    <a href="#" class="stext-116 cl8 hov-cl1 trans-04">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="stext-116 cl6 p-t-20">
                                        $19.00
                                    </span>
                                </div>
                            </li>

                            <li class="flex-w flex-t p-b-30">
                                <a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
                                    <img src="images/product-min-02.jpg" alt="PRODUCT">
                                </a>

                                <div class="size-215 flex-col-t p-t-8">
                                    <a href="#" class="stext-116 cl8 hov-cl1 trans-04">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="stext-116 cl6 p-t-20">
                                        $39.00
                                    </span>
                                </div>
                            </li>

                            <li class="flex-w flex-t p-b-30">
                                <a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
                                    <img src="images/product-min-03.jpg" alt="PRODUCT">
                                </a>

                                <div class="size-215 flex-col-t p-t-8">
                                    <a href="#" class="stext-116 cl8 hov-cl1 trans-04">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="stext-116 cl6 p-t-20">
                                        $17.00
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div> --}}

                    {{-- <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-20">
                            Archive
                        </h4>

                        <ul>
                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        July 2018
                                    </span>

                                    <span>
                                        (9)
                                    </span>
                                </a>
                            </li>

                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        June 2018
                                    </span>

                                    <span>
                                        (39)
                                    </span>
                                </a>
                            </li>

                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        May 2018
                                    </span>

                                    <span>
                                        (29)
                                    </span>
                                </a>
                            </li>

                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        April 2018
                                    </span>

                                    <span>
                                        (35)
                                    </span>
                                </a>
                            </li>

                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        March 2018
                                    </span>

                                    <span>
                                        (22)
                                    </span>
                                </a>
                            </li>

                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        February 2018
                                    </span>

                                    <span>
                                        (32)
                                    </span>
                                </a>
                            </li>

                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        January 2018
                                    </span>

                                    <span>
                                        (21)
                                    </span>
                                </a>
                            </li>

                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        December 2017
                                    </span>

                                    <span>
                                        (26)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div> --}}

                    {{-- <div class="p-t-50">
                        <h4 class="mtext-112 cl2 p-b-27">
                            Tags
                        </h4>

                        <div class="flex-w m-r--5">
                            <a href="#"
                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Fashion
                            </a>

                            <a href="#"
                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Lifestyle
                            </a>

                            <a href="#"
                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Denim
                            </a>

                            <a href="#"
                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Streetstyle
                            </a>

                            <a href="#"
                                class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Crafts
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
