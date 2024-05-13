<div class="modal fade" id="applicationAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/application/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Proyek</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <select name="application_id[]" class="form-control" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Proyek harus dipilih')">
                                    <option value="">-- Pilih proyek --</option>
                                    @foreach ($applications as $application)
                                        <option value="{{ $application->id }}" >{{ $application->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('application_id[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('application_id[]') }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" name="add" id="add-btn" class="btn btn-success">
                                    <span class="fa fa-plus"></span>
                                </button>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#add-btn").click(function () {

        ++i;

        $("#dynamicAddRemove").append(
            `<tr>
                <td>
                    <select name="application_id[]" required class="form-control"
                        oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Proyek harus dipilih')">
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($applications as $application)
                            <option value="{{ $application->id }}">{{ $application->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('application_id[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('application_id[]') }}</span>
                    @endif
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger remove-tr"><span class="fa fa-minus"></span></button>
                </td>
            </tr>`
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
{{--  --}}