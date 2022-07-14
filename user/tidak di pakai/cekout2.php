<?php
include 'header.php';
session_start();
require 'database.php';

?>


<!-- form -->
<div style="margin-top:60px;" class="container">
    <pre><?php print_r($_SESSION['user']); ?></pre>

    <p><strong>Barang yang dibeli</strong></p>
    <?php
    // session pembeli
    $sess = $_SESSION['user'];

    // variabel 0 sebagai pengisi saja
    $totalpembayaran = 0;
    $data = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$sess'");
    foreach ($data as $b) : ?>

        <div>
            <div>
                <img src="foto_produk/<?php echo $b['foto_produk']; ?>" class="me-3" style="width:70px; float:left;">

                <?php echo $b['nama_produk'] ?>
                <br>
                Rp. <?php echo number_format($b['harga_produk']) ?>
                <br>
                <?php echo number_format($b['berat_produk']) ?> Gram
                <br>
                <?php
                $ses_pembeli =  $_SESSION['user'];
                $q1 = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_produk WHERE id_pembeli = '$ses_pembeli'");
                $bagi = mysqli_fetch_array($q1);
                ?>
                Barang yang dibeli :
                <!-- QTY -->
                <?php echo number_format($bagi['jumlah']); ?>
                Buah
            </div>
        </div>
    <?php endforeach; ?>
    <br>
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label"><strong>Kontak </strong></label>
            <input type="text" required name="nama" class="form-control" autocomplete="off" placeholder="Nama Lengkap">
            <br>
            <input type="number" required name="nomer" class="form-control" autocomplete="off" placeholder="Nomer Telepon">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><strong>Alamat Lengkap</strong></label>
            <input type="text" class="form-control" required name="provinsi" autocomplete="off" placeholder="Provinsi, Kota, Kecamatan, Kode Pos">
            <br>
            <input type="text" required name="jalan" class="form-control" autocomplete="off" placeholder="Nama Jalan, Gedung, No. Rumah">
        </div>

        <tbody>
            <td colspan="2">
                <p><strong>Pilih Ongkos Kirim</strong></p>
            </td>
        </tbody>
        <tbody>
            <td colspan="2">
                <p>
                    <select class="form-control" name="id_ongkir">
                        <option value="">- Pilih Ongkos Kirim -</option>
                        <?php
                        $ongkir = mysqli_query($koneksi, "SELECT * FROM tb_ongkir");
                        foreach ($ongkir as $c) : ?>
                            <option value="<?php echo $c['id_ongkir'] ?>">
                                <?php echo $c['nama_kota'] ?> -
                                Rp <?php echo number_format($c['tarif']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </p>
            </td>
        </tbody>
        <tbody>
            <td colspan="2">
                <p><strong>Pilih Pembayaran</strong></p>
            </td>
        </tbody>
        <tbody>
            <td colspan="2">
                <p>
                    <select class="form-control">
                        <option value="">- Pilih Metode Pembayaran -</option>
                        <option value="Bank BCA">Bank BCA</option>
                        <option value="Bank BRI">Bank BRI</option>
                        <option value="Bank Mandiri">Bank Mandiri</option>
                    </select>
                </p>
            </td>
        </tbody>

        <!-- total bayar -->
        <div class="card-body">
            <table class="table">
                <tr class="row">
                    <td class="col col-lg-3">
                        <p style="margin-bottom:-2px;"><strong>Harga Produk</strong></p>
                    </td>
                    <td class="col col-lg-3">Rp <?php echo number_format($b['harga_produk']) ?></td>
                </tr>
                <tr class="row">
                    <td class="col col-lg-3">
                        <p style="margin-bottom:-2px;"><strong>Total Pembelian Produk</strong></p>
                    </td>
                    <td class="col col-lg-3"><?php echo number_format($bagi['jumlah']) ?> Buah</td>
                <tr class="row">
                    <td class="col col-lg-3 fs-5 fw-bold">
                        <p style="margin-bottom:-2px;"><strong>Total Pembayaran</strong></p>
                    </td>
                    <td class="col col-lg-3 fs-5 fw-bold">Rp
                        <?php
                        $harga_produk = $b['harga_produk'];
                        $jumlah_pem = $bagi['jumlah'];
                        echo number_format($harga_produk * $jumlah_pem); ?></td>
                </tr>
            </table>
        </div>

        <!-- total bayar -->
        <div style="text-align:center;">
            <button name="bayar" class="btn btn-primary">Bayar</button>
        </div>
    </form>
    <form action="batal_beli.php">
        <button name="batal" type="submit" class="btn btn-secondary"> Beli
            Sekarang</button>
    </form>
</div>
<br>
<!-- jika tombol batal pembayaran di tekan -->


<!-- jika tombol bayar di tekan -->
<?php if (isset($_POST["bayar"])) {
    $username = $_SESSION['user'];


    $id_ongkir  = $_POST['id_ongkir'];
    $nama       = htmlspecialchars($_POST['nama']);
    $telepon    = $_POST['nomer'];
    $provinsi   = htmlspecialchars($_POST['provinsi']);
    $jalan      = htmlspecialchars($_POST['jalan']);
    $tanggal_pembelian = date("y-m-d");
    $id_produk = $b['id_produk'];

    $ambil = mysqli_query($koneksi, "SELECT * FROM tb_ongkir WHERE id_ongkir = '$id_ongkir' ");
    $arrayongkir = mysqli_fetch_assoc($ambil);
    $tarif = $arrayongkir['tarif'];
    $jumlah_pembelian =  $harga_produk + $tarif;

    //  menyimpan ke tabel pembelian produk
    $result = mysqli_query($koneksi, "INSERT INTO tb_pembelian1 VALUES('','$username', '$id_produk', '$id_ongkir', '$nama', '$telepon', '$provinsi', '$jalan', '$tanggal_pembelian', '$jumlah_pembelian') ");
    if ($result) {
        // set session cuma yg beli yg bisa lihat daftar  transaksi

        echo "<script>
            alert('barang berhasil dibeli');
            document.location.href = 'transaksi.php';
            </script>";
    } else {
        echo "<script>
            alert('data gagal');
        </script>";
    }
} ?>
<!-- akhir form -->



<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</body>

</html>