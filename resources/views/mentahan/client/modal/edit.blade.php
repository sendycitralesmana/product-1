<div class="modal fade" id="clientEdit{{ $client->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/client/{{ $client->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required class="form-control" value="{{ $client->name}}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="url" name="link" required class="form-control" value="{{ $client->link}}">
                            @if($errors->has('link'))
                            <span class="help-block" style="color: red">{{ $errors->first('link') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="hidden" name="oldImage" value="{{ $client->image }}">
                            @if ($client->image)
                                <img src="{{ asset('storage/image/client/'. $client->image) }}" name="oldValue" value="$client->image" class="img-previewP img-fluid mb-3 col-sm-5 d-block" alt="">
                            @else
                                <img src="" class="img-previewP img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImgP()" id="imageP" name="image" class="form-control" placeholder="Enter Password" id="image">
                            @if($errors->has('image'))
                            <span class="help-block" style="color: red">{{ $errors->first('image') }}</span>
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