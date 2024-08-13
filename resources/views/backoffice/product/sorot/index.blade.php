@extends('backoffice/layouts/main')

@section('title', '- Produk')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sorot Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Sorot Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Produk</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

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
                                @foreach ($productsNonSorot as $key => $product)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        @if( $product->thumbnail != null )
                                        <img src="{{Storage::disk('s3')->url($product->thumbnail)}}" alt=""
                                            width="100px" height="100px">
                                        @else
                                        <img src="{{asset('images/no-image.jpg')}}" alt="" width="100px" height="100px">
                                        @endif
                                    </td>
                                    <td> {{ $product->name }} </td>
                                    <td>
                                        {{-- <a href="/backoffice/sorot-product/{{ $product->id }}/sorot" class="btn
                                        btn-success btn-sm ">
                                        <i class="fas fa-check"></i> Sorot Produk
                                        </a> --}}
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#productSorot{{ $product->id }}">
                                            <span><i class="fas fa-check"></i> Sorot Produk</span>
                                        </button>
                                        @include('backoffice.product.sorot.modal.sorot')

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Produk Yang Disorot
                            <span class="badge badge-primary">{{ $productsSorot->count() }}</span> / <span
                                class="badge badge-primary">10</span>
                        </h3>
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

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            @if ($productsSorot->isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <p>
                                            <b> -- Tidak ada data -- </b>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                            @else
                            <tbody>
                                @foreach ($productsSorot as $key => $product)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        @if( $product->thumbnail != null )
                                        <img src="{{Storage::disk('s3')->url($product->thumbnail)}}" alt=""
                                            width="100px" height="100px">
                                        @else
                                        <img src="{{asset('images/no-image.jpg')}}" alt="" width="100px" height="100px">
                                        @endif
                                    </td>
                                    <td> {{ $product->name }} </td>
                                    <td>
                                        {{-- <a href="/backoffice/sorot-product/{{ $product->id }}/non-sorot" class="btn
                                        btn-danger btn-sm">
                                        <i class="fas fa-times"></i> Hapus Sorot Produk
                                        </a> --}}
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#productSorotHapus{{ $product->id }}">
                                            <span><i class="fas fa-times"></i> Hapus Sorot Produk</span>
                                        </button>
                                        @include('backoffice.product.sorot.modal.non-sorot')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@endsection
