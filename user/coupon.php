<?php
session_start();
include 'database.php';


if (isset($_POST["coupon"])){
    
    $kode = $_POST["kode"];
    // $ambil = mysqli_query($koneksi, "SELECT * FROM tb_coupon WHERE code = '$kode' ");

    // $ambil = mysqli_query($koneksi, "SELECT * FROM tb_coupon WHERE code = '$kode'");
    // $pecah = mysqli_fetch_assoc($ambil);
    // $kod = $pecah["code"];

    $result = mysqli_query($koneksi, "SELECT * FROM tb_coupon WHERE code = '$kode'");
    if ($pecah = mysqli_fetch_assoc($result)) {
        echo "<script>alert('berhasil menambahkan coupon');</script>";
        echo "<script>location='keranjang.php';</script>";

        $_SESSION['coupon'] = $pecah;
    }
    else{
        echo "<script>alert('code coupon gagal');</script>";
        echo "<script>location='keranjang.php';</script>";
    }
}

