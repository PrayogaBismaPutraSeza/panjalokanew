<?php
require('db.php');

$id = $_GET['id'];
$deleteProduksi = $conn->query("DELETE FROM produksi WHERE id=$id");

if ($deleteProduksi) {
?>
    <script>
        alert('Produksi Berhasil Dihapus');
        window.location.href = 'home_produksi.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Produksi Gagal Dihapus');
        window.location.href = 'home_produksi.php';
    </script>
<?php
}
?>