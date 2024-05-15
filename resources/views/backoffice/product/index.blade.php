@extends('backoffice/layouts/main')

@section('title', '- Produk')

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
                        <li class="breadcrumb-item"><a href="/backoffice/product/category" class="">Kategori</a></li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-between">
                            <div class="fakultas mr-4">
                                <h5>
                                    Kategori: <b>{{ $pCategory->name }}</b>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card card-outline card-primary">
                    <div class="card-header">

                        <h3 class="card-title">Data</h3>
                        <div class="card-tools">
                            @if (auth()->user()->role_id == 2)
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#productAdd">
                                <span class="fas fa-plus"></span> Tambah
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
                                    <th>Produk</th>
                                    <th>Gambar</th>
                                    <th>Berkas</th>
                                    <th>Varian</th>
                                    <th>Proyek</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        @if( $product->thumbnail != null )
                                        {{-- <img src="{{asset('storage/image/product/'.$product->thumbnail)}}" alt=""
                                            width="100px" height="100px"> --}}
                                        <img src="{{Storage::disk('s3')->url($product->thumbnail)}}" alt=""
                                            width="100px" height="100px">
                                        @else
                                        <img src="{{asset('images/no-image.jpg')}}" alt="" width="100px"
                                            height="100px">
                                        @endif
                                    </td>
                                    <td> {{ $product->name }} </td>
                                    <td> 
                                        @if ($product->media->where('type_id', 1)->count() != 0)
                                            {{ $product->media->where('type_id', 1)->count() }} Data
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td> 
                                        @if ($product->media->where('type_id', 2)->count() != 0)
                                            {{ $product->media->where('type_id', 2)->count() }} Data
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td> 
                                        @if ($product->variant->count() != 0)
                                            {{ $product->variant->count() }} Data
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td> 
                                        @if ($product->media->count() != 0)
                                            {{ $product->media->count() }} Data
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/detail"
                                            class="btn btn-primary btn-sm"><i class="ion ion-eye"></i> Detail</a>
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
                        </table>

                    </div>
                </div>
                
            </div>

        </div>


    </section>
    
</div>
@endsection
