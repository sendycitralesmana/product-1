@extends('layouts/main')

@section('title', 'Post')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Detail Post</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('post.modal.edit')
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
                @if (Session::has('post'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-3">
                        @if( $post->thumbnail != '' )
                            <img src="{{asset('storage/image/post/'.$post->thumbnail)}}" alt="" width="300px" height="300px">
                        @else
                            <img src="{{asset('storage/image/default.png')}}" alt="" width="300px" height="300px">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <h2>{{ $post->title }}</h2>
                        <small>Ditulis oleh : {{ $post->user->name }}</small>
                        <div style="margin-top:20px">{!! html_entity_decode($post->content) !!}</div>
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