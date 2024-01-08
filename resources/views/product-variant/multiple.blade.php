@extends('layouts/main')

@section('title', 'Add Product')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title">Add Product</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/product-variant/store" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <table class="table table-bordered" id="dynamicAddRemove">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Long</th>
                                <th>Weight</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control">
                                        <option value="" >-- Select Product --</option>
                                        @foreach ($product as $data)
                                            <option name="moreFields[0][product_id]" value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="moreFields[0][name]" placeholder="Enter name"
                                        class="form-control" />
                                </td>
                                <td>
                                    <input type="text" name="moreFields[0][price]" placeholder="Enter price"
                                        class="form-control" />
                                </td>
                                <td>
                                    <input type="text" name="moreFields[0][long]" placeholder="Enter long"
                                        class="form-control" />
                                </td>
                                <td>
                                    <input type="text" name="moreFields[0][weight]" placeholder="Enter weight"
                                        class="form-control" />
                                </td>
                                <td>
                                    <input type="text" name="moreFields[0][width]" placeholder="Enter width"
                                        class="form-control" />
                                </td>
                                <td>
                                    <input type="text" name="moreFields[0][height]" placeholder="Enter height"
                                        class="form-control" />
                                </td>
                                <td><button type="button" name="add" id="add-btn" class="btn btn-success">+</button></td>
                            </tr>
                        </table>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#add-btn").click(function () {

        ++i;

        $("#dynamicAddRemove").append(
            `<tr>
                <td>
                    <select class="form-control">
                        <option value="" >-- Select Product --</option>
                        @foreach ($product as $data)
                            <option name="moreFields[' + i + '][product_id]" value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="moreFields[' + i + '][name]" placeholder="Enter title" class="form-control" />
                </td>
                <td>
                    <input type="number" name="moreFields[' + i + '][price]" placeholder="Enter title" class="form-control" />
                </td>
                <td>
                    <input type="number" name="moreFields[' + i + '][long]" placeholder="Enter title" class="form-control" />
                </td>
                <td>
                    <input type="number" name="moreFields[' + i + '][weight]" placeholder="Enter title" class="form-control" />
                </td>
                <td>
                    <input type="number" name="moreFields[' + i + '][width]" placeholder="Enter title" class="form-control" />
                </td>
                <td>
                    <input type="number" name="moreFields[' + i + '][height]" placeholder="Enter desc" class="form-control" />
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-tr">-</button>
                </td>
            </tr>`
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection