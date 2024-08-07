<div class="modal fade" id="fileEdit{{ $file->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/{{ $application->id }}/file/{{ $file->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Berkas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <input type="hidden" name="application_id" value="{{ $application->id }}">
                        <div class="form-group">
                            <label>Berkas</label>
                            <input type="hidden" name="oldName" value="{{ $file->name }}">
                            <input type="hidden" name="oldUrl" value="{{ $file->url }}">
                            <img src="{{asset('images/pdf.png')}}" class="image-preview img-fluid mb-1 col-sm-5 d-block" alt=""
                            style="100px; height: 100px">
                            <p> {{ $file->name }} </p>
                            <input type="file" accept=".pdf" name="media" class="form-control" value="{{ $file->name}}">
                            @if($errors->has('media'))
                            <span class="help-block" style="color: red">{{ $errors->first('media') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>