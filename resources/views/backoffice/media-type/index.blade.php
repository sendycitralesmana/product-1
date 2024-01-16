@extends('layouts/main')

@section('title', 'Media Type')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Media Type</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Media Type Data</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id = 2)
                    <!-- Button trigger modal -->
                    <button title="Add Variant" type="button" class="btn btn-default" data-toggle="modal" data-target="#mediaTypeAdd">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('components.modals.media-type.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            @if (auth()->user()->role_id == 2)

                            <th>Option</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mediaTypes as $mediaType)
                        <tr>
                            <td> {{ $mediaType->id }} </td>
                            <td> {{ $mediaType->name }} </td>
                            @if (auth()->user()->role_id == 2)

                            <td>
                                <!-- Button trigger modal -->
                                <button title="Add Variant" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mediaTypeEdit{{ $mediaType->id }}">
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('components.modals.media-type.edit')
                                {{-- <a href="/media-type/{{ $data->id }}/delete" onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger btn-sm">Delete</a> --}}
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
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
