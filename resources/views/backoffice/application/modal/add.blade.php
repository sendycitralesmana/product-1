<div class="modal fade" id="applicationAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/application/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Judul <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan judul" required
                                oninvalid="this.setCustomValidity('Judul harus diisi!')"
                                oninput="this.setCustomValidity('')">
                                @if($errors->has('name'))
                                <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="description" id="editor" value="{{ old('description') }}"
                                    class="form-control"></textarea>
                                @if($errors->has('description'))
                                <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Area <span class="text-danger">*</span></label>
                                <input type="text" name="area" class="form-control" placeholder="Masukkan Area" required
                                oninvalid="this.setCustomValidity('Area harus diisi!')"
                                oninput="this.setCustomValidity('')">
                                @if($errors->has('area'))
                                <span class="help-block" style="color: red">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Waktu <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="time" class="form-control" required
                                oninvalid="this.setCustomValidity('Waktu harus diisi!')"
                                oninput="this.setCustomValidity('')">
                                @if($errors->has('time'))
                                <span class="help-block" style="color: red">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Klien</label>
                                <select name="client_id" class="form-control" id="">
                                    <option value="">-- Pilih klien --</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('client'))
                                <span class="help-block" style="color: red">{{ $errors->first('client') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Gambar </label>
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                <input type="file" accept="image/*" onchange="previewImg()" id="image" name="thumbnail" class="form-control" placeholder="Enter Password" 
                                id="image" required
                                oninvalid="this.setCustomValidity('Gambar harus diisi!')"
                                oninput="this.setCustomValidity('')">
                                @if($errors->has('thumbnail'))
                                <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <table class="table" id="dynamicAddRemoveVariant">
                                <tr>
                                    <th style="width: 70%">Produk</th>
                                    <th style="width: 30%" class="text-center"><button type="button" name="add" id="add-btnVariant" class="btn btn-success"><i class="fa fa-plus"></i></button></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;

    $("#add-btnVariant").click(function () {

        ++i;

        $("#dynamicAddRemoveVariant").append(
            `<tr>
                <td>
                    <select name="product_id[]" required class="form-control select2"
                        oninvalid="this.setCustomValidity('Produk harus dipilih!')"
                        oninput="this.setCustomValidity('')">
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('product_id[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('product_id[]') }}</span>
                    @endif
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger remove-tr"><span class="fa fa-trash"></span></button>
                </td>
            </tr>`
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
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
{{--  --}}