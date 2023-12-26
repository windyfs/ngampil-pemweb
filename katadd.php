<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai input form
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    // Jalankan query INSERT
    $sql = "INSERT INTO kategori_produk (id_kategori, nama_kategori) VALUES ('$id_kategori', '$nama_kategori')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Data berhasil disimpan
        echo "Data berhasil disimpan ke database.";
    } else {
        // Terjadi kesalahan saat menyimpan data
        echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($conn);
    }
}
header('location:generaldata.php');
?>