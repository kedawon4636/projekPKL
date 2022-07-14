<?php
session_start();
require 'database.php';

$jumlah = $_POST["jumlah"];
$id_produk =  $_SESSION['produk'];

$produk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
$pecah = mysqli_fetch_assoc($produk);
$stoklawas = $pecah['stok_produk'];

$stoksekarang = $stoklawas - $jumlah;
mysqli_query($koneksi, "UPDATE tb_produk SET stok_produk =  $stoksekarang WHERE id_produk = '$id_produk'");


if (isset($_POST["keranjang"])) {

    // percobaan gagal
    // $id_user = $_SESSION['submit'];
    // $tb_user = mysqli_query($koneksi, "SELECT FROM tb_user WHERE id = $id_user ");
    // $ambil = mysqli_fetch_assoc($tb_user);
    // $idpembeli = $ambil['id'];


    $jumlah = $_POST["jumlah"];

    mysqli_query($koneksi, "INSERT INTO tb_pembelian_produk VALUES ('', '$pembeli', '$id_produk', '$jumlah')");

    $_SESSION["pembelian"] =  $_SESSION['produk'];

    header("location:cekout.php");
}
