<?php
$conn = mysqli_connect("localhost", "root", "", "SIP_dapurlugty"); 
session_start();

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus() {
    global $conn;
    return mysqli_affected_rows($conn);
} 

function uploadGambar(){
    $gambarProduk = $_FILES['Gambar']['name'];
    $ukuranGambar = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpProduk = $_FILES['Gambar']['tmp_name'];
    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script> alert('Gambar Belum Diupload'); </script>";
        return $gambarBaru;
    }
    //cek apakah yang diupload gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', ''];
    $ekstensiGambar = explode ('.', $gambarProduk);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Yang anda upload bukan gambar'); </script>";
        return false;
    }
    //cek jika ukurannya terlalu besar
    if ($ukuranGambar > 5000000) {
        echo "<script> alert('Ukuran gambar terlalu besar'); </script>";
        return false;
    }
    //lolos pengecekan, generate nama baru
    $gambarBaru = uniqid();
    $gambarBaru .= '.';
    $gambarBaru .= $ekstensiGambar;
    move_uploaded_file($tmpProduk, 'assets/img/' . $gambarBaru);
    return $gambarBaru;
} 

function daftar($daftar)
{
   global $conn;
   $username = strtolower(stripcslashes($daftar["ID_Pelanggan"]));
   $Nama_Pelanggan = mysqli_real_escape_string($conn, $daftar["Nama_Pelanggan"]);
   $password = mysqli_real_escape_string($conn, $daftar["Password"]);
   $password2 = mysqli_real_escape_string($conn, $daftar["Password2"]);
   $Telepon = mysqli_real_escape_string($conn, $daftar["Telepon"]);
   $Email = mysqli_real_escape_string($conn, $daftar["Email"]);
   $Institusi = mysqli_real_escape_string($conn, $daftar["Institusi"]);
   //cek konfirmasi pessword
   if ($password !== $password2) {
    echo "<script>alert('Konfirmasi password tidak sesuai')</script>";
    return false;
   }
   //cek apakah username sudah pernah diinput di database 
   $result = mysqli_query($conn, "SELECT ID_Pelanggan FROM pelanggan WHERE ID_Pelanggan='$username'");
   if (mysqli_fetch_assoc($result)) {
    echo"<script>alert('Username yang dipilih sudah terdaftar')</script>";
    return false;
   }
   //enkripsi password
   $password = password_hash($password, PASSWORD_DEFAULT);
   //tambah user baru ke database
   mysqli_query($conn, "INSERT INTO pelanggan VALUES ('$username', '$Nama_Pelanggan',' ' , '$Telepon', '$Email', '$Institusi', '$password')");
   return mysqli_affected_rows($conn);
}

function tambahKeranjang()
{
    global $conn;
    $id_Produk = $_GET["id"];
    $ID_Pelanggan = $_SESSION["ID_Pelanggan"];
    $Jumlah_Barang = $_POST["Jumlah_Barang"];

    $result = mysqli_query($conn, "SELECT * FROM keranjang WHERE keranjang.ID_Produk=$id_Produk");
    if ($pecah=mysqli_fetch_assoc($result)) {
        $Jumlah_Barang = $pecah['Jumlah_Barang'] + $Jumlah_Barang ;
        //query insert data
    $queryDelete = "DELETE FROM keranjang WHERE keranjang.ID_Produk=$id_Produk";
    mysqli_query($conn, $queryDelete);
        
    $queryinput = "INSERT INTO keranjang VALUES ('', '$id_Produk', '$ID_Pelanggan', '$Jumlah_Barang' )";
    mysqli_query($conn, $queryinput);
    } elseif ($Jumlah_Barang > 0) {
        $Jumlah_Barang = $Jumlah_Barang;
        //query insert data
    $queryinput = "INSERT INTO keranjang VALUES ('', '$id_Produk', '$ID_Pelanggan', '$Jumlah_Barang' )";
    mysqli_query($conn, $queryinput);
        
    } else {
        //query insert data
    $queryinput = "INSERT INTO keranjang VALUES ('', '$id_Produk', '$ID_Pelanggan', '1' )";
    mysqli_query($conn, $queryinput);
    }
    return mysqli_affected_rows($conn);
}

function KeranjangUbah($data)
{
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Keranjang = htmlspecialchars($data["ID_Keranjang"]);
    $Jumlah_Barang = htmlspecialchars($data["Jumlah_Barang"]);

    //query insert data
    $queryinput = "UPDATE keranjang SET Jumlah_Barang = $Jumlah_Barang
                    WHERE ID_Keranjang=$ID_Keranjang
                    ";
    mysqli_query($conn, $queryinput);

    return mysqli_affected_rows($conn);
}

function TambahPesanan($tambahPesanan) {
    global $conn;
    $ID_Pelanggan = $_SESSION["ID_Pelanggan"];
    $ambil=mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk AND pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); 
    $total = 0; 
    while ($pecah=mysqli_fetch_assoc($ambil)){
        $total += $pecah['Harga']*$pecah['Jumlah_Barang'];
    }
    
    //ambil data dari tiap elemen form
    $ID_Pelanggan = htmlspecialchars($tambahPesanan["ID_Pelanggan"]);
    $Tgl_Kirim = htmlspecialchars($tambahPesanan["Tgl_Kirim"]);
    $Waktu_Kirim = htmlspecialchars($tambahPesanan["Waktu_Kirim"]);
    $Nama_Penerima = htmlspecialchars($tambahPesanan["Nama_Penerima"]);
    $NoTelp_Penerima = htmlspecialchars($tambahPesanan["NoTelp_Penerima"]);
    $Alamat = htmlspecialchars($tambahPesanan["Alamat"]);
    $link_Lokasi = htmlspecialchars($tambahPesanan["link_Lokasi"]);
    $Catatan = htmlspecialchars($tambahPesanan["Catatan"]);
    
    //query insert data
    $input = "INSERT INTO pesanan VALUES ( '', '$ID_Pelanggan', NOW(), '$Tgl_Kirim', '$Waktu_Kirim', '$Nama_Penerima', '$NoTelp_Penerima', '$Alamat', '$link_Lokasi', '$Catatan', $total, 'Menunggu Tagihan', '','' )";
    mysqli_query($conn, $input);

    //input produk item
    $ID_Pesanan = $conn->insert_id;
    $ID_Pelanggan = $_SESSION["ID_Pelanggan"];
    $ambil=mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk AND pelanggan.ID_Pelanggan = '$ID_Pelanggan' ");
    while ($prodit=mysqli_fetch_assoc($ambil)) {
        $ID_Produk = $prodit["ID_Produk"];
        $Jumlah_Barang = $prodit["Jumlah_Barang"];
        $Harga = $prodit["Harga"];
        $Total_Prodit = $Harga * $Jumlah_Barang;
        
        $input = "INSERT INTO produk_item VALUES ( '', '$ID_Pesanan', '$ID_Produk', $Jumlah_Barang, $Total_Prodit)";
        mysqli_query($conn, $input);

    } 

    $input = "INSERT INTO pembayaran VALUES ( '', '$ID_Pesanan', 'BlmByr', 'Masih Menunggu Tagihan','' ,'','','')";
    mysqli_query($conn, $input);
    
    $delete = "DELETE FROM keranjang WHERE ID_Pelanggan = '$ID_Pelanggan'";
    mysqli_query($conn, $delete);
    return mysqli_affected_rows($conn);
} 

function BayarTagihan($bayar) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Pesanan = htmlspecialchars($bayar["ID_Pesanan"]);
    $ID_Rekening = htmlspecialchars($bayar["ID_Rekening"]);
    $Nama_Rekening = htmlspecialchars($bayar["Nama_Rekening"]);
    $Nominal = htmlspecialchars($bayar["Nominal"]);
    $Tgl_bayar = htmlspecialchars($bayar["Tgl_bayar"]);
    //upload gambar
    $Gambar = uploadGambar();
    if (!$Gambar) {
        return false;
    }

    //query insert data
    $inputPembayaran = "UPDATE pembayaran SET
                    ID_Pesanan= '$ID_Pesanan',
                    ID_Rekening= '$ID_Rekening', 
                    Nama_Rekening='$Nama_Rekening', 
                    Nominal=$Nominal, 
                    Bukti_bayar='$Gambar', 
                    Tgl_bayar='$Tgl_bayar', 
                    status_Pembayaran= 'Menunggu Konfirmasi Pembayaran'
                    WHERE ID_Pesanan= '$ID_Pesanan'";
    mysqli_query($conn, $inputPembayaran);

    $StatusPesan = "UPDATE pesanan SET
                    Status = 'Menunggu Konfirmasi Pembayaran'
                    WHERE ID_Pesanan= '$ID_Pesanan'";
    mysqli_query($conn, $StatusPesan);

    return mysqli_affected_rows($conn);
} 

function ubahProfil($custProfile) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Pelanggan = $_SESSION["ID_Pelanggan"];
    $ID_Profil = htmlspecialchars($custProfile["ID_Pelanggan"]);
    $Nama_Pelanggan = htmlspecialchars($custProfile["Nama_Pelanggan"]);
    $Telepon = htmlspecialchars($custProfile["Telepon"]);
    $Email = htmlspecialchars($custProfile["Email"]);
    $gambarLama = htmlspecialchars($custProfile["gambarLama"]);

    //cek apakah user pilig gambar baru atau tidak 
    if ($_FILES['Gambar']['error'] === 4) {
        $Gambar = $gambarLama;
    } else {
        //upload gambar
        $Gambar = uploadGambar();
    }
    //query ubah data
    $ubahProfil = "UPDATE pelanggan SET
                    ID_Pelanggan = '$ID_Profil',
                    Nama_Pelanggan = '$Nama_Pelanggan', 
                    Foto_Profil = '$Gambar', 
                    Telepon = '$Telepon',
                    Email = '$Email'
                    WHERE  ID_Pelanggan = '$ID_Pelanggan'";
    mysqli_query($conn, $ubahProfil);
    return mysqli_affected_rows($conn);
} 

?>