<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil nilai id_produk dari URL
    $id_kategori = $_GET['id_kategori'];

    // Jalankan query DELETE
    $sql = "DELETE FROM kategori_produk WHERE id_kategori = '$id_kategori'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Data berhasil dihapus
        echo "Data berhasil dihapus dari database.";
    } else {
        // Terjadi kesalahan saat menghapus data
        echo "Terjadi kesalahan saat menghapus data: " . mysqli_error($conn);
    }
}

header("Location: generaldata.php");
exit();
?>
