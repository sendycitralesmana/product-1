<div class="modal fade" id="addProductVariant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/variant/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Varian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}"
                        oninvalid="this.setCustomValidity('Nama harus diisi!')"
                        oninput="this.setCustomValidity('')" required>
                        @if($errors->has('name'))
                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" min="1" name="price" class="form-control" placeholder="Enter price" value="{{ old('price') }}"
                        oninvalid="this.setCustomValidity('Harus diisi')"
                        oninput="this.setCustomValidity('')" required>
                        @if($errors->has('price'))
                        <span class="help-block" style="color: red">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Long</label>
                        <input type="text" name="long" class="form-control" placeholder="Enter long" value="{{ old('long') }}">
                        @if($errors->has('long'))
                        <span class="help-block" style="color: red">{{ $errors->first('long') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Weight</label>
                        <input type="text" name="weight" class="form-control" placeholder="Enter weight" value="{{ old('weight') }}">
                        @if($errors->has('weight'))
                        <span class="help-block" style="color: red">{{ $errors->first('weight') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Width</label>
                        <input type="text" name="width" class="form-control" placeholder="Enter width" value="{{ old('width') }}">
                        @if($errors->has('width'))
                        <span class="help-block" style="color: red">{{ $errors->first('width') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Height</label>
                        <input type="text" name="height" class="form-control" placeholder="Enter height" value="{{ old('height') }}">
                        @if($errors->has('height'))
                        <span class="help-block" style="color: red">{{ $errors->first('height') }}</span>
                        @endif
                    </div>

                    {{-- <table class="table table-bordered" id="dynamicAddRemoveVariant">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Long</th>
                            <th>Weight</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
                                @if($errors->has('name[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="number" min="1" name="price[]" class="form-control" placeholder="Enter price" required>
                                @if($errors->has('price[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('price[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="long[]" class="form-control" placeholder="Enter long" required>
                                @if($errors->has('long[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('long[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="weight[]" class="form-control" placeholder="Enter weight" required>
                                @if($errors->has('weight[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('weight[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="width[]" class="form-control" placeholder="Enter width" required>
                                @if($errors->has('width[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('width[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="height[]" class="form-control" placeholder="Enter height" required>
                                @if($errors->has('height[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('height[]') }}</span>
                                @endif
                            </td>
                            <td><button type="button" name="add" id="add-btnVariant" class="btn btn-success">+</button></td>
                        </tr>
                    </table> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Simpan</button>
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
                            <td>
                                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
                                @if($errors->has('name[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="number" min="1" name="price[]" class="form-control" placeholder="Enter price" required>
                                @if($errors->has('price[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('price[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="long[]" class="form-control" placeholder="Enter long" required>
                                @if($errors->has('long[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('long[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="weight[]" class="form-control" placeholder="Enter weight" required>
                                @if($errors->has('weight[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('weight[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="width[]" class="form-control" placeholder="Enter width" required>
                                @if($errors->has('width[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('width[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="height[]" class="form-control" placeholder="Enter height" required>
                                @if($errors->has('height[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('height[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger remove-tr">-</button>
                            </td>
                        </tr>`
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
{{--  --}}