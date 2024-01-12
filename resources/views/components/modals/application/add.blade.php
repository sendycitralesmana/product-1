<div class="modal fade" id="applicationAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form role="form" method="POST" action="/application/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                @if($errors->has('name'))
                                <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Area</label>
                                <input type="text" name="area" class="form-control" placeholder="Enter Area" required>
                                @if($errors->has('area'))
                                <span class="help-block" style="color: red">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Time</label>
                                <input type="datetime-local" name="time" class="form-control" required>
                                @if($errors->has('time'))
                                <span class="help-block" style="color: red">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <table class="table" id="dynamicAddRemoveVariant">
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center"><button type="button" name="add" id="add-btnVariant" class="btn btn-success">+</button></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    {{-- <table class="table table-bordered" id="dynamicAddRemoveVariant">
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="product_id[]" required class="form-control">
                                    <option value="">-- Select Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('price[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('price[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
                                @if($errors->has('name[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="area[]" class="form-control" placeholder="Enter area" required>
                                @if($errors->has('area[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('area[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="datetime-local" name="time[]" class="form-control" placeholder="Enter time" required>
                                @if($errors->has('time[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('time[]') }}</span>
                                @endif
                            </td>
                            <td><button type="button" name="add" id="add-btnVariant" class="btn btn-success">+</button></td>
                        </tr>
                    </table> --}}
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
                <td>
                    <select name="product_id[]" required class="form-control">
                        <option value="">-- Select Product --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('product_id[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('product_id[]') }}</span>
                    @endif
                </td>
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
{{--  --}}