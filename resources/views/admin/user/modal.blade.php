<!-- Modal -->
<div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalLabel{{ $item->id }}">Hapus {{ $title }}?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <!-- Nama -->
                <div class="row mb-2">
                    <div class="col-6">Nama</div>
                    <div class="col-6">: {{ $item->nama }}</div>
                </div>
                <!-- Email -->
                <div class="row mb-2">
                    <div class="col-6">Email</div>
                    <div class="col-6">
                        :
                        <span class="badge badge-info">
                            {{ $item->email }}
                        </span>
                    </div>
                </div>
                <!-- Jabatan -->
                <div class="row mb-2">
                    <div class="col-6">Jabatan</div>
                    <div class="col-6">
                        :
                        @if ($item->jabatan == 'Admin')
                        <span class="badge badge-primary">
                            {{ $item->jabatan }}
                        </span>
                        @else
                        <span class="badge badge-info">
                            {{ $item->jabatan }}
                        </span>
                        @endif
                    </div>
                </div>
                <!-- status -->
                <div class="row mb-2">
                    <div class="col-6">Status</div>
                    <div class="col-6">
                        :
                        @if ($item->is_tugas == false)
                        <span class="badge badge-danger">
                            Belum Ditugaskan
                        </span>
                        @else
                        <span class="badge badge-success">
                            Sudah Ditugaskan
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times"></i> Tutup
                </button>
                <form action="{{ route('userDestroy', $item->id )}}" method="POST" class="d-inline">
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