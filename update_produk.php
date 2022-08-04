<?php

include("db.php");
include("auth.php");

$idproduk      = $_POST['idproduk'];
$idkategori      = $_POST['idkategori'];
$kode_produk      = $_POST['kode_produk'];
$nama_produk      = $_POST['nama_produk'];
$harga_modal      = $_POST['harga_modal'];
$harga_jual      = $_POST['harga_jual'];
$stock           = $_POST['stock'];


$query  = "UPDATE produk SET idkategori='$idkategori',nama_produk='$nama_produk',kode_produk='$kode_produk' WHERE idproduk='$idproduk' ";
$sql = $conn->query($query);
if ($sql) {
?>
    <script>
        alert('Produk berhasil di ubah.');
        window.location.href = 'produk.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Invalid action.');
        window.location.href = 'produk.php';
    </script>
<?php
}
?>