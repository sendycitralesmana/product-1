<div class="modal fade" id="productSorot{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sorot Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    @if ($productsSorot->count() < 10)
                    <p>Anda yakin akan sorot produk {{$product->name}}</p>
                    @else
                    <p>Sorot produk maksimal 10, anda harus hapus sorot produk terlebih dahulu</p>
                    @endif
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>

                    @if ($productsSorot->count() < 10)
                    <a href="/backoffice/sorot-product/{{ $product->id }}/sorot" class="btn btn-success"><span class="fas fa-check"></span> Sorot</a>
                    @else
                    <a href="/backoffice/sorot-product/{{ $product->id }}/sorot" class="btn btn-success disabled"><span class="fas fa-check"></span> Sorot</a>
                    @endif
                    
                </div>
            </form>
        </div>
    </div>
</div>
