<?php
require "custFunction.php";
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
else {
    //ambil data di URL
    $id = $_GET["id"];
    $_POST["Jumlah_Barang"] = 1;
    
    //cek apakah Produk berhasil ditambahkan ke keranjang atau tidak
    if (tambahKeranjang() > 0) {
        echo "
        <script>
        alert('Produk berhasil ditambahkan ke keranjang');
        document.location.href='Menu.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Menu.php';
        </script>
        ";
    }
}



?>