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
    <style>
      .btn-add {
        margin-top: 20px;
        width: 200px;
        height: 45px;
        border-radius: 5px;
        font-family: "Jost", sans-serif;
        font-weight: bold;
        margin-top: 8.4px;
      }

      .btn-hvr {
        background: rgba(40, 58, 90, 0.9);
        border: none;
        color: antiquewhite;
      }

      .btn-hvr:hover {
        background: none;
        border: 2px solid rgba(40, 58, 90, 0.9);
        color: rgba(40, 58, 90, 0.9);
      }

      .top {
        position: absolute;
        margin-bottom: 22px;
      }

      .form-group {
        margin: 10px 0px;
      }

      .bg-content {
        background-color: #37517e;
      }
    </style>
  </head>

  <body>

    <!-- ======= Header ======= -->
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top bg-content">
      <div class="container d-flex align-items-center">
        <a class="me-auto" href="index.html"><img class="logoicon" src="assets/img/logo-01.png"></a>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <li class="nav-link scrollto dropdown"><a href="#portfolio"><span>Category</span> <i
                  class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Formal</a></li>
                <li><a href="#">Non Formal</a></li>
                <li><a href="#">Casual</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li class="nav-link scrollto dropdown"><a href="#">Hello, <span class="font-weight-bold">
                  <?php echo $_SESSION['USERNAME'] ?>
                </span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Ubah Profil</a></li>
                <li><a href="#">Sewaku</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
            <li class="top"><i class="gg-shopping-bag move"></i></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

    <main id="main">

      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portfolio Details</li>
          </ol>
          <h2>Portfolio Details</h2>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-8">
              <div class="swiper-slide">
                <img style="width: 700px;" src="assets/img/formalpr1.jpeg" alt="">
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <?php
                $no = 1;
                $sql = 'select t.no_transaksi, t.mulai_sewa, p.nama_produk, p.harga_produk, t.jumlah_sewa, t.akhir_sewa, t.lama_sewa, t.total_sewa from transaksi t
                                    join produk p on t.id_produk = p.id_produk';
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                }
                ?>
                <form action="transaction.php" method="post">
                  <h3>Project information</h3>

                  <div class="form-group">
                    <label for="id_produk">ID Produk</label>
                    <?php
                    $sql = "SELECT id_produk FROM produk WHERE id_produk = 'PD002'";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($query);
                    $id_produk = $row['id_produk'];
                    ?>
                    <input type="text" class="form-control" id="id_produk" name="id_produk"
                      value="<?php echo $id_produk; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <?php
                    $sql = "SELECT nama_produk FROM produk WHERE id_produk = 'PD002'";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($query);
                    $nama_produk = $row['nama_produk'];
                    ?>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                      value="<?php echo $nama_produk; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="id_size">Pilih Size:</label>
                    <select class="form-control" id="id_size" name="id_size">
                      <?php
                      include 'conn.php';
                      // Query untuk mengambil data size_produk
                      $sql_size = "SELECT ID_SIZE, NAMA_SIZE FROM size_produk";
                      $result_size = mysqli_query($conn, $sql_size);

                      // Tampilkan opsi pilihan size_produk
                      while ($row = mysqli_fetch_assoc($result_size)) {
                        $id_size = $row['ID_SIZE'];
                        $nama_size = $row['NAMA_SIZE'];
                        echo "<option value='$id_size'>$nama_size</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group ">
                    <label for="id_warna">Pilih Warna:</label>
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
                    <label for="harga_produk">Harga</label>
                    <?php
                    $sql = "SELECT harga_produk FROM produk WHERE id_produk = 'PD002'";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($query);
                    $harga_produk = $row['harga_produk'];
                    ?>
                    <input type="number" class="form-control" id="harga_produk" name="harga_produk"
                      value="<?php echo $harga_produk; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="jumlah_sewa">Jumlah produk</label>
                    <input type="number" class="form-control" id="jumlah_sewa" name="jumlah_sewa">
                  </div>

                  <div class="form-group">
                    <label for="mulai_sewa">Mulai Sewa</label>
                    <input type="date" class="form-control" id="mulai_sewa" name="mulai_sewa">
                  </div>
                  <div class="form-group">
                    <label for="akhir_sewa">Akhir Sewa</label>
                    <input type="date" class="form-control" id="akhir_sewa" name="akhir_sewa">
                  </div>
                  <div class="form-group">
                    <label for="lama_sewa">Lama Sewa</label>
                    <input type="number" class="form-control" id="lama_sewa" name="lama_sewa" readonly>
                  </div>

                  <div class="form-group">
                    <label for="total_bayar">Total Bayar</label>
                    <input type="number" class="form-control" id="total_bayar" name="total_bayar" readonly>
                  </div>
                  <center><button class="btn-add btn-hvr" type="submit">Sewa</button></center>

                </form>
              </div>
              <div class="portfolio-description">
                <h2>Deskripsi Produk</h2>
                <p>
                  Kebaya adalah pakaian yang terbuat dari bahan kain halus seperti sutra, katun, atau brokat. Kebaya
                  umumnya terdiri dari dua bagian utama, yaitu atasan dan bawahan. Atasan kebaya memiliki desain yang khas
                  dengan potongan yang feminin dan detail yang rumit. Banyak kebaya yang memiliki lengan panjang dengan
                  hiasan bordir atau sulaman yang indah. Ada juga kebaya dengan lengan pendek atau tanpa lengan, yang
                  memberikan sentuhan modern pada desain tradisional.
                </p>
              </div>

            </div>

          </div>

        </div>
      </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
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

      <div class="container footer-bottom clearfix">
        <div class="copyright">
          &copy; Copyright <strong><span>Ngampil</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="#hero">Ngampil Production</a>
        </div>
      </div>
    </footer><!-- End Footer -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Script Lama Sewa-->
    <script>
      // Mendapatkan elemen input
      var mulaiSewaInput = document.getElementById('mulai_sewa');
      var jumlahsewaInput = document.getElementById('jumlah_sewa');
      var akhirSewaInput = document.getElementById('akhir_sewa');
      var lamaSewaInput = document.getElementById('lama_sewa');
      var hargaProdukInput = document.getElementById('harga_produk');
      var totalBayarInput = document.getElementById('total_bayar');

      // Tambahkan event listener untuk menghitung lama sewa saat nilai tanggal berubah
      mulaiSewaInput.addEventListener('change', hitungLamaSewa);
      akhirSewaInput.addEventListener('change', hitungLamaSewa);

      // Tambahkan event listener untuk menghitung total bayar saat nilai lama sewa atau harga produk berubah
      lamaSewaInput.addEventListener('change', hitungTotalBayar);
      hargaProdukInput.addEventListener('change', hitungTotalBayar);

      // Fungsi untuk menghitung lama sewa
      function hitungLamaSewa() {
        var mulaiSewa = new Date(mulaiSewaInput.value);
        var akhirSewa = new Date(akhirSewaInput.value);

        // Hitung selisih hari antara tanggal akhir sewa dan tanggal mulai sewa
        var selisihHari = Math.round((akhirSewa - mulaiSewa) / (1000 * 60 * 60 * 24));

        // Tetapkan nilai lama sewa pada input field
        lamaSewaInput.value = selisihHari;

        // Hitung total bayar setelah lama sewa diubah
        hitungTotalBayar();
      }

      // Fungsi untuk menghitung total bayar
      function hitungTotalBayar() {
        var jumlahsewa = parseInt(jumlahsewaInput.value);
        var lamaSewa = parseInt(lamaSewaInput.value);
        var hargaProduk = parseInt(hargaProdukInput.value);

        // Hitung total bayar berdasarkan lama sewa dan harga produk
        var totalBayar = jumlahsewa * lamaSewa * hargaProduk;

        // Tetapkan nilai total bayar pada input field
        totalBayarInput.value = totalBayar;
      }
    </script>
  </body>

  </html>
  <?php
} else {
  header("Location: login.php");
  exit();
}
?>