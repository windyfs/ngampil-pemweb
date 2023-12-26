<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai input form
    $id_size = $_POST['id_size'];
    $nama_size = $_POST['nama_size'];
    // Jalankan query UPDATE
    $sql = "UPDATE size_produk SET id_size = '$id_size', nama_size = '$nama_size'WHERE id_size = '$id_size'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Data berhasil diperbarui
        echo "Data berhasil diperbarui.";
    } else {
        // Terjadi kesalahan saat memperbarui data
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
    }
}

header('location: generaldata.php');
?>
