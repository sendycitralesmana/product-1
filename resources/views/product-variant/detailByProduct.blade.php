@extends('layouts/main')

@section('title', 'Product Variant')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>{{ $product->name }} Variant Data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $product->name }}</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <!-- Button trigger modal -->
                    <button title="Add Variant" type="button" class="btn btn-default" data-toggle="modal" data-target="#addProductVariant">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('components.modals.product-variant.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('variant'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Long</th>
                            <th>Weight</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productVariants as $productVariant)
                        <tr>
                            <td> {{ $productVariant->id }} </td>
                            <td> {{ $productVariant->name }} </td>
                            <td> {{ $productVariant->price }} </td>
                            <td> {{ $productVariant->long }} </td>
                            <td> {{ $productVariant->weight }} </td>
                            <td> {{ $productVariant->width }} </td>
                            <td> {{ $productVariant->height }} </td>
                            <td>
                                <a href="/pv-specification/variant:{{ $productVariant->id }}"
                                    class="btn btn-info btn-sm">Specification</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProductVariant{{ $productVariant->id }}">
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('components.modals.product-variant.edit')
                                {{-- <a href="/product-variant/{{ $productVariant->id }}/delete"
                                    onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Long</th>
                            <th>Weight</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
