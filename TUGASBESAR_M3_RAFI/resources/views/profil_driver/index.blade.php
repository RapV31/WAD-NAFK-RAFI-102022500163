@extends('layouts.app')

@section('content')
<div class="kotak-tabel">
    <h1 style="color: #333;">Daftar Profil Driver</h1>
    
    <a href="{{ route('profil_driver.create') }}" class="btn-tambah-baru">+ Tambah Driver Baru</a>

    <table class="tabel-driver">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor SIM</th>
                <th>Status</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if(count($drivers) == 0)
                <tr>
                    <td colspan="6" style="text-align: center; color: gray;">Tidak ada data ditemukan</td>
                </tr>
            @else
                @foreach($drivers as $index => $driver)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $driver->nama }}</td>
                    <td>{{ $driver->nomor_sim }}</td>
                    <td>{{ $driver->status }}</td>
                    <td>{{ $driver->kontak }}</td>
                    <td>
                        <a href="{{ route('profil_driver.show', $driver->id) }}" class="btn btn-detail">Detail</a>
                        <a href="{{ route('profil_driver.edit', $driver->id) }}" class="btn btn-edit">Edit</a>
                        
                        <form action="{{ route('profil_driver.destroy', $driver->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus {{ $driver->nama }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection