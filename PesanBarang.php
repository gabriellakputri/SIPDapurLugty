<?php
require "custFunction.php";
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
    header("Location: login.php");
    exit;
}
if(isset($_POST["submit"])){
    //cek apakah data berhasil diubah atau tidak
    if (TambahPesanan($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambah');
        document.location.href='PesananSaya.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data Gagal Ditambahkan');
        document.location.href='PesananSaya.php';
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
                <span class="mx-2">/</span> <a href="Keranjang.php" class="text-primary">Keranjang</a>
                <span class="mx-2">/</span> <strong class="text-black">Pesan Barang</strong>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Pesan Barang -->
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mt-3 mb-3 text-black">Pesan Barang</h2>
          </div>
          <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"]?>
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
                                  <th scope="col">Total</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $i = 1; ?>
                              <?php $ambil=mysqli_query($conn, "SELECT * FROM keranjang INNER JOIN pelanggan ON keranjang.ID_Pelanggan = pelanggan.ID_Pelanggan  INNER JOIN produk ON keranjang.ID_Produk = produk.ID_Produk WHERE Pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); ?>
                              <?php while ($pecah=mysqli_fetch_assoc($ambil)){?>
                              <tr>
                                  <td><?= $i?></td>
                                  <td scope="row"><img width="150px" src="assets/img/<?php echo $pecah['Gambar']; ?>"></td>
                                  <td scope="row"><?php echo $pecah['Nama_produk']; ?></td>
                                  <td scope="row"><?php echo $pecah['Jumlah_Barang']; ?></td>
                                  <td scope="row"><?php echo 'Rp. '. number_format($pecah['Harga'],2,',','.'); ?></td>
                                  <td scope="row"><?php echo 'Rp. '. number_format($pecah['Harga']*$pecah['Jumlah_Barang'],2,',','.'); ?></td>
                              </tr>
                              <?php $i++ ?>
                              <?php }?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>

          <div class="col-md-7">
            <form action="" method="post">
                <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"]?>
                <?php $ambil=mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk AND pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); ?>
                <?php while ($pecah=mysqli_fetch_assoc($ambil)){ ?>
                <input type="hidden" class="form-control" id="ID_Pelanggan" name="ID_Pelanggan" value="<?php echo $pecah['ID_Pelanggan']; ?>">
                <input type="hidden" class="form-control" id="ID_Produk" name="ID_Produk" value="<?php echo $pecah['ID_Produk']; ?>">
                <input type="hidden" class="form-control" id="Jumlah_Barang" name="Jumlah_Barang" value="<?php echo $pecah['Jumlah_Barang']; ?>">
                <?php }?>
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <h2 class="h5 mb-3 text-black">Form Pemesanan</h2>
                      <label for="Tgl_Kirim" class="text-black mb-1">Tanggal Pengiriman <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" id="Tgl_Kirim" name="Tgl_Kirim">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="Waktu_Kirim" class="text-black mb-1">Waktu Pesanan Sampai Di Tangan Pemesan <span class="text-danger">*</span></label>
                      <input type="time" class="form-control" id="Waktu_Kirim" name="Waktu_Kirim">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="Nama_Penerima" class="text-black mb-1">Nama Penerima Pesanan<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="Nama_Penerima" name="Nama_Penerima">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="NoTelp_Penerima" class="text-black mb-1">Nomor Telefon Penerima<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="NoTelp_Penerima" name="NoTelp_Penerima">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="Alamat" class="text-black mb-1">Alamat Lengkap Pengantaran<span class="text-danger">*</span></label>
                      <textarea name="Alamat" id="Alamat" cols="30" rows="7" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="link_Lokasi" class="text-black mb-1">Link Lokasi Pengantaran</label>
                      <input type="textarea" class="form-control" id="link_Lokasi" name="link_Lokasi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 mb-3">
                      <label for="Catatan" class="text-black mb-1">Catatan</label>
                      <input type="text" class="form-control" id="Catatan" name="Catatan" placeholder="Masukkan catatan seperti bentuk cap nasi yang diinginkan atau pilihan lauk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-12 mb-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                          Saya setuju dengan syarat dan ketentuan pemesanan yang tertera di bagian kanan form pembelian
                        </label>
                        <div class="invalid-feedback">
                          Anda harus setuju dengan syarat dan ketentuan yang berlaku.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-12">
                      <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block" >Pesan Sekarang</button>
                    </div>
                  </div>
                </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
            <div class="p-4 border mb-3">
                <span class="d-block text-primary h6 text-uppercase">Syarat dan Ketentuan Pemesanan</span>
                <ul type="disc">
                  <li>Pemesanan dan pembayaran dilakukan pada H-2 selambat-lambatnya jam 12.00 siang.</li>
                  <li>Untuk pesanan nasi box bila pelanggan tidak menuliskan pilihan cetakan nasi (dicetak dengan bentuk tumpeng/bulat dan lainnya) maka nasi akan dicetak dengan bentuk bulat</li>
                  <li>Pembatalan pesanan selambat-lambatnya dilakukan pada H-2 pesanan.</li>
                  <li>Pembatalan pesanan dapat dilakukan sebelum pesanan dibayar.</li>
                  <li>Pembatalan yang dilakukan pada H-1 akan dikenai denda 25%. Dan pembatalan yang dilakukan pada hari pengiriman dikenai denda 50%.</li>
                </ul>
            </div>
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
