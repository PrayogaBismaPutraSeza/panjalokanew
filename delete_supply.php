<?php
require('db.php');

$b_id = $_GET['b_id'];


$deleteProduct = $conn->query("DELETE FROM buy  WHERE b_id=$b_id");
if ($deleteProduct) {
?>
    <script>
        alert('Buy Supply berhasil dihapus');
        window.location.href = 'home_supply.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Error Acures');
        window.location.href = 'home_supply.php';
    </script>
<?php
}
?>