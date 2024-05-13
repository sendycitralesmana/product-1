@extends('backoffice/layouts/main')

@section('title', 'Berkas Produk')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Berkas</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $pCategory->id }}/product" class="">Produk</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/detail" class="">Detail Produk</a></li>
                    <li class="breadcrumb-item active">Berkas</li>
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
                    <div class="produk mr-4">
                        <h5>
                            Kategori: <b>{{ $pCategory->name }}</b>
                        </h5>
                    </div>
                    <div class="produk mr-4">
                        <h5>
                            Produk: <b>{{ $product->name }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"> Berkas</h3>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#fileAdd">
                        <span class="fa fa-plus"></span> Tambah
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.product.file.modal.add')
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

                    @if ($files->count() == 0)
                        <div class="col-md-12">
                            <h4 class="text-center">
                                <b>-- Tidak ada berkas --</b>
                            </h4>
                        </div>
                    @endif

                    @foreach ($files as $file)
                    <div class="col-md-3 gallery">
                        <div class="card">
                            <div class="p-4 text-center">
                                <img src="{{asset('images/pdf.png')}}" alt="" 
                                    class="img-fluid rounded" style="height: 150; width: 150px">
                            </div>
                            <div class="p-1">
                                {{ $file->name }}
                            </div>
                            <div class="d-flex">
                                <button type="button" class="btn btn-warning btn-sm btn-block m-1" data-toggle="modal"
                                    data-target="#fileEdit{{$file->id}}">
                                    <span><i class="edit"></i> Ubah</span>
                                </button>
                                @include('backoffice.product.file.modal.edit')
                                <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                    data-target="#fileDelete{{$file->id}}">
                                    <span><i class="trash"></i> Hapus</span>
                                </button>
                                @include('backoffice.product.file.modal.delete')
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="p-3">
                    {{ $files->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
