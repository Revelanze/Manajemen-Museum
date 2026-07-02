<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$kategori = mysqli_query($conn,"SELECT * FROM kategori ORDER BY nama_kategori ASC");

if(isset($_POST['simpan'])){

    $id_kategori = $_POST['id_kategori'];
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $asal = mysqli_real_escape_string($conn,$_POST['asal']);
    $tahun = mysqli_real_escape_string($conn,$_POST['tahun']);
    $deskripsi = mysqli_real_escape_string($conn,$_POST['deskripsi']);

    $foto = "";

    if($_FILES['foto']['name']!=""){

        $foto = time()."_".$_FILES['foto']['name'];

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            "../assets/upload/".$foto
        );

    }

    mysqli_query($conn,"INSERT INTO koleksi
    (id_kategori,nama_koleksi,asal,tahun,deskripsi,foto)

    VALUES

    ('$id_kategori',
    '$nama',
    '$asal',
    '$tahun',
    '$deskripsi',
    '$foto')");

    header("Location:index.php");
    exit;
}

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4>Tambah Koleksi Museum</h4>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Kategori</label>

<select name="id_kategori" class="form-control" required>

<option value="">-- Pilih Kategori --</option>

<?php while($k=mysqli_fetch_assoc($kategori)){ ?>

<option value="<?= $k['id_kategori']; ?>">

<?= htmlspecialchars($k['nama_kategori']); ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Nama Koleksi</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Asal Daerah</label>

<input
type="text"
name="asal"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Tahun</label>

<input
type="text"
name="tahun"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
rows="4"
class="form-control"
required></textarea>

</div>

<div class="mb-3">

<label>Foto Koleksi</label>

<input
type="file"
name="foto"
class="form-control"
accept="image/*"
onchange="previewImage(event)"
required>

</div>

<div class="mb-3 text-center">

<img
id="preview"
src="../assets/no-image.png"
width="200"
style="border-radius:10px;object-fit:cover;">

</div>

<button
class="btn btn-success"
name="simpan">

<i class="fa fa-save"></i>

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

<script>

function previewImage(event){

let reader = new FileReader();

reader.onload = function(){

document.getElementById("preview").src = reader.result;

}

reader.readAsDataURL(event.target.files[0]);

}

</script>

<?php
include "../includes/footer.php";
?>