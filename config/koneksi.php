<?php

$host="localhost";
$user="root";
$pass="";
$db="museum_nusantara";

$conn=mysqli_connect($host,$user,$pass,$db);

if(!$conn){

die("Koneksi gagal");

}
?>