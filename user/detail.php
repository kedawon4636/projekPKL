<?php
include 'header.php';
require 'database.php';


?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Detail Produk</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Detail Produk</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<?php $id_produk =  $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
$pecah = mysqli_fetch_assoc($ambil); ?>
<!-- Shop Detail Start -->


<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="foto_produk/<?php echo $pecah['foto_produk']; ?>" alt="Image">
                    </div>
                    <!-- <div class="carousel-item">
                        <img src="PRODUK/con1.jpg" class="w-100 h-100" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img src="PRODUK/con2.jpg" class="h-100 w-100" alt="Image">
                    </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?php echo $pecah['nama_produk']; ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">Rp <?php echo number_format($pecah['harga_produk']); ?></h3>
            <p class=""><?php echo $pecah['deskripsi_produk']; ?></p>
            <p class="text-dark font-weight-medium mb-0 mr-3">Stok : <?php echo $pecah['stok_produk'] ?></p>
            <p class="text-dark font-weight-medium mb-2 mr-3">Berat : <?php echo number_format($pecah['berat_produk']) ?> Gram</p>

            <div class="col-sm-10">
            <select class="form-control" name="size" id="fakultas">
            <option value="">- Pilih Ukuran -</option>
            <!-- <option value="M" <?php if ($fakultas == "Sistem Informasi") echo "selected" ?>> M
            </option> -->
            <option value="M"> M</option>
            <option value="L"> L</option>
            <option value="XL"> XL</option>
            <option value="XXL"> XXL</option>
            </select>
            </div>
            <br>
            <div class="d-flex mb-3">
                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" style="width:150px; height:40px" required type="number" min="1" name="jumlah" max="<?php echo $pecah['stok_produk']; ?>" placeholder="Beli Produk">
                            <button class="btn btn-primary" name="beli">Beli</button>
                        </div>
                    </div>
                </form>
                <?php
                // jika tombol beli ditekan
                if (isset($_POST['beli'])) {
                    // mendapatkan jumlah yang di inputkan
                    $jumlah = $_POST["jumlah"];
                    // masukan ke keranjang jumlah
                    $_SESSION['keranjang'][$id_produk] = $jumlah;

                    echo "<script>alert('produk telah masuk ke keranjang belanja')</script>";
                    echo "<script>location='keranjang.php'</script>";
                }

                ?>
            </div>
        </div>
        <div class="d-flex pt-2">
            <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
            <div class="d-inline-flex">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-pinterest"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row px-xl-5">
    <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
            <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-pane-1">
                <h4 class="mb-3">Product Description</h4>
                <p>Eos no etur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
            </div>
            <div class="tab-pane fade" id="tab-pane-2">
                <h4 class="mb-3">Additional Information</h4>
                <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. invidunt.</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                            </li>
                            <li class="list-group-item px-0">
                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                            </li>
                            <li class="list-group-item px-0">
                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                            </li>
                            <li class="list-group-item px-0">
                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                            </li>
                            <li class="list-group-item px-0">
                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                            </li>
                            <li class="list-group-item px-0">
                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                            </li>
                            <li class="list-group-item px-0">
                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-pane-3">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                <div class="text-primary mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">Leave a review</h4>
                        <small>Your email address will not be published. Required fields are marked *</small>
                        <div class="d-flex my-3">
                            <p class="mb-0 mr-2">Your Rating * :</p>
                            <div class="text-primary">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="message">Your Review *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Your Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Shop Detail End -->

<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <div class="row px-xl-5">
        <?php
        $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk");
        while ($produk = mysqli_fetch_array($ambil)) { ?>
            <div class="col-md-3 my-2">
                <div class="owl-carousel related-carousel">
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
            </div>
        <?php } ?>
    </div>
</div>
<!-- Products End -->


<?php include 'footer_sosmed.php' ?>
<?php include 'footer.php' ?>