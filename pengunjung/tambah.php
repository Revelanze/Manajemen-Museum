<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

if(isset($_POST['simpan'])){

    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $alamat = mysqli_real_escape_string($conn,$_POST['alamat']);
    $no_hp = mysqli_real_escape_string($conn,$_POST['no_hp']);

    mysqli_query($conn,"INSERT INTO pengunjung
    (nama,alamat,no_hp)

    VALUES

    ('$nama','$alamat','$no_hp')");

    header("Location:index.php");
    exit;
}

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4>Tambah Pengunjung</h4>

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
required></textarea>

</div>

<div class="mb-3">

<label class="form-label">

Nomor HP

</label>

<input
type="text"
name="no_hp"
class="form-control"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-success">

<i class="fa fa-save"></i>

Simpan

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