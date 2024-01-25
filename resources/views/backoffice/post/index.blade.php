@extends('backoffice.layouts/main')

@section('title', 'Post')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Post Data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Post Data</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#postAdd">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.post.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
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
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                    <ul>
                        <span>Add data failed</span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="d-flex justify-content-between">
                    <div style="width: 68%;">
                        @foreach ($posts as $post)
                        <div class="">
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
                                <h4 class="mt-2"> {{ $post->title }} </h4>
                              <a href="/backoffice/post/{{ $post->id }}/detail" class="btn btn-info btn-sm"><i class="ion ion-eye"></i> Detail</a>
                                    @if ($post->user_id == auth()->user()->id)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#postEdit{{ $post->id }}">
                                        <span><i class="ion ion-android-create"></i> Edit</span>
                                    </button>
                                    {{-- Modal --}}
                                    @include('backoffice.post.modal.edit')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#postDelete{{ $post->id }}">
                                        <span><i class="ion ion-android-delete"></i> Delete</span>
                                    </button>
                                    {{-- Modal --}}
                                    @include('backoffice.post.modal.delete')
                                    @endif
                              <span class="float-right text-muted">{{ $post->comment->count() }} comments</span>
                            </div>
                            
                            <div class="card-footer">
                            </div>
                            
                          </div>
                          
                        </div>
                        @endforeach
                    </div>
                    <div style="width: 30%;">
                        <div class="">
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
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
