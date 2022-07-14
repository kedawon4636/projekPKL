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

                                <a href="detail.php?id=<?php echo $produk['id_produk']; ?>" class="btn text-dark p-0" data-bs-toggle="modal" data-bs-target="#detail_<?php echo $produk['id_produk'] ?>"> <i class="fas fa-eye text-primary"></i> View
                                    Detail</a>
                                <a href="masuk_keranjang?id=<?php echo $produk['id_produk']; ?>" class="btn text-dark p-0"><i class="fas fa-shopping-cart text-primary "></i> Keranjang</a>
                            </div>
                        </div>
                        <!-- modal untuk menampilkan detail-->
                        <form action="detail_modal.php" method="post">
                            <div class="modal fade" id="detail_<?php echo $produk['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="foto_produk/<?php echo $produk['foto_produk'] ?>" width="50%" alt="">
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        Nama Produk
                                                    </td>
                                                    <td>
                                                        <?php echo $produk['nama_produk'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Harga Produk
                                                    </td>
                                                    <td> Rp<?php echo number_format($produk['harga_produk']) ?></td>
                                                </tr>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Berat
                                                    </td>
                                                    <td><?php echo number_format($produk['berat_produk']) ?> Gram</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kondisi
                                                    </td>
                                                    <td> <?php echo ($produk['kondisi_produk']) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Stok
                                                    </td>
                                                    <td> <?php echo ($produk['stok_produk']) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Min. Pembelian </td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <strong>Deskripsi Produk</strong>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td colspan="2"><?php echo ($produk['deskripsi_produk']) ?></td>
                                                </tr>

                                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                            <a href="beli?id=<?php echo $produk['id_produk']; ?>" class="btn btn-primary">masuk keranjang</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- akhir Modal -->
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