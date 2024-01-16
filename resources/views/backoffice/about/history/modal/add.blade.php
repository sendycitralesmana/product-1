<div class="modal fade" id="historyAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/about/history/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required class="form-control" placeholder="Enter title"
                            value="{{ old('title') }}">
                        @if($errors->has('title'))
                        <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="number" min="1900" max="2999" name="year" required class="form-control" placeholder="Enter year"
                            value="{{ old('year') }}">
                        @if($errors->has('year'))
                        <span class="help-block" style="color: red">{{ $errors->first('year') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="editor" value="{{ old('description') }}"
                            class="form-control"></textarea>
                        @if($errors->has('description'))
                        <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <img src="" class="img-previewP img-fluid mb-3 col-sm-5" alt="">
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImgP()" id="imageP" name="thumbnail" class="form-control" placeholder="Enter Password" id="image">
                        @if($errors->has('thumbnail'))
                        <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
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
