@extends('backoffice/layouts/main')

@section('title', '- Berita')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/backoffice/post" class="">Artikel</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        {{-- Produk Start --}}
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Artikel</h3>
                <div class="card-tools">
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
                    <div class="col-md-7">
                        <!-- Box Comment -->
                        <div class="card card-widget card-outline card-primary">
                            <div class="card-header">
                                <div class="user-block">
                                    @if ( $post->user->avatar != null )
                                        <img src="{{ asset('storage/image/user/'.$post->user->avatar) }}" alt="">
                                    @endif
                                    {{-- <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image"> --}}
                                    <span class="username"><p>{{ $post->user->name }}</p></span>
                                    <span class="description">Menambahkan berita -
                                        {{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#postEdit{{ $post->id }}">
                                        <span><i class="fas fa-edit"></i> Ubah</span>
                                    </button>
                                    @include('backoffice.post.modal.edit')
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if ( $post->thumbnail != null )
                                <div class="text-center">
                                    <img src="{{ asset('http://103.127.96.59:9000/mled/'.$post->thumbnail) }}" class="img-fluid" alt=""
                                        style="height: 300px">
                                    </div>
                                @endif
                                <h4 class="mt-3"> {{ $post->title }} </h4>
                                <p> {!! html_entity_decode($post->content) !!} </p>
                                <span class="float-right text-muted">{{ $post->comment->count() }} Komentar</span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-5">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Komentar ( {{ $post->comment->count() }} )</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-footer card-comments" style="height: 420px; overflow-y: scroll">
                                    @if ( $post->comment->count() == 0 )
                                        <h4 class="text-center">
                                            <b>-- Tidak ada komentar --</b>
                                        </h4>
                                    @endif
                                    @foreach ($post->comment as $comment)
                                    <div class="card-comment">
                                        <!-- User image -->
                                        <img class="img-circle img-sm" src="{{ asset('images/profile.png') }}"
                                            alt="User Image">

                                        <div class="comment-text">
                                            <span class="username">
                                                {{ $comment->name }} <small>( {{ $comment->email }} )</small>
                                                <span
                                                    class="text-muted float-right">{{ $comment->created_at->diffForHumans() }}</span>
                                            </span><!-- /.username -->
                                            {{ $comment->comment }}

                                        </div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-xs float-right"
                                            data-toggle="modal" data-target="#commentDelete{{ $comment->id }}">
                                            <span><i class="ion ion-android-delete"></i> Hapus</span>
                                        </button>
                                        {{-- Modal --}}
                                        @include('backoffice.post.comment.modal.delete')
                                        <!-- /.comment-text -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
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
