<div class="modal fade" id="clientAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/client/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah klien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name"
                            value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="url" name="link" class="form-control" placeholder="Enter link"
                            value="{{ old('link') }}">
                        @if($errors->has('link'))
                        <span class="help-block" style="color: red">{{ $errors->first('link') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gambar <span class="text-danger">*</span></label>
                        <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                        <input type="file" accept="image/*" onchange="previewImg()" id="image" name="image" class="form-control" placeholder="Enter Password" required>
                        @if($errors->has('image'))
                        <span class="help-block" style="color: red">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <!-- /.card-body -->

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
