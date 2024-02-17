@extends('front.layouts.main')

@section('main')

    {{-- Banner --}}
    @include('front.banner.banner')

    {{-- Category Products --}}
    @include('front.product.product')

    {{-- About --}}
    @include('front.about.about')

    {{-- Our Applications --}}
    @include('front.application.application')

    {{-- Our Gallery --}}
    @include('front.gallery.gallery')
    
    {{-- Our Blogs --}}
    @include('front.blog.blog')

    {{-- Contact us --}}
    @include('front.contact.contact')
    
    {{-- Our Clients --}}
    @include('front.client.client')

    {{-- Our Catalogue --}}
    @include('front.catalogue.catalogue')   


    
@endsection