<div class="modal fade" id="carouselDelete{{$carousel->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Carousel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ Storage::disk('s3')->url($carousel->image) }}" class="img-fluid rounded" alt=""
                    style="width: 100%; height: 300px">
                    <p class="">
                        <b>Anda yakin akan hapus?</b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <a href="/backoffice/carousel/{{ $carousel->id }}/delete" class="btn btn-danger"><span class="fas fa-trash"></span> Hapus</a>
                </div>
            </form>
        </div>
    </div>
</div>
