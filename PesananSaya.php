<?php 
require 'custFunction.php';
$ID_Pelanggan = $_SESSION["ID_Pelanggan"];
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
    header("Location: login.php");
    exit;
}
$ambil=mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk AND pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); 
    $total = 0; 
    while ($pecah=mysqli_fetch_assoc($ambil)){
        $total += $pecah['Harga']*$pecah['Jumlah_Barang'];
        }
        echo $total;
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

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <p class="my-0"><a href="Homepage.php" class="text-primary">Home</a><span class="mx-2">/</span> <strong class="text-black">Pesanan Saya</strong></p>
          </div>
        </div>
      </div>
    </div>

    <!-- products section start  -->
    <div class="site-section">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mt-3 mb-3 text-black">Pesanan Saya</h2>
            </div>
            <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"]?>
            <?php $ambil=mysqli_query($conn, "SELECT * FROM pesanan
                                                INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                                INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                                                WHERE pelanggan.ID_Pelanggan = '$ID_Pelanggan'" )?>
            <?php while ($pecah=mysqli_fetch_assoc($ambil)){?>
            <div class="col-md-12">
                <div class="p-4 border border-primary mb-3">
                    <div class="row">
                        <div class="row col-md-12 mb-3">
                                <div class="col-10">
                                    <span class="d-block h5">
                                        ID Pesanan: <?php echo $pecah['ID_Pesanan']; ?> | 
                                        <?php 
                                        $status = $pecah['Status'];
                                        if ($status =="Menunggu Tagihan") {
                                           echo"<span class='badge bg-primary'> $status </span> &ensp;";
                                        }
                                        elseif ($status=="Menunggu Konfirmasi Pembayaran") {
                                           echo"<span class='badge bg-danger'> $status </span> &ensp;";
                                        }
                                        elseif ($status=="Diproses") {
                                            echo"<span class='badge bg-warning'> $status </span> &ensp;";
                                        }
                                        elseif ($status=="Dikirim") {
                                            echo"<span class='badge bg-warning'> $status </span> &ensp;";
                                        }
                                        elseif ($status=="Pesanan Selesai") {
                                            echo"<span class='badge bg-primary'> $status </span> &ensp;";
                                        }?>
                                    </span>
                                    <span class="d-block text h6">Tanggal: <?php echo $pecah['Tgl_Pesan']; ?></span>
                                </div>
                                <?php if ($pecah['ID_Rekening'] == "BlmByr") { ?>
                                  <div class="col-2">
                                    <a href="PesananBatal.php?id=<?= $pecah['ID_Pesanan']; ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin membatalkan pesanan?')">Batalkan Pesanan</a>
                                </div>
                                <?php } ?> 
                                
                                
                            </div>
                        
                        <hr style="border-top: 1px solid #8c8b8b;">
                        
                        <div class="col-md-2">
                            <p class="d-block text-primary mb-1">Kontak Penerima</p>
                            <p class="d-block text mb-0"><?php echo $pecah['Nama_Penerima']; ?></p>
                            <p class="d-block text mb-0"><?php echo $pecah['NoTelp_Penerima']; ?></p>
                        </div>
                        <div class="col-md-7">
                            <p class="d-block text-primary mb-1">Detail Pengiriman</p>
                            <p class="d-block text mb-0"><?php echo $pecah['Alamat']; ?></p>
                            <p class="d-block text mb-0"><?php echo $pecah['link_Lokasi']; ?></p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="d-block text-primary mb-1">Pembayaran</p>
                            <p class="d-block text mb-0"><?php echo $pecah['Nama_Rekening']; ?></p>
                            <p class="d-block text mb-0"><?php echo $pecah['Nominal']; ?></p>
                        </div>
                        <hr style="border-top: 1px solid #8c8b8b;">

                                  <p class="d-block text mb-0"><?php echo $pecah['ID_Pesanan']; ?></p>
                        <?php $ID_Pesanan = $pecah['ID_Pesanan']; ?>
                        <?php $produk=mysqli_query($conn, "SELECT * FROM pesanan
                                                INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                                INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                                                INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan 
                                                INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk
                                                WHERE pelanggan.ID_Pelanggan = '$ID_Pelanggan' AND pesanan.ID_Pesanan = '$ID_Pesanan'" )?>
                        <?php while ($prodit=mysqli_fetch_assoc($produk)){?>
                            <div class="row col-md-4 mb-3">
                                <div class="col-5">
                                    <img class="img-fluid" src="assets/img/<?php echo $prodit['Gambar']; ?>" alt="" style="width:150px;" />
                                </div>
                                <div class="col-7">
                                    <p class="d-block text mb-0"><?php echo $prodit['Nama_produk']; ?></p>
                                    <p class="d-block text mb-0"><?= $prodit['Jumlah_Barang'] .' Porsi' ?></p>
                                    <p class="d-block text mb-0"><?= 'Total: Rp. '. number_format($prodit['Total_Prodit'],2,',','.'); ?></p>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                
                </div>
            </div>
                 <?php }?>
        </div>
   
      </div>
    </div>
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
