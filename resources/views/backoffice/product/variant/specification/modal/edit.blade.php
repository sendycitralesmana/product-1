<div class="modal fade" id="variantSpecEdit{{ $pvSpecification->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/vs/{{ $pvSpecification->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit spesifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="product_variant_id" value="{{ $productVariant->id }}">
                        <div class="form-group">
                            <label>Spesifikasi</label>
                            {{-- <input type="text" name="specification_id" class="form-control" value="{{ $pvSpecification->specification->name}}" readonly> --}}
                            <select name="specification_id" required class="form-control">
                                @foreach ($specifications as $specification)
                                    <option value="{{ $specification->id }}" {{ $specification->id == $pvSpecification->specification_id ? 'selected' : '' }}>{{ $specification->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="value" class="form-control" value="{{ $pvSpecification->value}}" required>
                            {{-- <input type="text" name="value" class="form-control" value="{{ $pvSpecification->value}}" required oninvalid="this.setCustomValidity('Enter User Name Here')"> --}}
                            @if($errors->has('value'))
                            <span class="help-block" style="color: red">{{ $errors->first('value') }}</span>
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
