<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iwan Jersey</title>
    <!-- boostrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/cssindex.css">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

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
                <form class="d-flex ms-auto my-3 my-lg-0" action="pencarian.php" method="get">
                    <input class="form-control me-2" name="keyword" type="search" placeholder="Cari Barang Anda" aria-label="Search" autocomplete="off">
                    <button class="btn btn-light" type="submit" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="produk.php">Produk</a>
                    </li>

                    <!-- dropdown header -->
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lain-Lain
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="keranjang.php" class="dropdown-item">Keranjang</a>
                            </li>
                            <li>
                                <a href="cekout.php" class="dropdown-item">Checkout</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="nota.php">Nota Pembelian</a>
                            </li>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a href="riwayat.php" class="nav-link active">Riwayat Belanja</a>
                        </li>
                        <li class="nav-item ">
                            <a href="logout.php" class="nav-link active">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item ">
                            <a href="login.php" class="nav-link active">Login</a>
                        </li>
                        <li class="nav-item ">
                            <a href="registrasi.php" class="nav-link active">Daftar</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <div style="margin-top: 55px;"></div>