<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/backoffice/user/{{ auth()->user()->id }}/update" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="name" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        @if($errors->has('email'))
                            <span class="help-block" style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ auth()->user()->avatar }}">
                        @if (auth()->user()->avatar)
                            <img src="{{ asset('storage/image/user/'. auth()->user()->avatar) }}" name="oldValue" value="$user->avatar" class="img-previewP img-fluid mb-3 col-sm-5 d-block" alt="">
                        @else
                            <img src="" class="img-previewP img-fluid mb-3 col-sm-5" alt="">
                        @endif
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImgP()" id="imageP" name="avatar" class="form-control" placeholder="Enter Password">
                        @if($errors->has('avatar'))
                        <span class="help-block" style="color: red">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>