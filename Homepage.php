<?php
session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dapur Lugty</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
      <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4">
            <small class="fa fa-map-marker-alt text-primary me-2"></small>
            <small>Griya Bintara Indah, Bintara, Bekasi Barat</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center py-3">
            <small class="far fa-clock text-primary me-2"></small>
            <small>Pesanan Dapat Dilakukan 24 Jam</small>
          </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4">
            <small class="fa fa-phone-alt text-primary me-2"></small>
            <small>(021) 885 2706</small>
          </div>
          <div class="h-100 d-inline-flex align-items-center">
            <a class="btn btn-sm-square bg-white text-primary me-1" href=""
              ><i class="fab fa-whatsapp"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-0" href=""
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-3 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
      <a href="Home.php" class="navbar-brand p-0">
        <img class="img-fluid me-3" src="img/icon/logo.png" alt="Icon" />
        <h1 class="m-0 text-primary">Dapur Lugty</h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse py-4 " id="navbarCollapse">
        <div class="navbar-nav ms-auto">
         <a href="Homepage.php#home" class="nav-item nav-link">Home</a>
          <a href="Homepage.php#about" class="nav-item nav-link">About</a>
          <a href="Menu.php" class="nav-item nav-link">Menu</a>
          <a href="Homepage.php#caraPesan" class="nav-item nav-link">Cara Pesan</a>
          <a href="Homepage.php#kontak" class="nav-item nav-link">Kontak</a>
        </div>
        
        <div class="navbar-nav ms-auto">
          <a href="Keranjang.php" class="btn btn-primary mx-1"><i class="fa fa-shopping-cart mt-1" aria-hidden="true"></i></a>
          <div class="nav-item dropdown">
            <a href="#" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fa fa-user" aria-hidden="true" style="width: 10px; height: 10px"></i>
            </a>
            <div class="dropdown-menu rounded-0 rounded-bottom m-0">
              <a href="ProfilSaya.php" class="dropdown-item">Profil Saya</a>
              <a href="PesananSaya.php" class="dropdown-item">Pesanan Saya</a>
              <a href="TagihanSaya.php" class="dropdown-item">Tagihan Saya</a>
            </div>
          </div>
        <a href="Logout.php" class="btn btn-outline-primary mx-2">Keluar<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div style="width:60%;" class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/carousel-1.png" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="img/carousel-2.png" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="img/carousel-3.png" class="d-block w-100">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Header End -->
    

    <!-- About Start -->
    <div id="about" class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <p><span class="text-primary me-2">selamat datang</span><?= $_SESSION["ID_Pelanggan"]?></p>
            <p><span class="text-primary me-2">#</span>Tentang Kami</p>
            <h1 class="display-5 mb-4">
              Kenapa memilih
              <span class="text-primary">Dapur Lugty</span> untuk catering?
            </h1>
            <p class="mb-4">
              Dapur Lugty sudah berdiri sejak 2016 dan sudah dipercaya oleh berbagai organisasi, perusahaan dan
              perorangan untuk menangani catering harian sampai acara besar.
            </p>
            <h5 class="mb-3"> <i class="far fa-check-circle text-primary me-3"></i> Terjangkau </h5>
            <h5 class="mb-3"> <i class="far fa-check-circle text-primary me-3"></i> Kualitas Terjamin </h5>
            <h5 class="mb-3"> <i class="far fa-check-circle text-primary me-3"></i> Pilihan Paket Beragam </h5>
            <h5 class="mb-3"> <i class="far fa-check-circle text-primary me-3"></i> Custom Pesanan Sesuai Keperluan dan Budget  </h5>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="img-border">
              <img class="img-fluid" src="img/logo.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->
    
<!-- Contact Start -->
    <div id="kontak" class="container-xxl py-4">
      <div class="container">
        <div class="row g-4 mb-5">
          <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="h-100 bg-dark d-flex align-items-center p-5">
              <div class="btn-lg-square bg-black flex-shrink-0">
                <i class="fa fa-phone-alt text-primary"></i>
              </div>
              <div class="ms-4">
                <p class="mb-2 text-light">
                  <span class="text-primary me-2">#</span>Telepon
                </p>
                <h5 class="text-light mb-0">(021) 885 2706</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="h-100 bg-dark d-flex align-items-center p-5">
              <div class="btn-lg-square bg-black flex-shrink-0">
                <i class="fa fa-whatsapp text-primary"></i>
              </div>
              <div class="ms-4">
                <p class="mb-2 text-light">
                  <span class="text-primary me-2">#</span>Whatsapp
                </p>
                <h5 class="text-light mb-0">(+62)813 1023 0303</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100 bg-dark d-flex align-items-center p-5">
              <div class="btn-lg-square bg-black flex-shrink-0">
                <i class="fa fa-instagram text-primary"></i>
              </div>
              <div class="ms-4">
                <p class="mb-2 text-light">
                  <span class="text-primary me-2">#</span>Instagram
                </p>
                <h5 class="text-light mb-0">dapurlugty</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->

    <!-- Cara Pesan -->
    <div id="caraPesan" class="container-xxl py-5">
      <div class="container">
        <div
          class="row g-5 mb-5 align-items-end wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="col-lg-8">
            <p><span class="text-primary me-2">#</span>Tata Cara Pemesanan</p>
            <h1 class="display-5 mb-0">
              Cara memesan lewat website
              <span class="text-primary">Dapur Lugty</span>
            </h1>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="membership-item position-relative" style="background: white; border-style: solid; border-color: #295c33;">
              <h1 class=" text-black">01</h1>
              <h3 class="text-black mb-12">Pilih Menu</h3>
              <p style="color: black;">
                Kamu dapat memilih menu dengan masuk ke pilihan menu. Pilih menu yang kamu mau lalu masukkan menu tersebut ke keranjang belanja.
              </p>
              <a class="btn btn-outline-primary px-4 mt-3" href="Menu.php">Pilih Menu</a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="membership-item position-relative" style="background: white; border-style: solid; border-color: #295c33;">
              <h1 class=" text-black">02</h1>
              <h3 class="text-black mb-12">Pesan Menu</h3>
              <p style="color: black;">
                Check out menu pilihan yang sudah ada di keranjang belanja dengan menekan "Pesan Sekarang" dan tunggu tagihan anda muncul.
              </p>
              <a class="btn btn-outline-primary px-4 mt-3" href="Keranjang.php">Pesan Menu</a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="membership-item position-relative" style="background: white; border-style: solid; border-color: #295c33;">
              <h1 class=" text-black">03</h1>
              <h3 class="text-black mb-12">Bayar Pesanan</h3>
              <p style="color: black;">
                Bayar tagihan anda dengan cara masuk ke menu tagihan. Pilih tagihan yang akan dibayar dan isi detail tagihan pada form yang muncul. 
              </p>
              <a class="btn btn-outline-primary px-4 mt-3" href="Tagihan.php">Bayar Tagihan</a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="membership-item position-relative" style="background: white; border-style: solid; border-color: #295c33;">
              <h1 class=" text-black">04</h1>
              <h3 class="text-black mb-12">Selesai</h3>
              <p style="color: black;">
                Bila pembayaran kamu telah dikonfirmasi, maka tunggu pesanan kamu sampai di tujuan sesuai dengan pesanan yang sudah disepakati.
              </p>
              <a class="btn btn-outline-primary px-4 mt-3" href="">Pesanan Kamu</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Cara Pesan -->

    <!-- Galeri -->
    <div class="container-xxl py-5">
      <div class="container">
        <div
          class="row g-5 mb-5 align-items-end wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="col-lg-8">
            <p><span class="text-primary me-2">#</span>Galeri Menu</p>
            <h1 class="display-5 mb-0">
              Berbagai Menu Pada <span class="text-primary">Dapur Lugty</span> Yang Bisa Kamu Pilih
            </h1>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="menu-item"
                  href="img/menu-md-1.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/menu-md-1.png" alt="" />
                    <div class="menu-text p-4">
                      <p class="text-white small text-uppercase mb-0">Seserahan</p>
                      <h5 class="text-white mb-0">Sambal Goreng Ati</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="menu-item"
                  href="img/menu-lg-1.png"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/menu-lg-1.png" alt="" />
                    <div class="menu-text p-4">
                      <p class="text-white small text-uppercase mb-0">Nasi Box</p>
                      <h5 class="text-white mb-0">Paket Lengkap 1</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="menu-item"
                  href="img/menu-lg-2.png"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/menu-lg-2.png" alt="" />
                    <div class="menu-text p-4">
                      <p class="text-white small text-uppercase mb-0">Nasi Box</p>
                      <h5 class="text-white mb-0">Paket Lengkap 2</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="menu-item"
                  href="img/menu-md-2.png"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/menu-md-2.png" alt="" />
                    <div class="menu-text p-4">
                      <p class="text-white small text-uppercase mb-0">Tumpeng Besar</p>
                      <h5 class="text-white mb-0">Tumpeng Besar 20 Porsi</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="menu-item"
                  href="img/menu-md-3.png"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/menu-md-3.png" alt="" />
                    <div class="menu-text p-4">
                      <p class="text-white small text-uppercase mb-0">Tumpeng Mini</p>
                      <h5 class="text-white mb-0">Paket Tumpeng Mini</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="menu-item"
                  href="img/menu-lg-3.png"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/menu-lg-3.png" alt="" />
                    <div class="menu-text p-4">
                      <p class="text-white small text-uppercase mb-0">Seserahan</p>
                      <h5 class="text-white mb-0">Ayam Bakar Ingkung 1 Ekor</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Galeri -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <h1
          class="display-5 text-center mb-5 wow fadeInUp"
          data-wow-delay="0.1s"
        >
          Testimoni
        </h1>
        <div
          class="owl-carousel testimonial-carousel wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="testimonial-item text-center">
            <img
              class="img-fluid rounded-circle border border-2 p-2 mx-auto mb-4"
              src="img/testimonial-1.jpg"
              style="width: 100px; height: 100px"
            />
            <div class="testimonial-text rounded text-center p-4">
              <p>
                Makanannya enak, harganya juga murah. Harus cobain ayam bakarnya, itu yang paling disukai sama temen temen kantor.
              </p>
              <h5 class="mb-1">Weni</h5>
            </div>
          </div>
          <div class="testimonial-item text-center">
            <img
              class="img-fluid rounded-circle border border-2 p-2 mx-auto mb-4"
              src="img/testimonial-2.jpg"
              style="width: 100px; height: 100px"
            />
            <div class="testimonial-text rounded text-center p-4">
              <p>
                Makanannya enak, harganya juga murah. Harus cobain ayam bakarnya, itu yang paling disukai sama temen temen kantor.
              </p>
              <h5 class="mb-1">Weni</h5>
            </div>
          </div>
          <div class="testimonial-item text-center">
            <img
              class="img-fluid rounded-circle border border-2 p-2 mx-auto mb-4"
              src="img/testimonial-3.jpg"
              style="width: 100px; height: 100px"
            />
            <div class="testimonial-text rounded text-center p-4">
              <p>
                Makanannya enak, harganya juga murah. Harus cobain ayam bakarnya, itu yang paling disukai sama temen temen kantor.
              </p>
              <h5 class="mb-1">Weni</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-3 pt-3 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg- col-md-12">
            <h3 class="text-light text-center mb-4">Dapur Lugty</h3>
            <h5 class="text-light text-center">
              <i class="fa fa-map-marker-alt me-3"></i>Griya Bintara Indah, Bekasi Barat
            </h5>
            <h5 class="text-light text-center">
              <i class="fa fa-phone-alt me-3"></i>(021) 8852706
            </h5>
            <h5 class="text-light text-center">
              <i class="fa fa-envelope me-3"></i>DapurLugty@gmail.com
            </h5>
            <div class="text-light d-flex justify-content-center pt-2">
              <a class="btn btn-outline-light btn-social me-2" href=""
                ><i class="fab fa-instagram"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href=""
                ><i class="fab fa-whatsapp"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
