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
                    <h1>Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-8">
                
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Produk Data</h3>
                        <div class="card-tools">
                            @if (auth()->user()->role_id == 2)
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#productAdd">
                                <span>+</span>
                            </button>
                            @include('backoffice.product.modal.add')
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
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                            <ul>
                                <span>Gagal tambah data</span>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

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
                                @foreach ($products as $product)
                                <tr>
                                    <td> {{ $product->id }} </td>
                                    <td>
                                        @if( $product->thumbnail != null )
                                        <img src="{{asset('storage/image/product/'.$product->thumbnail)}}" alt=""
                                            width="100px" height="100px">
                                        @else
                                        <img src="{{asset('storage/image/default.png')}}" alt="" width="100px"
                                            height="100px">
                                        @endif
                                    </td>
                                    <td> {{ $product->name }} </td>
                                    <td>
                                        <a href="/backoffice/product/{{ $product->id }}/detail"
                                            class="btn btn-info btn-sm"><i class="ion ion-eye"></i> Detail</a>
                                        @if (auth()->user()->role_id == 2)
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#productDelete{{ $product->id }}">
                                            <span><i class="ion ion-android-delete"></i> Hapus</span>
                                        </button>
                                        @include('backoffice.product.modal.delete')
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Opsi</th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                    <div class="card-footer">

                    </div>
                </div>
                
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Kategori</h3>
                        <div class="card-tools">
                            @if (auth()->user()->role_id == 2)
                            <!-- Button trigger modal -->
                            <button title="Tambah kategori" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#categoryAdd">
                                <span>+</span>
                            </button>
                            {{-- Modal --}}
                            @include('backoffice.product.category.modal.add')
                            @endif
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('category'))
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

                        <div>
                            <a href="/backoffice/product">Lihat semua ( {{ $productC->count() }} )</a>
                            <hr>
                        </div>
                        @foreach ($productCategories as $productCategory)
                            <div class="">
                                <div class="d-flex justify-content-between">
                                    <a href="/backoffice/product/category/{{ $productCategory->id }}">{{ $productCategory->name }} ( {{ $productCategory->product->count() }} )</a>
                                    <button title="Edit" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#categoryEdit{{ $productCategory->id }}">
                                        <span><i class="ion ion-android-create"></i> </span>
                                    </button>
                                    @include('backoffice.product.category.modal.edit')
                                </div>
                            <div>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
