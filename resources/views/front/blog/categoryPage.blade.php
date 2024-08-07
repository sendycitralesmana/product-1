@extends('front.layouts.main')

@section('main')

<div id="result" class="p-t-10 searchData p-l-30 p-r-30" 
        style="position: fixed; left: 0; right: 0; top: 80px; z-index: 999">

    </div>

<!-- Title page -->
{{-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('assets/frontend/images/bg-01.jpg') }});">
    <h2 class="ltext-105 cl0 txt-center">
        Blog
    </h2>
</section> --}}


<!-- Content page -->
<section class="bg0 p-t-60 p-b-60">
    <div class="container">
        <div class="row">

            
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">

                    <div class="m-b-10">
                        <span>Kategori : <b>{{ $postCategory->name }}</b> </span>
                    </div>

                    <form action="/blog/category/{{ $postCategory->id }}" method="GET" class="m-b-20">
                        <div class="bor17 of-hidden pos-relative">
                            <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="title"
                                placeholder="Cari artikel..." required>
        
                            <button type="submit" class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </div>
                    </form>

                    @if ( $title != null )
                        <div class="m-b-20">
                            <span> 
                                <a href="/blog/category/{{ $postCategory->id }}" class="" title="Hapus pencarian">
                                    <i class="fa fa-refresh m-r-5"></i> 
                                </a>
                                Hasil pencarian dari : <b>{{ $title }}</b> 
                            </span>
                        </div>
                    @endif

                    @if ($posts->count() == 0)
                        <div class="text-center mt-2">
                            <h4 class="mb-2">
                                <b>-- Artikel tidak ditemukan --</b>
                            </h4>
                            <a href="/blog" class="btn btn-outline-secondary mr-1 btn-sm"> <i class="fa fa-refresh"></i> Lihat semua</a>
                        </div>
                    @endif

                    <div class="row">

                        @foreach ($posts as $post)

                            <div class="col-md-6">
                                <div class="">
                                    <div class="card" style="margin-bottom: 32px">
                                        <div class="blog-img">
                                            <a href="/blog/{{ $post->id }}" class="hov-img0 how-pos5-parent">
                                                <img src="{{ asset('storage/image/post/'. $post->thumbnail) }}" alt="IMG-BLOG" 
                                                class="img-fluid rounded" style="height: 250px">
                                            </a>
                                        </div>
        
                                        <div class="p-t-22">
                                            <div style="margin: 0 10px">
                                                <p class="" style="
                                                    overflow: hidden;
                                                    text-overflow: ellipsis;
                                                    -webkit-line-clamp: 2;
                                                    display: -webkit-box;
                                                    -webkit-box-orient: vertical;">
                                                    <a href="/blog/{{ $post->id }}" class="ltext-108 cl2 hov-cl1 trans-04">
                                                        <b>{{ $post->title }}</b>
                                                    </a>
                                                </p>
            
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
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach 

                    </div>

                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7 justify-content-between">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">

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
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
