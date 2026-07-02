<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$data = mysqli_query($conn,"SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Data Kategori</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

<style>

body{
background:#f4f6f9;
}

.sidebar{
position:fixed;
width:250px;
height:100%;
background:#0d6efd;
}

.sidebar h3{
padding:20px;
color:white;
text-align:center;
}

.sidebar a{
display:block;
padding:15px;
color:white;
text-decoration:none;
}

.sidebar a:hover{
background:#0b5ed7;
}

.content{
margin-left:250px;
padding:20px;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>🏛 Museum</h3>

<a href="../dashboard/">Dashboard</a>
<a href="../pengunjung/">Pengunjung</a>
<a href="../tiket/">Tiket</a>
<a href="../kategori/">Kategori</a>
<a href="../koleksi/">Koleksi</a>
<a href="../laporan/">Laporan</a>
<a href="../auth/logout.php">Logout</a>

</div>

<div class="content">

<h2>Data Kategori</h2>

<a href="tambah.php" class="btn btn-primary mb-3">

<i class="fa fa-plus"></i>

Tambah Kategori

</a>

<table id="kategori" class="table table-bordered table-striped">

<thead>

<tr>

<th>No</th>

<th>Nama Kategori</th>

<th width="170">Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($d=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama_kategori'] ?></td>

<td>

<a href="edit.php?id=<?= $d['id_kategori'] ?>" class="btn btn-warning btn-sm">

Edit

</a>

<a href="hapus.php?id=<?= $d['id_kategori'] ?>" class="btn btn-danger btn-sm">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script>

$(document).ready(function(){

$('#kategori').DataTable();

});

</script>

</body>
</html>