<?php
require('db.php');

$idpelanggan = $_GET['idpelanggan'];

$deleteCustomer = $conn->query("DELETE FROM pelanggan WHERE idpelanggan=$idpelanggan");
if ($deleteCustomer) {
?>
    <script>
        alert('Pelanggan berhasil dihapus');
        window.location.href = 'pelanggan.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Error Acures');
        window.location.href = 'pelanggan.php';
    </script>
<?php
}
?>