@extends('front.layouts.main')

@section('main')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('images/banner.jpg') }});">
		<h2 class="ltext-105 cl0 txt-center" style="text-shadow: 0.02em 0.03em 0.15em #ed7a07">
			Tentang kami
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Tentang kami
							{{-- {{ GoogleTranslate::trans('Tentang kami',\App::getLocale()) }} --}}
						</h3>

						<div class="stext-113 cl6 p-b-26">
							{!! html_entity_decode($aboutTK->description) !!}
							{{-- {!! GoogleTranslate::trans( html_entity_decode($aboutTK->description) , App::getLocale()) !!} --}}
                        </div>

					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							{{-- <img src="{{ asset('storage/image/content/'. $aboutTK->thumbnail) }}" class="img-fluid" style="height: 400px; width: 100') }}" alt="IMG"> --}}
							<img src="{{ asset('images/tentang.jpg') }}" class="img-fluid" style="height: 400px; width: 100') }}" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Visi & Misi
							{{-- {{ GoogleTranslate::trans('Visi & Misi',\App::getLocale()) }} --}}
						</h3>

						<div class="stext-113 cl6 p-b-26">
							{!! html_entity_decode($aboutVM->description) !!}
							{{-- {!! GoogleTranslate::trans( html_entity_decode($aboutVM->description) , App::getLocale()) !!} --}}
                        </div>

						{{-- <div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
							</p>

							<span class="stext-111 cl8">
								- Steve Job’s 
							</span>
						</div> --}}
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="{{ asset('images/vimi.jpg') }}" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	

@endsection