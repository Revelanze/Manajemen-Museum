<?php
session_start();
include "../config/koneksi.php";

if(isset($_SESSION['login'])){
    header("Location: ../dashboard/");
    exit;
}

$error="";

if(isset($_POST['login'])){

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$query=mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");

if(mysqli_num_rows($query)>0){

$user=mysqli_fetch_assoc($query);

if($password==$user['password']){

$_SESSION['login']=true;
$_SESSION['id_user']=$user['id_user'];
$_SESSION['nama']=$user['nama'];
$_SESSION['role']=$user['role'];

header("Location: ../dashboard/");
exit;

}else{

$error="Password salah.";

}

}else{

$error="Username tidak ditemukan.";

}

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Login Museum Nusantara</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

background:linear-gradient(135deg,#0d6efd,#003366);

height:100vh;

display:flex;

justify-content:center;

align-items:center;

}

.card{

width:420px;

border-radius:20px;

}

.logo{

width:120px;

}

</style>

</head>

<body>

<div class="card shadow">

<div class="card-body p-4">

<div class="text-center">

<img src="../assets/logo.png" class="logo">

<h3 class="mt-3">

Museum Nusantara

</h3>

<p>

Sistem Informasi Museum

</p>

</div>

<?php if($error!=""){ ?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label>Username</label>

<input

type="text"

name="username"

class="form-control"

required>

</div>

<div class="mb-3">

<label>Password</label>

<input

type="password"

name="password"

class="form-control"

required>

</div>

<button

class="btn btn-primary w-100"

name="login">

LOGIN

</button>

</form>

<hr>

<div class="text-center">

<b>Kelompok</b>

<br>

I Gusti Bagus Ryandra Jaya Wiguna 

<br>

A.A Gede Wahyu Prasada

<br>

Sang Putu Adistya Deva Yastra

<br><br>

ITB STIKOM BALI

</div>

</div>

</div>

</body>

</html>