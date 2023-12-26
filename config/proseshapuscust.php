<?php
include('koneksi.php');
if(isset($_GET['id_customer'])) {
  $idcust = $_GET['id_customer'];
  $hapus="DELETE FROM customer WHERE id_customer='$idcust'";
  mysqli_query($conn, $hapus);
}
mysqli_close($conn);
header("location: ../datacustomer.php");
?>