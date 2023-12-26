<?php
include("koneksi.php");
if (isset($conn)) {
    $idproduk = $_POST['id_produk'];
    $jmlstok = $_POST['jumlah_stok'];

    // Mengambil jumlah stok saat ini
    $sql = "SELECT jumlah_stok FROM produk WHERE id_produk='$idproduk'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stok_sekarang = $row['jumlah_stok'];

        // Menambahkan jumlah stok yang tersedia
        $stok_baru = $stok_sekarang + $jmlstok;

        // Melakukan update jumlah stok
        $update_sql = "UPDATE produk SET jumlah_stok='$stok_baru' WHERE id_produk='$idproduk'";
        $update_result = mysqli_query($conn, $update_sql);

        if ($update_result) {
            header('Location:../datastok.php');
            exit();
        } else {
            echo "Gagal mengedit data";
        }
    } else {
        echo "Data stok tidak ditemukan";
    }

    mysqli_close($conn);
}
?>
