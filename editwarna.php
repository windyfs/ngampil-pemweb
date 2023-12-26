<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai input form
    $id_warna = $_POST['id_warna'];
    $nama_warna = $_POST['nama_warna'];
    // Jalankan query UPDATE
    $sql = "UPDATE warna_produk SET id_warna = '$id_warna', nama_warna = '$nama_warna'WHERE id_warna = '$id_warna'";

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
