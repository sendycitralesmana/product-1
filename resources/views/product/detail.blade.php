@extends('layouts/main')

@section('title', 'Product')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Detail Product</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                @if (Session::has('product'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $product->id }} </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->category->name }} </td>
                            <td> {!! html_entity_decode($product->description) !!} </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-product">
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('components.modals.products.edit')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Product End --}}

        {{-- Media Type Start--}}
        <div class="row">

            <div class="col-md-6">
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
                                <h3>{{ $mediaProductsC }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/product/media/{{ $product->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Media End --}}
            </div>
            
            <div class="col-md-6">
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
                                <h3>{{ $videoProductsC }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/product/video/{{ $product->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Video End --}}
            </div>

        </div>
        {{-- Media Type End --}}
        
        <div class="row">

            <div class="col-md-6">
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
                                <h3>{{ $productVariantsC }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/product/variant/{{ $product->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Variant End --}}
            </div>
            
            <div class="col-md-6">
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
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/product/application/{{ $product->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Application End --}}
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection