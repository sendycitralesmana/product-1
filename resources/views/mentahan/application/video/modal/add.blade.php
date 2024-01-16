<div class="modal fade" id="videoAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/application/video/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dynamicAddRemoveVideo">
                        <tr>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="application_id[]" value="{{ $application->id }}">
                                <input type="text" name="url[]" class="form-control" placeholder="Enter url" required>
                                @if($errors->has('url[]'))
                                <span class="help-block" style="color: red">{{ $errors->first('url[]') }}</span>
                                @endif
                            </td>
                            <td><button type="button" name="add" id="add-btnVideo" class="btn btn-success">+</button></td>
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

    $("#add-btnVideo").click(function () {

        ++i;

        $("#dynamicAddRemoveVideo").append(
            `<tr>
                <td>
                    <input type="hidden" name="application_id[]" value="{{ $application->id }}">
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