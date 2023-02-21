<?php
require 'AdminFunction.php';
if ( !isset($_SESSION['admin']) ) {
   header("Location: AdminLogin.php");
   exit;
}
//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["ubahProduk"])){
    //cek apakah data berhasil diubah atau tidak
    if (ubahProduk($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href='Produk.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Produk.php';
        </script>
        ";
    }
}
//ambil data di URL
$ID_Produk = $_GET["id"];
// query data mhs berdasarkan id
$ubahProduk = query("SELECT * FROM produk, kategori_produk WHERE ID_Produk = '$ID_Produk' AND produk.ID_Kategori = kategori_produk.ID_Kategori")[0];
?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Produk</title>
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
            <li class="nav-item"> <a class="nav-link" href="Produk.php"> <i class="bi bi-cart-fill"></i> <span>Menu</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Pesanan.php"> <i class="bi bi-cart-check-fill"></i> <span>Pesanan</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Pembayaran.php"> <i class="bi bi-cash"></i> <span>Pembayaran</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Pelanggan.php"> <i class="bi bi-person-fill"></i> <span>Pelanggan</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="Rekening.php.php"> <i class="bi bi-credit-card"></i> <span>Rekening</span> </a></li>
         </ul>
      </aside>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="Produk.php">Produk</a></li>
                  <li class="breadcrumb-item active">Edit Produk</li>
               </ol>
            </nav>
         </div>
         <section class="section profile">
            <div class="row">
               <div class="col-xl-4">
                  <div class="card">
                     <img src="../assets/img/<?php echo $ubahProduk['Gambar']; ?>">
                     <div class="card-body">
                        <h5 class="card-title"><?= $ubahProduk['Nama_produk'] ?></h5>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8">
                  <div class="card">
                     <div class="card-body pt-3">
                           <!-- Edit detail produk -->
                           <div class="tab-pane fade show active profile-overview" id="ubahProduk">
                              <h5 class="card-title">Edit Produk</h5>
                              <form action="" method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="gambarLama" value="<?= $ubahProduk["Gambar"]?>" >
                                 <input type="hidden" name="ID_Produk" value="<?= $ubahProduk['ID_Produk'] ?>">
                                 <!-- <div class="row mb-3">
                                    <label for="ID_Produk" class="col-md-4 col-lg-3 col-form-label">ID Produk</label>
                                    <div class="col-md-8 col-lg-9"> <input  type="text" class="form-control" id="ID_Produk" ></div>
                                 </div> -->
                                 <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Kategori Produk</label>
                                    <div class="col-md-8 col-lg-9">
                                       <select class="form-select" aria-label="Default select example" name="ID_Kategori">
                                          <option selected><?= $ubahProduk['Nama_Kategori'] ?></option>
                                          <?php
                                          $ambil = mysqli_query($conn, "SELECT * FROM kategori_produk");
                                          while ($pecah =mysqli_fetch_assoc($ambil)) {
                                          echo "<option value=$pecah[ID_Kategori]> $pecah[Nama_Kategori]</option>";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Nama_produk" class="col-md-4 col-lg-3 col-form-label">Nama Produk</label>
                                    <div class="col-md-8 col-lg-9"> <input name="Nama_produk" type="text" class="form-control" id="Nama_produk" value="<?= $ubahProduk['Nama_produk'] ?>"></div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Ketahanan_produk" class="col-md-4 col-lg-3 col-form-label">Ketahanan Produk</label>
                                    <div class="col-md-8 col-lg-9"> <input name="Ketahanan_produk" type="text" class="form-control" id="Ketahanan_produk" value="<?= $ubahProduk['Ketahanan_produk'] ?>"></div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Harga" class="col-md-4 col-lg-3 col-form-label">Harga Produk</label>
                                    <div class="col-md-8 col-lg-9"> <input name="Harga" type="text" class="form-control" id="Harga" value="<?= $ubahProduk['Harga']?>"></div> 
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Keterangan" class="col-md-4 col-lg-3 col-form-label">Keterangan Produk</label>
                                    <div class="col-md-8 col-lg-9"> <input name="Keterangan" type="text" class="form-control" id="Keterangan" value="<?= $ubahProduk['Keterangan'] ?>"></div>
                                 </div>
                                 <div class="row mb-3">
                                    <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Foto Produk</label>
                                    <div class="col-md-8 col-lg-9"> <input type="file" name="Gambar" class="form-control" id="Gambar" ></div>
                                 </div>
                                 <div class="text-center"> 
                                    <button type="submit" name="ubahProduk" class="btn btn-primary">Ubah Detail Produk</button>
                                 </div>
                              </form>
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