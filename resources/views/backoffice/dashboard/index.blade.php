@extends('backoffice/layouts/main')

@section('title', '- Beranda')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Beranda</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Beranda</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $products->count() }}</h3>

                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list"></i>
                    </div>
                    @if ( auth()->user()->role_id == 2 && $products->count() > 0 )
                        <a href="/backoffice/product/category" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $applications->count() }}</h3>

                        <p>Proyek</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    @if ( auth()->user()->role_id == 2 && $applications->count() > 0 )
                        <a href="/backoffice/application" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $posts->count() }}</h3>

                        <p>Artikel</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper"></i>
                    </div>
                    @if ( auth()->user()->role_id == 2 && $posts->count() > 0 )
                        <a href="/backoffice/post" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
            {{-- <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $galleries->count() }}</h3>

                        <p>Galeri</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-image"></i>
                    </div>
                    @if ( auth()->user()->role_id == 2 && $galleries->count() > 0 )
                        <a href="/backoffice/gallery" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div> --}}
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $clients->count() }}</h3>

                        <p>Klien</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    @if ( auth()->user()->role_id == 2 && $clients->count() > 0 )
                        <a href="/backoffice/client" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $feedbacks->count() }}</h3>

                        <p>Pesan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    @if ( auth()->user()->role_id == 2 && $feedbacks->count() > 0 )
                        <a href="/backoffice/feedback" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row -->



        <!-- Default box -->
        {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dashboard</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                
            </div>
        </div> --}}
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
