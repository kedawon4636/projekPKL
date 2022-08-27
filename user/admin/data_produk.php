<?php
include 'header_admin.php';
require 'databaseadmin.php';
session_start();
require '../database.php';
if (!isset($_SESSION["admin"])) {
    header("location:../login.php");
    exit;
}

?>


<!-- awal konten -->
<div class="container">
<a href="tambah_produk.php" class="btn btn-info" style="margin-top:65px;"><i class="fa-solid fa-square-plus"></i> Tambah Produk</a>
</div>
<table class="table table-bordered table-sm table-responsive" style="margin-top:5px;">
    <thead>
        <tr>
            <th rowspan="2" style="text-align:center;">No</th>
            <th rowspan="2" >Nama</th>
            <th rowspan="2" >Harga</th>
            <th colspan="4" style="text-align:center;">Stok Produk</th>
            <th rowspan="2">Foto Depan</th>
            <th rowspan="2">Foto Belakang</th>
            <th rowspan="2">Aksi</th>
        </tr>
        <th style="text-align:center;">M</th>
        <th style="text-align:center;">L</th>
        <th style="text-align:center;">XXL</th>
        <th style="text-align:center;">Total</th>
    </thead>
    <tbody>
        <?php $nomer = 1; ?>
        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk"); ?>
        <?php
        while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
            <tr>
                <td style="text-align:center;"><?php echo $nomer; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td><?php echo number_format($pecah['harga_produk']); ?></td>
                <td style="text-align:center;"><?php echo number_format($pecah['size_M']); ?></td>
                <td style="text-align:center;"><?php echo number_format($pecah['size_L']); ?></td>
                <td style="text-align:center;"><?php echo number_format($pecah['size_XXL']); ?></td>
                <td style="text-align:center;"><?php echo number_format($pecah['stok_produk']); ?></td>
                <td>
                    <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
                </td>
                <td>
                    <img src="../foto_belakang/<?php echo $pecah['foto_belakang']; ?>" width="100">
                </td>
                <td>
                    <a href="hapus_produk.php?id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn" onclick="return confirm('yakin ingin menghapus data?');"><i class="fa-solid fa-trash-can"></i> Hapus</a>
                    <a href="edit_produk.php?id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i> Edit</a>
                </td>
            </tr>
            <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>
<!-- akhir konten -->