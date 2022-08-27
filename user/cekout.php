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

echo "<pre>";
print_r($_SESSION['coupon']);
echo "</pre>";

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
                        <h6 class="font-weight-medium">Rp <?php echo number_format($totalbelanja)?></h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Ongkos Kirim</h6>
                        <?php $ongkir = 30000; ?>
                        <h6 class="font-weight-medium">Rp <?php echo number_format($ongkir); ?></h6>
                    </div>
<!-- belum jalan ketika session code tidak ada maka diskon 0 -->
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Diskon</h6>
                        <h6 class="font-weight-medium">- Rp <?php echo number_format($_SESSION['coupon']['kredit'])?></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?php echo number_format($totalbelanja + $ongkir - $_SESSION['coupon']['kredit']) ?></h5>
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
            <input type="hidden" name="totalbelanja" value="<?= $totalbelanja ?>">
            <h3>Alamat Pengiriman</h3>
            <label for=""><p class="fw-bolder">Nama Penerima</p></label>
            <input type="text" required name="nama" class="form-control" autocomplete="off" placeholder="Nama Penerima">
            <br>
            <label for=""><p class="fw-bolder">Nomer Telepon </p></label>
            <input type="number" required name="nomer" class="form-control" autocomplete="off" placeholder="Nomer Telepon">
            <br>

            <label for=""><p class="fw-bolder">Alamat</p></label>
            <input type="text" class="form-control mt-1" required name="provinsi" autocomplete="off" placeholder="Provinsi">
            <input type="text" class="form-control mt-1" required name="kota" autocomplete="off" placeholder="Kota / Kabupaten">
            <input type="text" class="form-control mt-1" required name="kecamatan" autocomplete="off" placeholder="Kecamatan">
            <input type="number" class="form-control mt-1" required name="kode_pos" autocomplete="off" placeholder="Kode Pos">
            <br>
            <label for=""><p class="fw-bolder">Nama Jalan, Gedung, No Rumah</p></label>
            <input type="text" required name="jalan" class="form-control" autocomplete="off" placeholder="Nama Jalan, Gedung, No. Rumah">

            <button style="float: right;" type="submit" name="buat_pesanan" class="btn btn-lg btn-block btn-primary font-weight-bold my-1 py-3" class="btn btn-primary ">Buat Pesanan >></button>
        </div>
    </form>
</div>

<!-- jika tekan tombol cekout ditekan -->
<?php if (isset($_POST["buat_pesanan"])) {
   if (buat_pesanan($_POST) > 0 ){

       // tampilkan ke halaman nota, nota dari pembelian barusan
       echo "<script>alert('sukses melakukan pembelian')</script>";
       echo "<script>location='nota.php?id=$id_pembelian_barusan'</script>";
    }else{
        echo "<script>alert('gagal melakukan pembelian')</script>";
   }

} ?>


<?php include 'footer_sosmed.php'; ?>
<?php include 'footer.php'; ?>