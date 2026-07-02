<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = (int)$_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM pengunjung WHERE id_pengunjung='$id'");

if(mysqli_num_rows($query)==0){
    header("Location:index.php");
    exit;
}

$data = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){

    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $alamat = mysqli_real_escape_string($conn,$_POST['alamat']);
    $no_hp = mysqli_real_escape_string($conn,$_POST['no_hp']);

    mysqli_query($conn,"UPDATE pengunjung SET

    nama='$nama',
    alamat='$alamat',
    no_hp='$no_hp'

    WHERE id_pengunjung='$id'");

    header("Location:index.php");
    exit;
}

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-warning">

<h4>Edit Pengunjung</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">

Nama Pengunjung

</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= htmlspecialchars($data['nama']) ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">

Alamat

</label>

<textarea
name="alamat"
rows="4"
class="form-control"
required><?= htmlspecialchars($data['alamat']) ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">

Nomor HP

</label>

<input
type="text"
name="no_hp"
class="form-control"
value="<?= htmlspecialchars($data['no_hp']) ?>"
required>

</div>

<button
type="submit"
name="update"
class="btn btn-primary">

<i class="fa fa-save"></i>

Update

</button>

<a href="index.php"
class="btn btn-secondary">

<i class="fa fa-arrow-left"></i>

Kembali

</a>

</form>

</div>

</div>

</div>

<?php
include "../includes/footer.php";
?>