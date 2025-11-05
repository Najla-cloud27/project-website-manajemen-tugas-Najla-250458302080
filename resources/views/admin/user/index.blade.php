@extends('layouts/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="{{ route('userCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data User
            </a>
        </div>

        <div class="d-flex">
            <div class="mr-2">
                <a href="{{ route('userExcel') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
            </div>
            <div>
                <a href="{{ route('userPdf') }}" class="btn btn-sm btn-danger" target="_blank">
                    <i class=" fas fa-file-pdf mr-2"></i>
                    PDF
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Admin -->
                    @foreach ($user as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            {{ $item->nama }}
                        </td>
                        <td class="text-center">
                            <span class="badge badge-info">
                                {{ $item->email }}
                            </span>
                        </td>
                        <!-- Karyawan -->
                        <td class="text-center">
                            @if ($item->jabatan== 'Admin')
                            <span class="badge badge-primary">
                                {{ $item->jabatan }}
                            </span>
                            @else
                            <span class="badge badge-info">
                                {{ $item->jabatan }}
                            </span>
                            @endif
                        </td>
                        <!-- Is_tugas -->
                        <td class="text-center">
                            @if ($item->is_tugas== false)
                            <span class="badge badge-danger">
                                Belum Ditugaskan
                            </span>
                            @else
                            <span class="badge badge-success">
                                Sudah Ditugaskan
                            </span>
                            @endif

                            <!-- Fungsi Tombol -->
                        <td class="text-center">
                            <a href="{{ route('userEdit', $item->id)}}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#modalHapus{{ $item->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <!-- Modal Hapus -->
                            @include('admin.user.modal', ['item' => $item, 'title' => $title])
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