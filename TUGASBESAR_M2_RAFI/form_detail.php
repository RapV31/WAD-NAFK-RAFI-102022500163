<?php
// 1. Panggil koneksi database
include 'connect.php';

// 2. Tangkap ID dari URL (Sama seperti logika Delete)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 3. Ambil data spesifik berdasarkan ID
$query = "SELECT * FROM profil_driver WHERE id = $id";
$result = mysqli_query($conn, $query);

// Karena hanya satu baris data, langsung fetch tanpa perulangan 'while'
$driver = mysqli_fetch_assoc($result);

// 4. Jika pengguna memasukkan ID ngawur di URL, kembalikan ke list
if (!$driver) {
    echo "<script>
            alert('Data Driver tidak ditemukan!');
            window.location='list_driver.php';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Profil Driver</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .btn-kembali { background-color: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px; }
    </style>
</head>
<body>
    
    <div class="kotak-form">
        <h1>Rincian Profil Driver</h1>
        
        <!-- Form ini HANYA UNTUK DIBACA, perhatikan penambahan atribut 'disabled' di setiap input -->
        <form>
            
            <div class="form-group">
                <p>Nama Driver Profesional:</p>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" value="<?= htmlspecialchars($driver['nama']) ?>" disabled>
            </div>

            <div class="form-group">
                <p>Nomor SIM:</p>
                <label for="nomor_sim">No. SIM:</label>
                <input type="text" id="nomor_sim" value="<?= htmlspecialchars($driver['nomor_sim']) ?>" disabled>
            </div>

            <div class="form-group">
                <p>Status SIM:</p>
                <!-- Karena ini select, kita pakai logika if agar opsi yang benar terpilih (selected) -->
                <select id="status" disabled>
                    <option value="Aktif" <?= ($driver['status'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= ($driver['status'] == 'Tidak Aktif') ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
            </div>

            <div class="form-group">
                <p>Kontak (No HP):</p>
                <label for="kontak">Kontak:</label>
                <input type="text" id="kontak" value="<?= htmlspecialchars($driver['kontak']) ?>" disabled>
            </div>
            
            <br>
            <!-- Tombol untuk kembali ke tabel -->
            <a href="list_driver.php" class="btn-kembali">Kembali ke Daftar</a>
            
        </form>
    </div>

</body>
</html>