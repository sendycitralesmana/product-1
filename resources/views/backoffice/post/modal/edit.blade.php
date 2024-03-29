<div class="modal fade" id="postEdit{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/post/{{ $post->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="post_category_id" class="form-control">
                                <option value="">-- Pilih kategori --</option>
                                @foreach ($postCategories as $postCategory)
                                    <option value="{{ $postCategory->id }}" {{ ($postCategory->id == $post->post_category_id) ? 'selected' : '' }}>{{ $postCategory->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('post_category_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('post_category_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Judul <span class="text-danger">*</span></label>
                            <input type="text" name="title" required class="form-control" value="{{ $post->title}}">
                            @if($errors->has('title'))
                            <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Berita <span class="text-danger">*</span></label>
                            <textarea name="content" id="editor1" class="form-control">{{ $post->content }}</textarea>
                            @if($errors->has('content'))
                            <span class="help-block" style="color: red">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="hidden" name="oldImage" value="{{ $post->thumbnail }}">
                            @if ($post->thumbnail)
                                <img src="{{ asset('storage/image/post/'. $post->thumbnail) }}" name="oldValue" value="$post->thumbnail" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                            @else
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImg()" id="image" name="thumbnail" class="form-control" placeholder="Enter Password" id="image">
                            @if($errors->has('thumbnail'))
                            <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
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