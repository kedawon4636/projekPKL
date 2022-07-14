<?php
include 'header.php';
require 'database.php';

$sql = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk=tb_produk.id_produk WHERE tb_pembelian_produk.id_pembeli='$_GET[id]'");
?>


<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Detail Pembelian</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Detail Pembelian</p>
        </div>
    </div>
</div>

<div class="container bg-secondary">
    <div class="row">
        <table class="table table-bordered">
            <?php
            $ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembelian JOIN tb_user ON tb_pembelian.id_pembeli=tb_user.id WHERE tb_pembelian.id_pembelian='$_GET[id]'");
            $pecah = mysqli_fetch_assoc($ambil); ?>

            <!-- jika pelanggan yg beli tidak sama dengan pelanggan yang login, maka dilarikan ke riwayat.php, karena dia tidak berhak melihat nota orang lain -->
            <!-- pelanggan yg beli harus pelanggan yang login -->
            <!-- id pembeli di tabel tb_pembelian adalah id user/pelanggan -->
            <?php
            // mendapatkan id user/pelanggan/pembeli yg beli dari tb_pembelian produk
            $idpelangganyangbeli = $pecah['id_pembeli'];

            // mendapatkan id user/pembeli/pelanggan yang login dari session
            $idpelangganyanglogin = $_SESSION['user']['id'];
            if ($idpelangganyangbeli !== $idpelangganyanglogin) {
                echo "<script>alert('anda tidak boleh melihat data orang lain!')</script>";
                echo "<script>location='riwayat.php'</script>";
                exit();
            }
            ?>
            <div class="col-md-6">
                <h3>Pembelian</h3>
                <strong>No. Pembelian <?php echo $pecah['id_pembelian'] ?></strong> <br>
                Tanggal : <?php echo $pecah['tanggal_pembelian'] ?><br>
                Total : Rp <?php echo $pecah['jumlah_pembelian'] ?>
            </div>
            <div class="col-md-6">
                <h3>Nama User / Pelanggan</h3>
                <strong><?php echo $pecah['username'] ?></strong><br>
                Alamat : <?php echo $pecah['provinsi'] ?><br>
                Jalan : <?php echo $pecah['jalan'] ?>
            </div>
        </table>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Alamat Pengiriman</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Nama</label>
                        <input class="form-control" value="<?php echo $pecah['nama'] ?>" type="text" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Alamat</label>
                        <input class="form-control" value="<?php echo $pecah['provinsi'] ?>" type="text" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Nomer Telefon</label>
                        <input class="form-control" type="text" value="<?php echo $pecah['nomer'] ?>" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Jalan</label>
                        <input class="form-control" type="text" value="<?php echo $pecah['jalan'] ?>" readonly>
                    </div>
                </div>
                <hr>
                <div class="col-md-6">
                    <div style="float: left;">
                        <div class="alert alert-info">
                            <p>
                                Silahkan melakukan pembayaran Rp <?php echo number_format($pecah['jumlah_pembelian']) ?> ke <br>
                                <strong>BANK MANDIRI 159-002383-1483 AN. Khamid Efendi</strong>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="float: right;">
                    <div style="float: left;">
                        <div class="alert alert-danger">
                            <p>
                                Jika sudah melakukan pembayaran, silahkan lanjut ke <strong> Menu Riwayat Belanja</strong>
                                untuk mengirimkan bukti/struk transaksi pembayaran

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    <?php $no = 1; ?>
                    <?php while ($sqli = mysqli_fetch_assoc($sql)) { ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $sqli['nama_produk'] ?></p>
                            <p>Rp <?php echo number_format($sqli['harga_produk']) ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>QTY</p>
                            <p><?php echo $sqli['jumlah'] ?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Rp <?php echo number_format($sqli['harga_produk'] * $sqli['jumlah']) ?></h6>
                        </div>
                        <hr class="mt-0">
                    <?php } ?>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Ongkir</h6>
                        <h6 class="font-weight-medium">Rp 30,000</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">Rp <?php echo number_format($pecah['jumlah_pembelian']) ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->

<?php include 'footer_sosmed.php' ?>
<?php include 'footer.php' ?>