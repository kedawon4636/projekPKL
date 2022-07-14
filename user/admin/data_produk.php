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
<a href="tambah_produk.php" class=" btn btn-info" style="margin-top:60px;">Tambah Data</a>
<br>
<table class="table table-bordered table-sm table-responsive" style="margin-top:5px;">
    <thead>
        <tr>
            <th style="text-align:center;">No</th>
            <th>Nama</th>
            <th>harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
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
                <td>
                    <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
                </td>
                <td>
                    <a href="hapus_produk.php?id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn" onclick="return confirm('yakin ingin menghapus data?');">Hapus</a>
                    <a href="edit_produk.php?id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>
<!-- akhir konten -->