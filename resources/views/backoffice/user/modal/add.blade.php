<div class="modal fade" id="userAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/user/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input type="text" required name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}"
                            oninvalid="this.setCustomValidity('Nama harus diisi')"
                            oninput="this.setCustomValidity('')">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" required name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"
                            oninvalid="this.setCustomValidity('Email harus diisi')"
                            oninput="this.setCustomValidity('')">
                            @if($errors->has('email'))
                            <span class="help-block" style="color: red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input type="password" required name="password" class="form-control" placeholder="Password" value="{{ old('password') }}"
                            oninvalid="this.setCustomValidity('Password harus diisi minimal 8 karakter')"
                            oninput="this.setCustomValidity('')">
                            @if($errors->has('password'))
                            <span class="help-block" style="color: red">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            <input type="file" accept="image/*" onchange="previewImg()" id="image" name="avatar" class="form-control" placeholder="Enter Password" id="image">
                            @if($errors->has('avatar'))
                            <span class="help-block" style="color: red">{{ $errors->first('avatar') }}</span>
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

{{--  --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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