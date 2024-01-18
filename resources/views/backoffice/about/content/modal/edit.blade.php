<div class="modal fade" id="contentEdit{{ $content->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/about/content/{{ $content->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Content Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" required class="form-control" value="{{ $content->title}}">
                            @if($errors->has('title'))
                            <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editor1" class="form-control">{{ $content->description }}</textarea>
                            @if($errors->has('description'))
                            <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="hidden" name="oldImage" value="{{ $content->thumbnail }}">
                            @if ($content->thumbnail)
                                <img src="{{ asset('storage/image/category/'. $content->thumbnail) }}" name="oldValue" value="$content->thumbnail" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                            @else
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImg()" id="image" name="thumbnail" class="form-control" id="image">
                            @if($errors->has('thumbnail'))
                            <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
                            @endif
                        </div>
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
</div><script>
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