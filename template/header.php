
<?php
include "config.php";
session_start();
	if($_SESSION['status']!="login"){
		header("location:login1.php");
	}
  function ribuan ($nilai){
    return number_format ($nilai, 0, ',', '.');
}
$result1 = mysqli_query($conn, "SELECT * FROM user");
while($data = mysqli_fetch_array($result1))
{
    $user = $data['username'];
    $id = $data['id_login'];
    $toko = $data['nama_toko'];
    $alamat = $data['alamat'];
    $telp = $data['telepon'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aplikasi Kasir</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="favicon.ico">
  <link rel="icon" href="icon.ico" type="image/ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/responsive.bootstrap4.min.css" rel="stylesheet">
</head>
<body>



<div class="container">