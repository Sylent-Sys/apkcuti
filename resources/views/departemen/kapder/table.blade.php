<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKaryawan">
    <i class="bi-plus-lg"></i>
</button>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departemen as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                @if ($item->role == 0)
                    <td>User</td>
                @endif
                @if ($item->role == 2)
                    <td>Kepala Departemen</td>
                @endif
                <td>
                    @if ($item->role == 2)
                        <p>~</p>
                    @else
                        <form action="{{ route('user.edit', $item->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="departemen_id">
                            <Button class="btn btn-danger" type="submit">Delete</Button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="addKaryawan" tabindex="-1" aria-labelledby="addKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addKaryawanLabel">Tambah Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($user->count() == 0)
                    <div class="alert alert-danger" role="alert">
                        Tidak ada user yang bisa ditambahkan
                    </div>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <form action="{{ route('user.edit', $item->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="departemen_id"
                                                value="{{ Auth::user()->departemen_id }}">
                                            <Button class="btn btn-primary" type="submit">Add</Button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
