<?php
session_start();
include "../config/koneksi.php";

if(isset($_POST['simpan'])){

$nama = mysqli_real_escape_string($conn,$_POST['nama']);

mysqli_query($conn,"INSERT INTO kategori(nama_kategori)
VALUES('$nama')");

header("Location:index.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Tambah Kategori</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header">

Tambah Kategori

</div>

<div class="card-body">

<form method="POST">

<label>Nama Kategori</label>

<input
type="text"
name="nama"
class="form-control"
required>

<br>

<button
class="btn btn-success"
name="simpan">

Simpan

</button>

<a href="index.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</body>
</html>