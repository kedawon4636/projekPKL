<?php
require 'databaseadmin.php';
include 'header_admin.php';
session_start();
require '../database.php';
if (!isset($_SESSION["admin"])) {
    header("location:../login.php");
    exit;
}

?>
<p style="margin-top: 55px;"></p>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Data Pembelian</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="admin.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Data Pembelian</p>
        </div>
    </div>
</div>
<!-- awal konten -->
<div class="container">
    <table class="table table-bordered " style="margin-top:20px; ">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Pembelian</th>
                <th>status Pembelian</th>
                <th>Total Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomer = 1; ?>
            <?php $ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembelian"); ?>
            <?php
            foreach ($ambil as $pecah) : ?>
                <tr>
                    <td style="text-align:center;"><?php echo $nomer; ?></td>
                    <td><?php echo $pecah['nama']; ?></td>
                    <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                    <td><?php echo $pecah['status_pembelian']; ?></td>
                    <td><?php echo $pecah['jumlah_pembelian']; ?></td>
                    <td>
                        <a href="detail.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info">Detail</a>
                        <?php if ($pecah['status_pembelian'] !== "pending") { ?>
                            <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Pembayaran</a>
                        <?php } ?>

                    </td>
                </tr>
                <?php $nomer++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- akhir konten -->