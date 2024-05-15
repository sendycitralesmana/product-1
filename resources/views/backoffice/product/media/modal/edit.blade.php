<div class="modal fade" id="mediaEdit{{ $image->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" 
                action="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/image/{{ $image->id }}/update" 
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Gambar</h5>
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
                            {{-- <p> {{ $image->url }} </p> --}}
                            {{-- <img src="{{ asset('storage/image/gallery/'. $image->url) }}" name="oldValue" value="{{ $image->url }}" class="img-previewP img-fluid mb-3 col-sm-5 d-block" alt=""> --}}
                            @if ($image->url)
                                <img src="{{ Storage::disk('s3')->url($image->url) }}" name="oldValue" value="$image->thumbnail" 
                                class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="" style="width: 150px; height: 150px">
                            @else
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept="image/*" onchange="previewImg()" id="image" name="media" class="form-control" value="{{ $image->name}}">
                            @if($errors->has('media'))
                            <span class="help-block" style="color: red">{{ $errors->first('media') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewImg() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'
        imgPreview.style.width = '150px'
        imgPreview.style.height = '150px'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>