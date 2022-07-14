<?php
include 'header.php';
require 'database.php';

if (empty($_SESSION['keranjang'])) {
    echo "<script>alert('keranjang kosong, silahkan lakukan pembelian')</script>";
    echo "<script>location='index.php'</script>";
}

//  
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

?>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Check Out</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Check Out</p>
        </div>
    </div>
</div>
<div class="container text-uppercase">Informasi Tentang akun</div>
<br>
<!-- Page Header End -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <p class="form-control">Nama User / Pelanggan</p>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION['user']['username'] ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>QTY</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php $no = 1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php $totalQTY = 0; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                        <!-- menampilkan produk yang sedang diperulangkan berdasarkan id produk -->
                        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
                        $pecah = mysqli_fetch_assoc($ambil);
                        $subharga = $jumlah * $pecah["harga_produk"];

                        // cek id produk
                        // echo "<pre>";
                        // print_r($pecah);
                        // echo "</pre>";
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td class="align-middle">
                                <img class="m-1" src="foto_produk/<?php echo $pecah['foto_produk']; ?>" alt="" style="width:50px;">

                                <?php echo $pecah["nama_produk"] ?>
                            </td>
                            <td class="align-middle">Rp <?php echo number_format($pecah["harga_produk"]) ?></td>
                            <td class="align-middle">
                                <?php echo $jumlah ?>

                            </td>
                            <td class="align-middle">Rp <?php echo number_format($subharga) ?></td>
                        </tr>
                        <?php $totalQTY += $jumlah ?>
                        <?php $totalbelanja += $subharga; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <!-- memberi cek kupon diskon -->
            <!-- <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form> -->
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Total Belanja</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Jumlah QTY</h6>
                        <h6 class="font-weight-medium"><?php echo number_format($totalQTY) ?></h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">Rp <?php echo number_format($totalbelanja) ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Ongkos Kirim</h6>
                        <?php $ongkir = 30000; ?>
                        <h6 class="font-weight-medium">Rp <?php echo number_format($ongkir); ?></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?php echo number_format($totalbelanja + $ongkir) ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

<!-- inputan alamat pengirim -->
<div class="container card bg-secondary">
    <form action="" method="post">
        <div>

            <h3>Alamat Pengiriman</h3>
            <input type="text" required name="nama" class="form-control" autocomplete="off" placeholder="Nama Penerima">
            <br>
            <input type="number" required name="nomer" class="form-control" autocomplete="off" placeholder="Nomer Telepon">
            <br>
            <input type="text" class="form-control" required name="provinsi" autocomplete="off" placeholder="Provinsi, Kota, Kecamatan, Kode Pos">
            <br>
            <input type="text" required name="jalan" class="form-control" autocomplete="off" placeholder="Nama Jalan, Gedung, No. Rumah">

            <button style="float: right;" type="submit" name="cekout" class="btn btn-lg btn-block btn-primary font-weight-bold my-1 py-3" class="btn btn-primary ">check out >></button>
        </div>
    </form>
</div>

<!-- jika tekan tombol cekout ditekan -->
<?php if (isset($_POST["cekout"])) {
    $ongkir = 30000;
    // id pelanggan/user diambil dari session
    $idpembeli = $_SESSION['user']['id'];
    $tanggal_pembelian = date("y-m-d");
    $jumlah_pembelian = $totalbelanja + $ongkir;
    // dari form post
    $nama       = htmlspecialchars($_POST['nama']);
    $telepon    = $_POST['nomer'];
    $provinsi   = htmlspecialchars($_POST['provinsi']);
    $jalan      = htmlspecialchars($_POST['jalan']);

    //  menyimpan ke tabel pembelian
    mysqli_query($koneksi, "INSERT INTO tb_pembelian (id_pembeli,nama,nomer,provinsi,jalan,tanggal_pembelian,jumlah_pembelian,ongkir) VALUES ('$idpembeli','$nama','$telepon','$provinsi','$jalan','$tanggal_pembelian','$jumlah_pembelian','$ongkir')");

    // mendapatkan id barusan
    $id_pembelian_barusan = $koneksi->insert_id;

    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        // mendapatkan data produk berdasarkan id produk
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk=$id_produk");
        $perproduk = mysqli_fetch_assoc($sql);

        $nama_produk = $perproduk['nama_produk'];
        $harga = $perproduk['harga_produk'];
        $berat = $perproduk['berat_produk'];

        $subberat = $perproduk['berat_produk'] * $jumlah;
        // total harga = subharga di tb pembelian produk
        $totalharga = $perproduk['harga_produk'] * $jumlah;

        mysqli_query($koneksi, "INSERT INTO tb_pembelian_produk VALUES ('','$id_pembelian_barusan', '$id_produk','$jumlah','$nama_produk', '$harga', '$berat', '$subberat', '$totalharga')");

        // skrip update stok
        mysqli_query($koneksi, "UPDATE tb_produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
    }

    // tampilkan ke halaman nota, nota dari pembelian barusan
    echo "<script>alert('sukses melakukan pembelian')</script>";
    echo "<script>location='nota.php?id=$id_pembelian_barusan'</script>";

    // mengkosongkan keranjang belanja
    unset($_SESSION['keranjang']);
} ?>


<?php include 'footer_sosmed.php'; ?>
<?php include 'footer.php'; ?>