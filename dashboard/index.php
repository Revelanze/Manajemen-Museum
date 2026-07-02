<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

// Hitung data
$pengunjung = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pengunjung"));
$tiket      = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tiket"));
$koleksi    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM koleksi"));
$kategori   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Museum Nusantara</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

body{
    background:#f4f6f9;
}

.sidebar{
    position:fixed;
    width:250px;
    height:100%;
    background:#0d6efd;
    color:white;
}

.sidebar h3{
    text-align:center;
    padding:20px;
}

.sidebar a{
    color:white;
    display:block;
    padding:15px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#0b5ed7;
}

.content{
    margin-left:250px;
    padding:20px;
}

.card{
    border:none;
    border-radius:15px;
}

    </style>

</head>

<body>

<div class="sidebar">

<h3>🏛 Museum</h3>

<a href="../dashboard/">
<i class="fa fa-home"></i> Dashboard
</a>

<a href="../pengunjung/">
<i class="fa fa-users"></i> Pengunjung
</a>

<a href="../tiket/">
<i class="fa fa-ticket"></i> Tiket
</a>

<a href="../kategori/">
<i class="fa fa-folder"></i> Kategori
</a>

<a href="../koleksi/">
<i class="fa fa-landmark"></i> Koleksi
</a>

<a href="../laporan/">
<i class="fa fa-print"></i> Laporan
</a>

<a href="../auth/logout.php">
<i class="fa fa-sign-out-alt"></i> Logout
</a>

</div>

<div class="content">

<h2>Dashboard</h2>

<p>Selamat datang,
<b><?php echo $_SESSION['nama']; ?></b>

</p>

<div class="row">

<div class="col-md-3">

<div class="card shadow text-center">

<div class="card-body">

<h1>👥</h1>

<h5>Pengunjung</h5>

<h2><?= $pengunjung ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow text-center">

<div class="card-body">

<h1>🎫</h1>

<h5>Tiket</h5>

<h2><?= $tiket ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow text-center">

<div class="card-body">

<h1>🏛</h1>

<h5>Koleksi</h5>

<h2><?= $koleksi ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow text-center">

<div class="card-body">

<h1>📂</h1>

<h5>Kategori</h5>

<h2><?= $kategori ?></h2>

</div>

</div>

</div>

</div>

<hr>

<div class="card shadow mt-4">

<div class="card-body">

<h4>Grafik Data</h4>

<canvas id="grafik"></canvas>

</div>

</div>

</div>

<script>

const ctx = document.getElementById('grafik');

new Chart(ctx,{

type:'bar',

data:{

labels:['Pengunjung','Tiket','Koleksi','Kategori'],

datasets:[{

label:'Jumlah Data',

data:[
<?= $pengunjung ?>,
<?= $tiket ?>,
<?= $koleksi ?>,
<?= $kategori ?>
]

}]

}

});

</script>

</body>
</html>