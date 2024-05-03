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
                    <h1>Varian {{ $productVariant->name }} spesifikasi data</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product" class="">Produk</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/variant/{{ $product->id }}" class="">Varian</a></li>
                    <li class="breadcrumb-item active">Spesifikasi</li>
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
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#variantSpecAdd">
                        <span class="fas fa-plus"></span> Tambah
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.product.variant.specification.modal.add')
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
                            <th>Spesifikasi</th>
                            <th>Keterangan</th>
                            @if (auth()->user()->role_id == 2)

                            <th>Opsi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pvSpecifications as $pvSpecification)
                        <tr>
                            <td> {{ $pvSpecification->id }} </td>
                            <td> {{ $pvSpecification->specification->name }} </td>
                            <td> {{ $pvSpecification->value }} </td>
                            @if (auth()->user()->role_id == 2)

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#variantSpecEdit{{ $pvSpecification->id }}">
                                    <span><i class="fas fa-edit"></i> Ubah</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.variant.specification.modal.edit')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#variantSpecDelete{{ $pvSpecification->id }}">
                                    <span><i class="ion ion-trash-a"></i> Hapus</span>
                                </button>
                                {{-- Modal --}}
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
