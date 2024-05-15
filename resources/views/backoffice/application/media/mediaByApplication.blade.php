@extends('backoffice/layouts/main')

@section('title', 'Gambar Proyek')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Gambar</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/application" class="">Proyek</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/application/{{ $application->id }}/detail" class="">Detail Proyek</a></li>
                    <li class="breadcrumb-item active">Gambar</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="d-flex justify-between">
                    <div class="fakultas mr-4">
                        <h5>
                            Proyek: <b>{{ $application->name }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"> Gambar</h3>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mediaAdd">
                        <span class="fa fa-plus"></span> Tambah
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.application.media.modal.add')
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

                <div class="row">

                    @if ( $images->count() == 0 )
                        <div class="text-center col-md-12">
                            <h4 class="text-center">
                                <b>-- Tidak ada Gambar --</b>
                            </h4>
                        </div>
                    @else
                        @foreach ($images as $image)

                            <div class="col-md-3 gallery">
                                <div class="card card-primary card-outline">
                                    <div class="p-4 text-center">
                                        <a href="{{ Storage::disk('s3')->url($image->url) }}" data-title="{{ $image->name }}" data-lightbox="mygallery">
                                            <img src="{{ Storage::disk('s3')->url($image->url) }}" alt="" 
                                            class="img-fluid rounded" style="height: 150px; width: 90%">
                                        </a>
                                    </div>
                                    <div class="d-flex" style="border-top: 2px solid #0d6efd">
                                        <button type="button" class="btn btn-warning btn-sm btn-block m-1" data-toggle="modal"
                                            data-target="#mediaEdit{{$image->id}}">
                                            <span><i class="fas fa-edit"></i> Ubah</span>
                                        </button>
                                        @include('backoffice.application.media.modal.edit')
                                        <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                            data-target="#mediaDelete{{$image->id}}">
                                            <span><i class="ion ion-android-delete"></i> Hapus</span>
                                        </button>
                                        @include('backoffice.application.media.modal.delete')
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>

                <div class="p-3">
                    {{ $images->links() }}
                </div>

            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
