<div class="modal fade" id="mediaAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/{{ $application->id }}/image/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dynamicAddRemoveVariant">
                        <tr>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="application_id" value="{{ $application->id }}">
                                <input type="file" id="file" accept="image/*" name="media[]" class="form-control" placeholder="Enter media" required>
                                @if($errors->has('media[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('media[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" name="add" id="add-btnVariant" class="btn btn-success"><span class="fa fa-plus"></span></button>
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
{{-- <script>
    function changeMedia() {
        var input = document.getElementById('media').value
        if (input == 1) {
            document.getElementById('file').accept=".jpg, .jpeg, .png"
        } else if (input == 2) {
            document.getElementById('file').accept=".xls, .pdf, .doc"
        }
    }
</script> --}}
<script type="text/javascript">
    var i = 0;

    $("#add-btnVariant").click(function () {

        ++i;

        $("#dynamicAddRemoveVariant").append(
            `<tr>
                <td>
                    <input type="file" accept="image/*" name="media[]" class="form-control" placeholder="Enter media" required>
                    @if($errors->has('media[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('media[]') }}</span>
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
