<a href="{{ route('departemen.create') }}" class="btn btn-primary mb-3">
    <i class="bi-plus-lg"></i>
</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>KepDar</th>
            <th>Logo</th>
            <th>Jumlah Pegawai</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departemen as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                @php
                    $kepdar = $item->user->where('role', '=', '2')->first();
                @endphp
                <td>{{ $kepdar == null ? 'Belum Ada Kepala Departemen' : $kepdar->name }}</td>
                <td>
                    <img src="{{ $item->logo != null ? Storage::url($item->logo) : '' }}" width="72" height="72" alt="Logo">
                </td>
                <td>{{ $item->user->where('role', '!=', '1')->count() }}</td>
                <td>
                    <a href="{{ route('departemen.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('departemen.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
