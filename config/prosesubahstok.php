<?php
include("koneksi.php");
    if (isset($conn)) {
        $idproduk = $_POST['id_produk'];
        $jmlstok = $_POST['jumlah_stok'];
    
        $sql = "UPDATE produk SET jumlah_stok='$jmlstok' WHERE id_produk='$idproduk'";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            header('Location:../datastok.php');
            exit();
        } else {
            echo "Gagal mengedit data";
        }
    
        mysqli_close($conn);
    }
?>
