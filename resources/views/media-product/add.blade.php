@extends('layouts/main')

@section('title', 'Add Media Product ')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Media Product </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Media Product </li>
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
                <h3 class="card-title">Add Media Product </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/media-product/createMultiple" enctype="multipart/form-data">
                    @csrf
                    {{-- {{ csrf_field() }}
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
                            <label>Type</label>
                            <select name="type_id" class="form-control">
                                <option value="">-- Select Type --</option>
                                @foreach ($type as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('type_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Url</label>
                            <input type="text" name="url" class="form-control" placeholder="Enter url">
                            @if($errors->has('url'))
                            <span class="help-block" style="color: red">{{ $errors->first('url') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <button type="submit" class="btn btn-success">Save</button> --}}
                    <table class="table table-bordered" id="table">
                        <tr>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="product_id[]" class="form-control">
                                    <option value="">-- Select Product --</option>
                                    @foreach ($product as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('product_id[]'))
                            <span class="help-block" style="color: red">{{ $errors->first('product_id[]') }}</span>
                            @endif
                            </td>
                            <td>
                                <select name="type_id[]" class="form-control">
                                    <option value="">-- Select Type --</option>
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="name[]" class="form-control" placeholder="Enter name" value="{{ old('name[]') }}">
                                    @if($errors->has('name[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                                @endif
                            </td>

                            <td>
                                <input type="text" name="url[]" class="form-control" placeholder="Enter url">
                            </td>
                            
                            <td><button type="button" name="add" id="add" class="btn btn-info">Add More</button></td>
                        </tr>
                    </table>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    var i = 0;
    $('#add').click(function(){
        ++i;
        $("#table").append(`
        <tr>
            <td>
                <select name="product_id[]" class="form-control">
                    <option value="">-- Select Product --</option>
                    @foreach ($product as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_id[${i}]'))
            <span class="help-block" style="color: red">{{ $errors->first('product_id[${i}]') }}</span>
            @endif
            </td>

            <td>
                <select name="type_id[]" class="form-control">
                    <option value="">-- Select Type --</option>
                    @foreach ($type as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </td>

            <td>
                <input type="text" name="name[]" class="form-control" placeholder="Enter name">
            </td>

            <td>
                <input type="text" name="url[]" class="form-control" placeholder="Enter url">
            </td>
            
            <td><button type="button" name="add" id="add" class="btn btn-danger remove-tr remove-table-row">Delete</button></td>
        </tr>`);
    });

    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    }); 
</script>

@endsection
