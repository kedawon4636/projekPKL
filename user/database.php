<?php
$host  = "localhost";
$user   = "root";
$pass   = "";
$db    = "db_iwanjersey";

$koneksi   = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi dan memberi komentar/pop up

    die("tidak bisa terkoneksi ke database");
}

function registrasi($data)
{
    global $koneksi;

    $username   = strtolower(stripslashes($data["username"])); //hurf besar/kecil dan tdk ada karakter slas/
    $password   = mysqli_real_escape_string($koneksi, $data["password"]); //untuk masukan karakter unik
    $password2  = mysqli_real_escape_string($koneksi, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar');
            </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
            </script>";

        return false;
    }

    //jika username dan password kosong
    if ($username == '' or $password == '' or $password2 = '') {
        echo "<script>
                alert('masukan username dan password');
            </script>";
        return false;
    }
    // enkripsi dulu
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan ke database
    mysqli_query($koneksi, "INSERT INTO tb_user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($koneksi);
}
