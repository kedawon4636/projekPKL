<?php 

$host  = "localhost";
$user   = "root";
$pass   = "";
$db    = "db_iwanjersey";

$koneksi   = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){ //cek koneksi dan memberi komentar/pop up
   
    die("tidak bisa terkoneksi ke database");

}


?>

