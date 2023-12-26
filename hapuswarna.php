<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil nilai id_produk dari URL
    $id_warna = $_GET['id_warna'];

    // Jalankan query DELETE
    $sql = "DELETE FROM warna_produk WHERE id_warna = '$id_warna'";

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
