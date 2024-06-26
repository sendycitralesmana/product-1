@extends('backoffice/layouts/main')

@section('title', 'Produk')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produk</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/application" class="">Proyek</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/application/{{ $application->id }}/detail" class="">Detail Proyek</a></li>
                    <li class="breadcrumb-item active">Data Produk</li>
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
                <h3 class="card-title">Produk</h3>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#productAdd">
                        <span class="fa fa-plus"></span> Tambah
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.application.product.modal.add')
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('product'))
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
                            <th>Gambar</th>
                            <th>Produk</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aProducts as $key => $product)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td>
                                <img src="{{Storage::disk('s3')->url($product->product->thumbnail)}}" alt="" width="80px" height="80px">
                            </td>
                            <td> {{ $product->product->name }} </td>
                            <td>
                                <a href="/backoffice/product/{{ $product->product->id }}/detail" class="btn btn-primary btn-sm"><i class="ion ion-eye"></i> Detail</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#productDelete{{ $product->id }}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.application.product.modal.delete')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
