<?php
// jalankan session start
session_start();
// konek ke database
require 'database.php';

if (isset($_SESSION['user'])) {
    header("location:cekout.php");
}

//membedakan halaman login admin & user
if (isset($_POST["login"])) {

    $username    = $_POST["username"];
    $password    = $_POST["password"];
    $result1 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");


    // cek apakah username
    if (mysqli_num_rows($result1) === 1) {
        // cek pass
        $akun = mysqli_fetch_assoc($result1);
        // menyimpan session 
        // $nama = $row['username'];
        if (password_verify($password, $akun["password"])) {

            echo "<script>alert('berhasil login');</script>";
            // set session user yg beli
            $_SESSION['user'] = $akun;

            // jika sudah belanja
            if (isset($_SESSION['keranjang']) or !empty($_SESSION['keranjang'])) {
                echo "<script>location='cekout.php';</script>";
            } else {
                echo "<script>location='riwayat.php';</script>";
            }
            exit;
        }

        // user dan pass untuk menampilkan halaman admin khusus login admin
    } elseif ($username == 'admin' && $password == 'admin') {

        $_SESSION["admin"] = true;

        header("location:admin/admin.php");
        exit;
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Iwan Jersey Mancing</title>
    <link rel="stylesheet" href="css/csslogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body id="bg-login">
    <div class="box-logo">
        <div class="logo text-center">
            <img src="PRODUK/foto1.jpg" width="120px" class="rounded-circle img-thumbnail mb-3" alt="">
        </div>
        <h3 class="text-center">Silahkan Login</h3>
        <form action="" method="POST">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user fa-1x"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
            </div>
            <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock fa-1x"></i></span>
                <input type="password" name="password" class="form-control" placeholder="password" autocomplete="off">

            </div>
            <!-- id url produk di ambil -->
            <br>
            <input type="submit" style="padding-top:6px; padding-bottom:6px; width:100%; background-color:rgb(8, 182, 37); color:white;" name="login" value="Login" class="btn">

            <?php if (isset($error)) : ?>
                <p class="eror" style="margin-bottom:5px;">Username / Password Salah!</p>
            <?php endif; ?>
            <p style="color:black; margin-top:10px;">Belum daftar? <a style="color:blue;" href="registrasi.php"> klik disini</a></p>

        </form>
    </div>


    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>