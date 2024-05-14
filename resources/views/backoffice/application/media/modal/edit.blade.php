<div class="modal fade" id="mediaEdit{{ $image->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/{{ $application->id }}/image/{{ $image->id }}/update" enctype="multipart/form-data">
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
                        <input type="hidden" name="application_id" value="{{ $application->id }}">
                        <div class="form-group">
                            <label>Media</label>
                            <input type="hidden" name="oldName" value="{{ $image->name }}">
                            <input type="hidden" name="oldUrl" value="{{ $image->url }}">
                            {{-- <p> {{ $image->url }} </p> --}}
                            @if ($image->url)
                                <img src="{{ asset('http://103.127.96.59:9000/mled/'.$image->url) }}" name="oldValue" value="$image->thumbnail" 
                                class="image-preview img-fluid mb-3 col-sm-5 d-block" alt="" style="width: 150px; height: 150px">
                            @else
                                <img src="" class="image-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                                <input type="file" accept="image/*" id="imag-prewiew" onchange="previewImg()" name="media" class="form-control" value="{{ $image->name}}">
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

<script>
    function previewImg() {
        const image = document.querySelector('#image-preview')
        const imgPreview = document.querySelector('.image-preview')

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