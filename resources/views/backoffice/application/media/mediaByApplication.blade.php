@extends('backoffice/layouts/main')

@section('title', 'Gambar Proyek')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $application->name }} Gambar Data</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/application" class="">Proyek</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/application/{{ $application->id }}/detail" class="">Detail</a></li>
                    <li class="breadcrumb-item active">Gambar</li>
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
                <h3 class="card-title"> Gambar</h3>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mediaAdd">
                        <span class="fa fa-plus"></span> Tambah
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.application.media.modal.add')
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

                <div class="row">

                    @if ( $images->count() == 0 )
                        <div class="text-center col-md-12">
                            <h4 class="text-center">
                                <b>-- Tidak ada Gambar --</b>
                            </h4>
                        </div>
                    @else
                        @foreach ($images as $image)

                            <div class="col-md-3 gallery">
                                <div class="card">
                                    <div class="">
                                        <a href="{{asset('http://103.127.96.59:9000/mled/'.$image->url)}}" data-title="{{ $image->name }}" data-lightbox="mygallery">
                                            <img src="{{asset('http://103.127.96.59:9000/mled/'.$image->url)}}" alt="" 
                                            class="img-fluid rounded" style="height: 200px; width: 100%">
                                        </a>
                                    </div>
                                    <div class="p-1">
                                        {{ $image->name }}
                                    </div>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-warning btn-sm btn-block m-1" data-toggle="modal"
                                            data-target="#mediaEdit{{$image->id}}">
                                            <span><i class="fas fa-edit"></i> Ubah</span>
                                        </button>
                                        @include('backoffice.application.media.modal.edit')
                                        <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                            data-target="#mediaDelete{{$image->id}}">
                                            <span><i class="ion ion-android-delete"></i> Hapus</span>
                                        </button>
                                        @include('backoffice.application.media.modal.delete')
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>

                <div class="p-3">
                    {{ $images->links() }}
                </div>

                {{-- <table id="example1" class="table table-bordered table-striped">
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
                        @foreach ($mediaApplications as $mediaApplication)
                        <tr>
                            <td> {{ $mediaApplication->id }} </td>
                            <td> 
                                @if ($mediaApplication->type->name == "Image")
                                <img src="{{asset('storage/application/media/'.$mediaApplication->url)}}" alt="" width="80px" height="80px">
                                @else
                                    <a href="/backoffice/application/media/download/{{ $mediaApplication->id }}" class="btn btn-sm btn-success"> <i class="ion ion-android-archive"></i> Download</a>
                                @endif    
                            </td>
                            <td> {{ $mediaApplication->type->name }} </td>
                            <td> {{ $mediaApplication->name }} </td>
                            <td> {{ $mediaApplication->url }} </td>
                            @if (auth()->user()->role_id == 2)

                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mediaEdit{{ $mediaApplication->id }}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                @include('backoffice.application.media.modal.edit')
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mediaDelete{{ $mediaApplication->id }}">
                                    <span><i class="ion ion-android-delete"></i> Delete</span>
                                </button>
                                @include('backoffice.application.media.modal.delete')
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
                </table> --}}
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
