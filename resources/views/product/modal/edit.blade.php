<div class="modal fade" id="productEdit{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/product/{{ $product->id }}/update" enctype="multipart/form-data">
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
                            <label>Category</label>
                            <select name="product_category_id" class="form-control" required>
                                @foreach ($productCategories as $productCategory)
                                    <option value="{{ $productCategory->id }}" {{ ($productCategory->id == $product->product_category_id) ? 'selected' : '' }}>{{ $productCategory->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_category_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('product_category_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required class="form-control" value="{{ $product->name}}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editor1" class="form-control">{{ $product->description }}</textarea>
                            @if($errors->has('description'))
                            <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
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
