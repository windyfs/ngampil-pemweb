<?php
session_start();

include('config/koneksi.php');

if (isset($_SESSION['ID_ADMIN']) && isset($_SESSION['USERNAME_ADMIN'])) {

$sql = "select COUNT(no_transaksi) as jmltransaksi from transaksi";
$total = mysqli_query($conn, $sql);
$total_transaksi = mysqli_fetch_assoc($total);
$sql1 = "select COUNT(id_customer) as jmlcustomer from customer";
$total1 = mysqli_query($conn, $sql1);
$total_customer = mysqli_fetch_assoc($total1);
$sql2 = "select COUNT(id_produk) as jmlproduk from produk";
$total2 = mysqli_query($conn, $sql2);
$total_produk = mysqli_fetch_assoc($total2);
$sql3 = "select SUM(jumlah_stok) as allstok from produk";
$total3 = mysqli_query($conn, $sql3);
$totalseluruhstok = mysqli_fetch_assoc($total3);
$sql4 = "select COUNT(id_kategori) as kat from kategori_produk";
$total4 = mysqli_query($conn, $sql4);
$totalkat = mysqli_fetch_assoc($total4);
$sql5 = "select COUNT(id_warna) as war from warna_produk";
$total5 = mysqli_query($conn, $sql5);
$totalwar = mysqli_fetch_assoc($total5);
$sql6 = "select COUNT(id_size) as sis from size_produk";
$total6 = mysqli_query($conn, $sql6);
$totalsis = mysqli_fetch_assoc($total6);
$sql7 = "select SUM(total_sewa) as pen from transaksi";
$total7 = mysqli_query($conn, $sql7);
$totalpen = mysqli_fetch_assoc($total7);

$sql = "SELECT id_admin, nama_admin, username_admin, email_admin, notelp_admin FROM admin";
$result = mysqli_query($conn, $sql);
$profil = mysqli_fetch_assoc($result);
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

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
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
                    <li class="nav-item">
                        <div class="profile-icon">
                            <button type="button" class="btn btn-primary bi bi-person-circle" data-toggle="modal" data-target="#profileModal">
                                <span> Halo, <?php echo $_SESSION['USERNAME']; ?> </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </button>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Modal -->
            <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content border-left-primary border-bottom-primary">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">Detail Profil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>ID admin: <?php echo $_SESSION['ID_ADMIN']; ?></h4>
                            <h4>Nama: <?php echo $_SESSION['NAMA_ADMIN']; ?></h4>
                            <h4>Username: <?php echo $_SESSION['USERNAME_ADMIN']; ?></h4>
                            <h4>Email: <?php echo $_SESSION['EMAIL_ADMIN']; ?></h4>
                            <h4>No telepon: <?php echo $_SESSION['NOTELP_ADMIN']; ?></h4>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>



                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid ">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> DASHBOARD </h1>
                    <div class = "row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body"><a  href="datasewa.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Sewa</div>
                                                <h2 class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_transaksi['jmltransaksi'];?></h2>                                            
                                                </a>
                                        </div>                                        
                                        <div class="col-auto">        
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body"><a href="datacustomer.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Data Customer</div>
                                                    <h2 class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_customer['jmlcustomer'];?></h2>                                            
                                                    </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body"><a href="dataproduk.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Data Produk</div>
                                                    <h2 class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_produk['jmlproduk'];?></h2>                                            
                                                    </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body"><a href="dataproduk.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jumlah Warna</div>
                                                    <h2 class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalwar['war'];?></h2>                                            
                                                    </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Tasks Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body"><a href="dataproduk.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Kategori Produk</div>
                                                    <h2 class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalkat['kat'];?></h2>                                            
                                                    </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body"><a href="dataproduk.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jumlah Size</div>
                                                    <h2 class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalsis['sis'];?></h2>                                            
                                                    </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body"><a href="laporan.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Pendapatan</div>
                                                <h2class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalpen['pen'];?></h2>                                         
                                                </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body"><a href="laporan.php">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Seluruh Stok</div>
                                                    <h2 class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalseluruhstok['allstok'];?></h2>                                            
                                                    </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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

</body>

</html>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>