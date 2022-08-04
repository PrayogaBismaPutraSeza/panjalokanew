<?php

include("db.php");
include("auth.php");

$idpelanggan         = $_POST['idpelanggan'];
$nama_pelanggan      = $_POST['nama_pelanggan'];
$telepon_pelanggan     = $_POST['telepon_pelanggan'];
$alamat_pelanggan    = $_POST['alamat_pelanggan'];


$query  = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan',telepon_pelanggan='$telepon_pelanggan',alamat_pelanggan='$alamat_pelanggan' WHERE idpelanggan='$idpelanggan' ";
$sql = $conn->query($query);
if ($sql) {
?>
  <script>
    alert('Pelanggan berhasil di ubah.');
    window.location.href = 'pelanggan.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Invalid action.');
    window.location.href = 'pelanggan.php';
  </script>
<?php
}
?>