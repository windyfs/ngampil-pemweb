<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai input form
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
    // Jalankan query UPDATE
    $sql = "UPDATE kategori_produk SET id_kategori = '$id_kategori', nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";

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
