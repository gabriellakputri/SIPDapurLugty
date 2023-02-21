<?php
require 'AdminFunction.php';
if ( !isset($_SESSION['admin']) ) {
   header("Location: AdminLogin.php");
   exit;
}
//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["tambahPelanggan"])){
    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahPelanggan($_POST) > 0) {
        echo "
        <script>
        alert('Pelanggan berhasil ditambah');
        document.location.href='Pelanggan.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Pelanggan gagal ditambahkan');
        document.location.href='Pelanggan.php';
        </script>
        ";
    }
} 
?>

<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Tambah Pelanggan</title>
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
            <li class="nav-item"> <a class="nav-link collapsed" href="Pesanan.php"> <i class="bi bi-cart-check-fill"></i> <span>Pesanan</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Pembayaran.php"> <i class="bi bi-cash"></i> <span>Pembayaran</span> </a></li>
            <li class="nav-item"> <a class="nav-link" href="Pelanggan.php"> <i class="bi bi-person-fill"></i> <span>Pelanggan</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Rekening.php"> <i class="bi bi-credit-card"></i> <span>Rekening</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Laporan.php"> <i class="bi bi-graph-up"></i> <span>Laporan</span> </a></li>
         </ul>
      </aside>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Tambah Pelanggan</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="Pelanggan.php">Pelanggan</a></li>
                  <li class="breadcrumb-item active">Tambah Pelanggan</li>
               </ol>
            </nav>
         </div>
         <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Pelanggan</h5>
                    <form class="row g-3" action="" method="post">
                        <div class="row mb-3">
                            <label for="ID_Pelanggan" class="col-md-4 col-lg-3 col-form-label">ID/Username Admin*</label>
                            <input name="ID_Pelanggan" type="text" class="form-control" id="ID_Pelanggan" required>
                        </div>
                        <div class="row mb-3">
                            <label for="Nama_Pelanggan" class="col-md-4 col-lg-3 col-form-label">Nama Pelanggan*</label>
                            <input name="Nama_Pelanggan" type="text" class="form-control" id="Nama_Pelanggan" required>
                        </div>
                        <div class="row mb-3">
                            <label for="Telepon" class="col-md-4 col-lg-3 col-form-label">Telepon Pelanggan*</label>
                            <input name="Telepon" type="text" class="form-control" id="Telepon" required> 
                        </div>
                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email Pelanggan</label>
                            <input name="Email" type="text" class="form-control" id="Email">
                        </div>
                        <div class="row mb-3">
                            <label for="Institusi" class="col-md-4 col-lg-3 col-form-label">Institusi Pelanggan (Tidak Ada Institusi Tulis "Pribadi")</label>
                            <input name="Institusi" type="text" class="form-control" id="Institusi" required>
                        </div>
                        <div class="text-center"> 
                            <button type="submit" name="tambahPelanggan" class="btn btn-primary">Tambah Pelanggan</button>
                        </div>
                    </form>
                    <!-- <form class="row g-3" action="" method="post">
                        <div class="col-12"> 
                            <label for="ID_Kategori" class="form-label">ID Kategori (Kombinasi 5 huruf dan angka)</label> 
                            <input type="text" name="ID_Kategori" class="form-control" id="ID_Kategori" required>
                        </div>
                        <div class="col-12"> 
                            <label for="Nama_Kategori" class="form-label">Nama Kategori Produk</label> 
                            <input type="text" name="Nama_Kategori" class="form-control" id="Nama_Kategori" required>
                        </div>
                        <div class="text-center"> 
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Kategori Produk</button> 
                        </div>
                    </form> -->
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