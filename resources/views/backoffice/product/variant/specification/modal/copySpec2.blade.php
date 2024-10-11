<div class="modal fade" id="copySpec2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product->id }}/variant/create" 
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Copy spesifikasi dari variant yang sudah ada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label>Variant</label>
                        <select name="variant_id" id="variant_id" class="form-control select2">
                            <option value="">-- Pilih Variant --</option>

                            {{-- foreach $variant where spec not null --}}
                            @foreach ($variants as $variant)
                                <option value="{{ $variant->id }}">
                                    {{ $variant->name }}
                                </option>
                            @endforeach
                            

                            {{-- @foreach ($variants as $variant)
                                <option value="{{ $variant->id }}">
                                    {{ $variant->name }}
                                </option>
                            @endforeach --}}
                        </select>
                        @if($errors->has('name'))
                        <span class="help-block" style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <a  id="toggle">
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  --}}
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
{{-- <script>
    $(document).ready(function () {
        $('#variant_id').on('change', function () {
            var variant_id = $(this).val();
            console.log("variant_id : " + variant_id);
            if (variant_id) {
                $.ajax({
                    type: 'GET',
                    url: '/backoffice/variant/' + variant_id + '/spec',
                    success: function (data) {
                        if (data) {
                            console.log(data);
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
                                        ` + $.each(data, function (key, value) { return `<tr key="` + key + `"><td>` + value.specification.name + `</td><td>` + value.value + `</td></tr>` }).join('') + `
                                    </tbody>
                                </table>`
                            );
                        } else {
                            $("#spec").empty();
                        }
                    }
                });
            }
        })
    })
</script> --}}
<script>
    $(document).ready(function () {
        $('#variant_id').on('change', function () {
            var variant = {{ $variantAktif->id }}
            console.log("variant : " + variant);
            var variant_id = $(this).val();
            // append a href to copy spec
            if (variant_id) {
                $.ajax({
                    type: 'GET',
                    url: '/backoffice/variant/' + variant_id + '/spec',
                    success: function (data) {
                        if (data) {
                            console.log(data);
                            $("#spec").empty();
                            $("#spec").append(
                                // table each $data
                                `<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Spesifikasi</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ` + $.each(data, function (key, value) { return `<tr key="` + key + `"><td>` + value.specification.name + `</td><td>` + value.value + `</td></tr>` }).join('') + `
                                    </tbody>
                                </table>`
                            );
                        } else {
                            $("#spec").empty();
                        }
                    }
                });
                // cek if #toggle null
                if ($('#toggle').children().length == 0) {
                    $("#toggle").append(
                        `<a href="/backoffice/variant/${ variant }/req-variant/${ variant_id }/copy-spec" class="btn btn-success" id="toggle">
                            <i class="fa fa-copy"></i> Copy spesifikasi variant
                        </a>`
                    )
                } else {
                    $("#toggle").empty();
                    $("#toggle").append(
                        `<a href="/backoffice/variant/${ $variant }/req-variant/${ variant_id }/copy-spec" class="btn btn-success" id="toggle">
                            <i class="fa fa-copy"></i> Copy spesifikasi variant
                        </a>`
                    )
                }
            } else if (variant_id == null) {
                $("#spec").empty();
                $("#toggle").remove();
            }
        })
    })
</script>
{{--  --}}