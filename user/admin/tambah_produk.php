<?php
require 'databaseadmin.php';
include 'header_admin.php';
session_start();
require '../database.php';
if (!isset($_SESSION["admin"])) {
    header("location:../login.php");
    exit;
}
// Ketika tombol save ditekan
if (isset($_POST['save'])) {
    $nama       = htmlspecialchars($_POST['nama']);
    $harga      = htmlspecialchars($_POST['harga']);
    $berat      = htmlspecialchars($_POST['berat']);
    $stok      = htmlspecialchars($_POST['stok']);
    $foto       = $_FILES['foto'];
    $deskripsi  = htmlspecialchars($_POST['deskripsi']);
    $filename = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    $type1 = explode('.', $filename);
    $type2 = $type1[1];
    move_uploaded_file($tmp_name, '../foto_produk/' . $filename);
    if ($nama && $harga && $berat && $foto && $deskripsi) {
        // tambah produk
        $sql1 = "INSERT INTO tb_produk (nama_produk,harga_produk,berat_produk,stok_produk,foto_produk,deskripsi_produk) VALUES ('$nama', '$harga', '$berat', '$stok', '$filename', '$deskripsi')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            echo "<script>
                alert('berhasil di tambahkan');
                document.location.href = 'data_produk.php';
                </script>";
        } else {
            echo "<script>
                alert('gagal di tambahkan');
            </script>";
        }
    }
}
?>

<!-- konten -->
<form action="" method="post" enctype="multipart/form-data" style="margin-top:60px;">
    <div class="container">
        <h4>Tambah Produk</h4>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" required name="nama">
        </div>
        <div class="form-group">
            <label for="">Harga (Rp)</label>
            <input type="number" class="form-control" name="harga">
        </div>
        <div class="form-group">
            <label for="">Berat (Gr)</label>
            <input type="number" class="form-control" required name="berat">
        </div>
        <div class="form-group">
            <label for="">Stok Produk</label>
            <input type="number" class="form-control" name="stok">
        </div>
        <div class="form-group">
            <label for="">Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <input class="form-control" name="deskripsi" required rows="10">
        </div>
        <br>
        <button class="btn btn-primary" name="save">Simpan</button>
    </div>
</form>

<!-- akhir konten -->