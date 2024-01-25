@extends('backoffice/layouts/main')

@section('title', 'Application')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $product->name }} Application Data</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product" class="text-secondary">Product</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/{{ $product->id }}/detail" class="text-secondary">Detail</a></li>
                    <li class="breadcrumb-item active">Application</li>
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
                <h3 class="card-title">{{ $product->name }} Application</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#applicationAdd">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.product.application.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('application'))
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
                            <th>Area</th>
                            <th>Time</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appProducts as $application)
                        <tr>
                            <td> {{ $application->id }} </td>
                            <td> {{ $application->application->name }} </td>
                            <td> {{ $application->application->area }} </td>
                            <td> {{ $application->application->time }} </td>
                            <td>
                                @if (auth()->user()->role_id == 2)
                                <a href="/backoffice/application/{{ $application->application->id }}/detail" class="btn btn-info btn-sm">Detail</a>
                                <!-- Button trigger modal -->
                                <button title="Delete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#applicationDelete{{ $application->id }}">
                                    <span><i class="ion ion-android-delete"></i> Delete</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.application.modal.delete')
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Time</th>
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
