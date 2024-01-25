@extends('backoffice/layouts/main')

@section('title', 'Media Product')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $product->name }} Media Data</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product" class="text-secondary">Product</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/{{ $product->id }}/detail" class="text-secondary">Detail</a></li>
                    <li class="breadcrumb-item active">Media</li>
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
                <h3 class="card-title">{{ $product->name }} Media</h3>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#store_media">
                        <span>+</span>
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.product.media.modal.add')
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    @if (auth()->user()->role_id == 2)
                    
                    {{-- <a href="/media-product/add" class="btn btn-info btn-info">Add data</a> --}}
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('media'))
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
                            <th>Media</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Url</th>
                            @if (auth()->user()->role_id == 2)

                            <th>Option</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mediaProducts as $mediaProduct)
                        <tr>
                            <td> {{ $mediaProduct->id }} </td>
                            <td> 
                                @if ($mediaProduct->mediaType->name == "Image")
                                <img src="{{asset('storage/product/media/'.$mediaProduct->url)}}" alt="" width="80px" height="80px">
                                @else
                                    <a href="/backoffice/product/media/download/{{ $mediaProduct->id }}" class="btn btn-sm btn-success">Download</a>
                                @endif    
                            </td>
                            <td> {{ $mediaProduct->mediaType->name }} </td>
                            <td> {{ $mediaProduct->name }} </td>
                            <td style=""> {{ $mediaProduct->url }} </td>
                            @if (auth()->user()->role_id == 2)

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#store_media{{ $mediaProduct->id }}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.media.modal.edit')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mediaDelete{{ $mediaProduct->id }}">
                                    <span><i class="ion ion-android-delete"></i> Delete</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.product.media.modal.delete')
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Media</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Url</th>
                            @if (auth()->user()->role_id == 2)

                            <th>Option</th>
                            @endif
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
