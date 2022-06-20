<?php
require('db.php');

$sno = $_GET['sno'];


$deleteProduct = $conn->query("DELETE FROM transaction WHERE sno=$sno ");

if ($deleteProduct) {
?>
    <script>
        alert('Transaksi berhasil dihapus');
        window.location.href = 'dailyTransactions.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Error Acures');
        window.location.href = 'dailyTransactions.php';
    </script>
<?php
}
?>