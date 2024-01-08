@extends('layouts/main')

@section('title', 'Edit Product Variant')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product Variant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product Variant</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Product Variant : ( Product {{ $productVariant->product->name }} )</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/product-variant/{{ $productVariant->id }}/update" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $productVariant->name}}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="{{ $productVariant->price}}">
                            @if($errors->has('price'))
                            <span class="help-block" style="color: red">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Long</label>
                            <input type="number" name="long" class="form-control" value="{{ $productVariant->long}}">
                            @if($errors->has('long'))
                            <span class="help-block" style="color: red">{{ $errors->first('long') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="number" name="weight" class="form-control" value="{{ $productVariant->weight}}">
                            @if($errors->has('weight'))
                            <span class="help-block" style="color: red">{{ $errors->first('weight') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Width</label>
                            <input type="number" name="width" class="form-control" value="{{ $productVariant->width}}">
                            @if($errors->has('width'))
                            <span class="help-block" style="color: red">{{ $errors->first('width') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Height</label>
                            <input type="number" name="height" class="form-control" value="{{ $productVariant->height}}">
                            @if($errors->has('height'))
                            <span class="help-block" style="color: red">{{ $errors->first('height') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
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
