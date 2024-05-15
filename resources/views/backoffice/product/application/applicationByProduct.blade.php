@extends('backoffice/layouts/main')

@section('title', 'Proyek')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Proyek</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product" class="">Produk</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/{{ $product->id }}/detail" class="">Detail</a></li>
                    <li class="breadcrumb-item active">Proyek</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="d-flex justify-between">
                    <div class="produk mr-4">
                        <h5>
                            Kategori: <b>{{ $pCategory->name }}</b>
                        </h5>
                    </div>
                    <div class="produk mr-4">
                        <h5>
                            Produk: <b>{{ $product->name }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Proyek</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#applicationAdd">
                        <span class="fa fa-plus"></span> Tambah
                    </button>
                    @include('backoffice.product.application.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                
            </div>
            <div class="card-body">
                {{-- @if (Session::has('application'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif --}}
                @if (Session::has('application'))
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
                            <th>Gambar</th>
                            <th>Proyek</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pApplications as $key => $application)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td>
                                <img src="{{Storage::disk('s3')->url($application->application->thumbnail)}}" alt="" 
                                style="height: 100px; width: 100px" >
                            </td>
                            <td>
                                <b style="overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp: 1;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;">
                                    {{ $application->application->name }}
                                </b>
                                <div style="overflow: hidden;
                                    text-overflow: ellipsis;
                                    -webkit-line-clamp: 2;
                                    display: -webkit-box;
                                    -webkit-box-orient: vertical;">
                                    {!! html_entity_decode($application->application->description) !!}
                                </div>
                             </td>
                            {{-- <td> {{ $application->application->area }} </td>
                            <td> {{ $application->application->time }} </td> --}}
                            <td>
                                @if (auth()->user()->role_id == 2)
                                <a href="/backoffice/application/{{ $application->application->id }}/detail" class="btn btn-info btn-sm m-1"> <i class="fa fa-eye"></i> Detail</a>
                                <button title="Hapus" type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#applicationDelete{{ $application->id }}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.product.application.modal.delete')
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
