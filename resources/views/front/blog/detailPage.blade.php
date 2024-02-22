@extends('front.layouts.main')

@section('main')

    <!-- breadcrumb -->
	<div class="container p-t-30">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/homepage" class="stext-109 cl8 hov-cl1 trans-04">
                Beranda
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
    
            <a href="/public/blog" class="stext-109 cl8 hov-cl1 trans-04">
                Artikel
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
    
            <span class="stext-109 cl4">
                {{ $post->title }}
            </span>
        </div>
	</div>
    
    <!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!--  -->
						<div class="wrap-pic-w how-pos5-parent">
							<img src="{{ asset('storage/image/post/'. $post->thumbnail)}}" alt="IMG-BLOG">

							<div class="flex-col-c-m size-123 bg9 how-pos5">
								<span class="ltext-107 cl2 txt-center">
									{{ $post->created_at->format('D') }}
								</span>

								<span class="stext-109 cl3 txt-center">
									{{ $post->created_at->format('M Y') }}
								</span>
							</div>
						</div>

						<div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">oleh</span> {{ $post->user->name }} 
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									{{ $post->created_at->format('D M, Y') }}22 Jan, 2018
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									{{ $post->comment->count() }} Komentar
								</span>
							</span>

							<h4 class="ltext-109 cl2 p-b-28">
								{{ $post->title }}
							</h4>

							<div class="stext-117 cl6 p-b-26">
                                {!! html_entity_decode($post->content) !!}
                            </div>
						</div>

						<!--  -->
						<div class="p-t-40">
							<h5 class="mtext-113 cl2 p-b-12">
								Tinggalkan komentar
							</h5>

							<p class="stext-107 cl6 p-b-40">
								Alamat email Anda tidak akan dipublikasikan. Bidang yang wajib diisi ditandai *
							</p>

							<form action="/post/{{ $post->id }}/comment" method="POST">
                                @csrf
								<div class="bor19 m-b-20">
									<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="comment" placeholder="Komentar..."></textarea>
								</div>

								<div class="bor19 size-218 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="name" placeholder="Nama *">
								</div>

								<div class="bor19 size-218 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="email" placeholder="Email *">
								</div>

								<button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
									Kirim komentar
								</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
                            {{-- <div class="bor17 of-hidden pos-relative">
                                <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

                                <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </div> --}}

						<div class="p-t-0">
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

						{{-- <div class="p-t-65">
							<h4 class="mtext-112 cl2 p-b-33">
								Artikel terbaru
							</h4>

							<ul>
                                @foreach ($postRecents as $recent)
								<li class="flex-w flex-t p-b-30">
									<a href="/blog/{{ $recent->id }}" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="{{ asset('storage/image/post/' . $recent->thumbnail ) }}" alt="PRODUCT">
									</a>
									<div class="size-215 flex-col-t p-t-8">
										<a href="/blog/{{ $recent->id }}" class="stext-116 cl8 hov-cl1 trans-04" style="
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        -webkit-line-clamp: 2;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;
                                    ">
											{{ $recent->title }}
										</a>
									</div>
								</li>
                                @endforeach
							</ul>
						</div> --}}

					</div>
				</div>
			</div>
		</div>
	</section>	

@endSection