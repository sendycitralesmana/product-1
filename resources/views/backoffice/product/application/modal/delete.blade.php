<div class="modal fade" id="applicationDelete{{$application->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus proyek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin akan hapus {{$application->application->name}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                {{-- <button type="submit" class="btn btn-success">Save changes</button> --}}
                <a href="/backoffice/product/application/{{ $application->id }}/delete"
                    class="btn btn-success">Hapus</a>
            </div>
        </div>
    </div>
</div>
