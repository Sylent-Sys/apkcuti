@extends('layouts.base')
@section('title', 'Add User')
@section('content')
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Departemen</label>
            <select class="form-select" name="departemen_id">
                @foreach ($departemen as $item)
                    @if ($loop->index == 0)
                        <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>

@endsection
