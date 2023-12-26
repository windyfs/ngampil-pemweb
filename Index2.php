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
                <li><a href="#portfolio">Formal</a></li>
                <li><a href="#portfolio">Non Formal</a></li>
                <li><a href="#portfolio">Casual</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
            <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
            <li class="nav-link scrollto dropdown"><a href="#">Hello, <span class="font-weight-bold">
                  <?php echo $_SESSION['USERNAME'] ?>
                </span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="profil.php">Ubah Profil</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
            
            <li><a href="riwayat_sewa.php"><i class="gg-shopping-bag move" ></i></a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">

      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
            data-aos="fade-up" data-aos-delay="200">
            <h1>Beragam Baju Pilihan Untuk Tampilan Menarik</h1>
            <h2>Kami menyediakan banyak pilihan baju sesuai dengan acara anda</h2>
            <div class="d-flex justify-content-center justify-content-lg-start">
              <a href="#portfolio" class="btn-get-started scrollto">Let's Buy</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
            <img src="assets/img/image-01.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- End Hero -->

    <main id="main">
      <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>About Us</h2>
          </div>

          <div class="row content">
            <div class="col-lg-6 offset-lg-3">
              <p>
                Toko kami berkomitmen untuk memberikan layanan terbaik agar anda dapat menyewa baju tanpa khawatir
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i>Harga Terjangkau dan Ramah di Kantung</li>
                <li><i class="ri-check-double-line"></i>Transaksi Terercaya dan Aman Tanpa Gangguan</li>
                <li><i class="ri-check-double-line"></i>Beragam model yang dapat dipilih</li>
              </ul>
            </div>
            <div class="col-lg-6 offset-lg-3 pt-4 pt-lg-0 btn">
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->

      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Product</h2>
            <p>Tersedia berbagai macam pilihan produk yang anda bisa pakai dengan tampilan menarik sesuai tema acara</p>
          </div>

          <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Formal</li>
            <li data-filter=".filter-card">Non Formal</li>
            <li data-filter=".filter-web">Casual</li>
          </ul>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <?php
              $sql = "SELECT * FROM produk WHERE ID_PRODUK = 'PD001'";
              $query = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($query);
              ?>
              <div class="portfolio-img"><img src="assets/img/nf5.jpg" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>
                  <?php echo $row['NAMA_PRODUK']; ?>
                </h4>
                <p>Rp.
                  <?php echo number_format($row['HARGA_PRODUK'], 0, ',', '.'); ?>,-
                </p>
                <a href="assets/img/nf5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                  title="Kebaya"><i class="bx bx-plus"></i></a>
                <a href="product1.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <?php
              $sql = "SELECT * FROM produk WHERE ID_PRODUK = 'PD003'";
              $query = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($query);
              ?>
              <div class="portfolio-img"><img src="assets/img/casualpr1.jpeg" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>
                  <?php echo $row['NAMA_PRODUK']; ?>
                </h4>
                <p>Rp.
                  <?php echo number_format($row['HARGA_PRODUK'], 0, ',', '.'); ?>,-
                </p>
                <a href="assets/img/casualpr1.jpeg" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link" title="Women Casual White Midi Dress"><i
                    class="bx bx-plus"></i></a>
                <a href="product2.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <?php
              $sql = "SELECT * FROM produk WHERE ID_PRODUK = 'PD002'";
              $query = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($query);
              ?>
              <div class="portfolio-img"><img src="assets/img/formalpr1.jpeg" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>
                  <?php echo $row['NAMA_PRODUK']; ?>
                </h4>
                <p>Rp.
                  <?php echo number_format($row['HARGA_PRODUK'], 0, ',', '.'); ?>,-
                </p>
                <a href="assets/img/formalpr1.jpeg" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link" title="Women Formal Blazer&Skirt"><i class="bx bx-plus"></i></a>
                <a href="product3.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <?php
              $sql = "SELECT * FROM produk WHERE ID_PRODUK = 'PD004'";
              $query = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($query);
              ?>
              <div class="portfolio-img"><img src="assets/img/formalpr2.jpeg" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>
                  <?php echo $row['NAMA_PRODUK']; ?>
                </h4>
                <p>Rp.
                  <?php echo number_format($row['HARGA_PRODUK'], 0, ',', '.'); ?>,-
                </p>
                <a href="assets/img/formalpr2.jpeg" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link" title="Women Formal Grid Dress"><i class="bx bx-plus"></i></a>
                <a href="product4.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <?php
              $sql = "SELECT * FROM produk WHERE ID_PRODUK = 'PD005'";
              $query = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($query);
              ?>
              <div class="portfolio-img"><img src="assets/img/nf1.jpeg" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>
                  <?php echo $row['NAMA_PRODUK']; ?>
                </h4>
                <p>Rp.
                  <?php echo number_format($row['HARGA_PRODUK'], 0, ',', '.'); ?>,-
                </p>
                <a href="assets/img/nf1.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                  title="Indonesian Navy Costum"><i class="bx bx-plus"></i></a>
                <a href="product5.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <?php
              $sql = "SELECT * FROM produk WHERE ID_PRODUK = 'PD006'";
              $query = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($query);
              ?>
              <div class="portfolio-img"><img src="assets/img/casualk2.jpeg" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>
                  <?php echo $row['NAMA_PRODUK']; ?>
                </h4>
                <p>Rp.
                  <?php echo number_format($row['HARGA_PRODUK'], 0, ',', '.'); ?>,-
                </p>
                <a href="assets/img/casualk2.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                  title="Police Man Costum for Kids"><i class="bx bx-plus"></i></a>
                <a href="product6.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

          </div>
        </div>
      </section><!-- End Portfolio Section -->

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

        </div>
      </section><!-- End Cta Section -->

      <!-- FAQ -->
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Frequently Asked Questions</h2>
          </div>

          <div class="faq-list">
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                  data-bs-target="#faq-list-1">Bagaimana cara menyewa baju/kostum di ngampil.co? <i
                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                  <p>
                    <br> 1. Pilih baju / kostum yang ingin disewa dengan mengunjungi website home kami</br>
                    <br> 2. Produk dapat dipilih berdasarkan kategori tertentu sesuai keinginan</br>
                    <br> 3. Pilih produk yang kamu mau, dan jangan lupa pilih size dan warna yang tersedia</br>
                    <br> 4. Klik "masukan ke keranjang" lalu klik "check out"</br>
                    <br> 5. Pilih metode pengiriman dan metode pembayaran sesuai yang diinginkan</br>
                    <br> 6. Bayar sesuai tagihan dan buat pesanan sewa baju</br>
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"
                  class="collapsed">Bagaimana jika saya ingin memperpanjang waktu sewa? <i
                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Jika Anda ingin memperpanjang waktu sewa, harap hubungi kami sebelum masa sewa berakhir. Kami akan
                    membantu Anda untuk memperpanjang waktu sewa dengan biaya tambahan yang berlaku.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3"
                  class="collapsed">Bagaimana cara mengembalikan baju/kostum? <i
                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    <br>Kostum dapat diambil dan dikembalikan langsung di toko kami atau dapat dikirim dan dikembalikan
                    via gojek atau JNE</br>
                    <br>Harga sewa belum termasuk ongkos kirim</br>
                    <br>Keterlambatan pengiriman oleh pihak ketiga ( Gojek , JNE , dll ) diluar tanggung jawab kami </br>
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4"
                  class="collapsed">Bagaimana jika baju/kostum rusak atau hilang? <i
                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Jika baju/kostum mengalami kerusakan minor, biaya perbaikan akan ditanggung oleh penyewa. Namun, jika
                    kerusakan parah atau kehilangan terjadi, Anda akan bertanggung jawab untuk mengganti atau membayar
                    baju/kostum sesuai dengan harga yang telah ditentukan.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="500">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5"
                  class="collapsed">Apakah ada kebijakan pembatalan? <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Kami memiliki kebijakan pembatalan tertentu. Jika Anda ingin membatalkan penyewaan, harap memberi tahu
                    kami sesegera mungkin. Kebijakan pembatalan dan pengembalian uang akan diberitahukan kepada Anda.
                  </p>
                </div>
              </li>

            </ul>
          </div>

        </div>
      </section><!-- End Frequently Asked Questions Section -->
      <!-- ======= Contact Section ======= -->
    </main><!-- End #main -->

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

  </body>

  </html>
  <?php
} else {
  header("Location: login.php");
  exit();
}
?>