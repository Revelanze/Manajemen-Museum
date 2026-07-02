<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = (int)$_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM tiket WHERE id_tiket='$id'");
$data = mysqli_fetch_assoc($query);

$pengunjung = mysqli_query($conn,"SELECT * FROM pengunjung ORDER BY nama ASC");

if(isset($_POST['update'])){

    $id_pengunjung = $_POST['id_pengunjung'];
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis_tiket'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $jumlah * $harga;

    mysqli_query($conn,"UPDATE tiket SET

    id_pengunjung='$id_pengunjung',
    tanggal='$tanggal',
    jenis_tiket='$jenis',
    jumlah='$jumlah',
    harga='$harga',
    total='$total'

    WHERE id_tiket='$id'");

    header("Location:index.php");
    exit;
}

include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-warning">

<h4>Edit Tiket</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Nama Pengunjung</label>

<select name="id_pengunjung" class="form-control">

<?php while($p=mysqli_fetch_assoc($pengunjung)){ ?>

<option
value="<?= $p['id_pengunjung']; ?>"

<?= ($p['id_pengunjung']==$data['id_pengunjung']) ? 'selected' : '' ?>>

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
value="<?= $data['tanggal']; ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Jenis Tiket</label>

<select
name="jenis_tiket"
id="jenis"
class="form-control">

<option
value="Dewasa"
<?= $data['jenis_tiket']=="Dewasa"?"selected":""; ?>>

Dewasa

</option>

<option
value="Anak"
<?= $data['jenis_tiket']=="Anak"?"selected":""; ?>>

Anak

</option>

</select>

</div>

<div class="mb-3">

<label>Harga</label>

<input
type="number"
name="harga"
id="harga"
value="<?= $data['harga']; ?>"
class="form-control"
readonly>

</div>

<div class="mb-3">

<label>Jumlah</label>

<input
type="number"
name="jumlah"
id="jumlah"
value="<?= $data['jumlah']; ?>"
class="form-control">

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

<script>

const jenis=document.getElementById("jenis");
const harga=document.getElementById("harga");
const jumlah=document.getElementById("jumlah");
const total=document.getElementById("total");

function hitung(){

let h=parseInt(harga.value)||0;
let j=parseInt(jumlah.value)||0;

total.value="Rp "+(h*j).toLocaleString("id-ID");

}

function setHarga(){

if(jenis.value=="Dewasa"){

harga.value=50000;

}else{

harga.value=25000;

}

hitung();

}

jenis.addEventListener("change",setHarga);
jumlah.addEventListener("keyup",hitung);
jumlah.addEventListener("change",hitung);

setHarga();

</script>

<?php
include "../includes/footer.php";
?>