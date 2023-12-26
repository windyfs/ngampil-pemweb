<?php
session_start();

include('config/koneksi.php');

if (isset($_SESSION['ID_ADMIN']) && isset($_SESSION['USERNAME_ADMIN'])) {
// Mendapatkan ID_CUSTOMER terakhir dari database
$sql = "SELECT MAX(id_customer) AS last_id FROM customer";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$lastId = $row['last_id'];

// Mendapatkan angka terakhir dari ID_CUSTOMER
$lastNumber = intval(substr($lastId, 4));
//mendapatkan id customer baru
$newId = 'CUST' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
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

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <!-- Nav Item - Dashboard -->
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

                    <!-- Topbar Navbar -->

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=#tambahcust> Tambah Customer</button>
                        </div>   
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $no = 1;
                                    $sql = 'select id_customer, nama_customer, jenis_kelamin, username, email, notelp_customer
                                    from customer';
                                    $query = mysqli_query($conn, $sql);               
                                    while($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tbody>
                                        <tr>
                                        <td align="center"><?=$no++ ?></td>
                                        <td><?= $row['id_customer'] ?></td>
                                        <td><?= $row['nama_customer'] ?></td>
                                        <td><?= $row['jenis_kelamin'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['notelp_customer'] ?></td>
                                        <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#ubahModal<?= $row['id_customer'] ?>">Ubah</button>
                                            <a href="config/proseshapuscust.php?id_customer=<?= $row['id_customer'] ?>" class="btn btn-info btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                        </td>
                                        </tr>
                                        <!-- Modal Ubah-->
                                        <div id="ubahModal<?=$row['id_customer']?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Customer</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="config/prosesubahcust.php">
                                                            <div class="form-group">
                                                                <label for="id_customer">ID Customer:</label>
                                                                <input type="text" class="form-control" id="id_customer" name="id_customer" value="<?= $row['id_customer'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_customer">Nama Customer:</label>
                                                                <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?= $row['nama_customer'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $row['jenis_kelamin'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">Username:</label>
                                                                <input type="text" class="form-control" id="username" name="username" value="<?= $row['username'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="notelp_customer">No Telepon:</label>
                                                                <input type="number" class="form-control" id="notelp_customer" name="notelp_customer" value="<?= $row['notelp_customer'] ?>" required>
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

                        <!-- Modal tambah cust -->
                        <div id="tambahcust" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                        <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Customer</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="config/prosestambahcust.php">
                                <div class="form-group">
                                <label for="id_customer">ID Customer:</label>
                                <input type="text" class="form-control" id="id_customer" name="id_customer" placeholder="masukkan ID" value="<?php echo $newId; ?>" required>
                                </div>
                                <div class="form-group">
                                <label for="nama_customer">Nama Customer:</label>
                                <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="masukkan nama customer" required>
                                </div>
                                <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username" required>
                                </div>
                                <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="masukkan email" required>
                                </div>
                                <div class="form-group">
                                <label for="notelp_customer">No Telepon:</label>
                                <input type="number" class="form-control" id="notelp_customer" name="notelp_customer" placeholder="masukkan nomor telepon" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                            </div>
                            </div>
                            </div>
                        </div>

                    <!-- end modal tambah cust -->

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
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
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