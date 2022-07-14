<?php
include 'header_admin.php';
require 'databaseadmin.php';

$idpembelian = $_GET['id'];

?>

<?php include 'header_admin.php' ?>

<p style="margin-top: 55px;"></p>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Detail Pembayaran</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="admin.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Pembayaran</p>
        </div>
    </div>
</div>
<?php
$ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE id_pembelian='$idpembelian'");

$pecah = mysqli_fetch_assoc($ambil);
?>

<!-- <pre><?php //print_r($pecah); 
            ?></pre> -->

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
                    <th>Jumlah</th>
                    <td>Rp <?php echo $pecah['jumlah'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo $pecah['tanggal'] ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Bukti Pembayaran</h4>
            <img src="../bukti_pembayaran/<?php echo $pecah['bukti'] ?>" class="img-responsive" width="200px" alt="">
        </div>
    </div>
</div>

<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label>No Resi Pembayaran</label>
            <input type="text" required class="form-control" name="resi">
        </div>
        <br>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="">- Pilih Status -</option>
                <option value="Barang dikemas">Barang dikemas</option>
                <option value="Barang dikirim">Barang dikirim</option>
                <option value="Barang diterima">Barang diterima</option>
                <option value="Batal melakukan pengiriman">batal melakukan pengiriman</option>
            </select>
        </div>
        <br>
        <button class="btn btn-primary" name="proses">Proses</button>
    </form>
</div>
<br>

<!-- jika tombol proses ditekan melakukan update -->
<?php
if (isset($_POST["proses"])) {
    $resi = $_POST['resi'];
    $status = $_POST['status'];
    mysqli_query($koneksi, "UPDATE tb_pembelian SET resi_pengiriman='$resi', status_pembelian= '$status' WHERE id_pembelian='$idpembelian'");

    echo "<script>alert('data pembelian terupdate')</script>";
    echo "<script>location='data_pembelian.php'</script>";
}


?>