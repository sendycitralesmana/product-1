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
                    <h1>Detail Client</h1>
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

        {{-- Client Start --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Client</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('client'))
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
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $client->id }} </td>
                            <td> 
                                @if( $client->image != '' )
                                    <img src="{{asset('storage/image/client/'.$client->image)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('storage/image/default.png')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td> {{ $client->name }} </td>
                            <td> {{ $client->link }} </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#clientEdit{{ $client->id }}">
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.client.modal.edit')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- client End --}}

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Application Data</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('application'))
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
                        @foreach ($client->application as $application)
                        <tr>
                            <td> {{ $application->id }} </td>
                            <td> {{ $application->name }} </td>
                            <td> {{ $application->area }} </td>
                            <td> {{ $application->time }} </td>
                            <td>
                                @if (auth()->user()->role_id == 2)
                                <a href="/backoffice/application/{{ $application->id }}/detail" class="btn btn-info btn-sm">Detail</a>
                                
                                {{-- <a href="/product/{{ $data->id }}/delete" onclick="return confirm('Are you sure?')"
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

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection