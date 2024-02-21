@extends('backoffice/layouts/main')

@section('title', 'Produk video')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $product->name }} Video data</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product" class="">Produk</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/{{ $product->id }}/detail" class="">Detail</a></li>
                    <li class="breadcrumb-item active">Video</li>
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
                <h3 class="card-title">Video</h3>
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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#videoProductDelete{{ $videoProduct->id }}">
                                    <span>Delete</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.video.modal.delete')
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
