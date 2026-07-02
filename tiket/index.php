<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$query = mysqli_query($conn,"
SELECT tiket.*, pengunjung.nama
FROM tiket
JOIN pengunjung
ON tiket.id_pengunjung = pengunjung.id_pengunjung
ORDER BY id_tiket DESC
");

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-3">

<h2>Data Tiket</h2>

<a href="tambah.php" class="btn btn-primary">
<i class="fa fa-plus"></i> Tambah Tiket
</a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-striped" id="tiket">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Pengunjung</th>
<th>Tanggal</th>
<th>Jenis</th>
<th>Jumlah</th>
<th>Total</th>
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

<td><?= htmlspecialchars($d['nama']) ?></td>

<td><?= $d['tanggal'] ?></td>

<td><?= $d['jenis_tiket'] ?></td>

<td><?= $d['jumlah'] ?></td>

<td>Rp <?= number_format($d['total']) ?></td>

<td>

<a href="edit.php?id=<?= $d['id_tiket'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="hapus.php?id=<?= $d['id_tiket'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus tiket ini?')">

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
$('#tiket').DataTable();
});
</script>

<?php
include "../includes/footer.php";
?>