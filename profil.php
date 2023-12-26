<?php 
include('config/koneksi.php');
session_start();
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
    <style>
      .ct-add{
        margin-top: 50px;
      }
        .profil {
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
            text-align: center;
        }
        .profil label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
            font-size: 15px;
            font-weight: 700;
        }
        .profil input[type="text"],
        .profil input[type="email"],
        .profil input[type="number"] {
            width: 100%;
            border: 1px solid #ccc;
            background: #eeeeee none repeat scroll 0 0;
            border-radius: 3px;
            box-shadow: none;
            color: #888;
            font-size: 15px;
            height: 40px;
            line-height: 30px;
            padding: 0 10px;
        }
        .profil input[type="password"] {
            width: 100%;
            border: 1px solid #ccc;
            background: #eeeeee none repeat scroll 0 0;
            border-radius: 3px;
            box-shadow: none;
            color: #888;
            font-size: 15px;
            height: 40px;
            line-height: 30px;
            padding: 0 10px;
        }
        .profil textarea[id="alamat"] {
            width: 80%;
            border: 1px solid #ccc;
            background: #eeeeee none repeat scroll 0 0;
            border-radius: 3px;
            box-shadow: none;
            color: #888;
            font-size: 15px;
            height: 70px;
            line-height: 30px;
            padding: 0 10px;
        }
        .profil button {
            width: 100%;
            padding: 10px;
            background-color: #47b2e4;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .profil button:hover {
            background-color: #37517e;
        }
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
    <script type="text/javascript">
        function checkLetter(theform) {
            pola_nama = /^[a-zA-Z .]*$/;
            if (!pola_nama.test(theform.nama.value)) {
                alert('Hanya huruf yang diperbolehkan untuk Nama!');
                theform.fullname.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<header id="header" class="fixed-top bg-content">
      <div class="container d-flex align-items-center">
        <a class="me-auto" href="index.html"><img class="logoicon" src="assets/img/logo-01.png"></a>
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

<!-- End Breadcrumbs -->

<!-- ======= Ubah Profil ======= -->
<?php
$sql = 'select ID_CUSTOMER, NAMA_CUSTOMER, USERNAME, EMAIL, PASSWORD, NOTELP_CUSTOMER from customer';
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>
<section class="ct-add">
    <center><h3>Ubah Profil</h3></center>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <form method="POST" action="editprofil.php">
                    <div class="profil">
                        <label for="ID_CUSTOMER">ID:</label>
                        <input type="text" class="form-control" id="ID_CUSTOMER" name="ID_CUSTOMER"
                            value="<?= $data['ID_CUSTOMER'] ?>" readonly>

                        <label for="USERNAME">Username:</label>
                        <input type="text" class="form-control" id="USERNAME" name="USERNAME"
                            value="<?= $data['USERNAME'] ?>">

                        <label for="PASSWORD">Password:</label>
                        <input type="password" class="form-control" id="PASSWORD" name="PASSWORD"
                            value="<?= $data['PASSWORD'] ?>">

                        <label for="NAMA_CUSTOMER">Nama:</label>
                        <input type="text" class="form-control" id="NAMA_CUSTOMER" name="NAMA_CUSTOMER"
                            value="<?= $data['NAMA_CUSTOMER'] ?>">

                        <label for="EMAIL">Email:</label>
                        <input type="email" class="form-control" id="EMAIL" name="EMAIL"
                            value="<?= $data['EMAIL'] ?>">

                        <label for="NOTELP_CUSTOMER">Telepon:</label>
                        <input type="number" class="form-control" id="NOTELP_CUSTOMER" name="NOTELP_CUSTOMER"
                            value="<?= $data['NOTELP_CUSTOMER'] ?>">

                        <br>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </table>
        </div>
    </div>
</section>
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
<?php
} else {
    header("Location:index.html");
    exit();
}
?>
</body>
</html>
