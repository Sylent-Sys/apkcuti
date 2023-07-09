@extends('layouts.base')
@section('title', 'Edit Departemen')
@section('content')
    <form action="{{ route('departemen.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="{{ $data->deskripsi }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" class="form-control" name="logo">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Edit</button>
        </div>
    </form>
@endsection
