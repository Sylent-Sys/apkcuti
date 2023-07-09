@extends('layouts.base')
@section('title', 'Pengajuan Cuti')
@section('content')
    <form action="{{ route('cuti.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" name="tanggal_mulai" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" name="tanggal_selesai" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alasan</label>
            <input type="text" class="form-control" name="alasan" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lampiran</label>
            <input type="file" class="form-control" name="lampiran" required>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
@endsection
