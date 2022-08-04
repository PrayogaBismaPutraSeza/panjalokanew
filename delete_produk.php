<?php
require('db.php');

$idproduk = $_GET['idproduk'];

$deleteProduk = $conn->query("DELETE FROM produk WHERE idproduk=$idproduk");
if ($deleteProduk) {
?>
    <script>
        alert('Produk berhasil dihapus');
        window.location.href = 'produk.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Error Acures');
        window.location.href = 'produk.php';
    </script>
<?php
}
?>