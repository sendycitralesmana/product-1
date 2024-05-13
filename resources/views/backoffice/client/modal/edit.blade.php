<div class="modal fade" id="clientEdit{{ $client->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/client/{{ $client->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah klien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Klien</label>
                            <input type="text" name="name" required class="form-control" value="{{ $client->name}}"
                            oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Klien harus diisi!')">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="url" name="link" class="form-control" value="{{ $client->link}}">
                            @if($errors->has('link'))
                            <span class="help-block" style="color: red">{{ $errors->first('link') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_hidden" class="form-control">
                                <option value="1" {{ $client->is_hidden == 1 ? 'selected' : '' }}>Tidak tampil</option>
                                <option value="0" {{ $client->is_hidden == 0 ? 'selected' : '' }}>Tampilkan</option>
                            </select>
                            @if($errors->has('link'))
                            <span class="help-block" style="color: red">{{ $errors->first('link') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="hidden" name="oldImage" value="{{ $client->image }}">
                            @if ($client->image)
                                <img src="{{ asset('http://103.127.96.59:9000/mled/'. $client->image) }}" name="oldValue" value="$client->image" 
                                class="img-previewP img-fluid mb-3 col-sm-5 d-block" alt="" style="width: 150px; height: 150px">
                            @else
                                <img src="" class="img-previewP img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept="image/*" onchange="previewImgP()" id="imageP" name="image" class="form-control">
                            @if($errors->has('image'))
                            <span class="help-block" style="color: red">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImgP() {
        const image = document.querySelector('#imageP')
        const imgPreview = document.querySelector('.img-previewP')

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