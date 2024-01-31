@extends('front.layouts.main')

@section('main')

    {{-- Banner --}}
    @include('front.banner.banner')

    {{-- Category Products --}}
    @include('front.product.product')

    {{-- Our Gallery --}}
    @include('front.gallery.gallery')

    {{-- Our Applications --}}
    @include('front.application.application')
    
    {{-- Our Blogs --}}
    @include('front.blog.blog')
    
    {{-- Our Clients --}}
    @include('front.client.client')


    
@endsection