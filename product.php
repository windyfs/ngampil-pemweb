<?php
session_start();

include('config/koneksi.php');

if (isset($_SESSION['ID_ADMIN']) && isset($_SESSION['USERNAME_ADMIN'])) {
    if (isset($_POST['id_produk'])) {
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];

        // Lanjutkan dengan proses penyimpanan data atau pembaruan stok produk ke database
        // ...

    } else {
        $id_produk = "";
        $nama_produk = "";
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

                <!-- Topbar Navbar -->

                </nav>
                <!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Produk</h6>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                        <span class="fas fa-plus"></span>
                        <b> Tambah Produk</b>
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div id="tambahModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Tambah Produk</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form action="productadd.php" class="form-horizontal form-label-left" method="post">
                        <div class="form-group">
                            <label for="id_produk">ID Produk:</label>
                            <input type="text" class="form-control" id="id_produk" name="id_produk">
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">ID Kategori:</label>
                            <select class="form-control" id="id_kategori" name="id_kategori">
                                <?php
                                // Query untuk mengambil data kategori_produk
                                $sql_kategori = "SELECT id_kategori, nama_kategori FROM kategori_produk";
                                $result_kategori = mysqli_query($conn, $sql_kategori);

                                // Tampilkan opsi pilihan kategori_produk
                                while ($row = mysqli_fetch_assoc($result_kategori)) {
                                    $id_kategori = $row['id_kategori'];
                                    $nama_kategori = $row['nama_kategori'];
                                    echo "<option value='$id_kategori'>$nama_kategori</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_size">ID Size:</label>
                            <select class="form-control" id="id_size" name="id_size">
                                <?php
                                // Query untuk mengambil data size_produk
                                $sql_size = "SELECT id_size, nama_size FROM size_produk";
                                $result_size = mysqli_query($conn, $sql_size);

                                // Tampilkan opsi pilihan size_produk
                                while ($row = mysqli_fetch_assoc($result_size)) {
                                    $id_size = $row['id_size'];
                                    $nama_size = $row['nama_size'];
                                    echo "<option value='$id_size'>$nama_size</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_warna">ID Warna:</label>
                            <select class="form-control" id="id_warna" name="id_warna">
                                <?php
                                // Query untuk mengambil data warna_produk
                                $sql_warna = "SELECT id_warna, nama_warna FROM warna_produk";
                                $result_warna = mysqli_query($conn, $sql_warna);

                                // Tampilkan opsi pilihan warna_produk
                                while ($row = mysqli_fetch_assoc($result_warna)) {
                                    $id_warna = $row['id_warna'];
                                    $nama_warna = $row['nama_warna'];
                                    echo "<option value='$id_warna'>$nama_warna</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk:</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                        </div>
                        <div class="form-group">
                            <label for="harga_produk">Harga Produk:</label>
                            <input type="number" class="form-control" id="harga_produk" name="harga_produk">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_stok">Jumlah Stok:</label>
                            <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Produk</th>
                            <th>Nama Kategori</th>
                            <th>Nama Produk</th>
                            <th>Size Produk</th>
                            <th>Warna Produk</th>
                            <th>Harga Produk</th>
                            <th>Jumlah Stok</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $sql = 'SELECT p.id_produk, k.nama_kategori, p.nama_produk, z.nama_size, w.nama_warna, p.harga_produk, p.jumlah_stok
                                FROM produk p
                                JOIN kategori_produk k ON p.id_kategori = k.id_kategori
                                JOIN size_produk z ON p.id_size = z.id_size
                                JOIN warna_produk w ON p.id_warna = w.id_warna';
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            $harga_rupiah = number_format($row['harga_produk'], 0, ',', '.');
                        ?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $row['id_produk']; ?></td>
    <td><?php echo $row['nama_kategori']; ?></td>
    <td><?php echo $row['nama_produk']; ?></td>
    <td><?php echo $row['nama_size']; ?></td>
    <td><?php echo $row['nama_warna']; ?></td>
    <td>Rp <?php echo $harga_rupiah; ?></td>
    <td><?php echo $row['jumlah_stok']; ?></td>
    <td>
        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?php echo $row['id_produk']; ?>">
            <span class="fas fa-trash"></span>
        </button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ubahModal<?php echo $row['id_produk']; ?>">
            <i class="fas fa-pencil"></i>
        </button>
    </td>
</tr>

<div class="modal fade" id="hapusModal<?php echo $row['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div 
            lass="modal-body">
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
            </div>
            <form action="hapusproduct.php" method="GET">
                <div class="modal-footer">
                    <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ubahModal<?php echo $row['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahModalLabel">Ubah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="editproduct.php" method="POST">
                    <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
                    <div class="form-group">
                        <label for="id_produk">ID Produk</label>
                        <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?php echo $row['id_produk']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $row['nama_kategori']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $row['nama_produk']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_size">Size</label>
                        <input type="text" class="form-control" id="nama_size" name="nama_size" value="<?php echo $row['nama_size']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_warna">Warna</label>
                        <input type="text" class="form-control" id="nama_warna" name="nama_warna" value="<?php echo $row['nama_warna']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="harga_produk">Harga</label>
                        <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="<?php echo $row['harga_produk']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_stok">Jumlah Stok</label>
                        <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" value="<?php echo $row['jumlah_stok']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
}
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


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
<script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus data ini?");
    }
</script>
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
