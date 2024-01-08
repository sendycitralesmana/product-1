@extends('layouts/main')

@section('title', 'Edit Specification')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Specification</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Specification</li>
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
                <h3 class="card-title">Edit Specification</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/pv-specification/{{ $pvSpecification->id }}/update" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product</label>
                            <input type="text" name="product_id" class="form-control" readonly value="{{ $pvSpecification->product->name}}">
                            @if($errors->has('product_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('product_id') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Specification</label>
                                    <input type="text" name="specification_id" class="form-control" readonly value="{{ $pvSpecification->specification->name}}">
                                    @if($errors->has('specification_id'))
                                    <span class="help-block" style="color: red">{{ $errors->first('specification_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Value</label>
                                    <input type="text" name="value" class="form-control" value="{{ $pvSpecification->value}}">
                                    @if($errors->has('value'))
                                    <span class="help-block" style="color: red">{{ $errors->first('value') }}</span>
                                    @endif
                                </div>
                            </div>
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
