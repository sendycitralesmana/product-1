@extends('backoffice/layouts/main')

@section('title', 'Category')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Kategori</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Produk Kategori</li>
                  </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Kategori</h3>
                <div class="card-tools">
                    @if (auth()->user()->role_id == 2)
                        <!-- Button trigger modal -->
                        <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#categoryAdd">
                            <span class="fa fa-plus"></span> Tambah
                        </button>
                        {{-- Modal --}}
                        @include('backoffice.product.category.modal.add')
                    @endif
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('category'))
                {{-- <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div> --}}
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
                        @foreach ($errors->all() as $error)
                            Add data unsuccessfully {{ $error }}
                        @endforeach
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ikon</th>
                            <th>Thumbnail</th>
                            <th>Kategori</th>
                            <th>Produk</th>
                            {{-- <th>Description</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsCategories as $key => $productCategory)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> 
                                @if( $productCategory->icon != null )
                                    <img src="{{Storage::disk('s3')->url($productCategory->icon)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('images/no-image.jpg')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td> 
                                @if( $productCategory->thumbnail != null )
                                    <img src="{{Storage::disk('s3')->url($productCategory->thumbnail)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('images/no-image.jpg')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td> {{ $productCategory->name }} </td>
                            <td> 
                                <a href="/backoffice/product/category/{{ $productCategory->id }}/product" title="Lihat">
                                    <button class="badge badge-light">
                                        Lihat {{ $productCategory->product->count() }} Data <i class="fas fa-arrow-right"></i> 
                                    </button>
                                </a>    
                            </td>
                            {{-- <td> {!! html_entity_decode($productCategory->description) !!} </td> --}}
                            <td>
                                {{-- <a href="/product-category/{{ $productCategory->id }}/detail" class="btn btn-primary btn-sm">Detail</a> --}}
                                @if (auth()->user()->role_id == 2)
                                    <!-- Button trigger modal -->
                                    <button title="Ubah" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#categoryEdit{{ $productCategory->id }}">
                                        <span><i class="fa fa-edit"></i> Ubah</span>
                                    </button>
                                    @if ( $productCategory->product->count() == 0 )
                                        <button title="Hapus" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#categoryHapus{{ $productCategory->id }}">
                                            <span><i class="fa fa-trash"></i> Hapus</span>
                                        </button>
                                    @endif
                                        
                                    {{-- Modal --}}
                                    @include('backoffice.product.category.modal.edit')
                                    @include('backoffice.product.category.modal.delete')
                                    {{-- <a href="/product-category/{{ $data->id }}/delete" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm">Delete</a> --}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>

    </section>
</div>
@endsection
