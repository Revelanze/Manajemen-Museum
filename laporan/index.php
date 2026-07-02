<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$mulai = $_GET['mulai'] ?? "";
$selesai = $_GET['selesai'] ?? "";

$sql = "
SELECT tiket.*, pengunjung.nama
FROM tiket
JOIN pengunjung
ON tiket.id_pengunjung=pengunjung.id_pengunjung
";

if($mulai!="" && $selesai!=""){

$sql .= " WHERE tanggal BETWEEN '$mulai' AND '$selesai' ";

}

$sql .= " ORDER BY tanggal DESC";

$data = mysqli_query($conn,$sql);

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>Laporan Tiket Museum</h4>

</div>

<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-4">

<label>Tanggal Mulai</label>

<input
type="date"
name="mulai"
value="<?= $mulai ?>"
class="form-control">

</div>

<div class="col-md-4">

<label>Tanggal Selesai</label>

<input
type="date"
name="selesai"
value="<?= $selesai ?>"
class="form-control">

</div>

<div class="col-md-4">

<label>&nbsp;</label>

<br>

<button class="btn btn-primary">

Filter

</button>

<a
href="index.php"
class="btn btn-secondary">

Reset

</a>

</div>

</div>

</form>

<hr>

<table class="table table-bordered table-striped">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Nama</th>
<th>Tanggal</th>
<th>Jenis</th>
<th>Jumlah</th>
<th>Total</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($d=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= htmlspecialchars($d['nama']) ?></td>

<td><?= $d['tanggal'] ?></td>

<td><?= $d['jenis_tiket'] ?></td>

<td><?= $d['jumlah'] ?></td>

<td>Rp <?= number_format($d['total']) ?></td>

</tr>

<?php } ?>

</tbody>

</table>

<a
href="cetak.php?mulai=<?= $mulai ?>&selesai=<?= $selesai ?>"
class="btn btn-danger">

Cetak PDF

</a>

</div>

</div>

</div>

<?php
include "../includes/footer.php";
?>