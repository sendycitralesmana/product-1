<!--latest Nnews Area start -->
<div class="latest-news-area section-padding30">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Section Tittle -->
                <div class="section-tittle section-tittle7 mb-50">
                    <div class="front-text">
                        <h2 class="">latest post</h2>
                    </div>
                    <span class="back-text">Our Blog</span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($postLatest as $post)
            <div class="col-xl-6 col-lg-6 col-md-6">
                <!-- single-news -->
                <div class="single-news mb-30">
                    <div class="news-img">
                        @if ($post->thumbnail != null)
                            <img src="{{asset('storage/image/post/'. $post->thumbnail)}}" alt="" height="324px" alt="">
                        @endif
                        {{-- <img src="assets/img/david/david_1.png" alt=""> --}}
                        <div class="news-date text-center">
                            <span> {{ $post->created_at->format('d') }} </span>
                            <p> {{ $post->created_at->format('M') }} </p>
                        </div>
                    </div>
                    <div class="news-caption">
                        <ul class="david-info">
                            <li>By: {{ $post->user->name }}</li>
                        </ul>
                        <h2>
                            <a href="/post/{{ $post->id }}">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <a href="/post/{{ $post->id }}" class="d-btn">Read more »</a>
                    </div>
                </div>
            </div>
            @endforeach
       </div>
    </div>
</div>
<!--latest News Area End -->