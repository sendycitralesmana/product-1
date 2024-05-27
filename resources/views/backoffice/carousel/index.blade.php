@extends('backoffice/layouts/main')

@section('title', '- Proyek')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Carousel</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Carousel</li>
                  </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data</h3>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div>
                        <form class="form-inline" action="/backoffice/carousel">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="text"
                                    placeholder="Cari judul" name="title" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                @if ( $title != null )
                                <div class="input-group-append">
                                    <a href="/backoffice/carousel" class="btn btn-outline-secondary"><span class="arrows-rotate"></span> Lihat semua</a>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="card-tools">
                        <div class="card-tools">
                            @if (auth()->user()->role_id == 2)
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#applicationAdd">
                                <span class="fas fa-plus"></span> Tambah
                            </button>
                            {{-- Modal --}}
                            @include('backoffice.application.modal.add')
                            @endif
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
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
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                        <ul>
                            <span>Tambah data gagal</span>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ( $title != null )
                    <div class="text-center">
                        <p>
                            Hasil pencarian dari: <b>{{ $title }}</b>
                        </p>
                    </div>
                @endif
                @if ( $applications->count() == 0 )
                    <div class="text-center">
                        <h2>
                            <b>-- Tidak ada data --</b>
                        </h2>
                    </div>
                @endif
                <div class="row">
                    @foreach ($carousels as $carousel)
                    <div class="col-md-4 carousel">
                        <div class="card card-outline card-primary">
                            <div class="p-4 text-center">
                                @if ( $carousel->thumbnail != null )
                                    <a href="{{Storage::disk('s3')->url($carousel->thumbnail)}}" data-title="{{ $carousel->name }}" data-lightbox="mycarousel">
                                        <img src="{{Storage::disk('s3')->url($carousel->thumbnail)}}" alt="" 
                                        class="img-fluid rounded" style="height: 210px; width: 90%">
                                    </a>
                                @else
                                    <a href="{{asset('images/no-image.jpg')}}" data-title="{{ $carousel->name }}" data-lightbox="mycarousel">
                                        <img src="{{asset('images/no-image.jpg')}}" alt="" 
                                        class="img-fluid rounded" style="height: 210px; width: 90%">
                                    </a>
                                @endif
                            </div>
                            <div class="p-2 mb-2" style="height: 160px">
                                <small>{{ $carousel->date }}</small>
                                <h5 class="" style="overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp: 2;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;">
                                    <b>{{ $carousel->name }}</b>
                                </h5>
                                <div style="overflow: hidden;
                                text-overflow: ellipsis;
                                -webkit-line-clamp: 3;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;">
                                    {!! html_entity_decode($carousel->description) !!}
                                </div>
                            </div>
                            <div class="d-flex" style="border-top: 2px solid #0d6efd">
                                <a href="/backoffice/carousel/{{ $carousel->id }}/detail" class="btn btn-info btn-sm btn-block m-1">
                                    <i class="ion ion-ios-eye"></i> Detail
                                </a>
                                <button type="button" class="btn btn-danger btn-sm btn-block m-1" data-toggle="modal"
                                    data-target="#carouselDelete{{$carousel->id}}">
                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                </button>
                                @include('backoffice.carousel.modal.delete')
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="p-3">
                    {{ $carousels->links() }}
                </div>

            </div>
        </div>

    </section>
    
</div>

@endsection
