@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Pembayaran Kas</h2>
    <a href="{{ route('kas.create') }}" class="btn btn-success">+ Tambah Pembayaran</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kas as $item)
        <tr>
            <td>{{ $item->siswa->nama }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
            <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>
                <a href="{{ route('kas.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('kas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada pembayaran kas</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $kas->links() }}
@endsection
