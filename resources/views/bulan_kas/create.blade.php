@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Bulan Kas</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('bulan_kas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="bulan" class="form-label">Bulan</label>
                <input type="text" name="bulan" id="bulan" class="form-control" value="{{ old('bulan') }}" placeholder="Contoh: Januari 2025" required>
                @error('bulan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_target" class="form-label">Jumlah (Rp)</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" placeholder="Contoh: 50000" required>
                @error('jumlah')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('bulan_kas.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
