<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

if(isset($_POST['simpan'])){

    $id_pengunjung = $_POST['id_pengunjung'];
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis_tiket'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $jumlah * $harga;

    mysqli_query($conn,"INSERT INTO tiket
    (id_pengunjung,tanggal,jenis_tiket,jumlah,harga,total)

    VALUES

    ('$id_pengunjung',
    '$tanggal',
    '$jenis',
    '$jumlah',
    '$harga',
    '$total')");

    header("Location:index.php");
    exit;
}

$pengunjung = mysqli_query($conn,"SELECT * FROM pengunjung ORDER BY nama ASC");

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4>Tambah Tiket</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Nama Pengunjung</label>

<select name="id_pengunjung" class="form-control" required>

<option value="">-- Pilih Pengunjung --</option>

<?php while($p=mysqli_fetch_assoc($pengunjung)){ ?>

<option value="<?= $p['id_pengunjung']; ?>">

<?= htmlspecialchars($p['nama']); ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="form-control"
value="<?= date('Y-m-d'); ?>"
required>

</div>

<div class="mb-3">

<label>Jenis Tiket</label>

<select
name="jenis_tiket"
id="jenis"
class="form-control"
required>

<option value="">Pilih Jenis</option>

<option value="Dewasa">Dewasa</option>

<option value="Anak">Anak</option>

</select>

</div>

<div class="mb-3">

<label>Harga</label>

<input
type="number"
name="harga"
id="harga"
class="form-control"
readonly>

</div>

<div class="mb-3">

<label>Jumlah Tiket</label>

<input
type="number"
name="jumlah"
id="jumlah"
class="form-control"
value="1"
min="1"
required>

</div>

<div class="mb-3">

<label>Total</label>

<input
type="text"
id="total"
class="form-control"
readonly>

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

Kembali

</a>

</form>

</div>

</div>

</div>

<script>

const jenis = document.getElementById("jenis");
const harga = document.getElementById("harga");
const jumlah = document.getElementById("jumlah");
const total = document.getElementById("total");

function hitung(){

let h = parseInt(harga.value) || 0;
let j = parseInt(jumlah.value) || 0;

total.value = "Rp " + (h*j).toLocaleString("id-ID");

}

jenis.addEventListener("change",function(){

if(this.value=="Dewasa"){

harga.value=50000;

}else if(this.value=="Anak"){

harga.value=25000;

}else{

harga.value=0;

}

hitung();

});

jumlah.addEventListener("keyup",hitung);
jumlah.addEventListener("change",hitung);

</script>

<?php
include "../includes/footer.php";
?>