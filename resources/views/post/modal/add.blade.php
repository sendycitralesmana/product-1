<div class="modal fade" id="postAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form role="form" method="POST" action="/post/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="post_category_id" class="form-control">
                            <option value="">-- Select Category --</option>
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
                        <label>Title</label>
                        <input type="text" name="title" required class="form-control" placeholder="Enter title"
                            value="{{ old('title') }}">
                        @if($errors->has('title'))
                        <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>content</label>
                        <textarea name="content" id="editor" value="{{ old('content') }}"
                            class="form-control"></textarea>
                        @if($errors->has('content'))
                        <span class="help-block" style="color: red">{{ $errors->first('content') }}</span>
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
