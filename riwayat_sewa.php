<?php
session_start();

include('config/koneksi.php');

if (isset($_SESSION['ID_CUSTOMER']) && isset($_SESSION['USERNAME'])) {

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ngampil</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/Logo-02-01.png" rel="icon">
    <link href="assets/img/Logo-02-01.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Icon -->
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/shopping-bag.css' rel='stylesheet'>

</head>
<body>
<header id="header" class="fixed-top bg-content">
      <div class="container d-flex align-items-center">
        <a class="me-auto" href="index2.php"><img class="logoicon" src="assets/img/logo-01.png"></a>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="index2.php#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="index2.php#about">About Us</a></li>
            <li class="nav-link scrollto dropdown"><a href="index2.php#portfolio"><span>Category</span> <i
                  class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Formal</a></li>
                <li><a href="#">Non Formal</a></li>
                <li><a href="#">Casual</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="index2.php#faq">FAQ</a></li>
            <li><a class="nav-link scrollto" href="index2.php#contact">Contact</a></li>
            <li class="nav-link scrollto dropdown"><a href="#">Hello, <span class="font-weight-bold">
                  <?php echo $_SESSION['USERNAME'] ?>
                </span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="profil.php">Ubah Profil</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="riwayat_sewa.php"><i class="gg-shopping-bag move"></i></a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <h2>Riwayat penyewaan</h2>
        <ol>
            <li><a href="index2.php">Home</a></li>
            <li>Riwayat sewa</li>
        </ol>
    </div>
</section>
<!-- End Breadcrumbs -->
<center>
    <section>
        <h3>Riwayat Sewa</h3>
    </section>
</center>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>    
                    <th width="23" align="center">No Transaksi</th>
                    <th width="100">Nama Produk</th>        
                    <th width="80">Tgl. Mulai</th>
                    <th width="80">Tgl. Selesai</th>
                    <th width="50">Durasi</th>
                    <th width="100">Biaya Sewa</th>
                </tr>
            </thead>
            
            <tbody>
            <?php
            $no = 1;
            $sql = 'SELECT t.no_transaksi, p.nama_produk, t.mulai_sewa,t.akhir_sewa, t.lama_sewa, p.harga_produk, t.jumlah_sewa,  t.total_sewa FROM transaksi t
            JOIN produk p ON t.id_produk = p.id_produk';
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td align="center"><?= $no++ ?></td>
                    <td><?= $row['nama_produk'] ?></td>
                    <td><?= $row['mulai_sewa'] ?></td>
                    <td><?= $row['akhir_sewa'] ?></td>
                    <td><?= $row['lama_sewa'] ?></td>
                    <td><?= $row['total_sewa'] ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
  <!-- ======= Footer ======= -->
  <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>NGAMPIL</h3>
              <p>
                Gunung Anyar <br>
                Surabaya, 60293<br>
                Indonesia <br><br>
                <strong>Phone:</strong> +62 8157 1505 35<br>
                <strong>Email:</strong> ngampil@gmail.com<br>
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Link Pintas</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Categroy</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQ</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#footer">Contact</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Produk Kami</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Formal</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Non Formal</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Casual</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="portfolio-details.html">Detail Sewa</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>HUBUNGI KAMI</h4>
              <p>Mari terhubung dengan kami untuk mendapatkan informasi penyewaan menarik lainnya</p>
              <div class="social-links mt-3">
                <a href="https://www.upnjatim.ac.id/" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.upnjatim.ac.id/" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://fasilkom.upnjatim.ac.id/" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://sisfo.upnjatim.ac.id/" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="https://sisfo.upnjatim.ac.id/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>
      </div>
</body>
</html>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>