<p style="margin-top:55px;"></p>
<?php
include 'header.php';
require 'database.php';

$keyword = $_GET["keyword"];
$semuadata = array();
$cari = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%' ");
while ($pecah = mysqli_fetch_assoc($cari)) {
    $semuadata[] = $pecah;
}
// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";

?>

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Pencarian</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Pencarian</p>
        </div>
    </div>
</div>
<div class="container">
    <h2 class=""><strong>Hasil Pencarian : <?php echo $keyword ?></strong> </h2>

    <?php if (empty($semuadata)) { ?>
        <div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
    <?php } ?>
</div>
<div class="konten">
    <div class="container">
        <div class="row">

            <?php foreach ($semuadata as $key => $value) : ?>
                <div class="col-md-3 my-2">
                    <div class="card body">
                        <img src="foto_produk/<?php echo $value["foto_produk"]; ?>" alt="...">
                        <div class="caption">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo $value["nama_produk"]; ?></li>
                                <li class="list-group-item"><?php echo $value["harga_produk"]; ?></li>
                            </ul>
                            <div class="card-footer d-flex justify-content-between border">
                                <a href="detail.php?id=<?php echo $produk['id_produk'] ?>" class="btn text-dark p-0"><i class="fas fa-eye text-primary"></i>View
                                    Detail</a>
                                <a href="masuk_keranjang.php?id=<?php echo $produk['id_produk']; ?>" class="btn text-dark p-0"><i class="fas fa-shopping-cart text-primary "></i> Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'footer_sosmed.php' ?>
<?php include 'footer.php' ?>