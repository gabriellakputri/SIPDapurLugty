<?php
require 'AdminFunction.php';
if ( !isset($_SESSION['admin']) ) {
   header("Location: AdminLogin.php");
   exit;
}
//ambil data di URL
$id = $_GET["id"];
// query data mhs berdasarkan id
$pesanan = query("SELECT * FROM pesanan
INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan 
INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk
WHERE pesanan.ID_Pesanan = $id")[0];
?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Pesanan</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/css/quill.snow.css" rel="stylesheet">
      <link href="assets/css/quill.bubble.css" rel="stylesheet">
      <link href="assets/css/remixicon.css" rel="stylesheet">
      <link href="assets/css/simple-datatables.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
   </head>
   <body>
      <header id="header" class="header fixed-top d-flex align-items-center">
         <!-- logo di header -->
         <div class="d-flex align-items-center justify-content-between"> <a href="Dashboard.php" class="logo d-flex align-items-center"> <img src="assets/img/logo.png" alt=""> <span class="d-none d-lg-block">Admin</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
         <div class="header-nav ms-auto"> <a href="Profile.php" class="nav-link d-flex"> <button type="button" class="btn btn-outline-info">Profil</button> </a></div>
         <div class="d-flex justify-content-end"> <a href="adminlogout.php" class="nav-link d-flex"> <button type="button" class="btn btn-outline-danger">Logout</button> </a></div>
      </header>
      <!-- sidebar -->
      <aside id="sidebar" class="sidebar">
         <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"> <a class="nav-link collapsed" href="Dashboard.php"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Kategori.php"> <i class="bi bi-card-list"></i> <span>Kategori Menu</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Produk.php"> <i class="bi bi-cart-fill"></i> <span>Menu</span> </a></li>
            <li class="nav-item"> <a class="nav-link" href="Pesanan.php"> <i class="bi bi-cart-check-fill"></i> <span>Pesanan</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Pembayaran.php"> <i class="bi bi-cash"></i> <span>Pembayaran</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Pelanggan.php"> <i class="bi bi-person-fill"></i> <span>Pelanggan</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Rekening.php"> <i class="bi bi-credit-card"></i> <span>Rekening</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Laporan.php"> <i class="bi bi-graph-up"></i> <span>Laporan</span> </a></li>
         </ul>
      </aside>
      <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Pesanan</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="Pesanan.php">Pesanan</a></li>
                  <li class="breadcrumb-item active">Detail Pesanan</li>
               </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Pemesan -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Detail Pemesan</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">ID Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['ID_Pelanggan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Nama_Pelanggan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nomor Telepon Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Telepon'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Email'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Institusi Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Institusi'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Pesanan -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Detail Pesanan</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">ID Pesanan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['ID_Pesanan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Pesan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Tgl_Pesan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Pengiriman</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Tgl_Kirim'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Waktu Pengiriman</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Waktu_Kirim'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Catatan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Catatan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Total Pesanan</div>
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. '. number_format($pesanan['Total_pesanan'],2,',','.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Biaya Pengiriman</div>
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. '. number_format($pesanan['Biaya_pengiriman'],2,',','.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Total Harga yang Harus Dibayar</div>
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. '. number_format($pesanan['Total_order'],2,',','.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status Pesanan</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php 
                                          $bayar = $pesanan['status_Pembayaran'];
                                          $status = $pesanan['Status'];
                                          if ($status=="Menunggu Tagihan") {
                                             echo"<span class='badge bg-info'> <h6><b> $status </b></h6> </span>";
                                          } elseif ($status=="Menunggu Pembayaran") {
                                             echo"<span class='badge bg-warning'> <h6><b> $status </b></h6> </span>";
                                          } elseif ($status=="Menunggu Konfirmasi Pembayaran") {
                                             echo"<span class='badge bg-info'> <h6><b> $status </b></h6> </span>";
                                          } elseif ($status=="Diproses") {
                                             echo"<span class='badge bg-info'> <h6><b> $status </b></h6> </span>";
                                          } elseif ($status=="Pesanan Selesai") {
                                             echo"<span class='badge bg-info'> <h6><b> $status </b></h6> </span>";
                                          } else {
                                             echo"<span class='badge bg-info'> <h6><b> $status </b></h6> </span>";
                                          }
                                          ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status Pembayaran</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php
                                          if ($bayar=="LUNAS") {
                                              echo"<span class='badge bg-success'> <h6><b> $bayar </b></h6> </span>";
                                          }
                                          elseif ($bayar=="DP 50% dan COD"){
                                              echo"<span class='badge bg-warning'> <h6><b> $bayar </b></h6> </span>";
                                          } 
                                          elseif ($bayar=="Belum Bayar"){
                                              echo"<span class='badge bg-danger'> <h6><b> $bayar </b></h6> </span>";
                                          } 
                                                  ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
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
                                            <?php $ambil=mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan  INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan  INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk WHERE pesanan.ID_Pesanan = $id"); ?>
                                            <?php while ($pecah=mysqli_fetch_assoc($ambil)){?>
                                            <tr>
                                                <td><?= $i?></td>
                                                <td scope="row"><img width="150px" src="../assets/img/<?php echo $pecah['Gambar']; ?>"></td>
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
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Penerima -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Detail Penerima</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama Penerima</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Nama_Penerima'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nomor Telepon Penerima</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['NoTelp_Penerima'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat Pengantaran</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Alamat'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Link Lokasi Pengantaran</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['link_Lokasi'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Penerima -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Bukti Pembayaran</h5>
                                    <div class="row">
                                        <img src="../assets/img/<?php echo $pesanan['Bukti_bayar']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
      </main>
      <footer id="footer" class="footer">
        <div class="copyright"> &copy; Copyright <strong><span>Dapur Lugty</span></strong>. All Rights Reserved</div>
     </footer>
     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
       <script src="assets/js/apexcharts.min.js"></script>
       <script src="assets/js/bootstrap.bundle.min.js"></script>
       <script src="assets/js/chart.min.js"></script>
       <script src="assets/js/echarts.min.js"></script>
       <script src="assets/js/quill.min.js"></script>
       <script src="assets/js/simple-datatables.js"></script>
       <script src="assets/js/tinymce.min.js"></script>
       <script src="assets/js/validate.js"></script>
       <script src="assets/js/main.js"></script> 
            
  </body>
</html>