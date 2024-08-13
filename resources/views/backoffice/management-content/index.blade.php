@extends('backoffice/layouts/main')

@section('title', '- Produk')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Konten</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Manajemen Konten</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="row">
            @foreach ($mContents as $item)
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>{{ $item->name }}</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $item->id }}">
                                    <span><i class="fas fa-edit"></i> Edit</span>
                                </button>
                                @include('backoffice.management-content.modal.edit')
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div>
                                {!! html_entity_decode($item->description) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>

</div>
@endsection