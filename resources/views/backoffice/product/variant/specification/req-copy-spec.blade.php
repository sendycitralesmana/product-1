@extends('backoffice/layouts/main')

@section('title', 'Spesifikasi varian')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Varian Spesifikasi</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $variant->product->category->id }}/product/{{ $variant->product->id }}/detail" class="">Detail Produk</a></li>
                    <li class="breadcrumb-item"><a href="/backoffice/product/category/{{ $variant->product->category->id }}/product/{{ $variant->product->id }}/variant" class="">Varian</a></li>
                    <li class="breadcrumb-item active">Spesifikasi</li>
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
                    <div class="produk mr-4">
                        <h5>
                            Kategori: <b>{{ $variant->product->category->name }}</b>
                        </h5>
                    </div>
                    <div class="produk mr-4">
                        <h5>
                            Produk: <b>{{ $variant->product->name }}</b>
                        </h5>
                    </div>
                    <div class="produk mr-4">
                        <h5>
                            Varian: <b>{{ $variant->name }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <form role="form" method="POST" 
                action="/backoffice/variant/{{ $variant->id }}/req-variant/{{ $req_variant->id }}/copy-spec-action" 
                enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="card card-outline card-primary">
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
                    @if (Session::has('status'))
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


                    <table class="table table-bordered" id="dynamicAdd">
                        <tr>
                            <th>Spesifikasi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>

                        @if ($req_variant->spec->isEmpty())
                            <tr>
                                <td>
                                    <select name="specification_id[]" id="" class="form-control select2" required
                                            oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Spesifikasi harus dipilih')">
                                        <option value="">-- Pilih Spesifikasi --</option>
                                        @foreach ($specifications as $specification)
                                            <option value="{{ $specification->id }}">{{ $specification->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('specification_id[]'))
                                    <span class="help-block" style="color: red">{{ $errors->first('specification_id[]') }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <input type="text" name="value[]" class="form-control" placeholder="Keterangan" required
                                        oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')"> --}}
                                    <textarea name="value[]" class="form-control" id="" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')"></textarea>
                                    @if($errors->has('value[]'))
                                    <span class="help-block" style="color: red">{{ $errors->first('value[]') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" name="add" id="add-btn" class="btn btn-success"><span class="fa fa-plus"></span></button>
                                </td>
                            </tr>
                        @else
                            @foreach ($req_variant->spec as $specification)
                                <tr>
                                    <td>
                                        <select name="specification_id[]" id="" class="form-control" required
                                                oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Spesifikasi harus dipilih')">
                                            <option value="{{ $specification->specification->id }}">{{ $specification->specification->name }}</option>
                                            @foreach ($specifications as $spec)
                                                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                            @endforeach


                                            {{-- @foreach ($specifications as $spec)
                                                <option value="{{ $specification->id }}" 
                                                    @if ($specification->specification->id == $spec->id) selected @endif>
                                                    {{ $specification->specification->name }} - {{ $specification->specification->id }}
                                                </option>
                                            @endforeach --}}
                                            {{-- <option value="{{ $specification->id }}">{{ $specification->name }}</option> --}}
                                        </select>
                                        @if($errors->has('specification_id[]'))
                                        <span class="help-block" style="color: red">{{ $errors->first('specification_id[]') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <textarea name="value[]" class="form-control" id="" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')">{{ $specification->value }}</textarea>
                                        @if($errors->has('value[]'))
                                        <span class="help-block" style="color: red">{{ $errors->first('value[]') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($loop->first)
                                            <button type="button" name="add" id="add-btn" class="btn btn-success"><span class="fa fa-plus"></span></button>
                                        @else
                                            <button type="button" name="remove" id="remove-btn" class="btn btn-danger remove-tr"><span class="fa fa-trash"></span></button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        
                    </table>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-plus"></span> Tambah</button>
                </div>
            </div>
        </form>

    </section>
    
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#add-btn").click(function () {

        ++i;

        $("#dynamicAdd").append(
            `<tr>
                <td>
                    <select name="specification_id[]" id="" class="form-control select2" required
                            oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Spesifikasi harus dipilih')">
                        <option value="">-- Pilih Spesifikasi --</option>
                        @foreach ($specifications as $specification)
                            <option value="{{ $specification->id }}">{{ $specification->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('specification_id[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('specification_id[]') }}</span>
                    @endif
                </td>
                <td>
                    <textarea name="value[]" class="form-control" id="" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')"></textarea>
                    @if($errors->has('value[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('value[]') }}</span>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-tr"><span class="fa fa-trash"></span></button>
                </td>
            </tr>`
            );
        });

        $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
        });

</script>

@endsection