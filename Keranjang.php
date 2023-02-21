<?php
require "custFunction.php";

if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
    header("Location: login.php");
    exit;
}
if(isset($_POST["submit"])){
    //cek apakah data berhasil diubah atau tidak
    if (KeranjangUbah($_POST) > 0) {
        echo "
        <script>
        document.location.href='Keranjang.php';
        </script>
        ";
    } else {
        echo "
        <script>
        document.location.href='Keranjang.php';
        </script>
        ";
    }
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

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <p class="my-0"><a href="Homepage.php" class="text-primary">Home</a><span class="mx-2">/</span> <strong class="text-black">Keranjang</strong></p>
          </div>
        </div>
      </div>
    </div>

    <!-- tabel keranjang -->
    <div class="site-section">
        <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"]?>
        
      <div class="container">
        <div class="row mt-5 mb-4">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table mx-0 px-0">
              <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th class="product-thumbnail" style="width:30%">Gambar</th>
                    <th class="product-name">Menu</th>
                    <th class="product-price">Harga</th>
                    <th class="product-quantity">Kuantitas</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $ambil=mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk AND pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); ?>
                    <?php $total = 0; ?>
                    <?php while ($pecah=mysqli_fetch_assoc($ambil)){
                        $total += $pecah['Harga']*$pecah['Jumlah_Barang'] ?>
                  <tr>
                    <td class="product-thumbnail" style="width:30%">
                      <img src="assets/img/<?php echo $pecah['Gambar']; ?>" width="95%" alt="Image" >
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $pecah['Nama_produk']; ?></h2>
                    </td>
                    <td><?php echo 'Rp. '. number_format($pecah['Harga'],2,',','.'); ?></td>
                    <td>
                        <form action="" method="post">
                            <div class="input-group mb-3" style="max-width: 120px;">
                            <input type="hidden" name="ID_Keranjang" class="form-control" id="ID_Keranjang" value="<?= $pecah["ID_Keranjang"]?>">
                              <input type="text" name="Jumlah_Barang" class="form-control text-center" id="Jumlah_Barang" value="<?php echo $pecah['Jumlah_Barang']; ?>" placeholder="" >
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-block">Edit Jumlah</button>
                            
                        </form>
                    </td>
                    <td><?php echo 'Rp. '. number_format($pecah['Harga']*$pecah['Jumlah_Barang'],2,',','.'); ?></td>
                    <td><a href="KeranjangHapus.php?id=<?= $pecah['ID_Keranjang']; ?>" class="btn btn-primary btn-sm" onclick="return confirm('Yakin ingin menghapus barang ini dari keranjang?')">X</a></td>
                  </tr>
                <?php }?>
                
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mt-0">
              <div class="col-md-4">
                <a href="Menu.php" class="btn btn-outline-primary py-1 btn-block">Lanjutkan Belanja</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-6 text-right border-bottom mb-5">
                    <h5 class="text-black text-uppercase">Total Belanja</h5>
                  </div>
                  <div class="col-md-6 text-right border-bottom mb-5">
                    <h5 class="text-black text-uppercase"><?php echo 'Rp. '. number_format($total,2,',','.'); ?></h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='PesanBarang.php'">Buat Pesanan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- tabel keranjang  -->


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
<?php $ambil=mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk AND pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); ?>
                    <?php while ($pecah=mysqli_fetch_assoc($ambil)){?>
    <script>
        
        
        function countPlus() {
            const counter = document.getElementById('<?php echo $pecah['ID_Produk']; ?>');
        let counterValue = counter.value;
            counter.value = ++counterValue;
        }
        function countMinus() {
            const counter = document.getElementById('<?php echo $pecah['ID_Produk']; ?>');
        let counterValue = counter.value;
            if (counter.value > 1) {
                counter.value = --counterValue;
            }
            else{
                counter.value = 1;
            }
            
        }
    </script>
    <?php } ?>


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
