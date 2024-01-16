<div class="modal fade" id="userEdit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/user/{{ $user->id }}/update" enctype="multipart/form-data">
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
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="hidden" name="oldImage" value="{{ $user->avatar }}">
                            @if ($user->avatar)
                                <img src="{{ asset('storage/image/category/'. $user->avatar) }}" name="oldValue" value="$user->avatar" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                            @else
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImage()" id="image" name="avatar" class="form-control" placeholder="Enter Password">
                            @if($errors->has('avatar'))
                            <span class="help-block" style="color: red">{{ $errors->first('avatar') }}</span>
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