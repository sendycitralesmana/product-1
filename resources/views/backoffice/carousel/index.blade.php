@extends('backoffice/layouts/main')

@section('title', '- Carousel')

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

        <div class="row">
            <div class="col">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between">
                            <div>
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#data"
                                            data-toggle="tab">Data</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#review" data-toggle="tab">Review</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-tools">
                                @if (auth()->user()->role_id == 2)
                                <!-- Button trigger modal -->
                                <button type="button" title="Tambah data" class="btn btn-success btn-sm"
                                    data-toggle="modal" data-target="#carouselAdd">
                                    <span class="fa fa-plus"></span> Tambah
                                </button>
                                {{-- Modal --}}
                                @include('backoffice.carousel.modal.add')
                                @endif
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            {{--  --}}
                            <div class="active tab-pane" id="data">
                                @if (Session::has('carousel'))
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
                                    <button type="button" class="btn btn-danger close" data-dismiss="alert"
                                        sty>&times;</button>
                                    <ul>
                                        <span>Tambah data gagal</span>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="row">
                                    @foreach ($carousels as $carousel)
                                    <div class="col-md-4 carousel">
                                        <div class="card card-outline card-primary">
                                            <div class="">
                                                <a href="{{Storage::disk('s3')->url($carousel->image)}}"
                                                    data-title="{{ $carousel->name }}" data-lightbox="mycarousel">
                                                    <img src="{{Storage::disk('s3')->url($carousel->image)}}" alt=""
                                                        class="img-fluid rounded" style="height: 200px; width: 100%">
                                                </a>
                                                <div class="p-2" style="height: 90px">
                                                    @if ($carousel->title)
                                                    <h5 class="" style="overflow: hidden;
                                                                    text-overflow: ellipsis;
                                                                    -webkit-line-clamp: 1;
                                                                    display: -webkit-box;
                                                                    -webkit-box-orient: vertical;">
                                                        <b>{{ $carousel->title }}</b>
                                                    </h5>
                                                    @else
                                                    <h5> Tidak ada judul </h5>
                                                    @endif
                                                    @if ($carousel->description)
                                                    <div style="overflow: hidden;
                                                                    text-overflow: ellipsis;
                                                                    -webkit-line-clamp: 2;
                                                                    display: -webkit-box;
                                                                    -webkit-box-orient: vertical;">
                                                        {!! html_entity_decode($carousel->description) !!}
                                                    </div>
                                                    @else
                                                    <p> Tidak ada deskripsi </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-primary btn-sm btn-block m-1"
                                                    data-toggle="modal" data-target="#carouselDetail{{$carousel->id}}">
                                                    <span><i class="fas fa-eye"></i> Detail</span>
                                                </button>
                                                @include('backoffice.carousel.modal.detail')
                                                <button type="button" class="btn btn-warning btn-sm btn-block m-1"
                                                    data-toggle="modal" data-target="#carouselEdit{{$carousel->id}}">
                                                    <span><i class="fas fa-edit"></i> Ubah</span>
                                                </button>
                                                @include('backoffice.carousel.modal.edit')
                                                <button type="button" class="btn btn-danger btn-sm btn-block m-1"
                                                    data-toggle="modal" data-target="#carouselDelete{{$carousel->id}}">
                                                    <span><i class="ion ion-android-delete"></i> Hapus</span>
                                                </button>
                                                @include('backoffice.carousel.modal.delete')
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            {{--  --}}
                            <div class="tab-pane" id="review">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($carousels as $key => $carousel)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                            class="@if ($key == 0) active @endif"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($carousels as $key => $carousel)
                                        <div class="carousel-item @if ($key == 0) active @endif">
                                            <img class="d-block w-100 rounded"
                                                src="{{ Storage::disk('s3')->url($carousel->image) }}"
                                                alt="First slide">
                                        </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </section>

</div>

@endsection
