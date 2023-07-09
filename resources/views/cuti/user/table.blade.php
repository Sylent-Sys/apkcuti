<a href="{{ route('cuti.create') }}" class="btn btn-primary mb-3">
    <i class="bi-plus-lg"></i>
</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Kepala Departemen</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Alasan</th>
            <th>Lampiran</th>
            <th>Status</th>
            <th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuti as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->reviewByUser->name ?? 'Belum Ada' }}</td>
                <td>{{ $item->tanggal_mulai }}</td>
                <td>{{ $item->tanggal_selesai }}</td>
                <td>{{ $item->alasan }}</td>
                <td>
                    <a href="{{ $item->lampiran != null ? Storage::url($item->lampiran) : '' }}" target="_blank"
                        download>Lihat Lampiran</a>
                </td>
                <td>
                    @if ($item->status == 0)
                        <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                    @endif
                    @if ($item->status == 1)
                        <span class="badge bg-success">Disetujui</span>
                    @endif
                    @if ($item->status == 2)
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
                <td>{{ $item->catatan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
