<div class="modal fade" id="variantSpecAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/vs/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Spesifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Spesifikasi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="product_variant_id[]" value="{{ $productVariant->id }}">
                                <select name="specification_id[]" id="" class="form-control " required
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
                                <input type="text" name="value[]" class="form-control" placeholder="Keterangan" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')">
                                @if($errors->has('value[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('value[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" name="add" id="add-btn" class="btn btn-success"><span class="fa fa-plus"></span></button>
                            </td>
                        </tr>
                    </table>
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

    $("#add-btn").click(function () {

        ++i;

        $("#dynamicAddRemove").append(
            `<tr>
                <td>
                    <input type="hidden" name="product_variant_id[]" value="{{ $productVariant->id }}">
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
                    <input type="text" name="value[]" class="form-control" placeholder="Keterangan" required
                        oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')">
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
{{--  --}}