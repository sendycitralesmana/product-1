<div class="modal fade" id="store_media{{ $mediaProduct->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/media-product/{{ $mediaProduct->id }}/update" enctype="multipart/form-data">
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
                        @if ($product != null)
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                            
                        @endif
                        <div class="form-group">
                            <label>Media Type</label>
                            <select name="type_id" class="form-control">
                                @foreach ($mediaTypes as $mediaType)
                                    <option value="{{ $mediaType->id }}" {{ ($mediaType->id == $mediaProduct->type_id) ? 'selected' : '' }}>{{ $mediaType->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('type_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $mediaProduct->name}}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Url</label>
                            <input type="text" name="url" class="form-control" value="{{ $mediaProduct->url}}">
                            @if($errors->has('url'))
                            <span class="help-block" style="color: red">{{ $errors->first('url') }}</span>
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
