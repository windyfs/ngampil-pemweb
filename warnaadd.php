<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai input form
    $id_warna = $_POST['id_warna'];
    $nama_warna = $_POST['nama_warna'];

    // Jalankan query INSERT
    $sql = "INSERT INTO warna_produk (id_warna, nama_warna) VALUES ('$id_warna', '$nama_warna')";

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