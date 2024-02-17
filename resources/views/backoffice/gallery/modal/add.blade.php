<div class="modal fade" id="galleryAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/gallery/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah galeri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dynamicAddRemoveVariant">
                        <tr>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="name[]" class="form-control" placeholder="Nama" required>
                                @if($errors->has('name[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                <input type="file" accept="image/*" name="image[]" id="image" onchange="previewImg()" class="form-control" required>
                                @if($errors->has('image[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('image[]') }}</span>
                                @endif
                            </td>
                            <td><button type="button" name="add" id="add-btnVariant" class="btn btn-success">+</button></td>
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

    $("#add-btnVariant").click(function () {

        ++i;

        $("#dynamicAddRemoveVariant").append(
            `<tr>
                            <td>
                                <input type="text" name="name[]" class="form-control" placeholder="Nama" required>
                                @if($errors->has('name[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="file" accept="image/*" name="image[]" class="form-control" required>
                                @if($errors->has('image[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('image[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger remove-tr">-</button>
                            </td>
                        </tr>`
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>

<script>
    function previewImg() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>

{{--  --}}