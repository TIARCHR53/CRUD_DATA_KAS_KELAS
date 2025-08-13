@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pembayaran Kas</h2>

    <form action="{{ route('kas.update', $kas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Siswa</label>
            <select name="siswa_id" class="form-control" required>
                @foreach($siswa as $item)
                    <option value="{{ $item->id }}" {{ $kas->siswa_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $kas->tanggal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ $kas->jumlah }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" value="{{ $kas->keterangan }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
