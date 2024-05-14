@extends('backoffice/layouts/main')

@section('title', 'Berkas Proyek')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Berkas</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/application" class="">Proyek</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/application/{{ $application->id }}/detail" class="">Detail Proyek</a></li>
                    <li class="breadcrumb-item active">Data Berkas</li>
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
                    <div class="fakultas mr-4">
                        <h5>
                            Proyek: <b>{{ $application->name }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"> Berkas</h3>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#fileAdd">
                        <span class="fa fa-plus"></span> Tambah
                    </button>
                    {{-- Modal --}}
                    @include('backoffice.application.file.modal.add')
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

                    @if ($files->count() == 0)
                        <div class="col-md-12">
                            <h4 class="text-center">
                                <b>-- Tidak ada berkas --</b>
                            </h4>
                        </div>
                    @else
                        @foreach ($files as $file)
                        <div class="col-md-3 gallery">
                            <div class="card card-outline card-primary">
                                <div class="p-4 text-center">
                                    <img src="{{asset('images/pdf.png')}}" alt="" 
                                        class="img-fluid rounded" style="height: 150px; width: 90%">
                                </div>
                                <div class="p-2">
                                    {{ $file->name }}
                                </div>
                                <div class="d-flex" style="border-top: 2px solid #0d6efd">
                                    <button type="button" class="btn btn-warning btn-sm btn-block m-1" data-toggle="modal"
                                        data-target="#fileEdit{{$file->id}}">
                                        <span><i class="fas fa-edit"></i> Ubah</span>
                                    </button>
                                    @include('backoffice.application.file.modal.edit')
                                    <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                        data-target="#fileDelete{{$file->id}}">
                                        <span><i class="ion ion-android-delete"></i> Hapus</span>
                                    </button>
                                    @include('backoffice.application.file.modal.delete')
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                </div>

                <div class="p-3">
                    {{ $files->links() }}
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
            <!-- /.card-body -->
            <div class="card-footer">
                
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
