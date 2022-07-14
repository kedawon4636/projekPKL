<?php
include 'header.php';
require 'database.php';

$idpembeli = $_GET['id'];
// tbpembayaran join tbpembelian
$ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran 
LEFT JOIN tb_pembelian ON tb_pembayaran.id_pembelian=tb_pembelian.id_pembelian WHERE 
tb_pembelian.id_pembelian='$idpembeli'");
$pecah = mysqli_fetch_assoc($ambil);

// jika belum ada data pembayaran
if (empty($pecah)) {
    echo "<script>alert('belum ada data pembayaran')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}

// jika data pelanggan yang bayar tidak sesuai dengan yg login
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if ($_SESSION['user']['id'] !== $pecah['id_pembeli']) {
    echo "<script>alert('anda tidak boleh melihat' pembayaran orang lain)</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}
?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Riwayat Pembayaran</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="admin.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Riwayat pembayaran</p>
        </div>
    </div>
</div>
<pre><?php print_r($pecah) ?></pre>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?php echo $pecah['nama'] ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $pecah['bank'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo $pecah['tanggal'] ?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp <?php echo number_format($pecah['jumlah_pembelian']) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <img src="bukti_pembayaran/<?php echo $pecah["bukti"] ?>" class="img-responsi" width="200px" alt="">
        </div>
    </div>
</div>
<?php include 'footer_sosmed.php' ?>
<?php include 'footer.php' ?>