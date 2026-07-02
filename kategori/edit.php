<?php
session_start();
include "../config/koneksi.php";

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori='$id'");

$d=mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$nama=mysqli_real_escape_string($conn,$_POST['nama']);

mysqli_query($conn,"UPDATE kategori
SET nama_kategori='$nama'
WHERE id_kategori='$id'");

header("Location:index.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Edit Kategori</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header">

Edit Kategori

</div>

<div class="card-body">

<form method="POST">

<label>Nama Kategori</label>

<input
type="text"
name="nama"
value="<?= $d['nama_kategori'] ?>"
class="form-control"
required>

<br>

<button
class="btn btn-primary"
name="update">

Update

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