@extends('layouts.app')

@section('content')
<div class="kotak-form">
    <h1>Edit Profil Driver</h1>
    
    <form action="{{ route('profil_driver.update', $driver->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <p>Nama Driver Profesional:</p>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ $driver->nama }}" required>
        </div>
        <div class="form-group">
            <p>Nomor SIM:</p>
            <label for="nomor_sim">No. SIM:</label>
            <input type="text" id="nomor_sim" name="nomor_sim" value="{{ $driver->nomor_sim }}" required>
        </div>
        <div class="form-group">
            <p>Status SIM:</p>
            <select name="status" id="status" required>
                <option value="Aktif" {{ $driver->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ $driver->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <p>Kontak (No HP):</p>
            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" value="{{ $driver->kontak }}" required>
        </div>
        <br>
        <button type="submit" class="btn-simpan">Simpan Perubahan</button>
        <a href="{{ route('profil_driver.index') }}" class="btn-kembali">Batal</a>
    </form>
</div>
@endsection