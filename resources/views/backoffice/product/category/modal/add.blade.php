<div class="modal fade" id="categoryAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/category/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        
                        {{-- <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editor" value="{{ old('description') }}" class="form-control"></textarea>
                            @if($errors->has('description'))
                            <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                            @endif
                        </div> --}}
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" required name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}"
                            oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Kategori harus diisi')">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Ikon</label>
                            <img src="" class="imgPreviewIcon img-fluid mb-3 col-sm-5" alt="">
                            <input type="file" accept="image/*" onchange="previewIcon()" id="imageIcon" name="ikon" class="form-control" placeholder="Enter Password">
                            @if($errors->has('ikon'))
                            <span class="help-block" style="color: red">{{ $errors->first('ikon') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <img src="" class="imgPreviewThumbnail img-fluid mb-3 col-sm-5" alt="">
                            <input type="file" accept="image/*" onchange="previewThumbnail()" id="imageThumbnail" name="thumbnail" class="form-control" placeholder="Enter Password">
                            @if($errors->has('thumbnail'))
                            <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
                            @endif
                        </div>
                    </div>

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
                    <input type="text" name="name[]" class="form-control" placeholder="Enter Name" required>
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
<script>
    // thumbnail
    function previewThumbnail() {
        const imageThumbnail = document.querySelector('#imageThumbnail');
        const imgPreviewThumbnail = document.querySelector('.imgPreviewThumbnail');

        imgPreviewThumbnail.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreviewThumbnail.src = oFReader.target.result;
        }
    }
</script>
<script>
    // icon
    function previewIcon() {
        const imageIcon = document.querySelector('#imageIcon');
        const imgPreviewIcon = document.querySelector('.imgPreviewIcon');

        imgPreviewIcon.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreviewIcon.src = oFReader.target.result;
        }
    }
</script>
{{--  --}}