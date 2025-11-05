<!-- Modal Delete -->
<div class="modal fade" id="modalTugasDestroy{{ $item->id }}" tabindex="-1"
    aria-labelledby="modalLabelDestroy{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalLabel{{ $item->id }}">Hapus {{ $title }}?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <!-- Data detail -->
                <!--  nama -->
                <div class="row mb-2">
                    <div class="col-6">Nama</div>
                    <div class="col-6">: {{ $item->user->nama }}</div>
                </div>
                <!-- email -->
                <div class="row mb-2">
                    <div class="col-6">Email</div>
                    <div class="col-6">
                        : <span class="badge badge-info">{{ $item->user->email }}</span>
                    </div>
                </div>
                <!-- jabatan -->
                <div class="row mb-2">
                    <div class="col-6">Jabatan</div>
                    <div class="col-6">
                        :
                        <span class="badge badge-info">{{ $item->user->jabatan }}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times"></i> Tutup
                </button>
                <form action="{{ route('tugasDestroy', $item->id )}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Show -->
<div class="modal fade" id="modalTugasShow{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabelShow{{ $item->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalLabelShow{{ $item->id }}">Detail {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <!-- Data detail -->
                <!--  nama -->
                <div class="row mb-2">
                    <div class="col-6">Nama</div>
                    <div class="col-6">: {{ $item->user->nama }}</div>
                </div>
                <!-- email -->
                <div class="row mb-2">
                    <div class="col-6">Email</div>
                    <div class="col-6">
                        : <span class="badge badge-info">{{ $item->user->email }}</span>
                    </div>
                </div>
                <!-- jabatan -->
                <div class="row mb-2">
                    <div class="col-6">Jabatan</div>
                    <div class="col-6">
                        :
                        <span class="badge badge-info">{{ $item->user->jabatan }}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>