<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai input form
    $id_produk = $_POST['id_produk'];
    $id_kategori = $_POST['id_kategori'];
    $id_warna = $_POST['id_warna'];
    $id_size = $_POST['id_size'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $jumlah_stok = $_POST['jumlah_stok'];

    // Jalankan query INSERT
    $sql = "INSERT INTO produk (id_produk, id_kategori, id_warna, id_size, nama_produk, harga_produk, jumlah_stok) VALUES ('$id_produk', '$id_kategori', '$id_warna', '$id_size', '$nama_produk', '$harga_produk', '$jumlah_stok')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Data berhasil disimpan
        echo "Data berhasil disimpan ke database.";
    } else {
        // Terjadi kesalahan saat menyimpan data
        echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($conn);
    }
}
header('location:product.php');
?>