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
                    <h1>Klien</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Klien</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">

                {{-- <h3 class="card-title">Data klien</h3> --}}

                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data Klien</h3>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div>
                        <form class="form-inline" action="/backoffice/client">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="text"
                                    placeholder="Cari klien" name="search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                @if ( $search != null )
                                    <div class="input-group-append">
                                        <a href="/backoffice/client" class="btn btn-outline-secondary"><span class="fa fa-arrows-rotate"></span> Lihat semua</a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="card-tools">
                        <div class="card-tools">
                            @if (auth()->user()->role_id == 2)
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#clientAdd">
                                <span class="fas fa-plus"></span> Tambah
                            </button>
                            @include('backoffice.client.modal.add')
                            @endif
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
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
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                    <ul>
                        <span>Tambah data gagal</span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if ( $search != null )
                    <div class="text-center">
                        <p>
                            Hasil pencarian dari: <b>{{ $search }}</b>
                        </p>
                    </div>
                @endif
                @if ( $clients->count() == 0 )
                    <div class="text-center">
                        <h2>
                            <b>-- Tidak ada data --</b>
                        </h2>
                    </div>
                @endif

                <div class="row">
                    @foreach ($clients as $client)
                    <div class="col-md-3 client">
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
                                <a href="{{Storage::disk('s3')->url($client->image)}}" data-title="{{ $client->name }}" data-lightbox="myclient">
                                    {{-- <img src="{{asset('http://103.127.96.59:9000/mled/'.$client->image)}}" alt="" 
                                    class="img-fluid rounded" style="height: 100px; width: 100%"> --}}
                                    <img src="{{ Storage::disk('s3')->url($client->image) }}" alt="" class="img-fluid object-fit-contain rounded" 
                                    style="height: 80px; display: block; margin-left: auto; margin-right: auto">
                                </a>
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
                                    <div class="p-1">
                                        <small>
                                            Link: <a href="{{ $client->link }}" target="_blank">{{ $client->link }}</a>
                                        </small>
                                    </div>
                                @endif
                                <hr>
                                <div class="d-flex">
                                    <a href="/backoffice/client/{{ $client->id }}/detail" class="btn btn-info btn-sm btn-block m-1">
                                        <i class="ion ion-eye"></i> Detail
                                    </a>
                                    
                                    <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                        data-target="#clientDelete{{$client->id}}">
                                        <span><i class="ion ion-android-delete"></i> Hapus</span>
                                    </button>
                                    @include('backoffice.client.modal.delete')
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="p-3">
                    {{ $clients->links() }}
                </div>

                {{-- <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <td> {{ $client->id }} </td>
                            <td>
                                <img src="{{asset('storage/image/client/'.$client->image)}}" height="100px" alt="">
                            </td>
                            <td> {{ $client->name }} </td>
                            <td>
                                <a href="{{ $client->link }}" target="_blank">{{ $client->link }}</a>
                            </td>
                            <td>
                                @if ($client->is_hidden == "0")
                                    <button class="btn btn-success btn-sm rounded btn-block">Tampilkan</button>
                                @else
                                    <button class="btn btn-danger btn-sm rounded btn-block">Tidak tampil</button>
                                @endif
                            </td>
                            <td>
                                <a href="/backoffice/client/{{ $client->id }}/detail" class="btn btn-info btn-sm"><i class="ion ion-eye"></i> Detail</a>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#clientEdit{{ $client->id }}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                @include('backoffice.client.modal.edit')
                                @if (auth()->user()->role_id == 2)
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#clientDelete{{$client->id}}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.client.modal.delete')
                                    
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                </table> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
