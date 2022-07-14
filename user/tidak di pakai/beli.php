<p style="margin-top:60px;"></p>
<?php

session_start();
require 'database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Produk</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="cssindex/index.css">

    <style>
        p {
            text-align: center;
            margin-bottom: -2px;
        }
    </style>
</head>

<body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="logo fa-solid fa-shop me-1"></i>
                Iwan Jersey Mancing
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- akhir navbar -->

    <!-- awal konten -->

    <!-- form -->
    <div class="container" style="text-align:center;">
        <div class="row">
            <?php
            // mendapatkan id prosuk dari session
            $id_produk =  $_GET['id'];
            $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
            $pecah = mysqli_fetch_assoc($ambil); ?>
            <div class="container m-auto" style="width: 400px; ">
                <img src="foto_produk/<?php echo $pecah['foto_produk']; ?>" style="width:90%;">
                <div class="card-body">
                    <div class="caption">
                        <table class="table table-bordered table-sm table-responsive">
                            <tr>
                                <td>
                                    <p><strong>Nama Produk </strong></p>
                                </td>
                                <td><?php echo $pecah['nama_produk']; ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>Harga Produk </strong></p>
                                </td>
                                <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p><strong>Detail Produk</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>Kondisi </strong></p>
                                </td>
                                <td><?php echo $pecah['kondisi_produk'] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>Berat </strong></p>
                                </td>
                                <td><?php echo number_format($pecah['berat_produk']) ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>Min. Pemesanan </strong></p>
                                </td>
                                <td>1 Buah</td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>Stok </strong></p>
                                </td>
                                <td><?php echo $pecah['stok_produk'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p><strong>Deskripsi Produk</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p><?php echo $pecah['deskripsi_produk']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p><strong>Pembelian </strong></p>
                                </td>
                            </tr>
                            <form action="" method="post">
                                <tr>
                                    <td style="text-align:center;">
                                        <input style="width:150px; height:40px" required type="number" min="1" name="jumlah" max="<?php echo $pecah['stok_produk']; ?>" placeholder="Beli Produk">
                                    </td>

                                    <td style="text-align:center;">
                                        <a href="masuk_keranjang.php?id=<?php echo $pecah['id_produk']; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart text-primary "></i> Masuk Keranjang</a>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir form -->



    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>