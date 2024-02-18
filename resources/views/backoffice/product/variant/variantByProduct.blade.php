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
                    <h1>{{ $product->name }} varian data</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product" class="">Produk</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/{{ $product->id }}/detail" class="">Detail</a></li>
                    <li class="breadcrumb-item active">Varian</li>
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
                <h3 class="card-title">Varian</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <button title="Add Variant" type="button" class="btn btn-default" data-toggle="modal" data-target="#addProductVariant">
                        <span class="fas fa-plus"></span>
                    </button>
                    {{-- Modal --}}
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
                            <th>Nama</th>
                            <th>Price</th>
                            <th>Long</th>
                            <th>Weight</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productVariants as $productVariant)
                        <tr>
                            <td> {{ $productVariant->id }} </td>
                            <td> {{ $productVariant->name }} </td>
                            <td> Rp. Rp. {{ number_format($productVariant->price, 2, ",", ".") }} </td>
                            <td> {{ $productVariant->long }} </td>
                            <td> {{ $productVariant->weight }} </td>
                            <td> {{ $productVariant->width }} </td>
                            <td> {{ $productVariant->height }} </td>
                            <td>
                                <a href="/backoffice/product/vs/{{ $productVariant->id }}"
                                    class="btn btn-info btn-sm"><i class="ion ion-eye"></i> Spesifikasi</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProductVariant{{ $productVariant->id }}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.variant.modal.edit')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#productVariantDelete{{ $productVariant->id }}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.variant.modal.delete')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Price</th>
                            <th>Long</th>
                            <th>Weight</th>
                            <th>Width</th>
                            <th>Height</th>
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
