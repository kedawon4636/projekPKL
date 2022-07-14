<?php
require 'database.php';
session_start();

// session id produk
if (isset($_POST["register"])) {
    // nanti kita pindahkan dia kehalaman login
    // register function register diambil dari function yang di buat di file database 
    if (registrasi($_POST) > 0) {
        echo '<script>
        alert("berhasil menambahkan akun");
            </script>';
        echo "<script>location='login.php'</script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Iwan Jersey Mancing</title>
    <link rel="stylesheet" href="css/cssregister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body id="bg-login">
    <div class="box-logo">
        <h2>Registrasi</h2>

        <form action="" method="post">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user fa-1x"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
            </div>
            <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock fa-1x"></i></span>
                <input type="password" name="password" class="form-control" placeholder="password" autocomplete="off">
            </div>
            <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock fa-1x"></i></span>
                <input type="password" name="password2" class="form-control" placeholder="Konfirmasi Password" autocomplete="off">
            </div>

            <br>
            <input type="submit" style="padding-top:6px; padding-bottom:6px; width:100%; background-color:rgb(8, 182, 37); color:white;" name="register" value="Daftar" class="btn">


            <p style="text-align:center; color:black; margin-top:10px;">Sudah pernah daftar? <a style="color:blue;" href="login.php"> klik
                    disini</a></p>
        </form>
    </div>


    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>