<?php
session_start();

include('config/koneksi.php');

if (isset($_SESSION['ID_ADMIN']) && isset($_SESSION['USERNAME_ADMIN'])) {
if(isset($_GET['id_produk'])) {
    $stok = $_GET['id_produk'];
    $sql = 'select id_produk, jumlah_stok from produk';
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
}                      
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN NGAMPIL</title>

  <!-- Custom fonts for this template -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bd5de0e359.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/font-awesome-free/css/all.min.css">
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN NGAMPIL</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="datasewa.php">
                    <i class="fas fa-fw fa-clipboard-list mr-2 text-gray-400"></i>
                    <span>Data Sewa</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="datacustomer.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Data Customer</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Product</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Product:</h6>
                        <a class="collapse-item" href="generaldata.php">General Data</a>
                        <a class="collapse-item" href="product.php">Data Product</a>
                        <a class="collapse-item" href="datastok.php">Stok Product</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt "></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <ul class="navbar-nav ml-auto">
                </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Stok Produk</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>   
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No.</th>
                                        <th>ID Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Size Produk</th>
                                        <th>Warna Produk</th>
                                        <th>Jumlah Stok</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $no = 1;
                                    $sql = 'select p.id_produk, p.nama_produk, z.nama_size, w.nama_warna, p.jumlah_stok from produk p
                                    join size_produk z on p.id_size = z.id_size                
                                    join warna_produk w on p.id_warna = w.id_warna';
                                    $query = mysqli_query($conn, $sql);               
                                    while($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tbody>
                                        <tr>
                                        <td align="center"><?=$no++ ?></td>
                                        <td><?= $row['id_produk'] ?></td>
                                        <td><?= $row['nama_produk'] ?></td>
                                        <td><?= $row['nama_size'] ?></td>
                                        <td><?= $row['nama_warna'] ?></td>
                                        <td><?= $row['jumlah_stok'] ?></td>
                                        <td>
                                        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#tambahModal<?=$row['id_produk']?>"> Tambah</button>
                                        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#ubahModal<?=$row['id_produk']?>"> Ubah</button>
                                        </td>
                                        </tr>
                                        <!-- Modal Tambah-->
                                        <div id="tambahModal<?=$row['id_produk']?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah Stok</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="config/prosestambahstok.php">
                                                            <div class="form-group">
                                                                <label for="id_produk">ID Produk:</label>
                                                                <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $row['id_produk'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jumlah_stok">Jumlah:</label>
                                                                <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" placeholder="Masukkan jumlah stok" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->

                                        <!-- Modal Ubah-->
                                        <div id="ubahModal<?=$row['id_produk']?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Stok</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="config/prosesubahstok.php">
                                                            <div class="form-group">
                                                                <label for="id_produk">ID Produk:</label>
                                                                <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $row['id_produk'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jumlah_stok">Jumlah:</label>
                                                                <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" placeholder="Masukkan jumlah stok" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </tbody>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>
</body>

</html>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>