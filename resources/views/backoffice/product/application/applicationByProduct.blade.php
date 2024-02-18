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
                    <h1>{{ $product->name }} Proyek Data</h1>
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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Proyek</h3>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div>
                        <form class="form-inline" action="/backoffice/product/application/{{ $product->id }}">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="text"
                                    placeholder="Cari judul" name="title" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                @if ( url()->full() != url('/backoffice/product/application/'. $product->id) )
                                <div class="input-group-append">
                                    <a href="/backoffice/application" class="btn btn-outline-secondary">Lihat semua</a>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="card-tools">
                        @if (auth()->user()->role_id == 2)
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#applicationAdd">
                            <span>+</span>
                        </button>
                        @include('backoffice.product.application.modal.add')
                        @endif
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                @if (Session::has('application'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif

                @if ( url()->full() != url('/backoffice/product/application/'. $product->id ) )
                    <div class="text-center">
                        <p>
                            Hasil pencarian dari: <b>{{ $title }}</b>
                        </p>
                    </div>
                @endif
                @if ( $appProducts->count() == 0 )
                    <div class="text-center">
                        <h2>
                            <b>-- Tidak ada data --</b>
                        </h2>
                    </div>
                @endif
                <div class="row">
                    @foreach ($appProducts as $application)
                    <div class="col-md-4 application">
                        <div class="card">
                            <div class="">
                                <a href="{{asset('storage/image/application/'.$application->application->image)}}" data-title="{{ $application->application->name }}" data-lightbox="myapplication">
                                    <img src="{{asset('storage/image/application/'.$application->application->image)}}" alt="" 
                                    class="img-fluid rounded" style="height: 250px; width: 100%">
                                </a>
                            </div>
                            <div class="p-1" style="height: 160px">
                                <small>{{ $application->application->time }}</small>
                                <h5 class="" style="overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp: 2;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;">
                                    <b>{{ $application->application->name }}</b>
                                </h5>
                                <div style="overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp: 3;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;">
                                    {!! html_entity_decode($application->application->description) !!}
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="/backoffice/application/{{ $application->application->id }}/detail" class="btn btn-info btn-sm btn-block m-1">
                                    <i class="ion ion-ios-eye"></i> Detail
                                </a>
                                <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                    data-target="#applicationDelete{{$application->id}}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.application.modal.delete')
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="p-3">
                    {{ $appProducts->links() }}
                </div>

                {{-- <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Time</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appProducts as $application)
                        <tr>
                            <td> {{ $application->id }} </td>
                            <td> {{ $application->application->name }} </td>
                            <td> {{ $application->application->area }} </td>
                            <td> {{ $application->application->time }} </td>
                            <td>
                                @if (auth()->user()->role_id == 2)
                                <a href="/backoffice/application/{{ $application->application->id }}/detail" class="btn btn-info btn-sm">Detail</a>
                                <button title="Delete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#applicationDelete{{ $application->id }}">
                                    <span><i class="ion ion-android-delete"></i> Delete</span>
                                </button>
                                @include('backoffice.product.application.modal.delete')
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Time</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table> --}}
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
