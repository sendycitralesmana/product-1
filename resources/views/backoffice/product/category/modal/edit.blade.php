<div class="modal fade" id="categoryEdit{{ $productCategory->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/category/{{ $productCategory->id }}/update" 
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="name" class="form-control" value="{{ $productCategory->name }}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        {{-- <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editor1" class="form-control">{{ $productCategory->description }}</textarea>
                            @if($errors->has('description'))
                            <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                            @endif
                        </div> --}}
                        <div class="form-group">
                            <label>Ikon</label>
                            <input type="hidden" name="oldIcon" value="{{ $productCategory->icon }}">
                            @if ($productCategory->icon)
                                {{-- <img src="{{ Storage::disk('s3')->url($productCategory->icon) }}" name="oldValue"
                                class="ikonR img-fluid mb-3 col-sm-5 d-block" alt="" style="width: 150px; height: 150px"> --}}

                                {{-- img src change color  --}}
                                <img src="{{ Storage::disk('s3')->url($productCategory->icon) }}" name="oldValue"
                                class="ikonR img-fluid mb-3 col-sm-5 d-block" alt="" style="width: 150px; height: 150px; 
                                filter: brightness(0) saturate(100%) invert(0%) sepia(1%) saturate(13%) hue-rotate(69deg) brightness(117%) contrast(100%);">

                            @else
                                <img src="" class="ikonR img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept=".svg" onchange="ikonR()" id="image" name="ikon" class="form-control" placeholder="Enter Password" id="ikon">
                            @if($errors->has('ikon'))
                            <span class="help-block" style="color: red">{{ $errors->first('ikon') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="hidden" name="oldImage" value="{{ $productCategory->thumbnail }}">
                            @if ($productCategory->thumbnail)
                                <img src="{{ Storage::disk('s3')->url($productCategory->thumbnail) }}" name="oldValue" 
                                class="thumbnail img-fluid mb-3 col-sm-5 d-block" alt="" style="width: 150px; height: 150px">
                            @else
                                <img src="" class="thumbnail img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept="image/*" onchange="thumbnailR()" id="image" name="thumbnail" class="form-control" placeholder="Enter Password" id="thumbnail">
                            @if($errors->has('thumbnail'))
                            <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <script>
    function ikonR() {
        const image = document.querySelector('#ikonR')
        const imgPreview = document.querySelector('.ikonR')

        imgPreview.style.display = 'block'
        imgPreview.style.width = '150px'
        imgPreview.style.height = '150px'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>
<script>
    function thumbnailR() {
        const image = document.querySelector('#thumbnail')
        const imgPreview = document.querySelector('.thumbnail')

        imgPreview.style.display = 'block'
        imgPreview.style.width = '150px'
        imgPreview.style.height = '150px'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script> --}}