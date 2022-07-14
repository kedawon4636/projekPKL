<?php
require 'databaseadmin.php';

$ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk='$_GET[id]'");
$pecah = mysqli_fetch_assoc($ambil);
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk")) {
    unlink("../foto_produk/$fotoproduk");
}
// hapus produk
mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id_produk='$_GET[id]'");
echo "<script>
        alert('data berhasil di hapus');
        document.location.href = 'data_produk.php';
    </script>";
