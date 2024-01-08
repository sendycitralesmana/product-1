@extends('layouts/main')

@section('title', 'Product Variant')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Variant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Variant</li>
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
                <h3 class="card-title">Product Variant</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/product-variant/create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product</label>
                            <select name="product_id" class="form-control">
                                <option value="">-- Select Product --</option>
                                @foreach ($product as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('product_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter price" value="{{ old('price') }}">
                            @if($errors->has('price'))
                            <span class="help-block" style="color: red">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Long</label>
                            <input type="number" name="long" class="form-control" placeholder="Enter long" value="{{ old('long') }}">
                            @if($errors->has('long'))
                            <span class="help-block" style="color: red">{{ $errors->first('long') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="number" name="weight" class="form-control" placeholder="Enter weight" value="{{ old('weight') }}">
                            @if($errors->has('weight'))
                            <span class="help-block" style="color: red">{{ $errors->first('weight') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Width</label>
                            <input type="number" name="width" class="form-control" placeholder="Enter width" value="{{ old('width') }}">
                            @if($errors->has('width'))
                            <span class="help-block" style="color: red">{{ $errors->first('width') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Height</label>
                            <input type="number" name="height" class="form-control" placeholder="Enter height" value="{{ old('height') }}">
                            @if($errors->has('height'))
                            <span class="help-block" style="color: red">{{ $errors->first('height') }}</span>
                            @endif
                        </div>
                        {{-- <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th><p>Product</p></th>
                                    <th colspan="6">
                                        <select required  class="form-control">
                                            <option value="" >-- Select Product --</option>
                                            @foreach ($product as $data)
                                                <option name="product_id" value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Long</th>
                                    <th>Weight</th>
                                    <th>Width</th>
                                    <th>Height</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="name" required class="form-control" placeholder="Enter Name" value="{{ old('name') }}"></td>
                                    <td><input type="number" name="price" required class="form-control" placeholder="Enter Price" value="{{ old('price') }}"></td>
                                    <td><input type="number" name="long" required class="form-control" placeholder="Enter Long" value="{{ old('long') }}"></td>
                                    <td><input type="number" name="weight" required class="form-control" placeholder="Enter Weight" value="{{ old('weight') }}"></td>
                                    <td><input type="number" name="width" required class="form-control" placeholder="Enter Width" value="{{ old('width') }}"></td>
                                    <td><input type="number" name="height" required class="form-control" placeholder="Enter Height" value="{{ old('height') }}"></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-sm btn-info btn-block">+</button></td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </div>
                    <!-- /.card-body -->
                    <button type="submit" class="btn btn-success">Save</button>
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

{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    var i = 0;
    $('#add').click(function(){
        ++i;
        $("#table").append('<tr><td><input type="text" name="name[]" required class="form-control" placeholder="Enter Name" value="{{ old('name') }}"></td><td><input type="number" name="price[]" required class="form-control" placeholder="Enter Price" value="{{ old('price') }}"></td><td><input type="number" name="long[]" required class="form-control" placeholder="Enter Long" value="{{ old('long') }}"></td><td><input type="number" name="weight[]" required class="form-control" placeholder="Enter Weight" value="{{ old('weight') }}"></td><td><input type="number" name="width[]" required class="form-control" placeholder="Enter Width" value="{{ old('width') }}"></td><td><input type="number" name="height[]" required class="form-control" placeholder="Enter Height" value="{{ old('height') }}"></td><td><button type="button" class="btn btn-danger remove-tr remove-table-row btn-block">-</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    }); 
</script> --}}

@endsection
