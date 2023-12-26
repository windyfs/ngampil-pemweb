<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil nilai id_produk dari URL
    $id_produk = $_GET['id_produk'];

    // Jalankan query DELETE
    $sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Data berhasil dihapus
        echo "Data berhasil dihapus dari database.";
    } else {
        // Terjadi kesalahan saat menghapus data
        echo "Terjadi kesalahan saat menghapus data: " . mysqli_error($conn);
    }
}

header("Location: product.php");
exit();
?>
