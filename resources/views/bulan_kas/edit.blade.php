@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Bulan Kas</h2>

    <form action="{{ route('bulan_kas.update', $bulanKas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Bulan</label>
            <input type="text" name="bulan" value="{{ $bulanKas->bulan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ $bulanKas->jumlah }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('bulan_kas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
