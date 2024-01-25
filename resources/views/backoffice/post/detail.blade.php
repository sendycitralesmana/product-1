@extends('backoffice/layouts/main')

@section('title', 'Post')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Post</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/post" class="text-secondary">Post</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        {{-- Post Start --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Post</h3>
                <div class="card-tools">
                    @if ( $post->user_id == auth()->user()->id )
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#postEdit{{ $post->id }}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.post.modal.edit')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#postDelete{{ $post->id }}">
                                    <span>Delete</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.post.modal.delete')
                                @else
                                -
                                @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @if (Session::has('post'))
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
                <div class="row">
                    <div class="col-md-8">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <div class="user-block">
                            @if ( $post->user->avatar != null )
                                <img src="{{ asset('storage/image/user/'.$post->user->avatar) }}" alt="">
                            @endif
                            {{-- <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image"> --}}
                            <span class="username"><a href="#">{{ $post->user->name }}</a></span>
                            <span class="description">Added post - {{ $post->created_at->diffForHumans() }}</span>
                          </div>
                          <!-- /.user-block -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ( $post->thumbnail != null )
                                <img src="{{ asset('storage/image/post/'.$post->thumbnail) }}" class="img-fluid" alt="" height="300px">
                            @endif
                            <h4 class="mt-3"> {{ $post->title }} </h4>
                          <p> {!! html_entity_decode($post->content) !!} </p>
                          <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                          <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                          <span class="float-right text-muted">{{ $post->comment->count() }} comments</span>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer card-comments">
                          <div class="card-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
          
                            <div class="comment-text">
                              <span class="username">
                                Maria Gonzales
                                <span class="text-muted float-right">8:03 PM Today</span>
                              </span><!-- /.username -->
                              It is a long established fact that a reader will be distracted
                              by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                          </div>
                          <!-- /.card-comment -->
                          <div class="card-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">
          
                            <div class="comment-text">
                              <span class="username">
                                Luna Stark
                                <span class="text-muted float-right">8:03 PM Today</span>
                              </span><!-- /.username -->
                              It is a long established fact that a reader will be distracted
                              by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                          </div>
                          <!-- /.card-comment -->
                        </div>
                        <!-- /.card-footer -->
                        <div class="card-footer">
                        </div>
                        
                      </div>
                      
                    </div>

                    <div class="col-md-4">
                      <!-- Box Comment -->
                      <div class="card card-widget">
                        <div class="card-header">
                          <div class="user-block">
                            <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                            <span class="description">Shared publicly - 7:30 PM Today</span>
                          </div>
                          <!-- /.user-block -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            
                        </div>
                        <!-- /.card-footer -->
                      </div>
                      <!-- /.card -->
                    </div>

                </div>
            </div>
        </div>
        {{-- Post End --}}

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection