<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$query = mysqli_query($conn,"
SELECT koleksi.*, kategori.nama_kategori
FROM koleksi
LEFT JOIN kategori
ON koleksi.id_kategori=kategori.id_kategori
ORDER BY id_koleksi DESC
");

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-3">

<h2>Data Koleksi Museum</h2>

<a href="tambah.php" class="btn btn-primary">

<i class="fa fa-plus"></i>

Tambah Koleksi

</a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-striped" id="koleksi">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Foto</th>
<th>Nama Koleksi</th>
<th>Kategori</th>
<th>Asal</th>
<th>Tahun</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no=1;

while($d=mysqli_fetch_assoc($query)){
?>

<tr>

<td><?= $no++ ?></td>

<td>

<?php
if($d['foto']==""){
?>

<img src="../assets/img/no-image.png"
width="80">

<?php
}else{
?>

<img
src="../assets/upload/<?= htmlspecialchars($d['foto']) ?>"
width="80"
height="80"
style="object-fit:cover;border-radius:10px;">

<?php } ?>

</td>

<td><?= htmlspecialchars($d['nama_koleksi']) ?></td>

<td><?= htmlspecialchars($d['nama_kategori']) ?></td>

<td><?= htmlspecialchars($d['asal']) ?></td>

<td><?= htmlspecialchars($d['tahun']) ?></td>

<td>

<a
href="edit.php?id=<?= $d['id_koleksi'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?= $d['id_koleksi'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<script>

$(document).ready(function(){

$("#koleksi").DataTable();

});

</script>

<?php
include "../includes/footer.php";
?>