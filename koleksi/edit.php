<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = (int)$_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM koleksi WHERE id_koleksi='$id'");
$d = mysqli_fetch_assoc($data);

$kategori = mysqli_query($conn,"SELECT * FROM kategori ORDER BY nama_kategori ASC");

if(isset($_POST['update'])){

    $id_kategori = $_POST['id_kategori'];
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $asal = mysqli_real_escape_string($conn,$_POST['asal']);
    $tahun = mysqli_real_escape_string($conn,$_POST['tahun']);
    $deskripsi = mysqli_real_escape_string($conn,$_POST['deskripsi']);

    $foto = $d['foto'];

    if($_FILES['foto']['name']!=""){

        if($foto != "" && file_exists("../assets/upload/".$foto)){
            unlink("../assets/upload/".$foto);
        }

        $foto = time()."_".$_FILES['foto']['name'];

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            "../assets/upload/".$foto
        );
    }

    mysqli_query($conn,"UPDATE koleksi SET

    id_kategori='$id_kategori',
    nama_koleksi='$nama',
    asal='$asal',
    tahun='$tahun',
    deskripsi='$deskripsi',
    foto='$foto'

    WHERE id_koleksi='$id'");

    header("Location:index.php");
    exit;
}

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-warning">

<h4>Edit Koleksi</h4>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Kategori</label>

<select name="id_kategori" class="form-control">

<?php while($k=mysqli_fetch_assoc($kategori)){ ?>

<option
value="<?= $k['id_kategori']; ?>"
<?= ($k['id_kategori']==$d['id_kategori'])?'selected':''; ?>>

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
value="<?= htmlspecialchars($d['nama_koleksi']); ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Asal</label>

<input
type="text"
name="asal"
value="<?= htmlspecialchars($d['asal']); ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Tahun</label>

<input
type="text"
name="tahun"
value="<?= htmlspecialchars($d['tahun']); ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control"
rows="4"><?= htmlspecialchars($d['deskripsi']); ?></textarea>

</div>

<div class="mb-3">

<label>Foto Baru (Opsional)</label>

<input
type="file"
name="foto"
class="form-control"
accept="image/*">

</div>

<div class="mb-3">

<?php if($d['foto']!=""){ ?>

<img
src="../assets/upload/<?= htmlspecialchars($d['foto']); ?>"
width="180">

<?php } ?>

</div>

<button class="btn btn-primary" name="update">

Update

</button>

<a href="index.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>