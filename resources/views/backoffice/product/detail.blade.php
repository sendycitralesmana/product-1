@extends('backoffice/layouts/main')

@section('title', 'Product')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Product Data</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product" class="text-secondary">Product</a></li>
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
                <h3 class="card-title">Product</h3>
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
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $product->id }} </td>
                            <td> 
                                @if( $product->thumbnail != null )
                                    <img src="{{asset('storage/image/product/'.$product->thumbnail)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('storage/image/default.png')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->category->name }} </td>
                            <td> {!! html_entity_decode($product->description) !!} </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#productEdit{{ $product->id }}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.modal.edit')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Product End --}}

        {{-- Media Type Start--}}
        <div class="row">

            <div class="col-md-3">
                {{-- Media Start --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Media</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="small-box">
                            <div class="inner">
                                {{-- <h3>{{ $mediaProductsC }}</h3> --}}
                                <h3>{{ $product->media->count() }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-folder"></i>
                            </div>
                            <a href="/backoffice/product/media/{{ $product->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Media End --}}
            </div>
            
            <div class="col-md-3">
                {{-- Video Start --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Video</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="small-box">
                            <div class="inner">
                                {{-- <h3>{{ $videoProductsC }}</h3> --}}
                                <h3>{{ $product->video->count() }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-folder"></i>
                            </div>
                            <a href="/backoffice/product/video/{{ $product->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Video End --}}
            </div>

            <div class="col-md-3">
                {{-- Variant Start --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Variant</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="small-box">
                            <div class="inner">
                                {{-- <h3>{{ $productVariantsC }}</h3> --}}
                                <h3>{{ $product->variant->count() }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-apps"></i>
                            </div>
                            <a href="/backoffice/product/variant/{{ $product->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Variant End --}}
            </div>
            
            <div class="col-md-3">
                {{-- Application Start --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Application</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $product->application->count() }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-apps"></i>
                            </div>
                            <a href="/backoffice/product/application/{{ $product->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Application End --}}
            </div>

        </div>
        {{-- Media Type End --}}

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection