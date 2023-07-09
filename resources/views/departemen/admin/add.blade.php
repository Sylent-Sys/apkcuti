@extends('layouts.base')
@section('title', 'Add Departemen')
@section('content')
    <form action="{{ route('departemen.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" class="form-control" name="logo" required>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit" >Add</button>
        </div>
    </form>
@endsection
