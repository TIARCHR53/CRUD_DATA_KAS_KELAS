@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Siswa</h2>
    <a href="{{ route('siswa.create') }}" class="btn btn-success">+ Tambah Siswa</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($siswa as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nis }}</td>
            <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $item->alamat }}</td>
            <td>
                <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $siswa->links() }}
@endsection
