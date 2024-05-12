<div class="modal fade" id="applicationEdit{{ $application->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/{{ $application->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <input type="hidden" name="application_id" value="{{ $application->id }}">
                        <div class="form-group">
                            <label>Judul <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $application->name}}" required
                                oninvalid="this.setCustomValidity('Judul harus diisi!')"
                                oninput="this.setCustomValidity('')">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="description" id="editor" value="{{ old('description') }}"
                                class="form-control">{!! $application->description !!}</textarea>
                            @if($errors->has('description'))
                            <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Area <span class="text-danger">*</span></label>
                            <input type="text" name="area" class="form-control" value="{{ $application->area }}" required
                            oninvalid="this.setCustomValidity('Area harus diisi!')"
                                oninput="this.setCustomValidity('')">
                            @if($errors->has('area'))
                            <span class="help-block" style="color: red">{{ $errors->first('area') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="date" class="form-control" value="{{ $application->date }}" required
                            oninvalid="this.setCustomValidity('Tanggal harus diisi!')"
                                oninput="this.setCustomValidity('')">
                            @if($errors->has('date'))
                            <span class="help-block" style="color: red">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Klien</label>
                            <select name="client_id" class="form-control">
                                <option value="">-- Pilih klien --</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ ($client->id == $application->client_id) ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('client_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="hidden" name="oldImage" value="{{ $application->thumbnail }}">
                            @if ($application->thumbnail)
                                <img src="{{ asset('storage/image/application/'. $application->thumbnail) }}" name="oldValue" value="$application->thumbnail" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                            @else
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept="image/*" onchange="previewImg()" id="image" name="thumbnail" class="form-control" placeholder="Enter Password">
                            @if($errors->has('thumbnail'))
                            <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Ubah</button>
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