<?php 
require 'database.php';

$id = $_POST['id_produk'];


mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = '$id'");
header("location:index.php");


?>