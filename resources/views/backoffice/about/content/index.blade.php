@extends('backoffice.layouts/main')

@section('title', '- Konten')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Konten</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Konten</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Konten</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    {{-- Button trigger modal
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#contentAdd">
                        <span>+</span>
                    </button>
                    Modal
                    @include('backoffice.about.content.modal.add') --}}
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('content'))
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

                <div class="row">
                    @foreach ($contents as $content)
                    <div class="col-md-6 content">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $content->title }}</h3>
                                <div class="card-tools">
                                    @if (auth()->user()->role_id == 2)
                                    @endif
                                    <a href="/backoffice/about/content/{{ $content->id }}/edit" class="" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <a href="{{asset('images/banner.jpg')}}" data-title="{{ $content->name }}" data-lightbox="mycontent">
                                        <img src="{{asset('images/banner.jpg')}}" alt="" 
                                        class="img-fluid rounded" style="height: 400px; width: 100%">
                                    </a>
                                </div>
                                <div class="p-1">
                                    {!! html_entity_decode($content->description) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Page</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $content)
                        <tr>
                            <td> {{ $content->id }} </td>
                            <td> {{ $content->thumbnail }} </td>
                            <td> {{ $content->page->name }} </td>
                            <td> {{ $content->title }} </td>
                            <td> 
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#contentDesc{{ $content->id }}">
                                    <span>See Description</span>
                                </button>
                                @include('backoffice.about.content.modal.desc') </td>
                            <td>
                                @if (auth()->user()->role_id == 2)
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#contentEdit{{ $content->id }}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                @include('backoffice.about.content.modal.edit')
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Page</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table> --}}
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
