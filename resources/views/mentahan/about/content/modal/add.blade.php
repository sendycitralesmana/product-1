<div class="modal fade" id="contentAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form role="form" method="POST" action="/about/content/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required class="form-control" placeholder="Enter title"
                            value="{{ old('title') }}">
                        @if($errors->has('title'))
                        <span class="help-block" style="color: red">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="editor" value="{{ old('description') }}"
                            class="form-control"></textarea>
                        @if($errors->has('description'))
                        <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>