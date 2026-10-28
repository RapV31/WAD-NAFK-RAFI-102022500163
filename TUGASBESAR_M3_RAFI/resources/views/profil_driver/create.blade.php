@extends('layouts.app')

@section('content')
<div class="kotak-form">
    <h1>Profil Driver Baru</h1>
    
    <form action="{{ route('profil_driver.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <p>Nama Driver Profesional:</p>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Ketik nama di sini..." required>
        </div>
        <div class="form-group">
            <p>Nomor SIM:</p>
            <label for="nomor_sim">No. SIM:</label>
            <input type="text" id="nomor_sim" name="nomor_sim" placeholder="Ketik nomor SIM..." required>
        </div>
        <div class="form-group">
            <p>Status SIM:</p>
            <select name="status" id="status" required>
                <option value="" disabled selected>Pilih Status...</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <p>Kontak (No HP):</p>
            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" placeholder="Contoh: 0812345678" required>
        </div>
        <br>
        <button type="submit" class="btn-simpan">Tambah Driver</button>
    </form>
</div>
@endsection