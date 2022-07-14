<?php
include 'header.php';
session_start();
require 'database.php';



$session_pembeli = $_SESSION['user'];
$riwayat = mysqli_query($koneksi, "SELECT * FROM tb_pembelian1 WHERE id_pembeli = '$session_pembeli'");
$pecah = mysqli_fetch_assoc($riwayat);
$id_produk = $pecah['id_produk'];
if (!$id_produk) {

    header("location:transaksi_kosong.php");
}

?>
<div class="container">
    <h1 style="text-align:center;"><strong>Riwayat Transaksi</strong></h1>
</div>

<div class="container">
    <div class="row">
        <!-- foto produk diambil dari tbl produk dimana id produk = id user -->
        <?php
        $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk' ");
        $produk = mysqli_fetch_assoc($ambil);
        ?>
        <table class="table tabke-bordered">
            <thead>
                <tr>
                    <th>Foto produk</th>
                    <th><img src="foto_produk/<?php echo $produk['foto_produk']; ?>" width="100px" alt=""></th>
                </tr>
                <tr>
                    <th>Nama Produk</th>
                    <th><?php echo $produk['nama_produk']; ?></th>
                </tr>

                <tr>
                    <th>Harga/pcs</th>
                    <th><?php echo $produk['harga_produk']; ?></th>
                </tr>
                <!-- ambil qty/jumlah pembelian per pcs -->
                <?php foreach ($ambil as $qty) : ?>
                    <tr>
                        <th>QTY</th>
                        <th><?php echo $qty['jumlah']; ?></th>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th>Total Belanja + Ongkir</th>
                    <th><?php echo $pecah['jumlah_pembelian']; ?></th>
                </tr>
            </thead>
        </table>

        <h1 style="text-align:center;"><strong>Detail Pengiriman</strong></h1>

        <table class="table tabke-bordered">
            <tbody>

                <td>Nama</td>
                <td><?php echo $pecah['nama']; ?></td>
                </tr>
                <tr>
                    <td>Nomer</td>
                    <td><?php echo $pecah['nomer']; ?></td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td><?php echo $pecah['provinsi']; ?></td>
                </tr>
                <tr>
                    <td>Jalan</td>
                    <td><?php echo $pecah['jalan']; ?></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<?php include 'footer.php'; ?>