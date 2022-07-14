<?php
session_start();

require 'database.php';

// mendapatkan id produk dari url
$id_produk = $_GET['id'];


// jika sudah ada produk itu dikeranjang maka produk itu di jumlah
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
}
// jika belum ada di keranjang maka dianggap beli 1
else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

// memanggil session
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

echo "<script>
            alert('produk telah masuk ke keranjang belanja');
        </script>";
echo "<script>location='keranjang.php';</script>";
