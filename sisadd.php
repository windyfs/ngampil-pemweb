<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai input form
    $id_size = $_POST['id_size'];
    $nama_size = $_POST['nama_size'];

    // Jalankan query INSERT
    $sql = "INSERT INTO size_produk (id_size, nama_size) VALUES ('$id_size', '$nama_size')";

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