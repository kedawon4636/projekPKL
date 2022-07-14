<?php
session_start();
require 'database.php';

$_SESSION['produk'] = $_GET['id'];

header("location:login.php");
