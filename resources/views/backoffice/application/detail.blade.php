@extends('backoffice/layouts/main')

@section('title', '- Proyek')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Detail Proyek</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/application" class="">Proyek</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        {{-- Application Start --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
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
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                            <!-- Box Comment -->
                            <div class="card card-widget">
                                <div class="card-header">
                                    <div class="user-block">
                                        <h5>Proyek</h5>
                                        <small>{{ $application->time }}</small>
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="card-tools">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#applicationEdit{{ $application->id }}">
                                            <span><i class="ion ion-android-create"></i></span>
                                        </button>
                                        {{-- Modal --}}
                                        @include('backoffice.application.modal.edit')    
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="text-center">
                                        @if ( $application->thumbnail != null )
                                        <img src="{{ asset('storage/image/application/'.$application->thumbnail) }}" class="img-fluid" alt="" style="height: 300px;">
                                        @else
                                        <img src="{{ asset('images/default.png') }}" class="img-fluid" alt="" style="height: 300px">
                                        @endif
                                    </div>

                                    <div class="mt-3">
                                        <h4>
                                            <b>{{ $application->name }}</b>
                                        </h4>
                                    </div>
                                    <div> {!! html_entity_decode($application->description) !!} </div>
                                </div>
    
                            </div>
    
                        </div>
    
                        <div class="col-md-4">
                            {{-- Media Start --}}
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Keterangan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="image-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="/backoffice/application/media/{{ $application->id }}">
                                                <div class="">
                                                    Gambar
                                                </div>
                                            </a>
                                            <div class="">
                                                ({{ $application->media->where('type_id', 1)->count() }})
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="file-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="/backoffice/application/file/{{ $application->id }}">
                                                <div class="">
                                                    Berkas
                                                </div>
                                            </a>
                                            <div class="">
                                                ({{ $application->media->where('type_id', 2)->count() }})
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    {{-- <div class="video-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="/backoffice/application/video/{{ $application->id }}">
                                                <div class="">
                                                    Video
                                                </div>
                                            </a>
                                            <div class="">
                                                ({{ $application->video->count() }})
                                            </div>
                                        </div>
                                        <hr>
                                    </div> --}}
                                    <div class="application-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="/backoffice/application/product/{{ $application->id }}">
                                                <div class="">
                                                    Produk
                                                </div>
                                            </a>
                                            <div class="">
                                                ({{ $application->product->count() }})
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="application-body">
                                        <div class="d-flex justify-content-between">
                                            <p>
                                                Klien
                                            </p>
                                            <div class="">
                                                @if ($application->client != null)
                                                    <a href="/backoffice/client/{{ $application->client->id }}/detail">
                                                        <img src="{{ asset('storage/image/client/'.$application->client->image) }}" class="img-fluid rounded" 
                                                        alt="" style="width: 100px; height: 100px">
                                                        <p class="text-center">{{ $application->client->name }}</p>
                                                    </a>
                                                    {{-- <img src="{{ asset('images/default.png') }}" alt="" width="100" height="100" class="img-fluid"> --}}
                                                @else
                                                    Tidak ada klien
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            {{-- Media End --}}
                        </div>
    
                    </div>
            </div>
        </div>
        {{-- Product End --}}

        {{-- Media Type Start--}}
        {{-- <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $application->product->count() }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-apps"></i>
                            </div>
                            <a href="/backoffice/application/product/{{ $application->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Media</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $mediaApplicationsC }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-folder"></i>
                            </div>
                            <a href="/backoffice/application/media/{{ $application->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Video</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $videoApplicationsC }}</h3>
                                <p>Data</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-folder"></i>
                            </div>
                            <a href="/backoffice/application/video/{{ $application->id }}" class="small-box-footer bg-info">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}
        {{-- Media Type End --}}
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection