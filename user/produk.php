<?php
include 'header.php';
require 'database.php';

// session yang diambil ketika login

?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Produk</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Produk</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- akhir konten -->
<div class="container">

    <h2 class="text-center font-weight-bold" style="color:white;">
        Poduk Jersey Mancing </h2>

</div>

<!-- konten produk -->
<div class="content">
    <div class="container">
        <div class="row">

            <?php
            $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk");
            while ($produk = mysqli_fetch_array($ambil)) { ?>
                <div class="col-md-3 my-2">
                    <div class="card body">
                        <img src="foto_produk/<?php echo $produk['foto_produk']; ?>" alt="">
                        <div class="caption">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?php echo $produk['nama_produk']; ?></h4>
                                </li>
                                <li class="list-group-item">
                                    <h5><strong>RP. <?php echo number_format($produk['harga_produk']); ?></strong></h5>
                                </li>
                                <!-- <del>$123.00</del> untuk diskon-->
                            </ul>
                            <div class="card-footer d-flex justify-content-between border">

                                <a href="detail.php?id=<?php echo $produk['id_produk'] ?>" class="btn text-dark p-0"><i class="fas fa-eye text-primary"></i>View
                                    Detail</a>
                                <a href="masuk_keranjang.php?id=<?php echo $produk['id_produk']; ?>" class="btn text-dark p-0"><i class="fas fa-shopping-cart text-primary "></i> Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<a href="#" class="btn btn-primary back-to-top" style="float:right;"><i class="fa fa-angle-double-up"></i></a>
<!-- akhir produk -->

<?php include 'footer_sosmed.php'; ?>
<?php include 'footer.php'; ?>