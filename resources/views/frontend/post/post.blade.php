@extends('frontend.layout.main')

@section('main')
    
    <main>

         <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background=" {{ asset('storage/image/banner.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8">
                        <div class="hero-cap hero-cap2 pt-120">
                            <h2>Post</h2>
                            {{-- <h4 style="color: white">{!! html_entity_decode($product->description) !!}</h4> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                        @foreach ($posts as $post)
                            
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" width="770px" height="345px" src="{{ asset('storage/image/post/'.$post->thumbnail) }}" alt="">
                                <div class="blog_item_date">
                                    <h3> {{ $post->created_at->format('d') }} </h3>
                                    <p> {{ $post->created_at->format('M') }} </p>
                                </div>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="/post/{{ $post->id }}">
                                    <h2> {{ $post->title }} </h2>
                                </a>

                                <div style="
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                max-width: 60ch;">
                                    {!! html_entity_decode($post->content) !!}

                                </div>

                                <ul class="blog-info-link">
                                    <li><a href="/post/{{ $post->id }}"><i class="fa fa-user"></i> {{ $post->user->name }} </a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>

                        @endforeach

                        <div>
                            {{ $posts->links() }}
                        </div>

                        {{-- <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        {{-- <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside> --}}

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="/post" class="d-flex">Show All ({{ $posts->count() }})</a>
                                </li>
                                @foreach ($postCategories as $category)
                                <li>
                                    <a href="/post/category/{{ $category->id }}" class="d-flex">
                                        <p> {{ $category->name }} </p>
                                        <p class="ml-1"> ({{ $category->post->count() }})</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($postRecents as $recent)
                            <div class="media post_item">
                                <img src="{{ asset('storage/image/post/'.$recent->thumbnail) }}" width="80px" height="80px" alt="post">
                                <div class="media-body">
                                    <a href="/post/{{ $recent->id }}">
                                        <h3 style="
                                        white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        max-width: 9ch;" >{{ $recent->title }}</h3>
                                    </a>
                                    <p> {{ $recent->created_at->format('M d, Y') }} </p>
                                </div>
                            </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    </main>

@endsection