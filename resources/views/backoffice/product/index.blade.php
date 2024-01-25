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
                    <h1>Product Data</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Product</li>
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
                
                {{-- <div class="row">
                    <div class="col-md-8">
                        <form class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                              <label for="inputPassword2" class="sr-only">Password</label>
                              <select name="category_id" class="form-control" id="">
                                <option value="all">-- Category All --</option>
                                @foreach ($productCategories as $productCategory)
                                    <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Filter</button>
                          </form>
                    </div>
                    <div class="col-md-4">
                        <div class="card-tools text-right">
                            @if (auth()->user()->role_id == 2)
                            Button trigger modal
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#productAdd">
                                <span>+</span>
                            </button>
                            Modal
                            @include('backoffice.product.modal.add')
                            @endif
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}

                <h3 class="card-title">Product Data</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                     {{-- Button trigger modal --}}
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#productAdd">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.product.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('status'))
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
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                    <ul>
                        <span>Add data failed</span>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Category</th>
                            {{-- <th>Description</th> --}}
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
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
                            <td>
                                <a href="/backoffice/product/{{ $product->id }}/detail" class="btn btn-info btn-sm"><i class="ion ion-eye"></i> Detail</a>
                                @if (auth()->user()->role_id == 2)
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#productEdit{{ $product->id }}">
                                    <span>Edit</span>
                                </button>
                                Modal
                                @include('product.modal.edit') --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#productDelete{{ $product->id }}">
                                    <span><i class="ion ion-android-delete"></i> Delete</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.modal.delete')
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Category</th>
                            {{-- <th>Description</th> --}}
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
