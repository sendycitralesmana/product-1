<div class="modal fade" id="mediaAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/media/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dynamicAddRemoveVariant">
                        <tr>
                            <th>Type</th>
                            <th>Media</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="application_id" value="{{ $application->id }}">
                                <select name="type_id[]" id="media" onchange="changeMedia()" required class="form-control">
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
                                <input type="file" id="file" accept="" name="media[]" class="form-control" placeholder="Enter media" required>
                                @if($errors->has('media[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('media[]') }}</span>
                                @endif
                            </td>
                            <td><button type="button" name="add" id="add-btnVariant" class="btn btn-success">+</button></td>
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
<script>
    function changeMedia() {
        var input = document.getElementById('media').value
        if (input == 1) {
            document.getElementById('file').accept=".jpg, .jpeg, .png"
        } else if (input == 2) {
            document.getElementById('file').accept=".xls, .pdf, .doc"
        }
    }
</script>
<script type="text/javascript">
    var i = 0;

    $("#add-btnVariant").click(function () {

        ++i;

        $("#dynamicAddRemoveVariant").append(
            `<tr>
                <td>
                    <select name="type_id[]" required class="form-control">
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
                    <input type="file" accept=".jpg, .jpeg, .png, .xls, .pdf, " name="media[]" class="form-control" placeholder="Enter media" required>
                    @if($errors->has('media[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('media[]') }}</span>
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
