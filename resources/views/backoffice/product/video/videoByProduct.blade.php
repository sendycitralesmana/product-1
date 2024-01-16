@extends('backoffice/layouts/main')

@section('title', 'Product Video')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>{{ $product->name }} Video Data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $product->name }} Video</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                        <!-- Button trigger modal -->
                        <button title="Add Video" type="button" class="btn btn-default" data-toggle="modal" data-target="#product_video">
                            <span>+</span>
                        </button>
                        {{-- Modal --}}
                        @include('backoffice.product.video.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('video'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Url</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videoProducts as $videoProduct)
                        <tr>
                            <td> {{ $videoProduct->id }} </td>
                            <td> {{ $videoProduct->url }} </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProductVideo{{ $videoProduct->id }}">
                                    <span>Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.video.modal.edit')
                                <a href="/backoffice/product/video/{{ $videoProduct->id }}/delete"
                                    onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Url</th>
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
