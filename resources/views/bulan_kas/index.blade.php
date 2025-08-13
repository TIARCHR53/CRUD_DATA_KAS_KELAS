@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Bulan Kas</h2>
    <a href="{{ route('bulan_kas.create') }}" class="btn btn-success">+ Tambah Bulan Kas</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Bulan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($bulanKas as $item)
        <tr>
            <td>{{ $item->bulan }}</td>
            <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('bulan_kas.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('bulan_kas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">Belum ada data bulan kas</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $bulanKas->links() }}
@endsection
