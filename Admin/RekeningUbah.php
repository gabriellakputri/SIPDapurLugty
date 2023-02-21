<?php
require 'AdminFunction.php';
if ( !isset($_SESSION['admin']) ) {
   header("Location: AdminLogin.php");
   exit;
}
//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["ubahRekening"])){
    //cek apakah data berhasil diubah atau tidak
    if (ubahRekening($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href='Rekening.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Rekening.php';
        </script>
        ";
    }
}
//ambil data di URL
$id_Rekening = $_GET["id"];
// query data mhs berdasarkan id
$ubahRek = query("SELECT * FROM rekening WHERE ID_Rekening = '$id_Rekening'")[0];
?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Ubah Rekening</title>
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
            <li class="nav-item"> <a class="nav-link collapsed" href="Dashboard.php"> <i class="bi bi-cart-fill"></i> <span>Menu</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Dashboard.php"> <i class="bi bi-cart-check-fill"></i> <span>Pesanan</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Dashboard.php"> <i class="bi bi-cash"></i> <span>Pembayaran</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Dashboard.php"> <i class="bi bi-person-fill"></i> <span>Pelanggan</span> </a></li>
            <li class="nav-item"> <a class="nav-link" href="Rekening.php"> <i class="bi bi-credit-card"></i> <span>Rekening</span> </a></li>
         </ul>
      </aside>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Ubah Rekening</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="Kategori.php">Rekening</a></li>
                  <li class="breadcrumb-item active">Ubah Rekening</li>
               </ol>
            </nav>
         </div>
         <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ubah Rekening</h5>
                    <form class="row g-3" action="" method="post">
                        <div class="col-12"> 
                            <label for="ID_Rekening" class="form-label">ID Rekening</label> 
                            <input type="text" name="ID_Rekening" class="form-control" id="ID_Rekening" value="<?= $ubahRek["ID_Rekening"]?>" readonly>
                        </div>
                        <div class="col-12"> 
                            <label for="Nama_Platform" class="form-label">Nama Bank/Platform</label> 
                            <input type="text" name="Nama_Platform" class="form-control" id="Nama_Platform" value="<?= $ubahRek["Nama_Platform"]?>" required>
                        </div>
                        <div class="col-12"> 
                            <label for="Nama_Rek" class="form-label">Nama Penerima</label> 
                            <input type="text" name="Nama_Rek" class="form-control" id="Nama_Rek" value="<?= $ubahRek["Nama_Rek"]?>" required>
                        </div>
                        <div class="col-12"> 
                            <label for="No_Rek" class="form-label">Nomor Rekening/Platform</label> 
                            <input type="text" name="No_Rek" class="form-control" id="No_Rek" value="<?= $ubahRek["No_Rek"]?>" required>
                        </div>
                        <div class="text-center"> 
                            <button type="submit" name="ubahRekening" class="btn btn-primary">Ubah Rekening</button> 
                        </div>
                    </form>
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