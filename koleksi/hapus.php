<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = (int)$_GET['id'];

$data = mysqli_query($conn,"SELECT foto FROM koleksi WHERE id_koleksi='$id'");
$d = mysqli_fetch_assoc($data);

if($d && $d['foto'] != "" && file_exists("../assets/upload/".$d['foto'])){
    unlink("../assets/upload/".$d['foto']);
}

mysqli_query($conn,"DELETE FROM koleksi WHERE id_koleksi='$id'");

header("Location:index.php");
exit;