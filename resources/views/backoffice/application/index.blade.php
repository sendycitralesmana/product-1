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
        <div class="card card-outline card-primary">
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
                        <div class="card card-outline card-primary">
                            <div class="p-4 text-center">
                                @if ( $application->thumbnail != null )
                                    <a href="{{Storage::disk('s3')->url($application->thumbnail)}}" data-title="{{ $application->name }}" data-lightbox="myapplication">
                                        <img src="{{Storage::disk('s3')->url($application->thumbnail)}}" alt="" 
                                        class="img-fluid rounded" style="height: 210px; width: 90%">
                                    </a>
                                @else
                                    <a href="{{asset('images/no-image.jpg')}}" data-title="{{ $application->name }}" data-lightbox="myapplication">
                                        <img src="{{asset('images/no-image.jpg')}}" alt="" 
                                        class="img-fluid rounded" style="height: 210px; width: 90%">
                                    </a>
                                @endif
                            </div>
                            <div class="p-2 mb-2" style="height: 160px">
                                <small>{{ $application->date }}</small>
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
                            <div class="d-flex" style="border-top: 2px solid #0d6efd">
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

            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
