<?php
include 'connect.php';

if (isset($_POST['update'])) {
    
    // menangkap semua data dari form (termasuk ID yang disembunyikan)
    $id        = $_POST['id'];
    $nama      = $_POST['nama'];
    $nomor_sim = $_POST['nomor_sim'];
    $status    = $_POST['status'];
    $kontak    = $_POST['kontak'];
    
    // susun query UPDATE
    $query = "UPDATE profil_driver 
              SET nama = '$nama', 
                  nomor_sim = '$nomor_sim', 
                  status = '$status', 
                  kontak = '$kontak' 
              WHERE id = $id";
    
    // untuk eksekusi Query
    mysqli_query($conn, $query);

    //  cek keberhasilan dan alihkan kembali ke list_driver.php
    if (mysqli_affected_rows($conn) >= 0) {
        echo "<script>
                alert('Data driver berhasil diperbarui!');
                window.location='list_driver.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui data!');
                window.location='list_driver.php';
              </script>";
    }
}
?>