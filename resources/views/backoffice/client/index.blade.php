@extends('backoffice/layouts/main')

@section('title', 'Client')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Client Data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Client</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#clientAdd">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.client.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('client'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <td> {{ $client->id }} </td>
                            <td> {{ $client->name }} </td>
                            <td>
                                <a href="/backoffice/client/{{ $client->id }}/detail" class="btn btn-info btn-sm">Detail</a>
                                @if (auth()->user()->role_id == 2)
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#clientEdit{{ $client->id }}">
                                    <span>Edit</span>
                                </button>
                                Modal
                                @include('client.modal.edit') --}}
                                {{-- <a href="/client/{{ $data->id }}/delete" onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger btn-sm">Delete</a> --}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{-- <th>Description</th> --}}
                            <th>Option</th>
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
