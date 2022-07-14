<?php
session_start();
include 'header_admin.php';
require '../database.php';
if (!isset($_SESSION["admin"])) {
    header("location:../login.php");
    exit;
}
?>
<p style="margin-top: 55px;"></p>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Admin</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="admin.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Admin</p>
        </div>
    </div>
</div>

<p style="margin-top:60px; font-size:20px;">selamat datang admin</p>
<!-- akhir konten -->