<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = (int)$_GET['id'];

mysqli_query($conn,"DELETE FROM pengunjung
WHERE id_pengunjung='$id'");

header("Location:index.php");
exit;