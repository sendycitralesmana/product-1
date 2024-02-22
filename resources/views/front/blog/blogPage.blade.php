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

                    @if ($posts->count() == 0)
                        <div class="text-center">
                            <h4>
                                <b>-- Tidak ada data --</b>
                            </h4>
                        </div>
                    @endif

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
                                            {{ $post->comment->count() }} Komentar
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
                    <form action="/blog" method="GET">
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
									<a href="/blog/category/{{ $category->id }}" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											{{ $category->name }}
										</span>

										<span>
											( {{ $category->post->count() }} )
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

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
