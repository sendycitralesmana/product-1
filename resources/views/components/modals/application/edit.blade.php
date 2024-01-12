<div class="modal fade" id="applicationEdit{{ $application->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/application/{{ $application->id }}/update" enctype="multipart/form-data">
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
                        {{-- @if ($product != null)
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @endif --}}
                        <div class="form-group">
                            <label>Product</label>
                            <select name="product_id" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ ($product->id == $application->product_id) ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_id'))
                            <span class="help-block" style="color: red">{{ $errors->first('product_id') }}</span>
                            @endif
                        </div>
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
