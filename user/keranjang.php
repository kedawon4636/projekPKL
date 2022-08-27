<?php
include 'header.php';
require 'database.php';

if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
    echo "<script>alert('keranjang kosong, silahkan lakukan pembelian')</script>";
    echo "<script>location='index.php'</script>";
}

// cek session
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">keranjang belanja</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">keranjang belanja</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="container">
    <a href="index.php" class="btn btn-success"><i class="fa-solid fa-cart-plus"></i> Lanjutkan Belanja</a>
</div>
<br>

<?php if (empty($_SESSION['coupon'])) { ?>
          <div class="container text-center">         
    <div class="alert alert-success alert-dismissible fade show" role="alert"> Masukan kode voucher jika <strong> Ada </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>
<?php }else{?>
    <div class="container text-center">         
    <div class="alert alert-success alert-dismissible fade show" role="alert"> Kode voucher <strong> <?php echo $_SESSION['coupon']['nama'] ?> Berhasil </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>    
<?php }?>

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class=" row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>QTY</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php $no = 1; ?>
                    <?php $totalbelanja = 0; ?>

                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                        <!-- menampilkan produk yang sedang diperulangkan berdasarkan id produk -->
                        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
                        $pecah = mysqli_fetch_assoc($ambil);
                        $subharga = $jumlah * $pecah["harga_produk"];

                        // cek id produk
                        // echo "<pre>";
                        // print_r($_SESSION['coupon']);
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
                            <td class="align-middle">
                                <a class="btn btn-sm btn-primary" onclick="return confirm('yakin ingin menghapus produk?');" href="hapus_keranjang.php?id=<?php echo $id_produk ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $totalbelanja += $subharga; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <!-- memberi cek kupon diskon -->
            <form class="mb-5" method="post" action="coupon.php">
                <div class="input-group">
                    <input type="text" name="kode" class="form-control" placeholder="Masukan Kode Voucher">
                    <button name="coupon" class="btn btn-primary">Pakai</button>
                    <!-- <div class="input-group-append">
                        <button name="coupon" class="btn btn-primary">Apply Coupon</button>
                    </div> -->
                    <br>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold ">Lanjutkan Order</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">Rp <?php echo number_format($totalbelanja) ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Diskon</h6>
                        <h6 class="font-weight-medium">- Rp <?php echo number_format($_SESSION['coupon']['kredit']) ?></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?php echo number_format($totalbelanja - $_SESSION['coupon']['kredit']) ?></h5>
                        </div>
                        <a href="login.php" class="btn btn-primary">cekout</a>
                        <!-- <button name="checkout" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button> -->
                    </div>
                    <!-- tombol checkout -->
                <!-- <div class="card-footer border-secondary bg-transparent">
                    <a href="login.php" class="btn btn-block btn-primary my-3 py-3">Check Out</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

<?php include 'footer_sosmed.php'; ?>
<?php include 'footer.php'; ?>