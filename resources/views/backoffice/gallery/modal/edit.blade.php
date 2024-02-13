<div class="modal fade" id="galleryEdit{{ $gallery->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/gallery/{{ $gallery->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" required class="form-control" value="{{ $gallery->name}}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="hidden" name="oldImage" value="{{ $gallery->image }}">
                            @if ($gallery->image)
                                <img src="{{ asset('storage/image/gallery/'. $gallery->image) }}" name="oldValue" value="$gallery->image" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                            @else
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept="image/*" onchange="previewImg()" id="image" name="image" class="form-control" placeholder="Enter Password">
                            @if($errors->has('image'))
                            <span class="help-block" style="color: red">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
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