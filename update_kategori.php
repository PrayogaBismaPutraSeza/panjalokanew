<?php

include("db.php");
include("auth.php");

$idkategori         = $_POST['idkategori'];
$nama_kategori      = $_POST['nama_kategori'];
$tgl_dibuat     = $_POST['tgl_dibuat'];


$query  = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE idkategori='$idkategori'";
$sql = $conn->query($query);
if ($sql) {
?>
    <script>
        alert('Kategori berhasil di ubah.');
        window.location.href = 'kategori.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Invalid action.');
        window.location.href = 'kategori.php';
    </script>
<?php
}
?>