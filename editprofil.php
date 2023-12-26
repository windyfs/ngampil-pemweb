<?php
include('config/koneksi.php');
$id_cus = $_POST['ID_CUSTOMER'];
$uname = $_POST['USERNAME'];
$pass = $_POST['PASSWORD'];
$nama = $_POST['NAMA_CUSTOMER'];
$email = $_POST['EMAIL'];
$telepon = $_POST['NOTELP_CUSTOMER'];
$sql = "UPDATE customer SET USERNAME = '$uname', PASSWORD = '$pass', NAMA_CUSTOMER = '$nama', EMAIL = '$email', NOTELP_CUSTOMER = '$telepon' WHERE ID_CUSTOMER = '$id_cus'";
$query = mysqli_query($conn, $sql);
if ($query) {
    $msg = "Profile berhasil diupdate.";
    header('Location: profil.php');
    exit();
} else {
    echo "No Error: " . mysqli_errno($conn);
    echo "<br/>";
    echo "Pesan Error: " . mysqli_error($conn);
    exit();
}
?>
