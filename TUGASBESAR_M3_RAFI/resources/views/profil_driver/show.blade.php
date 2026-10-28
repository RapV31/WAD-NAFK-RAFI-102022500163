@extends('layouts.app')

@section('content')
<div class="kotak-form">
    <h1>Rincian Profil Driver</h1>
    
    <form>
        <div class="form-group">
            <p>Nama Driver Profesional:</p>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" value="{{ $driver->nama }}" disabled>
        </div>
        <div class="form-group">
            <p>Nomor SIM:</p>
            <label for="nomor_sim">No. SIM:</label>
            <input type="text" id="nomor_sim" value="{{ $driver->nomor_sim }}" disabled>
        </div>
        <div class="form-group">
            <p>Status SIM:</p>
            <select id="status" disabled>
                <option value="Aktif" {{ $driver->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ $driver->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <p>Kontak (No HP):</p>
            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" value="{{ $driver->kontak }}" disabled>
        </div>
        <br>
        <a href="{{ route('profil_driver.index') }}" class="btn-kembali">Kembali ke Daftar</a>
    </form>
</div>
@endsection