@extends('layouts.base')
@section('title', 'Dashboard User')
@section('content')
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
        <i class="bi-plus-lg"></i>
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Departemen</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role == 1 ? 'Admin' : $item->departemen->nama ?? 'Belum Ada Departemen' }}</td>
                    <td>
                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <form class="w-50" action="{{ route('user.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <Button class="btn btn-danger" type="submit">Delete</Button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
