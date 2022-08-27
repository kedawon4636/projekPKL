<?php
require 'database.php';
include 'header.php';

// jika tidak ada session pelanggan
if (!isset($_SESSION['user']) or empty($_SESSION['user'])) {
    echo "<script>alert('silahkan login')</script>";
    echo "<script>location='login.php'</script>";
    exit();
}
// belum bisa ketika login langsung dilarikan ke sini
// if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
//     echo "<script>alert('Riwayat belanja kosong, silahkan lakukan pembelian')</script>";
//     echo "<script>location='index.php'</script>";
// }
// jika tdk ada session keranjang larikan ke index.php
// belum jalan

?>
<!-- <pre><?php //print_r($_SESSION) 
            ?></pre> -->

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Riwayat Belanja</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Riwayat Belanja</p>
        </div>
    </div>
</div>
<section class="riwayat">
    <div class="container">
        <h3>Riwayat Belanja</h3>
        <h4><?php echo $_SESSION['user']['username'] ?></h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // mendapatkan id user/pelanggan yg login dari session
                $id_pelanggan = $_SESSION['user']['id'];

                $ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembelian WHERE id_pembeli='$id_pelanggan'");
                while ($pecah = mysqli_fetch_assoc($ambil)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $pecah["tanggal_pembelian"] ?></td>
                        <td>
                            <?php echo $pecah["status_pembelian"] ?>
                            <br>
                            <?php if (!empty($pecah['resi_pengiriman'])) { ?>
                                Resi Pengiriman: <?php echo $pecah['resi_pengiriman'] ?>
                            <?php } ?>
                        </td>
                        <td>Rp <?php echo number_format($pecah["jumlah_pembelian"]) ?></td>
                        <td>
                            <a href="nota.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info "></i>Nota</a>
                            <?php if ($pecah['status_pembelian'] == "pending") { ?>
                                <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                            <?php } else { ?>
                                <a href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-warning">Lihat pembayaran</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<?php include 'footer_sosmed.php' ?>
<?php include 'footer.php' ?>