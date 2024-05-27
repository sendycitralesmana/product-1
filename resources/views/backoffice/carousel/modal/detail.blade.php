<div class="modal fade" id="carouselDetail{{$carousel->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Carousel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-outline card-primary">
                        <div class="">
                            <img src="{{Storage::disk('s3')->url($carousel->image)}}" alt=""
                                class="img-fluid rounded" style="height: 200px; width: 100%">
                            <div class="p-2">
                                @if ($carousel->title)
                                    <h5>
                                        <b>{{ $carousel->title }}</b>
                                    </h5>
                                @else
                                    <h5> Tidak ada judul </h5>
                                @endif
                                @if ($carousel->description)
                                    <p>{{ $carousel->description }}</p>
                                @else
                                    <p> Tidak ada deskripsi </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-arrow-left"></span> Kembali</button>
                    <a href="/backoffice/carousel/{{ $carousel->id }}/delete" class="btn btn-danger"><span class="fas fa-trash"></span> Hapus</a>
                </div> --}}
            </form>
        </div>
    </div>
</div>
