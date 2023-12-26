<?php
include('config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil nilai id_produk dari URL
    $id_size = $_GET['id_size'];

    // Jalankan query DELETE
    $sql = "DELETE FROM size_produk WHERE id_size = '$id_size'";

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
