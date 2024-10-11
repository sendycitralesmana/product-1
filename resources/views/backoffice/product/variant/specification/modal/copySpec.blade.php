<div class="modal fade" id="copySpec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/create" 
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Copy specification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label>Product Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($pCategorys as $pCategory)
                                <option value="{{ $pCategory->id }}">{{ $pCategory->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('name'))
                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product</label>
                        <select name="product_id" id="product_id" class="form-control">
                            
                        </select>
                        @if($errors->has('name'))
                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Varian</label>
                        <select name="variant_id" id="variant_id" class="form-control">
                            
                        </select>
                        @if($errors->has('name'))
                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <a id="toggle2">

                    </a>
                    {{-- <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/{{ $variant->id }}/copy-spec" class="btn btn-success" id="toggle2">
                        <i class="fa fa-copy"></i> Copy spesifikasi variant
                    </a> --}}
                </div>
            </form>
        </div>
    </div>
</div>

{{--  --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#category_id').on('change', function () {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    type: 'GET',
                    url: '/backoffice/product/category/' + category_id + '/productCategory',
                    success: function (data) {
                        if (data) {
                            $("#product_id").empty();
                            $("#product_id").append('<option value="">-- Pilih Product --</option>');
                            $.each(data, function (key, product) {
                                $("#product_id").append('<option value="' + product.id + '">' + product.name + '</option>');
                            });
                        } else {
                            $("#product_id").empty();
                            $("#variant_id").remove();
                        }
                    }
                });
            }
        })
    })
</script>
<script>
    $(document).ready(function () {
        $('#product_id').on('change', function () {
            var category_id = $('#category_id').val();
            var product_id = $(this).val();
            console.log("category_id : " + category_id + " product_id : " + product_id);
            if (product_id) {
                $.ajax({
                    type: 'GET',
                    url: '/backoffice/product/category/' + category_id + '/product/' + product_id + '/variant/productVariant',
                    success: function (dataVariant) {
                        if (dataVariant) {
                            $("#variant_id").empty();
                            $("#variant_id").append('<option value="">-- Pilih Varian --</option>');
                            $.each(dataVariant, function (key, variant) {
                                $("#variant_id").append('<option value="' + variant.id + '">' + variant.name + '</option>');
                            });
                        } else {
                            $("#variant_id").empty();
                            
                        }
                    }
                });
            }
        })
    })
</script>
<script>
    $(document).ready(function () {
        $('#variant_id').on('change', function () {
            var variant = {{ $variantAktif->id }}
            var variant_id = $(this).val();
            if (variant_id) {
                if ($('#toggle2').children().length == 0) {
                    $("#toggle2").append(
                        `<a href="/backoffice/variant/${ variant }/req-variant/${ variant_id }/copy-spec" class="btn btn-success" id="toggle2">
                            <i class="fa fa-copy"></i> Copy spesifikasi variant
                        </a>`
                    )
                } else {
                    $("#toggle2").empty();
                    $("#toggle2").append(
                        `<a href="/backoffice/variant/${ variant }/req-variant/${ variant_id }/copy-spec" class="btn btn-success" id="toggle2">
                            <i class="fa fa-copy"></i> Copy spesifikasi variant
                        </a>`
                    )
                }
            }
        })
        $('#variant_id').on('change', function () {
            variant_id = $(this).val();
            if (variant_id) {
                $.ajax({
                    type: 'GET',
                    url: '/backoffice/variant/' + variant_id + '/spec',
                    success: function (dataSpec) {
                        if (dataSpec) {
                            console.log("dataSpec : " + variant_id);
                            $("#spec").empty();
                            $("#spec").append(
                                `<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Spesifikasi</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ` + $.each(dataSpec, function (key, value) { return `<tr key="` + key + `"><td>` + value.specification.name + `</td><td>` + value.value + `</td></tr>` }).join('') + `
                                    </tbody>
                                </table>`
                            );
                        } else {
                            $("#spec").empty();
                        }
                    }
                });
            }
        });
    })
</script>
{{--  --}}