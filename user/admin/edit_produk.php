<p style="margin-top:65px;"></p>
<?php

include 'header_admin.php';

require 'databaseadmin.php';

session_start();

require '../database.php';
if (!isset($_SESSION["admin"])) {
    header("location:../login.php");
    exit;
}
// mendapat id dari url
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = $id");
$pecah = mysqli_fetch_assoc($ambil);
// edit produk
if (isset($_POST['edit'])) {
    $nama   = $_POST['nama'];
    $harga  = $_POST['harga'];
    $berat  = $_POST['berat'];
    $stok  = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    // jika foto dirubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");
        // update produk
        mysqli_query($koneksi, "UPDATE tb_produk SET nama_produk='$nama', harga_produk='$harga', berat_produk='$berat', stok_produk='$stok', foto_produk='$namafoto', deskripsi_produk='$deskripsi'
        WHERE id_produk='$id'");
    } else {
        mysqli_query($koneksi, "UPDATE tb_produk SET nama_produk='$nama', harga_produk='$harga', berat_produk='$berat', stok_produk='$stok', deskripsi_produk='$deskripsi' WHERE id_produk='$id'");
    }
    echo "<script>
            alert('data produk berhasil di ubah');
        </script>";
    echo "<script>location='data_produk.php';</script>";
}

?>

<p style="text-align:center; font-size:25px;"><strong>EDIT DATA</strong></p>

<!-- awal konten -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="form-group">
            <label for="">Nama Produk</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
        </div>
        <div class="form-group">
            <label for="">Harga Rp </label>
            <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
        </div>
        <div class="form-group">
            <label for="">Berat (Gr)</label>
            <input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>">
        </div>
        <div class="form-group">
            <label for="">Stok Produk</label>
            <input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok_produk']; ?>">
        </div>
        <div class="form-group" style="margin-top:5px;">
            <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
        </div>
        <div class="form-group">
            <label for="">Ganti Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Deskripsi Produk</label>
            <textarea name="deskripsi" class="form-control" rows="10">
                    <?php echo $pecah['deskripsi_produk']; ?>
                </textarea>
        </div>
        <button style="margin-top:5px;" class="btn btn-primary" name="edit">Edit</button>
    </div>
</form>
<!-- akhir konten -->