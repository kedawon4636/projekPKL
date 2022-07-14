<?php
include 'header.php';
require 'database.php';

// session ketika masuk

?>
<p style="margin-top:70px"></p>
<!-- ketika berhasil logout -->
<div class="text-center">
    <?php
    if (isset($_GET['alert'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Anda telah
            <strong>Berhasil Logout</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>
</div>
<!-- awal carousel -->
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner banner">
            <div class="carousel-item active">
                <img src="PRODUK/img 1.jpg" class="d-block img-fluid " alt="...">
            </div>
            <div class="carousel-item ">
                <img src="PRODUK/con1.jpg" class="d-block img-fluid" alt="...">
            </div>
            <div class="carousel-item ">
                <img src="PRODUK/con2.jpg" class="d-block img-fluid" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- akhir carousel -->
<div class="container pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2"><br></span></h2>
    </div>
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
<?php include 'footer_sosmed.php' ?>
<?php include 'footer.php'; ?>