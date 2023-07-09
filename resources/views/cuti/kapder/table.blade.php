<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Pengaju</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Alasan</th>
            <th>Lampiran</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuti as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->createdByUser->name }}</td>
                <td>{{ $item->tanggal_mulai }}</td>
                <td>{{ $item->tanggal_selesai }}</td>
                <td>{{ $item->alasan }}</td>
                <td>
                    <a href="{{ $item->lampiran != null ? Storage::url($item->lampiran) : '' }}" target="_blank"
                        download>Lihat Lampiran</a>
                </td>
                <td>
                    @if ($item->status == 0)
                        <form action="{{ route('cuti.update', $item->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="review_by" value="{{ Auth::user()->id }}">
                            <Button class="btn btn-primary" type="submit">Approve</Button>
                        </form>
                        <form action="{{ route('cuti.update', $item->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="status" value="2">
                            <input type="hidden" name="review_by" value="{{ Auth::user()->id }}">
                            <Button class="btn btn-danger" type="submit">Reject</Button>
                        </form>
                    @endif
                    @if ($item->status == 1)
                        <span class="badge bg-success">Disetujui</span>
                    @endif
                    @if ($item->status == 2)
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
