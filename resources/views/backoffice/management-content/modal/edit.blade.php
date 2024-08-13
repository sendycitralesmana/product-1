<div class="modal fade" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <form role="form" method="POST" action="/backoffice/management-content/{{ $item->id }}/edit" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Ubah Manajemen Konten</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    @method('put')
                    @if ($item->id == 1)
                    <div class="form-group">
                        <label>{{ $item->name }} </label>
                        <textarea name="description" id="editor" value="{{ $item->description }}"
                            class="form-control">{{ $item->description }}</textarea>
                        @if($errors->has('description'))
                        <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    @elseif ($item->id == 2)
                    <div class="form-group">
                        <label>{{ $item->name }} </label>
                        <textarea name="description" id="editor1" value="{{ $item->description }}"
                            class="form-control">{{ $item->description }}</textarea>
                        @if($errors->has('description'))
                        <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    @else
                    <div class="form-group">
                        <label>{{ $item->name }} <span class="text-danger">*</span></label>
                        <input type="text" name="description" required class="form-control"
                            placeholder="{{ $item->name }}" oninvalid="this.setCustomValidity('Nama harus diisi!')"
                            oninput="this.setCustomValidity('')" value="{{ $item->description }}">
                        <small>Jika data lebih dari satu gunakan | untuk memisahkan</small>
                        @if($errors->has('description'))
                        <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span
                            class="fas fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Ubah
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
