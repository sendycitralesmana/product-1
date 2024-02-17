@extends('backoffice/layouts/main')

@section('title', 'Galeri')

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
                <h3 class="card-title">Data Galeri</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#galleryAdd">
                        <span>+</span>
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

                {{-- @foreach ($galleries as $gallery)
                    
                <div class="gallery">
                    <a href="{{asset('storage/image/gallery/'.$gallery->image)}}" data-lightbox="mygallery">
                        <img src="{{asset('storage/image/gallery/'.$gallery->image)}}" alt="" width="100px"
                            height="100px">
                    </a>
                </div>
                @endforeach --}}


                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                        <tr>
                            <td> {{ $gallery->id }} </td>
                            <td>
                                <a data-lightbox="mygallery" data-title="{{ $gallery->name }}" href="{{asset('storage/image/gallery/'.$gallery->image)}}">
                                    <img src="{{asset('storage/image/gallery/'.$gallery->image)}}" alt="" width="100px"
                                        height="100px">
                                </a>
                            </td>
                            <td> {{ $gallery->name }} </td>
                            <td>
                                @if (auth()->user()->role_id == 2)
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#galleryEdit{{$gallery->id}}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                @include('backoffice.gallery.modal.edit')
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#galleryDelete{{$gallery->id}}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.gallery.modal.delete')

                                @endif
                            </td>
                        </tr>

                        

                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                </table>
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
