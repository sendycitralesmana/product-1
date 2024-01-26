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
                            <h2>Detail Post</h2>
                            {{-- <h4 style="color: white">{!! html_entity_decode($product->description) !!}</h4> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
         @if (Session::has('comment'))
         <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
               Swal.fire({
               title: "Good job!",
               text: "{{Session::get('message')}}",
               icon: "success"
               });
            });
         </script>
         @endif
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                  @if ( $post->thumbnail != null )
                      <img src="{{ asset('storage/image/post/'.$post->thumbnail) }}" class="img-fluid" width="770px" height="345px" alt="">
                  @endif
                   {{-- <img class="img-fluid" src="{{ asset('storage/image/post/'.$post->thumbnail) }}" width="770px" height="345px" alt=""> --}}
                </div>
                <div class="blog_details">
                   <h2> {{ $post->title }} </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> {{ $post->user->name }} </a></li>
                      <li><a href="#"><i class="fa fa-comments"></i> {{ $commentC->count() }} Comments</a></li>
                   </ul>
                   <div>
                      {!! html_entity_decode($post->content) !!}
                   </div>
                </div>
             </div>
             {{-- <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                   <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                      people like this</p>
                   <div class="col-sm-4 text-center my-2 my-sm-0">
                      <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                   </div>
                   <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                   </ul>
                </div>
                <div class="navigation-area">
                   <div class="row">
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                         <div class="thumb">
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-left"></span>
                            </a>
                         </div>
                         <div class="detials">
                            <p>Prev Post</p>
                            <a href="#">
                               <h4>Space The Final Frontier</h4>
                            </a>
                         </div>
                      </div>
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                         <div class="detials">
                            <p>Next Post</p>
                            <a href="#">
                               <h4>Telescopes 101</h4>
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="#">
                               <span class="lnr text-white ti-arrow-right"></span>
                            </a>
                         </div>
                         <div class="thumb">
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/next.png" alt="">
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="blog-author">
                <div class="media align-items-center">
                   <img src="assets/img/blog/author.png" alt="">
                   <div class="media-body">
                      <a href="#">
                         <h4>Harvard milan</h4>
                      </a>
                      <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                         our dominion twon Second divided from</p>
                   </div>
                </div>
             </div> --}}
             <div class="comments-area">
                <h4>{{ $commentC->count() }} Comments</h4>
                @foreach ($comments as $comment)
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="{{ asset('storage/image/profile.png') }}" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 {{ $comment->comment }}
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                       <h5 class="mr-2">{{ $comment->name }}</h5> <small>( {{ $comment->email }} )</small>
                                    {{-- <p class="date">{{ $comment->created_at->format('F d, Y') }} at {{ $comment->created_at->format('H:i a') }}</p> --}}
                                    <p class="date"> {{ $comment->created_at->diffForHumans() }} </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                @endforeach
                <div>
                  {{ $comments->links() }}
                </div>
             </div>
             <div class="comment-form">
                <h4>Leave a Reply</h4>
                <form class="form-contact comment_form" method="POST" action="/post/{{ $post->id }}/comment" id="commentForm">
                  @csrf
                   <div class="row">
                      <div class="col-12">
                         <div class="form-group">
                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                               placeholder="Write Comment" required></textarea>
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" required>
                         </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" required>
                         </div>
                      </div>
                   </div>
                   <div class="form-group">
                      <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                   </div>
                </form>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                {{-- <aside class="single_sidebar_widget search_widget">
                   <form action="#">
                      <div class="form-group">
                         <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder='Search Keyword'
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
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
                     @if ($recent->thumbnail != null)
                     <img src="{{ asset('storage/image/post/'.$recent->thumbnail) }}" width="80px" height="80px" alt="post">
                     @else
                     <img src="{{ asset('storage/image/default.png') }}" width="80px" height="80px" alt="post">
                     @endif
                        <div class="media-body">
                            <a href="/post/{{ $recent->id }}">
                                <h3 style="
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                max-width: 8ch;" >{{ $recent->title }}</h3>
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
 <!--================ Blog Area end =================-->

    </main>

@endSection