<?php
require "custFunction.php";
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
    header("Location: login.php");
    exit;
}
if(isset($_POST["submit"])){
    //cek apakah data berhasil diubah atau tidak
    if (BayarTagihan($_POST) > 0) {
        echo "
        <script>
        alert('Tagihan Berhasil Dibayar');
        document.location.href='TagihanSaya.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Tagihan Gagal Dibayar');
        document.location.href='TagihanSaya.php';
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
            <p class="my-0">
                <a href="Homepage.php" class="text-primary">Home</a>
                <span class="mx-2">/</span> <a href="TagihanSaya.php" class="text-primary">Tagihan Saya</a>
                <span class="mx-2">/</span> <strong class="text-black">Bayar Tagihan</strong>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Pesan Barang -->
    <div class="site-section">
      <div class="container">
        <div class="row">
            <h2 class="h3 mt-3 mb-3 text-black">Bayar Tagihan</h2>
          
        </div>
        <?php $id = $_GET["id"];?>
        <div class="card mb-3">
          <div class="card-body pt-3">
              <div class="tab-content pt-2">
                  <!-- Produk yang dipesan -->
                  <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                      <h5 class="card-title">Produk Yang Dipesan</h5>
                      <table class="table datatable">
                          <thead>
                              <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Gambar Produk</th>
                                  <th scope="col">Produk</th>
                                  <th scope="col">Jumlah</th>
                                  <th scope="col">Harga Satuan</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $i = 1; ?>
                              <?php $ambil=mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan  INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan  INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk WHERE pembayaran.ID_Pembayaran = $id"); ?>
                              <?php while ($pecah=mysqli_fetch_assoc($ambil)){?>
                              <tr>
                                  <td><?= $i?></td>
                                  <td scope="row"><img width="150px" src="assets/img/<?php echo $pecah['Gambar']; ?>"></td>
                                  <td scope="row"><?php echo $pecah['Nama_produk']; ?></td>
                                  <td scope="row"><?php echo $pecah['Jumlah_Barang']; ?></td>
                                  <td scope="row"><?php echo 'Rp. '. number_format($pecah['Harga'],2,',','.'); ?></td>
                              </tr>
                              <?php $i++ ?>
                              <?php }?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <?php 
            $ambil=mysqli_query($conn, "SELECT * FROM pesanan
                                                INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                                INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                                                WHERE pembayaran.ID_Pembayaran = '$id' " )?>
            <?php while ($pecah=mysqli_fetch_assoc($ambil)){?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="ID_Pesanan" name="ID_Pesanan" value="<?php echo $pecah['ID_Pesanan']; ?>">
                <div class="p-3 p-lg-4 border">
                  <span class="d-block text-primary h5 mb-3">Form Pembayaran</span>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="ID_Rekening" class="text-black mb-1">Telah Melakukan Pembayaran Melalui<span class="text-danger">*</span></label>
                      <div class="col-12">
                        <select class="form-select" aria-label="Default select example" name="ID_Rekening">
                          <option selected>---</option>
                          <?php
                           $ambil = mysqli_query($conn, "SELECT * FROM rekening");
                           while ($rekening =mysqli_fetch_assoc($ambil) AND $rekening[ID_Rekening] != BlmByr) {
                               echo "<option value=$rekening[ID_Rekening]> $rekening[Nama_Platform] $rekening[No_Rek] a/n $rekening[Nama_Rekening]</option>";
                           }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="Nama_Rekening" class="text-black mb-1">Nama Rekening/e-Money yang Melakukan Pembayaran<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="Nama_Rekening" name="Nama_Rekening">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="Nominal" class="text-black mb-1">Besar Nominal yang Sudah Dibayar<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="Nominal" name="Nominal">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="Tgl_bayar" class="text-black mb-1">Pembayaran Dilakukan Pada Tanggal<span class="text-danger">*</span></label>
                      <input type="date" name="Tgl_bayar" id="Tgl_bayar" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="Gambar" class="text-black mb-1">Bukti Pembayaran<span class="text-danger">*</span></label>
                      <input type="file" name="Gambar" id="Gambar" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-12 mb-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                          Saya setuju dengan syarat dan ketentuan pembayaran yang tertera di bagian kanan form pembayaran
                        </label>
                        <div class="invalid-feedback">
                          Anda harus setuju dengan syarat dan ketentuan yang berlaku.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-12">
                      <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block" >Kirim Konfirmasi Pembayaran</button>
                    </div>
                  </div>
                </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
            
            <div class="p-4 border mb-3">
                <span class="d-block text-primary h5">Syarat dan Ketentuan Pembayaran</span>
                <ul type="disc">
                  <li>Pembayaran uang muka 50% dibayar saat pemesanan.</li>
                  <li>Pesanan diproses saat pelanggan sudah membayar pesanan (baik itu uang muka ataupun dibayar lunas)</li>
                  <li>Pelunasan dibayar paling lambat 1-2 hari sebelum acara atau saat pengiriman.</li>
                  <li>Pembayaran dilakukan setelah tagihan diberikan oleh Dapur Lugty. Kami tidak akan meminta deposit dalam bentuk apapun bilamana pemesanan Anda belum dikonfirmasi.</li>
                  <li>Pembatalan yang dilakukan pada H-1 akan dikenai denda 25%. Dan pembatalan yang dilakukan pada hari pengiriman dikenai denda 50%.</li>
                </ul>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>

    <!-- Pesan Barang  -->


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
