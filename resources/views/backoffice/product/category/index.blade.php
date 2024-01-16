@extends('backoffice/layouts/main')

@section('title', 'Category')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12 text-center">
                    <h1>Category Data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                        <!-- Button trigger modal -->
                        <button title="Add Variant" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#categoryAdd">
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
                @if (Session::has('status'))
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
                            <th>Description</th>
                            <th>Thumbnail</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsCategories as $productCategory)
                        <tr>
                            <td> {{ $productCategory->id }} </td>
                            <td> {{ $productCategory->name }} </td>
                            <td> {!! html_entity_decode($productCategory->description) !!} </td>
                            <td> 
                                @if( $productCategory->thumbnail != '' )
                                    <img src="{{asset('storage/image/category/'.$productCategory->thumbnail)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('storage/image/default.png')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td>
                                {{-- <a href="/product-category/{{ $productCategory->id }}/detail" class="btn btn-primary btn-sm">Detail</a> --}}
                                @if (auth()->user()->role_id == 2)
                                    <!-- Button trigger modal -->
                                    <button title="Add Variant" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#categoryEdit{{ $productCategory->id }}">
                                        <span>Edit</span>
                                    </button>
                                    {{-- Modal --}}
                                    @include('backoffice.product.category.modal.edit')
                                    {{-- <a href="/product-category/{{ $data->id }}/delete" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm">Delete</a> --}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Thumbnail</th>
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
