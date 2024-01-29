@extends('backoffice.layouts/main')

@section('title', 'Post')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content mt-3">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Post Data Category: {{ $category->name }}</h3>
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

                <div class="d-flex justify-content-between post-content">
                    <div class="post-position" style="width: 68%; height:470px; overflow-y: scroll">
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
                                        <span class="description">Added post -
                                            {{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if ( $post->thumbnail != null )
                                    <img src="{{ asset('storage/image/post/'.$post->thumbnail) }}" class="img-fluid"
                                        alt="" height="300px">
                                    @endif
                                    <h4 class="mt-2"> {{ $post->title }} </h4>
                                    <a href="/backoffice/post/{{ $post->id }}/detail" class="btn btn-info btn-sm"><i
                                            class="ion ion-eye"></i> Detail</a>
                                    @if ($post->user_id == auth()->user()->id)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#postDelete{{ $post->id }}">
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
                        <div class="p-3">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <div class="menu-position" style="width: 30%;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Menu</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- SEARCH FORM -->
                                <form class="form-inline" action="/backoffice/post/category/{{$id}}">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-append">
                                            <button class="btn btn-default" type="submit">
                                                Title
                                            </button>
                                        </div>
                                        <input class="form-control" type="text"
                                            placeholder="Search" name="title" aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        <div class="input-group-append">
                                            <a href="/backoffice/post" class="btn btn-outline-secondary">Show All</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                                <div class="card-tools">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                                        data-target="#postCategoryAdd">
                                        <span><i class="ion ion-plus"></i></span>
                                    </button>
                                    {{-- Modal --}}
                                    @include('backoffice.post.category.modal.add')
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="category">
                                    <div class="category-content">
                                        <form action="">
                                            @foreach ($postCategories as $postCategory)
                                            <div class="mb-2 d-flex">
                                                <!-- Button trigger modal -->
                                                <button title="Edit" type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                                    data-target="#postCategoryEdit{{ $postCategory->id }}">
                                                    <span><i class="ion ion-android-create"></i></span>
                                                </button>
                                                {{-- Modal --}}
                                                @include('backoffice.post.category.modal.edit')
                                                <a href="/backoffice/post/category/{{ $postCategory->id }}"
                                                    class="btn btn-outline-secondary btn-block ml-1 mr-1">
                                                    {{ $postCategory->name }}
                                                </a>
                                                <!-- Button trigger modal -->
                                                <button type="button" title="Delete" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                    data-target="#postCategoryDelete{{ $postCategory->id }}">
                                                    <span><i class="ion ion-android-delete"></i></span>
                                                </button>
                                                {{-- Modal --}}
                                                @include('backoffice.post.category.modal.delete')
                                            </div>
                                            @endforeach
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            </div>
                            <!-- /.card-footer-->
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
