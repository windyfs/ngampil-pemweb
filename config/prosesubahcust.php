<?php
include("koneksi.php");
    if (isset($conn)) {
        $idcust = $_POST['id_customer'];
        $namacust = $_POST['nama_customer'];
        $jk = $_POST['jenis_kelamin'];
        $user = $_POST['username'];
        $email = $_POST['email'];
        $nocust = $_POST['notelp_customer'];
    
        $sql = "UPDATE customer SET nama_customer='$namacust', jenis_kelamin='$jk', username='$user', email='$email', notelp_customer='$nocust' WHERE id_customer='$idcust'";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            header('Location:../datacustomer.php');
            exit();
        } else {
            echo "Gagal mengedit data";
        }
    
        mysqli_close($conn);
    }
?>
