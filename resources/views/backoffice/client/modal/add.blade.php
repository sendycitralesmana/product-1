<div class="modal fade" id="clientAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/client/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name"
                            value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="url" name="link" required class="form-control" placeholder="Enter link"
                            value="{{ old('link') }}">
                        @if($errors->has('link'))
                        <span class="help-block" style="color: red">{{ $errors->first('link') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img src="" class="img-previewP img-fluid mb-3 col-sm-5" alt="">
                        <input type="file" accept=".jpg, .jpeg, .png, .svg, .webp" onchange="previewImgP()" id="imageP" name="image" class="form-control" placeholder="Enter Password" id="image">
                        @if($errors->has('image'))
                        <span class="help-block" style="color: red">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  --}}

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

{{--  --}}
