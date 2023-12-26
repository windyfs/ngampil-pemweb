<?php
include("koneksi.php");
if (isset($conn)) {
    $id_customer = $_POST['id_customer'];
    $namacust = $_POST['nama_customer'];
    $jk = $_POST['jenis_kelamin'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $nocust = $_POST['notelp_customer'];

    $sql = "insert into customer (id_customer, nama_customer, jenis_kelamin, username, email, notelp_customer)
            values ('$id_customer', '$namacust', '$jk', '$user', '$email', '$nocust')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: ../datacustomer.php');
            exit();
    } else {
        echo "Gagal menambahkan data customer. Error: " . mysqli_error($conn);
    }
        
    mysqli_close($conn);

}

?>