<div class="modal fade" id="mediaEdit{{ $mediaApplication->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/media/{{ $mediaApplication->id }}/update" enctype="multipart/form-data">
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
                        <input type="hidden" name="application_id" value="{{ $application->id }}">
                        <input type="hidden" name="type_id" value="{{ $mediaApplication->type_id }}">
                        <div class="form-group">
                            <label>Media</label>
                            <input type="hidden" name="oldName" value="{{ $mediaApplication->name }}">
                            <input type="hidden" name="oldUrl" value="{{ $mediaApplication->url }}">
                            <p> {{ $mediaApplication->url }} </p>
                            <input type="file" accept=".jpg, .jpeg, .png, .xls, .pdf, .doc" name="media" class="form-control" value="{{ $mediaApplication->name}}">
                            @if($errors->has('media'))
                            <span class="help-block" style="color: red">{{ $errors->first('media') }}</span>
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