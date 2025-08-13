@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pembayaran Kas</h2>

    <form action="{{ route('kas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Siswa</label>
            <select name="siswa_id" class="form-control" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach($siswa as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
