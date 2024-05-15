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
                    <h1>Detail Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $pCategory->id }}/product" class="">Produk</a></li>
                        <li class="breadcrumb-item active">Detail</li>
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
                            Kategori: <b>{{ $pCategory->name }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Product Start --}}
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Produk</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
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

                <div class="row">
                    <div class="col-md-8">
                        <!-- Box Comment -->
                        <div class="card card-widget">
                            <div class="card-header">
                                <div class="user-block">
                                    <h5><b>{{ $product->name }}</b></h5>
                                    <small>{{ $product->category->name }}</small>
                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning btn-sm" title="Ubah" data-toggle="modal"
                                        data-target="#productEdit{{ $product->id }}">
                                        <span><i class="fas fa-edit"></i></span> Ubah
                                    </button>
                                    {{-- Modal --}}
                                    @include('backoffice.product.modal.edit')
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="text-center">
                                    @if ( $product->thumbnail != null )
                                        <img src="{{ Storage::disk('s3')->url($product->thumbnail) }}" alt="" class="img-fluid rounded" style="height: 300px">
                                    @else
                                        <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-fluid rounded" style="height: 200px">
                                    @endif
                                </div>

                                @if ( $product->description == null )
                                    <div class="mt-2">
                                        <h4 class="text-center">
                                            <b>-- Tidak ada deskripsi --</b>
                                        </h4>
                                    </div>
                                @endif
                                <div> {!! html_entity_decode($product->description) !!} </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">
                        {{-- Media Start --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Keterangan</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="gambar-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/image">
                                            <div class="">
                                                Gambar
                                            </div>
                                        </a>
                                        <div class="">
                                            ({{ $images->count() }})
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="gambar-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/file">
                                            <div class="">
                                                Berkas
                                            </div>
                                        </a>
                                        <div class="">
                                            ({{ $files->count() }})
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                {{-- <div class="video-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="/backoffice/product/video/{{ $product->id }}">
                                            <div class="">
                                                Video
                                            </div>
                                        </a>
                                        <div class="">
                                            ({{ $product->video->count() }})
                                        </div>
                                    </div>
                                    <hr>
                                </div> --}}
                                <div class="variant-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant">
                                            <div class="">
                                                Varian
                                            </div>
                                        </a>
                                        <div class="">
                                            ({{ $product->variant->count() }})
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="application-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/application">
                                            <div class="">
                                                Proyek
                                            </div>
                                        </a>
                                        <div class="">
                                            ({{ $product->application->count() }})
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        {{-- Media End --}}
                    </div>

                </div>

            </div>
        </div>
        {{-- Product End --}}

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection
