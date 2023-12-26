<?php
session_start();
include('config/koneksi.php');

// Mengambil nilai dari form
$id_produk = $_POST['id_produk'];
$id_customer = $_SESSION['ID_CUSTOMER'];
$harga_produk = $_POST['harga_produk'];
$lama_sewa = $_POST['lama_sewa'];
$jumlah_sewa = $_POST['jumlah_sewa'];
$mulai_sewa = $_POST['mulai_sewa'];
$akhir_sewa = $_POST['akhir_sewa'];
$total_bayar = $_POST['total_bayar'];

// Simpan data transaksi
$query_insert_transaksi = "INSERT INTO transaksi (id_customer, id_produk, jumlah_sewa, mulai_sewa, akhir_sewa, lama_sewa, total_sewa)
        VALUES ('$id_customer', '$id_produk', '$jumlah_sewa', '$mulai_sewa', '$akhir_sewa', '$lama_sewa', '$total_bayar')";

if (mysqli_query($conn, $query_insert_transaksi)) {
    // Mendapatkan ID transaksi yang baru saja di-generate oleh auto-increment
    $id_transaksi = mysqli_insert_id($conn);
    echo "Transaksi berhasil disimpan. ID Transaksi: " . $id_transaksi;
    
    // Query untuk mendapatkan stok produk
    $query_stok = "SELECT jumlah_stok FROM produk WHERE id_produk = '$id_produk'";
    $result_stok = mysqli_query($conn, $query_stok);
    $row_stok = mysqli_fetch_assoc($result_stok);
    $stok_produk = $row_stok['jumlah_stok'];

    // Mengurangi stok produk dengan jumlah sewa
    $stok_baru = $stok_produk - $jumlah_sewa;

    // Update stok pada tabel produk
    $query_update_stok = "UPDATE produk SET jumlah_stok = '$stok_baru' WHERE id_produk = '$id_produk'";
    if (mysqli_query($conn, $query_update_stok)) {
        // Tambahkan script JavaScript untuk menampilkan alert
        echo "<script>alert('Transaksi berhasil disimpan. ID Transaksi: " . $id_transaksi . "'); window.location.href = 'index2.php';</script>";
        exit;
    } else {
        echo "Error updating stok produk: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting transaksi: " . mysqli_error($conn);
}
?>
