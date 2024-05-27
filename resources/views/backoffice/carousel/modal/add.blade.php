<div class="modal fade" id="carouselAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/carousel/store" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Carousel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" name="title" class="form-control">
                                @if($errors->has('title'))
                                <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" class="form-control"></textarea>
                                @if($errors->has('description'))
                                <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" accept="image/*" name="image" class="form-control" required
                                oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Gambar harus diisi')">
                                @if($errors->has('image'))
                                <span class="help-block" style="color: red">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Simpan</button>
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
                                <input type="file" accept="image/*" name="image[]" class="form-control" required>
                                @if($errors->has('image[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('image[]') }}</span>
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

{{-- <script>
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
</script> --}}

{{--  --}}
