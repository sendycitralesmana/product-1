@extends('backoffice/layouts/main')

@section('title', '- Proyek')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Proyek</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Proyek</li>
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
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data</h3>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div>
                        <form class="form-inline" action="/backoffice/application">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="text"
                                    placeholder="Cari judul" name="title" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                @if ( $title != null )
                                <div class="input-group-append">
                                    <a href="/backoffice/application" class="btn btn-outline-secondary"><span class="arrows-rotate"></span> Lihat semua</a>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="card-tools">
                        <div class="card-tools">
                            @if (auth()->user()->role_id == 2)
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#applicationAdd">
                                <span class="fas fa-plus"></span> Tambah
                            </button>
                            {{-- Modal --}}
                            @include('backoffice.application.modal.add')
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

                @if ( $title != null )
                    <div class="text-center">
                        <p>
                            Hasil pencarian dari: <b>{{ $title }}</b>
                        </p>
                    </div>
                @endif
                @if ( $applications->count() == 0 )
                    <div class="text-center">
                        <h2>
                            <b>-- Tidak ada data --</b>
                        </h2>
                    </div>
                @endif
                <div class="row">
                    @foreach ($applications as $application)
                    <div class="col-md-4 application">
                        <div class="card">
                            <div class="">
                                <a href="{{asset('http://103.127.96.59:9000/mled/'.$application->thumbnail)}}" data-title="{{ $application->name }}" data-lightbox="myapplication">
                                    <img src="{{asset('http://103.127.96.59:9000/mled/'.$application->thumbnail)}}" alt="" 
                                    class="img-fluid rounded" style="height: 250px; width: 100%">
                                </a>
                            </div>
                            <div class="p-1" style="height: 160px">
                                <small>{{ $application->time }}</small>
                                <h5 class="" style="overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp: 2;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;">
                                    <b>{{ $application->name }}</b>
                                </h5>
                                <div style="overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp: 3;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;">
                                    {!! html_entity_decode($application->description) !!}
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="/backoffice/application/{{ $application->id }}/detail" class="btn btn-info btn-sm btn-block m-1">
                                    <i class="ion ion-ios-eye"></i> Detail
                                </a>
                                <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                    data-target="#applicationDelete{{$application->id}}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.application.modal.delete')
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="p-3">
                    {{ $applications->links() }}
                </div>

                {{-- <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Area</th>
                            <th>Waktu</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                        <tr>
                            <td> {{ $application->id }} </td>
                            <td> 
                                @if( $application->thumbnail != '' )
                                    <img src="{{asset('storage/image/application/'.$application->thumbnail)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('storage/image/default.png')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td> {{ $application->name }} </td>
                            <td> {{ $application->area }} </td>
                            <td> {{ $application->time }} </td>
                            <td>
                                @if (auth()->user()->role_id == 2)
                                <a href="/backoffice/application/{{ $application->id }}/detail" class="btn btn-info btn-sm"><i class="ion ion-ios-eye"></i> Detail</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#applicationDelete{{ $application->id }}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.application.modal.delete')  
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Area</th>
                            <th>Waktu</th>
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
