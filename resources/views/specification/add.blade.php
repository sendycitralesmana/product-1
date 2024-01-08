@extends('layouts/main')

@section('title', 'Specification')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Specification</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Specification</li>
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
                <h3 class="card-title">Specification</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/specification/create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">

                        <table class="table table-bordered" id="table">
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="name[]" class="form-control" placeholder="Enter Name" value="{{ old('name[]') }}">
                                    @if($errors->has('name[]'))
                                     <span class="help-block" style="color: red">error</span>
                                @endif
                                </td>
                                
                                <td><button type="button" name="add" id="add" class="btn btn-info">Add More</button></td>
                            </tr>
                        </table>

                        {{-- <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="inputs[0]['name']" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div> --}}
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    var i = 0;
    $('#add').click(function(){
        ++i;
        $("#table").append('<tr><td><input type="text" name="name['+ i + ']" class="form-control" placeholder="Enter Name" value="{{ old("name[name['+ i +']") }}"></td><td><button type="button" name="add" id="add" class="btn btn-danger remove-tr remove-table-row">Delete</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    }); 
</script>

@endsection
