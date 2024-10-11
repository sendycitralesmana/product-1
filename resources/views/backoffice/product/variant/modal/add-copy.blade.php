<div class="modal fade" id="addCopyProductVariant{{ $productVariant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" 
                action="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/create" 
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Copy varian dan tambah beserta spesifikasinya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label>Varian</label>
                        <input type="text" name="name" class="form-control" placeholder="Varian" value="{{ $productVariant->name }} - copy"
                        oninvalid="this.setCustomValidity('Varian harus diisi!')"
                        oninput="this.setCustomValidity('')" required>
                        @if($errors->has('name'))
                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <table class="table table-bordered" id="dynamicAdd{{ $productVariant->id }}">
                        <tr>
                            <th>Spesifikasi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>

                        @foreach ($productVariant->spec as $specification)
                            <tr id="tr{{ $specification->id }}">
                                <td>
                                    <select name="specification_id[]" id="" class="form-control " required
                                            oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Spesifikasi harus dipilih')">
                                        {{-- <option value="">{{ $specification->specification->name }}</option> --}}
                                        @foreach ($specifications as $spec)
                                        {{-- if specification_id == $spec->id then spec->name selected --}}
                                            <option value="{{ $specification->id }}" @if ($specification->id == $spec->id) selected  
                                            @endif>
                                                {{ $specification->specification->name }}
                                            </option>
                                        @endforeach
                                        <option value="{{ $specification->id }}">{{ $specification->name }}</option>
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
                                    {{-- <button type="button" name="add" id="add-btn" class="btn btn-success"><span class="fa fa-plus"></span></button> --}}
                                    @if ($loop->first)
                                        <button type="button" name="add" id="add-btn{{ $productVariant->id }}" class="btn btn-success"><span class="fa fa-plus"></span></button>
                                    @else
                                        <button type="button" name="remove" id="remove-btn{{ $productVariant->id }}" class="btn btn-danger remove-tr{{ $productVariant->id }}"><span class="fa fa-trash"></span></button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{-- <table class="table table-bordered" id="dynamicAdd">
                        <tr>
                            <th>Spesifikasi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="specification_id[]" id="" class="form-control " required
                                        oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Spesifikasi harus dipilih')">
                                    <option value="">-- Pilih Spesifikasi --</option>

                                    @foreach ($productVariant->spec as $specification)
                                        <option value="{{ $specification->id }}">{{ $specification->name }}</option>
                                    @endforeach

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
                                <button type="button" name="add" id="add-btn" class="btn btn-success"><span class="fa fa-plus"></span></button>
                            </td>
                        </tr>
                    </table> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  --}}
<script>
    $('.select2').select2({
        theme: 'bootstrap4'
    })
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#add-btn{{ $productVariant->id }}").click(function () {

        ++i;

        $("#dynamicAdd{{ $productVariant->id }}").append(
            `<tr id="tr{{ $specification->id }}">
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
                    <textarea name="value[]" class="form-control" id="" required
                        oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')">
                    </textarea>
                    @if($errors->has('value[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('value[]') }}</span>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-tr{{ $productVariant->id }}"><span class="fa fa-trash"></span></button>
                </td>
            </tr>`
            );
    });

    $(document).on('click', '.remove-tr{{ $productVariant->id }}', function () {
        // $(this).parents('tr').remove();

        // get document id tr{{ $specification->id }} attribute parents and remove
        $(this).parents('tr').remove();
    
    });

</script>
{{--  --}}