@extends('backoffice/layouts/main')

@section('title', '- Klien')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Klien</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/client" class="">Klien</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-3">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $client->name }}</h3>
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
                        <div class="text-center">
                            <a href="{{asset('http://103.127.96.59:9000/mled/'.$client->image)}}" data-title="{{ $client->name }}" data-lightbox="myclient">
                                <img src="{{asset('http://103.127.96.59:9000/mled/'.$client->image)}}" alt="" 
                                class="img-fluid rounded" style="height: 130px; width: 130px">
                            </a>
                        </div>
                        <div class="status mt-2 text-center">
                            @if ( $client->is_hidden == 0 )
                                <button class="badge badge-light">
                                    <i class="fa fa-eye"></i> Ditampilkan
                                </button>
                            @else
                                <button class="badge badge-light">
                                    <i class="fa fa-eye-slash"></i> Tidak ditampilkan
                                </button>
                            @endif
                        </div>
                        @if ($client->link != null)
                            <div class="pt-2">
                                Link: <a href="{{ $client->link }}" target="_blank">{{ $client->link }}</a>
                            </div>
                        @endif
                        <hr>
                        <div class="d-flex">
                            <button type="button" class="btn btn-warning btn-sm btn-block m-1" data-toggle="modal"
                                data-target="#clientEdit{{$client->id}}">
                                <span><i class="fas fa-edit"></i> Ubah</span>
                            </button>
                            @include('backoffice.client.modal.edit')
                            <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                data-target="#clientDelete{{$client->id}}">
                                <span><i class="ion ion-android-delete"></i> Hapus</span>
                            </button>
                            @include('backoffice.client.modal.delete')
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Proyek Data</h3>
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
                                    <th>Judul</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client->application as $application)
                                <tr>
                                    <td> {{ $application->id }} </td>
                                    <td> {{ $application->name }} </td>
                                    <td>
                                        @if (auth()->user()->role_id == 2)
                                        <a href="/backoffice/application/{{ $application->id }}/detail" class="btn btn-info btn-sm"><i class="ion ion-eye"></i> Detail</a>
                                        
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
                                    <th>Judul</th>
                                    <th>Opsi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection