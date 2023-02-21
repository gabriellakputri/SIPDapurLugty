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
    move_uploaded_file($tmpProduk, '../assets/img/' . $gambarBaru);
    return $gambarBaru;
} 

// Kategori Produk
function tambahKategori($data) {
    global $conn;
    //ambil data dari tiap elemen form
    $id_kategori = htmlspecialchars($data["ID_Kategori"]);
    $nama_kategori = htmlspecialchars($data["Nama_Kategori"]);

    //query insert data
    $queryinput = "INSERT INTO kategori_produk VALUES ('$id_kategori', '$nama_kategori')";
    mysqli_query($conn, $queryinput);
    return mysqli_affected_rows($conn);
} 
function hapus() {
    global $conn;
    return mysqli_affected_rows($conn);
} 
function ubahKategori($data) {
    global $conn;
    //ambil data dari tiap elemen form
    $id_kategori = htmlspecialchars($data["ID_Kategori"]);
    $nama_kategori = htmlspecialchars($data["Nama_Kategori"]);

    //query insert data
    $queryinput = "UPDATE kategori_produk SET 
                    ID_Kategori='$id_kategori', 
                    Nama_Kategori='$nama_kategori'
                    WHERE ID_Kategori='$id_kategori'
                    ";
    mysqli_query($conn, $queryinput);

    return mysqli_affected_rows($conn);
}

//Produk
function tambahProduk($produk) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Kategori = htmlspecialchars($produk["ID_Kategori"]);
    $Nama_produk = htmlspecialchars($produk["Nama_produk"]);
    $Ketahanan_produk = htmlspecialchars($produk["Ketahanan_produk"]);
    $Harga = htmlspecialchars($produk["Harga"]);
    $Keterangan = htmlspecialchars($produk["Keterangan"]);
    //upload gambar
    $Gambar = uploadGambar();
    if (!$Gambar) {
        return false;
    }

    //query insert data
    $inputProduk = "INSERT INTO produk VALUES ('', '$ID_Kategori','$Nama_produk', '$Gambar', '$Ketahanan_produk', '$Harga', '$Keterangan' )";
    mysqli_query($conn, $inputProduk);

    return mysqli_affected_rows($conn);
} 
function ubahProduk($produk) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Produk = htmlspecialchars($produk["ID_Produk"]);
    $ID_Kategori = htmlspecialchars($produk["ID_Kategori"]);
    $Nama_produk = htmlspecialchars($produk["Nama_produk"]);
    $Ketahanan_produk = htmlspecialchars($produk["Ketahanan_produk"]);
    $Harga = htmlspecialchars($produk["Harga"]);
    $Keterangan = htmlspecialchars($produk["Keterangan"]);
    // $Gambar = htmlspecialchars($produk["Gambar"]);
    $gambarLama = htmlspecialchars($produk["gambarLama"]);

    //cek apakah user pilig gambar baru atau tidak 
    if ($_FILES['Gambar']['error'] === 4) {
        $Gambar = $gambarLama;
    } else {
        //upload gambar
        $Gambar = uploadGambar();
    }
    //query ubah data
    $ubahproduk = "UPDATE produk, kategori_produk SET
                    kategori_produk.ID_Kategori = '$ID_Kategori',
                    produk.Nama_produk = '$Nama_produk', 
                    produk.Gambar = '$Gambar', 
                    produk.Ketahanan_produk = '$Ketahanan_produk',
                    produk.Harga = $Harga, 
                    produk.Keterangan = '$Keterangan' 
                    WHERE  produk.ID_Kategori = kategori_produk.ID_Kategori
                    AND produk.ID_Produk = $ID_Produk";
    mysqli_query($conn, $ubahproduk);
    return mysqli_affected_rows($conn);
}


// Rekening
function tambahRekening($rek) {
    global $conn;
    //ambil data dari tiap elemen form
    $id_Rekening = htmlspecialchars($rek["ID_Rekening"]);
    $nama_Platform = htmlspecialchars($rek["Nama_Platform"]);
    $Nama_Rek = htmlspecialchars($rek["Nama_Rek"]);
    $no_Rek = htmlspecialchars($rek["No_Rek"]);

    //query insert data
    $queryinput = "INSERT INTO rekening VALUES ('$id_Rekening', '$nama_Platform', '$Nama_Rek', '$no_Rek' )";
    mysqli_query($conn, $queryinput);
    return mysqli_affected_rows($conn);
} 
function ubahRekening($rek) {
    global $conn;
    //ambil data dari tiap elemen form
    $id_Rekening = htmlspecialchars($rek["ID_Rekening"]);
    $nama_Platform = htmlspecialchars($rek["Nama_Platform"]);
    $Nama_Rek = htmlspecialchars($rek["Nama_Rek"]);
    $no_Rek = htmlspecialchars($rek["No_Rek"]);

    //query insert data
    $queryinput = "UPDATE rekening SET 
                    ID_Rekening = '$id_Rekening', 
                    Nama_Platform = '$nama_Platform', 
                    Nama_Rek = '$Nama_Rek', 
                    No_Rek = '$no_Rek'
                    WHERE ID_Rekening='$id_Rekening'
                    ";
    mysqli_query($conn, $queryinput);

    return mysqli_affected_rows($conn);
}

//Profil
function ubahProfil($adminProfile) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Profil = htmlspecialchars($adminProfile["uname_Admin"]);
    $Nama_Admin = htmlspecialchars($adminProfile["Nama_Admin"]);
    $Telepon = htmlspecialchars($adminProfile["Telepon"]);
    $Email = htmlspecialchars($adminProfile["Email"]);
    // $Gambar = htmlspecialchars($adminProfile["Gambar"]);
    $gambarLama = htmlspecialchars($adminProfile["gambarLama"]);

    //cek apakah user pilig gambar baru atau tidak 
    if ($_FILES['Gambar']['error'] === 4) {
        $Gambar = $gambarLama;
    } else {
        //upload gambar
        $Gambar = uploadGambar();
    }
    //query ubah data
    $ubahProfil = "UPDATE adminprofile SET
                    uname_Admin = '$ID_Profil',
                    Nama_Admin = '$Nama_Admin', 
                    Foto_Profil = '$Gambar', 
                    Telepon = '$Telepon',
                    Email = '$Email'
                    WHERE  uname_Admin='admin'";
    mysqli_query($conn, $ubahProfil);
    return mysqli_affected_rows($conn);
} 

//Pelanggan
function tambahPelanggan($pelanggan) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Pelanggan = htmlspecialchars($pelanggan["ID_Pelanggan"]);
    $Nama_Pelanggan = htmlspecialchars($pelanggan["Nama_Pelanggan"]);
    $Telepon = htmlspecialchars($pelanggan["Telepon"]);
    $Email = htmlspecialchars($pelanggan["Email"]);
    $Institusi = htmlspecialchars($pelanggan["Institusi"]);
    //query insert data
    $inputPelanggan = "INSERT INTO pelanggan VALUES ('$ID_Pelanggan', '$Nama_Pelanggan','', '$Telepon', '$Email', '$Institusi', '')";
    mysqli_query($conn, $inputPelanggan);
    return mysqli_affected_rows($conn);
} 

//PESANAN 
function ubahPesanan($pesanan) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Pesanan = htmlspecialchars($pesanan["ID_Pesanan"]);
    $Tgl_Kirim = htmlspecialchars($pesanan["Tgl_Kirim"]);
    $Tgl_Pesan = htmlspecialchars($pesanan["Tgl_Pesan"]);
    $Waktu_Kirim = htmlspecialchars($pesanan["Waktu_Kirim"]);
    $Catatan = htmlspecialchars($pesanan["Catatan"]);
    $Status = htmlspecialchars($pesanan["Status"]);
    $Biaya_pengiriman = htmlspecialchars($pesanan["Biaya_pengiriman"]);
    $Total_pesanan = htmlspecialchars($pesanan["Total_pesanan"]);
    $Total_order = $Total_pesanan + $Biaya_pengiriman;
    //query ubah data
    $ubahproduk = "UPDATE pesanan SET
                    Tgl_Kirim = '$Tgl_Kirim',
                    Tgl_Pesan = '$Tgl_Pesan',
                    Waktu_Kirim = '$Waktu_Kirim',
                    Catatan = '$Catatan', 
                    Status = '$Status',
                    Biaya_pengiriman = '$Biaya_pengiriman', 
                    Total_order = '$Total_order'
                    WHERE  ID_Pesanan = $ID_Pesanan";
    mysqli_query($conn, $ubahproduk);
    return mysqli_affected_rows($conn);
}
function ubahPenerima($penerima) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Pesanan = htmlspecialchars($penerima["ID_Pesanan"]);
    $Nama_Penerima = htmlspecialchars($penerima["Nama_Penerima"]);
    $NoTelp_Penerima = htmlspecialchars($penerima["NoTelp_Penerima"]);
    $Alamat = htmlspecialchars($penerima["Alamat"]);
    $link_Lokasi = htmlspecialchars($penerima["link_Lokasi"]);
    //query ubah data
    $ubahproduk = "UPDATE pesanan SET
                    Nama_Penerima = '$Nama_Penerima',
                    NoTelp_Penerima = '$NoTelp_Penerima', 
                    Alamat = '$Alamat',
                    link_Lokasi = '$link_Lokasi'
                    WHERE  ID_Pesanan = $ID_Pesanan";
    mysqli_query($conn, $ubahproduk);
    return mysqli_affected_rows($conn);
}

//PEMBAYARAN
function ubahPembayaran($pembayaran) {
    global $conn;
    //ambil data dari tiap elemen form
    $ID_Pembayaran = htmlspecialchars($pembayaran["ID_Pembayaran"]);
    $ID_Pesanan = htmlspecialchars($pembayaran["ID_Pesanan"]);
    $Nama_Rekening = htmlspecialchars($pembayaran["Nama_Rekening"]);
    $Nominal = htmlspecialchars($pembayaran["Nominal"]);
    $Tgl_bayar = htmlspecialchars($pembayaran["Tgl_bayar"]);
    $ID_Rekening = htmlspecialchars($pembayaran["ID_Rekening"]);
    $status_Pembayaran = htmlspecialchars($pembayaran["status_Pembayaran"]);
    $Status = htmlspecialchars($pembayaran["Status"]);
    //query ubah data
    $ubah1 = "UPDATE pembayaran, pesanan SET
                    pembayaran.Nama_Rekening = '$Nama_Rekening',
                    pembayaran.Nominal = $Nominal, 
                    pembayaran.Tgl_bayar = '$Tgl_bayar',
                    pembayaran.ID_Rekening = '$ID_Rekening',
                    pembayaran.status_Pembayaran = '$status_Pembayaran',
                    pesanan.Status = 'Diproses'
                    WHERE pembayaran.ID_Pembayaran = $ID_Pembayaran AND pesanan.ID_Pesanan=$ID_Pesanan";
    $ubah2 = "UPDATE pembayaran, pesanan SET
                    pembayaran.Nama_Rekening = '$Nama_Rekening',
                    pembayaran.Nominal = $Nominal, 
                    pembayaran.Tgl_bayar = '$Tgl_bayar',
                    pembayaran.ID_Rekening = '$ID_Rekening',
                    pembayaran.status_Pembayaran = '$status_Pembayaran',
                    pesanan.Status = 'Pesanan Selesai'
                    WHERE pembayaran.ID_Pembayaran = $ID_Pembayaran AND pesanan.ID_Pesanan=$ID_Pesanan";
    if ($Status=="Pesanan Selesai") {
        mysqli_query($conn, $ubah2);
    } else {
        mysqli_query($conn, $ubah1);
    }
    
    return mysqli_affected_rows($conn);
}
?>