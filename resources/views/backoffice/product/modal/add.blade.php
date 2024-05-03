<div class="modal fade" id="productAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Kategori <span class="text-danger">*</span></label>
                                <select name="product_category_id" class="form-control" required 
                                oninvalid="this.setCustomValidity('Product Category harus dipilih!')"
                                oninput="this.setCustomValidity('')">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($productCategories as $productCategory)
                                        <option value="{{ $productCategory->id }}" @selected(old('product_category_id') == $productCategory->id) >{{ $productCategory->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('product_category_id'))
                                <span class="help-block"
                                    style="color: red">{{ $errors->first('product_category_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama <span class="text-danger">*</span></label>
                                <input type="text" name="name" required class="form-control" placeholder="Enter Name"
                                oninvalid="this.setCustomValidity('Nama harus diisi!')"
                                oninput="this.setCustomValidity('')"
                                    value="{{ old('name') }}">
                                @if($errors->has('name'))
                                <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Deskripsi </label>
                                <textarea name="description" id="editor" value="{{ old('description') }}"
                                    class="form-control"></textarea>
                                @if($errors->has('description'))
                                <span class="help-block" style="color: red">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Gambar <span class="text-danger">*</span></label>
                                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                <input type="file" accept="image/*" onchange="previewImg()" id="image" name="thumbnail" class="form-control" 
                                    id="image" required oninvalid="this.setCustomValidity('Gambar harus diisi!')"
                                    oninput="this.setCustomValidity('')">
                                @if($errors->has('thumbnail'))
                                <span class="help-block" style="color: red">{{ $errors->first('thumbnail') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <table class="table" id="dynamicAddRemoveVariant">
                                <tr>
                                    <th style="width: 70%">Proyek</th>
                                    <th style="width: 30%" class="text-center"><button type="button" name="add"
                                            id="add-btnVariant" class="btn btn-success"><i class="fa fa-plus"></i></button></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Simpan</button>
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
                    <select name="application_id[]" required class="form-control"
                        oninvalid="this.setCustomValidity('Proyek harus dipilih!')"
                        oninput="this.setCustomValidity('')">
                        <option value="">-- Select application --</option>
                        @foreach ($applications as $application)
                            <option value="{{ $application->id }}">{{ $application->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('application_id[]'))
                    <span class="help-block" style="color: red">{{ $errors->first('application_id[]') }}</span>
                    @endif
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger remove-tr">-</button>
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
