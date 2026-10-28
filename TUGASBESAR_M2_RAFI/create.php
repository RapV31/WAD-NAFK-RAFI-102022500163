<?php
include 'connect.php';


if (isset($_POST['create'])) {
    
    // ngambil data dari form
    $nama      = $_POST['nama'];
    $nomor_sim = $_POST['nomor_sim'];
    $status    = $_POST['status'];
    $kontak    = $_POST['kontak'];
    
    // susun query Insert
    $query = "INSERT INTO profil_driver (nama, nomor_sim, status, kontak) 
              VALUES ('$nama', '$nomor_sim', '$status', '$kontak')";
    
    // 
    mysqli_query($conn, $query);

    // E. Cek apakah berhasil menambah data (Note : BAGIAN ini vibe code, gapaham gwe logic nya cok)
    if (mysqli_affected_rows($conn) > 0) {
        // Jika sukses, munculkan alert dan arahkan sementara kembali ke form
        echo "
        <script>
            alert('Berhasil menambah profil driver!');
            window.location='form_create.php';
        </script>
        ";
    } else {
        // Jika gagal
        echo "
        <script>
            alert('Failed to add driver');
            window.location='form_create.php';
        </script>
        ";
        exit;
    }
}
?>