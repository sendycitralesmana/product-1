<div class="modal fade" id="store_media" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/media-product/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- <div class="card-body">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @if ($mediaTypesC < 0 )
                            hello
                        @endif
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type_id" class="form-control">
                                <option value="">-- Select Type --</option>
                                @foreach ($mediaTypes as $mediaType)
                                    <option value="{{ $mediaType->id }}">{{ $mediaType->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('type_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Url</label>
                            <input type="text" name="url" class="form-control" placeholder="Enter url">
                            @if($errors->has('url'))
                            <span class="help-block" style="color: red">{{ $errors->first('url') }}</span>
                            @endif
                        </div>
                    </div> --}}
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                <select name="type_id[]" id="" class="form-control" required>
                                    <option value="">-- Select Type --</option>
                                    @foreach ($mediaTypes as $mediaType)
                                        <option value="{{ $mediaType->id }}">{{ $mediaType->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('type_id[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('type_id[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="name[]" class="form-control" placeholder="Enter Name" required>
                                @if($errors->has('name[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="url[]" class="form-control" placeholder="Enter url" required>
                                @if($errors->has('url[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('url[]') }}</span>
                                @endif
                            </td>
                            <td><button type="button" name="add" id="add-btn" class="btn btn-success">+</button></td>
                        </tr>
                    </table>
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

    $("#add-btn").click(function () {

        ++i;

        $("#dynamicAddRemove").append(
            `<tr>
                <td>
                    <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                    <select name="type_id[]" id="" class="form-control" required>
                        <option value="">-- Select Type --</option>
                        @foreach ($mediaTypes as $mediaType)
                            <option value="{{ $mediaType->id }}">{{ $mediaType->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('type_id[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('type_id[]') }}</span>
                    @endif
                </td>
                <td>
                    <input type="text" name="name[]" class="form-control" placeholder="Enter Name" required>
                    @if($errors->has('name[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('name[]') }}</span>
                    @endif
                </td>
                <td>
                    <input type="text" name="url[]" class="form-control" placeholder="Enter url" required>
                    @if($errors->has('url[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('url[]') }}</span>
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
