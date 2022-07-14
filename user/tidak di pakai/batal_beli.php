<?php
session_start();
require 'database.php';


if (isset($_POST["batal"])) {
    $username = $_SESSION['user'];
    $idproduk = $_SESSION['produk'];
    $sql1 = mysqli_query($koneksi, "SELECT tb_produk WHERE id_produk = $idproduk");
    $sql2 = mysqli_fetch_assoc($sql1);
    $stok_lawas = $sql2['stok_produk'];

    // ambil 
    $stok_saat_ini = $stok_lawas + $bagi['jumlah'];
    mysqli_query($koneksi, "UPDATE tb_produk SET stok_produk = $stok_saat_ini WHERE id_produk = $idproduk");
}

header("location:beli.php");
