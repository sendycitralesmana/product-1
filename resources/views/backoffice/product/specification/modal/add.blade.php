<div class="modal fade" id="specAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/{{ $variant->id }}/variant-specification/specification/create" enctype="multipart/form-data">
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
                            <th>Opsi</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="name[]" class="form-control" placeholder="Spesifikasi" required
                                oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Spesifikasi harus diisi')">
                                @if($errors->has('name[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" name="add" id="add-btn" class="btn btn-success"><span class="fa fa-plus"></span></button>
                            </td>
                        </tr>
                    </table>
                    <!-- /.card-body -->

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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#add-btn").click(function () {

        ++i;

        $("#dynamicAddRemove").append(
            `<tr>
                <td>
                    <input type="text" name="name[]" class="form-control" placeholder="Spesifikasi" required
                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Spesifikasi harus diisi')">
                    @if($errors->has('name[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
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