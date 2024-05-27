<div class="modal fade" id="carouselEdit{{ $carousel->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/carousel/{{ $carousel->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" name="title" class="form-control" value="{{ $carousel->title }}">
                                @if($errors->has('title'))
                                <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" class="form-control">{{ $carousel->description }}</textarea>
                                @if($errors->has('description'))
                                <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                @if ($carousel->image)
                                    <img src="{{ Storage::disk('s3')->url($carousel->image) }}" 
                                    class="img-previewP rounded img-fluid mb-3 col-sm-5 d-block" alt="" style="width: 150px; height: 150px">
                                @else
                                    <img src="" class="img-previewP img-fluid mb-3 col-sm-5" alt="">
                                @endif
                                <input type="file" accept="image/*" onchange="previewImgP()" id="imageP" name="image" class="form-control">
                                @if($errors->has('image'))
                                    <span class="help-block" style="color: red">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fas fa-edit"></span> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <script>
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
</script> --}}