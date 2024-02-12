<div class="modal fade" id="postAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/post/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="post_category_id" class="form-control">
                            <option value="">-- Pilih kategori --</option>
                            @foreach ($postCategories as $postCategory)
                            <option value="{{ $postCategory->id }}">{{ $postCategory->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('post_category_id'))
                        <span class="help-block"
                            style="color: red">{{ $errors->first('post_category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Judul <span class="text-danger">*</span></label>
                        <input type="text" name="title" required class="form-control" placeholder="Enter title"
                            value="{{ old('title') }}">
                        @if($errors->has('title'))
                        <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Berita <span class="text-danger">*</span></label>
                        <textarea name="content" id="editor" value="{{ old('content') }}"
                            class="form-control"></textarea>
                        @if($errors->has('content'))
                        <span class="help-block" style="color: red">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImg()" id="image" name="thumbnail" class="form-control" placeholder="Enter Password" id="image">
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#add-btnVariant").click(function () {

        ++i;

        $("#dynamicAddRemoveVariant").append(
            `<tr>
                
                <td class="text-center">
                    <button type="button" class="btn btn-danger remove-tr">-</button>
                </td>
            </tr>`
        );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>

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
