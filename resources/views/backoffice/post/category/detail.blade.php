@extends('backoffice/layouts/main')

@section('title', 'Post Category')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Detail Post Category</h1>
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

        {{-- Post Type Start--}}
        <div class="row">

            <div class="col-md-6">
                {{-- Post Category Start --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post Category</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="btn btn-success close" data-dismiss="alert"
                                sty>&times;</button>
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{ $postCategory->id }} </td>
                                    <td> {{ $postCategory->name }} </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#postCategoryEdit{{ $postCategory->id }}">
                                            <span>Edit</span>
                                        </button>
                                        {{-- Modal --}}
                                        @include('backoffice.post.category.modal.edit')
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                {{-- Post End --}}
            </div>

            <div class="col-md-6">
                {{-- Post Start --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $postCategory->post->count() }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/backoffice/post/category/{{ $postCategory->id }}"
                                class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Post End --}}
            </div>

        </div>
        {{-- Post Type End --}}

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection
