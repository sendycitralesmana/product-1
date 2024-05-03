@extends('backoffice.layouts/main')

@section('title', '- Artikel')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <hr>
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <h3 class="card-title">Data artikel</h3>
                        </div>
                        {{-- <div class="card-tools">
                            
                            @if (auth()->user()->role_id == 2)
                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#postAdd">
                                <span class="fa fa-plus"></span>
                            </button>
                            @include('backoffice.post.modal.add')
                            @endif
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div> --}}
                        <div class="mt-2">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <form class="form-inline" action="/backoffice/post">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control" type="text"
                                                placeholder="Cari judul" name="title" aria-label="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                            @if ( $title != null )
                                            <div class="input-group-append">
                                                <a href="/backoffice/post" class="btn btn-outline-secondary"><span class="fa fa-arrows-rotate"></span> Lihat semua</a>
                                            </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div class="card-tools">
                            
                                    @if (auth()->user()->role_id == 2)
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#postAdd">
                                        <span class="fa fa-plus"></span> Tambah
                                    </button>
                                    @include('backoffice.post.modal.add')
                                    @endif
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
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
                                <span>Tambah data gagal</span>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="post-position" style=" height:490px; overflow-y: scroll">
                            @if ( $title != null )
                                <div class="text-center">
                                    <p>
                                        Hasil pencarian dari: <b>{{ $title }}</b>
                                    </p>
                                </div>
                            @endif
                            @if ( $posts->count() == 0 )
                                <h2 class="text-center">
                                    <b>-- Tidak ada data --</b>
                                </h2>
                            @else
                                @foreach ($posts as $post)
                                    <div class="">
                                        <div class="card card-widget mt-1 mr-2 ml-2">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    @if ( $post->user->avatar != null )
                                                    <img src="{{ asset('storage/image/user/'.$post->user->avatar) }}" alt="">
                                                    @endif
                                                    <span class="username"><p>{{ $post->user->name }}</p></span>
                                                    <span class="description">Menambahkan berita -
                                                        {{ $post->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                            class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @if ( $post->thumbnail != null )
                                                <img src="{{ asset('storage/image/post/'.$post->thumbnail) }}" class="img-fluid"
                                                    alt="" height="300px">
                                                @endif
                                                <h4 class="mt-2"> 
                                                    <b>{{ $post->title }}</b>  
                                                </h4>
                                                @if ( $post->post_category_id != null )
                                                    <small> {{ $post->category->name }} </small>
                                                @endif
                                                <div class="mb-2" style="overflow: hidden;
                                                text-overflow: ellipsis;
                                                -webkit-line-clamp: 3;
                                                display: -webkit-box;
                                                -webkit-box-orient: vertical;">
                                                    <p> {!! html_entity_decode($post->content) !!} </p>
                                                </div>
                                                <a href="/backoffice/post/{{ $post->id }}/detail" class="btn btn-info btn-sm"><i
                                                        class="ion ion-eye"></i> Detail</a>
                                                @if ($post->user_id == auth()->user()->id)
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#postDelete{{ $post->id }}">
                                                        <span><i class="ion ion-android-delete"></i> Hapus</span>
                                                    </button>
                                                    @include('backoffice.post.modal.delete')
                                                @endif
                                                <span class="float-right text-muted">{{ $post->comment->count() }} comments</span>
                                            </div>
                
                                        </div>
                
                                    </div>
                                @endforeach
                            @endif

                            <div class="p-3">
                                {{ $posts->links() }}
                            </div>

                        </div>
        
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Filter</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-inline" action="/backoffice/post">
                            <div class="input-group input-group-sm">
                                <div class="input-group-append">
                                    <button class="btn btn-default" type="submit">
                                        Judul
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
                                    <a href="/backoffice/post" class="btn btn-outline-secondary">Lihat semua</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kategori</h3>
                        <div class="card-tools">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#postCategoryAdd">
                                <span><i class="fas fa-plus"></i> Tambah</span>
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

                        @foreach ($postCategories as $postCategory)
                        <div class="">
                            <div class="d-flex justify-content-between">
                                <a href="/backoffice/post/category/{{ $postCategory->id }}">{{ $postCategory->name }} ( {{ $postCategory->post->count() }} )</a>
                                <div>
                                    <button title="Ubah" type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#postCategoryEdit{{ $postCategory->id }}">
                                        <span><i class="fas fa-edit"></i></span>
                                    </button>
                                    @include('backoffice.post.category.modal.edit')
                                    <button type="button" title="Hapus" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#postCategoryDelete{{ $postCategory->id }}">
                                        <span><i class="ion ion-android-delete"></i></span>
                                    </button>
                                    @include('backoffice.post.category.modal.delete')
                                </div>
                            </div>
                        <div>
                        <hr>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection