<?php
// 1. Panggil koneksi database
include 'connect.php';

// 2. Tangkap ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 3. Ambil data spesifik berdasarkan ID
$query = "SELECT * FROM profil_driver WHERE id = $id";
$result = mysqli_query($conn, $query);
$driver = mysqli_fetch_assoc($result);

if (!$driver) {
    echo "<script>alert('Data Driver tidak ditemukan!'); window.location='list_driver.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Driver</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .btn-batal { background-color: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin-left: 10px; }
        .btn-simpan { background-color: #ffc107; color: black; font-weight: bold; }
    </style>
</head>
<body>
    
    <div class="kotak-form">
        <h1>Edit Profil Driver</h1>
        
        <!-- Action diarahkan ke update.php -->
        <form action="update.php" method="POST">
            
            <!-- INI BAGIAN PALING PENTING: ID disembunyikan tapi ikut dikirim -->
            <input type="hidden" name="id" value="<?= $driver['id'] ?>">
            
            <div class="form-group">
                <p>Nama Driver Profesional:</p>
                <label for="nama">Nama:</label>
                <!-- Atribut 'disabled' dihapus agar bisa diketik -->
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($driver['nama']) ?>" required>
            </div>

            <div class="form-group">
                <p>Nomor SIM:</p>
                <label for="nomor_sim">No. SIM:</label>
                <input type="text" id="nomor_sim" name="nomor_sim" value="<?= htmlspecialchars($driver['nomor_sim']) ?>" required>
            </div>

            <div class="form-group">
                <p>Status SIM:</p>
                <select name="status" id="status" required>
                    <option value="Aktif" <?= ($driver['status'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= ($driver['status'] == 'Tidak Aktif') ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
            </div>

            <div class="form-group">
                <p>Kontak (No HP):</p>
                <label for="kontak">Kontak:</label>
                <input type="text" id="kontak" name="kontak" value="<?= htmlspecialchars($driver['kontak']) ?>" required>
            </div>
            
            <br>
            <!-- Tombol submit harus punya name="update" -->
            <button type="submit" name="update" class="btn-simpan">Simpan Perubahan</button>
            <a href="list_driver.php" class="btn-batal">Batal</a>
            
        </form>
    </div>

</body>
</html>