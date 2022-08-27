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

function buat_pesanan($tarik)
{
    global $koneksi;

    $totalbelanja = $tarik['totalbelanja'];
    $ongkir = 30000;
    // id pelanggan/user diambil dari session
    $idpembeli = $_SESSION['user']['id'];
    $tanggal_pembelian = date("y-m-d");
    $jumlah_pembelian = $totalbelanja + $ongkir;
    // dari form post
    $nama       = htmlspecialchars($tarik['nama']);
    $telepon    = $tarik['nomer'];
    $provinsi   = htmlspecialchars($tarik['provinsi']);
    $kota       = htmlspecialchars($tarik['kota']);
    $kecamatan  = htmlspecialchars($tarik['kecamatan']);
    $kode_pos   = htmlspecialchars($tarik['kode_pos']);
    $jalan      = htmlspecialchars($tarik['jalan']);

    //  menyimpan ke tabel pembelian
    mysqli_query($koneksi, "INSERT INTO tb_pembelian (id_pembeli,nama,nomer,provinsi,kota,kecamatan,kode_pos,jalan,tanggal_pembelian,jumlah_pembelian,ongkir) VALUES ('$idpembeli','$nama','$telepon','$provinsi','$kota','$kecamatan', '$kode_pos','$jalan','$tanggal_pembelian','$jumlah_pembelian','$ongkir')");

    // mendapatkan id barusan
    $id_pembelian_barusan = $koneksi->insert_id;

    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        // mendapatkan data produk berdasarkan id produk
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk=$id_produk");
        $perproduk = mysqli_fetch_assoc($sql);

        $nama_produk = $perproduk['nama_produk'];
        $harga = $perproduk['harga_produk'];
        $berat = $perproduk['berat_produk'];

        $subberat = $perproduk['berat_produk'] * $jumlah;
        // total harga = subharga di tb pembelian produk
        $totalharga = $perproduk['harga_produk'] * $jumlah;

        mysqli_query($koneksi, "INSERT INTO tb_pembelian_produk VALUES ('','$id_pembelian_barusan', '$id_produk','$jumlah','$nama_produk', '$harga', '$berat', '$subberat', '$totalharga')");

        // skrip update stok
        mysqli_query($koneksi, "UPDATE tb_produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
    }

    // tampilkan ke halaman nota, nota dari pembelian barusan
    echo "<script>alert('sukses melakukan pembelian')</script>";
    echo "<script>location='nota.php?id=$id_pembelian_barusan'</script>";

    // mengkosongkan keranjang belanja
    unset($_SESSION['keranjang']);
    return mysqli_affected_rows($koneksi);
}