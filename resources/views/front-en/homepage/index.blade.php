@extends('front-en.layouts.main')

@section('main')

    {{-- Banner --}}
    @include('front-en.banner.banner')

    {{-- Category Products --}}
    @include('front-en.product.product')

    {{-- Our Gallery --}}
    @include('front-en.gallery.gallery')

    {{-- Our Applications --}}
    @include('front-en.application.application')
    
    {{-- Our Blogs --}}
    @include('front-en.blog.blog')
    
    {{-- Our Clients --}}
    @include('front-en.client.client')


    
@endsection