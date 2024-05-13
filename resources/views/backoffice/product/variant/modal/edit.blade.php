<div class="modal fade" id="editProductVariant{{ $productVariant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/{{ $productVariant->id }}/update" 
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Varian</h5>
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
                            <label>Varian</label>
                            <input type="text" name="name" class="form-control" value="{{ $productVariant->name}}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        {{-- <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="{{ $productVariant->price}}">
                            @if($errors->has('price'))
                            <span class="help-block" style="color: red">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Long</label>
                            <input type="teks" name="long" class="form-control" value="{{ $productVariant->long}}">
                            @if($errors->has('long'))
                            <span class="help-block" style="color: red">{{ $errors->first('long') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="teks" name="weight" class="form-control" value="{{ $productVariant->weight}}">
                            @if($errors->has('weight'))
                            <span class="help-block" style="color: red">{{ $errors->first('weight') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Width</label>
                            <input type="teks" name="width" class="form-control" value="{{ $productVariant->width}}">
                            @if($errors->has('width'))
                            <span class="help-block" style="color: red">{{ $errors->first('width') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Height</label>
                            <input type="teks" name="height" class="form-control" value="{{ $productVariant->height}}">
                            @if($errors->has('height'))
                            <span class="help-block" style="color: red">{{ $errors->first('height') }}</span>
                            @endif
                        </div> --}}
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fas fa-edit"></span> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
