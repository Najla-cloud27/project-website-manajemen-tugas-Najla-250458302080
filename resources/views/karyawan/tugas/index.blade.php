@extends('layouts/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tasks mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">

        </div>

        <!-- pdf &  -->
        <div class="d-flex">
            <div>
                @if (auth()->user()->is_tugas == true)
                <a href="{{ route('tugasPdf') }}" class="btn btn-sm btn-danger">
                    <i class=" fas fa-file-pdf mr-2"></i>
                    PDF
                </a>
                @endif
            </div>
        </div>
        <!-- End Pdf -->
    </div>

    <div class="card-body">
        @if (auth()->user()->is_tugas == true)
        <!-- nama -->
        <div class="row">
            <div class="col-6">
                Nama
            </div>
            <div class="col-6">
                : {{ $tugas->user->nama }}
            </div>
        </div>
        <!-- Email -->
        <div class="row">
            <div class="col-6">
                Email
            </div>
            <div class="col-6">
                :
                <span class="badge badge-info">
                    {{ $tugas->user->email }}
                </span>
            </div>
        </div>

        <!-- Tugas -->
        <div class="row">
            <div class="col-6">
                Tugas
            </div>
            <div class="col-6">
                : {{ $tugas->tugas }}
            </div>
        </div>
        <!-- Tanggal Mulai -->
        <div class="row">
            <div class="col-6">
                Tanggal Mulai
            </div>
            <div class="col-6">
                :
                <span class="badge badge-info">
                    {{ $tugas->tanggal_mulai }}
                </span>
            </div>
        </div>
        <!-- Tanggal Selesai  -->
        <div class="row">
            <div class="col-6">
                Tanggal Selesai
            </div>
            <div class="col-6">
                :
                <span class="badge badge-info">
                    {{ $tugas->tanggal_selesai }}
                </span>
            </div>
        </div>
        @else
        <!-- Status -->
        <div class="row">
            <div class="col-6">
                Status
            </div>
            <div class="col-6">
                :
                <span class="badge badge-danger">Belum Ditugaskan</span>
            </div>
        </div>

        @endif

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