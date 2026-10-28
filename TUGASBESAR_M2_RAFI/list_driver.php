<?php
// A. Memanggil koneksi database
include 'connect.php';

// B. Menangkap input pencarian (jika ada)
$search = isset($_GET['search']) ? $_GET['search'] : '';

// C. Menyusun query (menampilkan semua data ATAU mencari berdasarkan nama)
$query = "SELECT * FROM profil_driver WHERE nama LIKE '%$search%'";
$result = mysqli_query($conn, $query);

// D. Menyimpan data ke dalam array
$drivers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $drivers[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Profil Driver</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!-- Sedikit tambahan CSS agar tabel rapi -->
    <style>
        .tabel-driver { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .tabel-driver th, .tabel-driver td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        .tabel-driver th { background-color: #f2f2f2; color: #333; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; margin: 2px; font-size: 14px; }
        .btn-tambah { background-color: #28a745; margin-bottom: 15px; }
        .btn-detail { background-color: #007bff; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; }
        .search-form { display: flex; gap: 10px; margin-bottom: 20px; }
        .search-form input { flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .kotak-tabel { background-color: #ffffff; width: 90%; max-width: 1000px; margin: 50px auto; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .search-form button { width: auto; flex: none; padding: 0 20px; }
    </style>
</head>
<body>
    
    <div class="kotak-tabel">
        <h1 style="text-align: center; color: #333;">Daftar Profil Driver</h1>
        
        <!-- Tombol untuk menambah data baru -->
        <a href="form_create.php" class="btn btn-tambah">+ Tambah Driver Baru</a>

        <!-- Form Pencarian -->
        <form action="list_driver.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Cari nama driver..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-detail">Cari</button>
        </form>

        <!-- Tabel Data -->
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
                <?php if (count($drivers) == 0): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: gray;">Tidak ada data ditemukan</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($drivers as $i => $driver): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <!-- htmlspecialchars digunakan untuk mencegah error karakter khusus / keamanan XSS -->
                            <td><?= htmlspecialchars($driver['nama']) ?></td>
                            <td><?= htmlspecialchars($driver['nomor_sim']) ?></td>
                            <td><?= htmlspecialchars($driver['status']) ?></td>
                            <td><?= htmlspecialchars($driver['kontak']) ?></td>
                            <td>
                                <!-- Tombol Aksi yang membawa ID ke halaman selanjutnya -->
                                <a href="form_detail.php?id=<?= $driver['id'] ?>" class="btn btn-detail">Detail</a>
                                <a href="form_update.php?id=<?= $driver['id'] ?>" class="btn btn-edit">Edit</a>
                                <a href="delete.php?id=<?= $driver['id'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus <?= htmlspecialchars($driver['nama']) ?>?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>