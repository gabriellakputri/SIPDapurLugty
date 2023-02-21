<?php
require 'AdminFunction.php';
if ( !isset($_SESSION['admin']) ) {
   header("Location: AdminLogin.php");
   exit;
}
?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Rekening</title>
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
            <li class="nav-item"> <a class="nav-link collapsed" href="Pelanggan.php"> <i class="bi bi-person-fill"></i> <span>Pelanggan</span> </a></li>
            <li class="nav-item"> <a class="nav-link" href="Rekening.php"> <i class="bi bi-credit-card"></i> <span>Rekening</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Laporan.php"> <i class="bi bi-graph-up"></i> <span>Laporan</span> </a></li>
         </ul>
      </aside>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Rekening</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Rekening</li>
               </ol>
            </nav>
         </div>
         <?php $i = 1; ?>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Rekening</h5>
                        <a class="btn btn-primary" href="RekeningTambah.php" role="button">Tambah Rekening</a>
                        <table class="table datatable">
                           <thead>
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">ID Rekening</th>
                                 <th scope="col">Nama Bank/Platform</th>
                                 <th scope="col">Nama Penerima</th>
                                 <th scope="col">Nomor Rekening/Platform</th>
                                 <th scope="col">Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php $ambil=mysqli_query($conn, "SELECT * FROM rekening"); ?>
                            <?php while ($pecah=mysqli_fetch_assoc($ambil)){?>
                              <tr>
                                 <td><?= $i?></td>
                                 <td scope="row"><?php echo $pecah['ID_Rekening']; ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Platform']; ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Rek']; ?></td>
                                 <td scope="row"><?php echo $pecah['No_Rek']; ?></td>
                                 <td>
                                    <a class="btn btn-warning" href="RekeningUbah.php?id=<?= $pecah['ID_Rekening']; ?>">Edit</a>
                                    <a class="btn btn-danger" href="RekeningHapus.php?id=<?= $pecah['ID_Rekening']; ?>" onclick="return confirm('Yakin ingin menghapus?')" >Delete</a>
                                </td>
                              </tr>
                              <?php $i++;?>
                              <?php }?>
                           </tbody>
                        </table>
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