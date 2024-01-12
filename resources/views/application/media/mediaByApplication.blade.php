@extends('layouts/main')

@section('title', 'Media Application')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>{{ $application->name }} Media Data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $application->name }} Media</h3>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mediaAdd">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('application.media.modal.add')
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    @if (auth()->user()->role_id == 2)
                    
                    {{-- <a href="/media-product/add" class="btn btn-info btn-info">Add data</a> --}}
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('media'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Media</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Url</th>
                            @if (auth()->user()->role_id == 2)

                            <th>Option</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mediaApplications as $mediaApplication)
                        <tr>
                            <td> {{ $mediaApplication->id }} </td>
                            <td> 
                                @if ($mediaApplication->type->name == "Image")
                                <img src="{{asset('storage/application/media/'.$mediaApplication->url)}}" alt="" width="80px" height="80px">
                                @else
                                    <a href="/application/media/download/{{ $mediaApplication->id }}" class="btn btn-sm btn-success">Download</a>
                                @endif    
                            </td>
                            <td> {{ $mediaApplication->type->name }} </td>
                            <td> {{ $mediaApplication->name }} </td>
                            <td> {{ $mediaApplication->url }} </td>
                            @if (auth()->user()->role_id == 2)

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mediaEdit{{ $mediaApplication->id }}">
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('application.media.modal.edit')
                                <a href="/application/media/{{ $mediaApplication->id }}/delete"
                                    onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Media</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Url</th>
                            @if (auth()->user()->role_id == 2)

                            <th>Option</th>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
