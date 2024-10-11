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
                            <th>Category Product</th>
                            <th>Product</th>
                            <th>Variant</th>
                            @if (auth()->user()->role_id == 2)

                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($variants as $key => $variant)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $variant->product->category->name }} </td>
                            <td> {{ $variant->product->name }} </td>
                            <td> {{ $variant->name }} </td>
                            @if (auth()->user()->role_id == 2)
                            @endif
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
