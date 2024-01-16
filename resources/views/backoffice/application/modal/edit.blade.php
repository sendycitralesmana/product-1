<div class="modal fade" id="applicationEdit{{ $application->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/{{ $application->id }}/update" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $application->name}}">
                            @if($errors->has('name'))
                            <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Area</label>
                            <input type="text" name="area" class="form-control" value="{{ $application->area }}">
                            @if($errors->has('area'))
                            <span class="help-block" style="color: red">{{ $errors->first('area') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input type="datetime-local" name="time" class="form-control" value="{{ $application->time }}">
                            @if($errors->has('time'))
                            <span class="help-block" style="color: red">{{ $errors->first('time') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Client</label>
                            <select name="client_id" class="form-control">
                                <option value="">-- Select Client --</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ ($client->id == $application->client_id) ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('client_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="hidden" name="oldImage" value="{{ $application->thumbnail }}">
                            @if ($application->thumbnail)
                                <img src="{{ asset('storage/image/application/'. $application->thumbnail) }}" name="oldValue" value="$application->thumbnail" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                            @else
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input type="file" accept=".jpg, .jpeg, .png, .svg" onchange="previewImg()" id="image" name="thumbnail" class="form-control" placeholder="Enter Password">
                            @if($errors->has('thumbnail'))
                            <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
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
<script>
    function previewImg() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>