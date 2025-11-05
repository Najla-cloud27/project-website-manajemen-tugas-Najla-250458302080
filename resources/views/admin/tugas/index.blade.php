@extends('layouts/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tasks mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="{{ route('tugasCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data Tugas
            </a>
        </div>

        <!-- pdf & Excel -->
        <div class="d-flex">
            <div class="mr-2">
                <a href="{{ route('tugasExcel') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
            </div>
            <div>
                <a href="{{ route('tugasPdf') }}" class="btn btn-sm btn-danger">
                    <i class=" fas fa-file-pdf mr-2"></i>
                    PDF
                </a>
            </div>
        </div>
        <!-- End Excel Pdf -->
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tugas</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Tanggal  -->
                    @foreach ($tugas as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>

                        <td class="text-center">
                            {{ $item->user ? $item->user->nama : '-' }}
                        </td>
                        <td class="text-center">{{ $item->tugas }}</td>
                        <td class="text-center">
                            <span class="badge badge-info">
                                {{ $item->tanggal_mulai }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge badge-info">
                                {{ $item->tanggal_selesai }}
                            </span>
                        </td>

                        <!-- Fungsi Tombol -->
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                data-target="#modalTugasShow{{ $item->id }}">
                                <i class="fa fa-eye"></i>
                            </button>
                            <a href="{{ route('tugasEdit', $item->id)}}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#modalTugasDestroy{{ $item->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <!-- Modal Hapus -->
                            @include('admin.tugas.modal', ['item' => $item, 'title' => $title])

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>
@endpush