<?php
include 'header.php';
require 'database.php';

if (!isset($_SESSION['user']) or empty($_SESSION['user'])) {
    echo "<script>alert('silahkan login')</script>";
    echo "<script>location='login.php'</script>";
    exit();
}

// mendapatkan id pembeli/user/pelanggan dari url
$idpem = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembelian WHERE id_pembelian='$idpem'");
$detpem = mysqli_fetch_assoc($ambil);

// mendapatkan id pelanggan/pembeli/user dari tb pembelian
$id_pelanggan_beli = $detpem['id_pembeli'];
// mendapatkan id pelanggan/pembeli/user dari session
$id_pelanggan_login = $_SESSION['user']['id'];

if ($id_pelanggan_login !== $id_pelanggan_beli) {
    echo "<script>alert('anda tidak boleh melihat pembayaran orang lain')</script>";
    echo "<script>location='riwayat.php'</script>";
}

// cek session user dan cek id pembelian di tb pembelian
// echo "<pre>";
// print_r($detpem);
// print_r($_SESSION);
// echo "</pre>";
?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Pembayaran</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Pembayaran</p>
        </div>
    </div>
</div>
<div class="container">
    <h2>Konfirmasi Pembayaran</h2>
    <p>Kirim bukti pembayaran</p>
    <div class="alert alert-info">Total Tagihan Anda <strong>Rp <?php echo number_format($detpem['jumlah_pembelian']) ?></strong> </div>

    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label>Nama Penyetor</label>
            <input type="text" name="nama" required placeholder="Masukan nama lengkap" class="form-control">
        </div>
        <div class="form-group">
            <label>Bank</label>
            <input type="text" name="bank" placeholder="Mandiri/BRI/dan lain-lain" required class="form-control">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" placeholder="jangan gunakan tanda pemisah seperti tanda .(titik) atau pun ,(koma)" required min="1" class="form-control">
        </div>
        <div class="form-group">
            <label>Foto Bukti</label>
            <input type="file" name="bukti" class="form-control">
            <p class="text-danger">- foto bukti harus jelas dan formatnya JPG maksimal 2mb
                <br>- jika yang dikirimkan foto bukti palsu, anda bisa terkena sanksi dan dilaporkan ke pihak berwajib
            </p>
        </div>
        <button class="btn btn-primary" name="kirim">Kirim</button>
    </form>
</div>

<?php
// jika tombol kirim ditekan
if (isset($_POST["kirim"])) {
    // upload dulu foto bukti
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafiks = date("ymdHis") . $namabukti;
    move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("y-m-d");

    // simpan pembayaran
    mysqli_query($koneksi, "INSERT INTO tb_pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

    // update data pembelian dari pending menjadi sudah kirim pembayaran
    mysqli_query($koneksi, "UPDATE tb_pembelian SET status_pembelian='Sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

    echo "<script>alert('trimakasih sudah mengirimkan pembayaran')</script>";
    echo "<script>location='riwayat.php'</script>";
}
?>
<?php include 'footer_sosmed.php'; ?>
<?php include 'footer.php'; ?>