<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // 3. susunan dan eksekusi query DELETE
    $delete_query = "DELETE FROM profil_driver WHERE id=$id";
    mysqli_query($conn, $delete_query);

    // 4. Cek apakah data berhasil terhapus (Ini juga Vibe code bagian bawah ini)
    if (mysqli_affected_rows($conn) > 0) {
        // Jika berhasil, langsung kembalikan ke halaman daftar tanpa pesan
        header("Location: list_driver.php");
    } else {
        // Jika gagal, munculkan alert
        echo "
        <script>
            alert('Gagal menghapus profil driver!');
            window.location='list_driver.php';
        </script>
        ";
        exit;
    }
}

mysqli_close($conn);
?>