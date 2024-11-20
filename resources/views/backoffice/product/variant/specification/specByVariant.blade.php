@extends('backoffice/layouts/main')

@section('title', 'Spesifikasi varian')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Varian Spesifikasi</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/detail" class="">Detail Produk</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant" class="">Varian</a></li>
                    <li class="breadcrumb-item active">Spesifikasi</li>
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
                    <div class="produk mr-4">
                        <h5>
                            Varian: <b>{{ $variant->name }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Data</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/{{ $variant->id }}/variant-specification/specification"
                        class="btn btn-primary btn-sm"><i class="fa fa-list"></i> Daftar spesifikasi</a>
                    {{-- <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/{{ $variant->id }}/variant-specification/copy-specification"
                        class="btn btn-success btn-sm"><i class="fa fa-copy"></i> Copy spesifikasi</a> --}}
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#variantSpecAdd">
                        <span class="fas fa-plus"></span> Tambah spesifikasi
                    </button>
                    @include('backoffice.product.variant.specification.modal.add')
                    @if ($pvSpecifications->count() == 0)
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#copySpec">
                            <span class="fas fa-copy"></span> Copy spesifikasi
                        </button>
                        @include('backoffice.product.variant.specification.modal.copySpec')
                        {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#copySpec2">
                            <span class="fas fa-plus"></span> Copy spesifikasi
                        </button>
                        @include('backoffice.product.variant.specification.modal.copySpec2') --}}
                    @else
                        <button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#variantSpecClear{{ $variant->id }}">
                            <span><i class="ion ion-trash-a"></i> Hapus semua spesifikasi</span>
                        </button>
                        @include('backoffice.product.variant.specification.modal.clear')
                    @endif
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('status'))
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
                            <th>Spesifikasi </th>
                            <th>Keterangan</th>
                            @if (auth()->user()->role_id == 2)

                            <th>Opsi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pvSpecifications as $key => $pvSpecification)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $pvSpecification->specification->name }} </td>
                            <td> {{ $pvSpecification->value }} </td>
                            @if (auth()->user()->role_id == 2)

                            <td>
                                <button type="button" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#variantSpecEdit{{ $pvSpecification->id }}">
                                    <span><i class="fas fa-edit"></i> Ubah</span>
                                </button>
                                @include('backoffice.product.variant.specification.modal.edit')
                                <button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#variantSpecDelete{{ $pvSpecification->id }}">
                                    <span><i class="ion ion-trash-a"></i> Hapus</span>
                                </button>
                                @include('backoffice.product.variant.specification.modal.delete')
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Spesifikasi</th>
                            <th>Keterangan</th>
                            @if (auth()->user()->role_id == 2)

                            <th>Opsi</th>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
