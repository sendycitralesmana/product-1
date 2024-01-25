@extends('backoffice/layouts/main')

@section('title', 'Application')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Detail Application</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/application" class="text-secondary">Application</a></li>
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
                <h3 class="card-title">Application</h3>
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
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Time</th>
                            <th>Client</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $application->id }} </td>
                            <td> 
                                @if( $application->thumbnail != '' )
                                    <img src="{{asset('storage/image/application/'.$application->thumbnail)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('storage/image/default.png')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td> {{ $application->name }} </td>
                            <td> {{ $application->area }} </td>
                            <td> {{ $application->time }} </td>
                            <td>
                                @if ( $application->client_id != null )
                                <a title="See More" href="/client/{{ $application->client_id }}/detail">{{ $application->client->name }}</a>
                                @else
                                -
                                @endif
                            </td>
                            <td> 
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#applicationEdit{{ $application->id }}">
                                    <span><i class="ion ion-android-create"></i> Edit</span>
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.application.modal.edit')    
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Product End --}}

        {{-- Media Type Start--}}
        <div class="row">

            <div class="col-md-4">
                {{-- Product Start --}}
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
                {{-- Product End --}}
            </div>
            
            <div class="col-md-4">
                {{-- Media Start --}}
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
                {{-- Media End --}}
            </div>
            
            <div class="col-md-4">
                {{-- Video Start --}}
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
                {{-- Video End --}}
            </div>

        </div>
        {{-- Media Type End --}}
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection