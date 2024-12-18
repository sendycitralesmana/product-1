@extends('backoffice/layouts/main')

@section('title', 'Varian produkt')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Varian</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $pCategory->id }}/product" class="">Produk</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/detail" class="">Detail Produk</a></li>
                    <li class="breadcrumb-item active">Varian</li>
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
                <h3 class="card-title">Varian</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addProductVariant">
                        <span class="fas fa-plus"></span> Tambah
                    </button>
                    @include('backoffice.product.variant.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('variant'))
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
                            <th>Varian</th>
                            {{-- <th>Price</th>
                            <th>Long</th>
                            <th>Weight</th>
                            <th>Width</th>
                            <th>Height</th> --}}
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productVariants as $key => $productVariant)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $productVariant->name }} </td>
                            {{-- <td> Rp. {{ number_format($productVariant->price, 2, ",", ".") }} </td>
                            @if ( $productVariant->long == null )
                                <td> tidak ada </td>
                            @else
                                <td> {{ $productVariant->long }} </td>
                            @endif
                            @if ( $productVariant->weight == null )
                                <td> tidak ada </td>
                            @else
                                <td> {{ $productVariant->weight }} </td>
                            @endif
                            @if ( $productVariant->width == null )
                                <td> tidak ada </td>
                            @else
                                <td> {{ $productVariant->width }} </td>
                            @endif
                            @if ( $productVariant->height == null )
                                <td> tidak ada </td>
                            @else
                                <td> {{ $productVariant->height }} </td>
                            @endif --}}
                            <td>
                                <a href="/backoffice/product/variant/{{ $productVariant->id }}/export-pdf" target="_blank"
                                    class="btn btn-outline-danger btn-sm m-1">
                                    <i class="fa fa-file-pdf"></i> Export pdf
                                </a>
                                <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/{{ $productVariant->id }}/variant-specification"
                                    class="btn btn-primary btn-sm m-1">
                                    <i class="ion ion-eye"></i> Spesifikasi
                                </a>
                                <button type="button" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#editProductVariant{{ $productVariant->id }}">
                                    <span><i class="fa fa-edit"></i> Ubah</span>
                                </button>
                                @include('backoffice.product.variant.modal.edit')
                                <button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#productVariantDelete{{ $productVariant->id }}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.product.variant.modal.delete')
                                {{-- <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCopyProductVariant{{ $productVariant->id }}">
                                    <span class="fas fa-plus"></span> Copy dan tambah
                                </button>
                                @include('backoffice.product.variant.modal.add-copy') --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            {{-- <th>Price</th>
                            <th>Long</th>
                            <th>Weight</th>
                            <th>Width</th>
                            <th>Height</th> --}}
                            <th>Opsi</th>
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
