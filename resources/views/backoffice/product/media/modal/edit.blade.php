<div class="modal fade" id="mediaEdit{{ $image->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/media/{{ $image->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="hidden" name="oldName" value="{{ $image->name }}">
                            <input type="hidden" name="oldUrl" value="{{ $image->url }}">
                            <p> {{ $image->url }} </p>
                            <img src="{{ asset('storage/image/gallery/'. $image->url) }}" name="oldValue" value="{{ $image->url }}" class="img-previewP img-fluid mb-3 col-sm-5 d-block" alt="">
                            <input type="file" accept="image/*" onchange="previewImgP()" id="imageP" name="media" class="form-control" value="{{ $image->name}}">
                            @if($errors->has('media'))
                            <span class="help-block" style="color: red">{{ $errors->first('media') }}</span>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewImgP() {
        const image = document.querySelector('#imageP')
        const imgPreview = document.querySelector('.img-previewP')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>