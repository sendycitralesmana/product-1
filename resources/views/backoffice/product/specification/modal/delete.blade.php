<div class="modal fade" id="specDelete{{ $specification->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Spesifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan hapus {{$specification->name}}
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    {{-- <button type="submit" class="btn btn-success">Save changes</button> --}}
                    <a href="/backoffice/product/category/{{ $pCategory->id }}/product/{{ $product }}/variant/{{ $variant->id }}/variant-specification/specification/{{ $specification->id }}/delete" 
                        class="btn btn-danger">
                        <span class="fas fa-trash"></span> Hapus
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
