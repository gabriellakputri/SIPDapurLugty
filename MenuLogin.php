<?php
require "custFunction.php";
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
    <?php
    if (!isset($_SESSION["login"])) {?>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
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
      <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
          <a href="Home.php#home" class="nav-item nav-link">Home</a>
          <a href="Home.php#about" class="nav-item nav-link">About</a>
          <a href="MenuLogin.php" class="nav-item nav-link">Menu</a>
          <a href="Home.php#caraPesan" class="nav-item nav-link">Cara Pesan</a>
          <a href="Home.php#kontak" class="nav-item nav-link">Kontak</a>
        </div>
        <a href="Login.php" class="btn btn-primary">Login<i class="fa fa-arrow-right ms-3"></i></a>
      </div>
    </nav>
    <?php } 
    else { ?>
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
    <?php } ?>
    <!-- Navbar End -->

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

    <!-- products section start  -->
    <section class="my-lg-14 my-8">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-6">
                    <h3 class=" mb-4"> 
                        Produk <span class="text-primary">Dapur Lugty</span>
                    </h3>
                </div>
            </div>

            <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
                <?php $ambil=mysqli_query($conn, "SELECT * FROM produk, kategori_produk WHERE produk.ID_Kategori = kategori_produk.ID_Kategori"); ?>
                <?php while ($pecah=mysqli_fetch_assoc($ambil)){?>
                <!-- produk -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body ">
                            <div class="text-center position-relative mb-2" style="width:100%; height:200px;"> <a href="MenuDetail.php?id=<?= $pecah['ID_Produk']; ?>">
                                <img src="assets/img/<?php echo $pecah['Gambar']; ?>" style="width:100%; max-height:200px;" alt="Grocery Ecommerce Template" class="mb-3 img-fluid" ></a>
                            </div>
                            <div class="text-small mb-0">
                                <a href="MenuDetail.php?id=<?= $pecah['ID_Produk']; ?>" class="text-decoration-none text-muted"><small><?php echo $pecah['Nama_Kategori']; ?></small></a>
                            </div>
                            <h3 class="fs-5">
                                <a href="MenuDetail.php?id=<?= $pecah['ID_Produk']; ?>" class="text-inherit text-primary text-decoration-none"><?php echo $pecah['Nama_produk']; ?></a>
                            </h3>
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-1">
                                <div><span class="text-dark"><?php echo 'Rp. '. number_format($pecah['Harga'],2,',','.'); ?></span>
                            </div>
                            </div>
                            <div>
                                <a href="tambahKeranjang.php?id=<?= $pecah['ID_Produk']; ?>" class="btn btn-primary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>Tambah Ke Keranjang</a>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <?php }?>


            </div>
        </div>
     </section>
      <!-- products section end  -->


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
