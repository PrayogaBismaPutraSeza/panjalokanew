<?php
require('db.php');

$s_id = $_GET['s_id'];


$deleteProduct = $conn->query("DELETE FROM sell WHERE s_id=$s_id");
if ($deleteProduct) {
?>
    <script>
        alert('Penjualan berhasil dihapus');
        window.location.href = 'home_sell.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Error Acures');
        window.location.href = 'home_sell.php';
    </script>
<?php
}
?>