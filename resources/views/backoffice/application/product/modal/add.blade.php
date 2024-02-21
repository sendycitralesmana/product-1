<div class="modal fade" id="productAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/product/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Produk</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="application_id" value="{{ $applications->id }}">
                                <select name="product_id[]" class="form-control" required>
                                    <option value="">-- Pilih produk --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('product_id[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('product_id[]') }}</span>
                                @endif
                            </td>
                            <td class="text-center"><button type="button" name="add" id="add-btn" class="btn btn-success">+</button></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
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
                    <select name="product_id[]" required class="form-control">
                        <option value="">-- Select product --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('product_id[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('product_id[]') }}</span>
                    @endif
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger remove-tr">-</button>
                </td>
            </tr>`
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
{{--  --}}