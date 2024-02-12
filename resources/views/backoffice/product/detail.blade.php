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
                        <li class="breadcrumb-item"><a href="/backoffice/product" class="text-secondary">Produk</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        {{-- Product Start --}}
        <div class="card">
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
                                    <h5>{{ $product->name }}</h5>
                                    <small>{{ $product->category->name }}</small>
                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal"
                                        data-target="#productEdit{{ $product->id }}">
                                        <span><i class="ion ion-android-create"></i></span>
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
                                @if ( $product->thumbnail != null )
                                    <img src="{{ asset('storage/image/product/'. $product->thumbnail) }}" alt="">
                                @else
                                    <img src="{{ asset('images/default.png') }}" alt="">
                                @endif
                                {{-- <h4 class="mt-3"> {{ $post->title }} </h4> --}}
                                <p> {!! html_entity_decode($product->description) !!} </p>
                                {{-- <span class="float-right text-muted">{{ $post->comment->count() }} comments</span>
                                --}}
                            </div>
                            <!-- /.card-body -->

                            <!-- /.card-footer -->
                            <div class="card-footer">
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
                                <div class="media-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="/backoffice/product/media/{{ $product->id }}">
                                            <div class="">
                                                Media
                                            </div>
                                        </a>
                                        <div class="">
                                            ({{ $product->media->count() }})
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="video-body">
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
                                </div>
                                <div class="variant-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="/backoffice/product/variant/{{ $product->id }}">
                                            <div class="">
                                                Variant
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
                                        <a href="/backoffice/product/application/{{ $product->id }}">
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
