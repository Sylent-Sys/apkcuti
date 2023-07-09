@extends('layouts.base')
@section('title', 'Edit User')
@section('content')
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Departemen</label>
            <select class="form-select" name="departemen_id">
                @foreach ($departemen as $item)
                    @if ($item->id == $user->departemen_id)
                        <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @if ($user->departemen?->user->where('role', 2)->where('departemen_id', $user->departemen_id)->count() == 0 || $user->role == 2)
            @if ($user->role != 1)
                <div class="mb-3 form-check">
                    @if ($user->role == 2)
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="isKapDer" checked>
                    @else
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="isKapDer">
                    @endif
                    <label class="form-check-label" for="flexCheckDefault">
                        Kepala Departemen
                    </label>
                </div>
            @endif
        @endif
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Edit</button>
        </div>
    </form>
@endsection
