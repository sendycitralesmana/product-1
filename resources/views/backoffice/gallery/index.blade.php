@extends('backoffice/layouts/main')

@section('title', '- Galeri')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Galeri</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Galeri</li>
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
                <h3 class="card-title">Data</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <button type="button" title="Tambah data" class="btn btn-success btn-sm" data-toggle="modal" data-target="#galleryAdd">
                        <span class="fa fa-plus"></span> Tambah
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.gallery.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('gallery'))
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

                <div class="row">
                    @foreach ($galleries as $gallery)
                    <div class="col-md-3 gallery">
                        <div class="card">
                            <div class="">
                                <a href="{{asset('http://103.127.96.59:9000/mled/'.$gallery->image)}}" data-title="{{ $gallery->name }}" data-lightbox="mygallery">
                                    <img src="{{asset('http://103.127.96.59:9000/mled/'.$gallery->image)}}" alt="" 
                                    class="img-fluid rounded" style="height: 200px; width: 100%">
                                </a>
                            </div>
                            <div class="p-1">
                                {{ $gallery->image }}
                            </div>
                            <div class="d-flex">
                                <button type="button" class="btn btn-warning btn-sm btn-block m-1" data-toggle="modal"
                                    data-target="#galleryEdit{{$gallery->id}}">
                                    <span><i class="fas fa-edit"></i> Ubah</span>
                                </button>
                                @include('backoffice.gallery.modal.edit')
                                <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                    data-target="#galleryDelete{{$gallery->id}}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.gallery.modal.delete')
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="p-3">
                    {{ $galleries->links() }}
                </div>

            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
