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

    // Jalankan query UPDATE
    $sql = "UPDATE produk SET nama_produk = '$nama_produk', harga_produk = '$harga_produk', jumlah_stok = '$jumlah_stok' WHERE id_produk = '$id_produk'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Data berhasil diperbarui
        echo "Data berhasil diperbarui.";
    } else {
        // Terjadi kesalahan saat memperbarui data
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
    }
}

header('location: product.php');
?>
