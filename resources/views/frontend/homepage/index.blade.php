@extends('frontend.layout.main')

@section('main')

<main>

    @include('frontend.banner.index')
    {{-- @include('frontend.product.index') --}}

    <section style="padding: 20px;">
        <h2 class="text-center">Product Category</h2>
        <div class="row text-center" style="padding: 20px;">
            <div class="col-6 col-md-4 col-lg-3 py-2">
                <a href="/product" class="btn btn-block">Show all</a>
            </div>
            @foreach ($productCategories as $productCategory)
                <div class="col-6 col-md-4 col-lg-3 py-2" style="">
                    <a href="/product/category/{{ $productCategory->id }}" class="btn btn-block">
                        {{ $productCategory->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    @include('frontend.about.tentang_kami')

    @include('frontend.application.index')

    @include('frontend.about.visi_misi')

    @include('frontend.client.index')

    @include('frontend.post.index')

</main>

@endsection
