<?php
include 'header_admin.php';

require 'databaseadmin.php';
session_start();
require '../database.php';
if (!isset($_SESSION["admin"])) {
    header("location:../login.php");
    exit;
}

// $ambil = mysqli_query($koneksi, "SELECT tb_pembelian_produk.id_pembelian_produk,tb_pembelian_produk.jumlah, tb_produk.nama_produk, tb_produk.harga_produk, tb_pembelian.tanggal_pembelian, tb_pembelian.total_pembelian, tb_user.username FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk = tb_produk.id_produk JOIN tb_pembelian ON tb_pembelian_produk.id_pembelian = tb_pembelian.id_pembelian JOIN tb_user ON tb_pembelian.id_user = tb_user.id ORDER BY tb_pembelian_produk.id_pembelian_produk");
$ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembelian JOIN tb_user ON tb_pembelian.id_pembeli=tb_user.id WHERE tb_pembelian.id_pembelian='$_GET[id]'");

$pecah = mysqli_fetch_assoc($ambil);



?>
<p style="margin-top: 55px;"></p>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Detail Pembelian Produk</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="admin.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Detail Pembelian</p>
        </div>
    </div>
</div>
<!-- melihat tb pembayaran -->
<!-- <pre><?php //print_r($pecah) 
            ?></pre> -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Pembelian</h3>
            <p>
                Tanggal : <?php echo $pecah['tanggal_pembelian'] ?> <br>
                Total : Rp <?php echo number_format($pecah['jumlah_pembelian']) ?> <br>
                Status Pembelian : <?php echo $pecah['status_pembelian'] ?>
            </p>
        </div>
        <div class="col-md-4">
            <h3>Pelanggan</h3>
            <strong><?php echo $pecah['username'] ?></strong>
        </div>
        <div class="col-md-4">
            <h3>Pengiriman</h3>
            <p>
                <?php echo $pecah['nama'] ?> <br>
                <?php echo $pecah['nomer'] ?><br>
                <?php echo $pecah['provinsi'] ?><br>
                <?php echo $pecah['jalan'] ?>
            </p>
        </div>
    </div>
</div>
<!-- awal konten -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2" style="text-align:center;">No</th>
            <th rowspan="2">Id Pembeli</th>
            <th colspan="4" class="text-center">Detail Pembelian Produk</th>

        </tr>

        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th>Jumlah Pembelian</th>
        <th rowspan="2">Subtotal</th>

    </thead>
    <tbody>
        <!-- mengambil data2 dari tb_pembelian produk dan tb produk untuk riwayat  pembelian produk -->
        <?php $no = 1; ?>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk=tb_produk.id_produk WHERE tb_pembelian_produk.id_pembeli='$_GET[id]'");
        ?>
        <?php while ($sql1 = mysqli_fetch_assoc($sql)) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $sql1['id_pembeli'] ?></td>

                <td><?php echo $sql1['nama_produk'] ?></td>
                <td>Rp <?php echo number_format($sql1['harga_produk']) ?></td>
                <td><?php echo $sql1['jumlah'] ?></td>

                <td>Rp <?php echo number_format($sql1['subharga']) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<br>

<!-- akhir konten -->