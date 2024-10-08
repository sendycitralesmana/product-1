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
                                    <img src="{{ Storage::disk('s3')->url($client->image) }}" alt="" class="img-fluid object-fit-contain rounded" 
                                    style="height: 80px; display: block; margin-left: auto; margin-right: auto">
                                </a>
                                <div class="status mt-2 text-center">
                                    @if ( $client->is_hidden == "0" )
                                        <button class="badge badge-light">
                                            <a href="/backoffice/client/{{ $client->id }}/hide">
                                                <i class="fa fa-eye"></i> Ditampilkan
                                            </a>
                                        </button>
                                    @else
                                        <button class="badge badge-light">
                                            <a href="/backoffice/client/{{ $client->id }}/show">
                                                <i class="fa fa-eye-slash"></i> Tidak ditampilkan
                                            </a>
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

            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
