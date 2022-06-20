<?php
require('db.php');

$id = $_GET['id'];

$deleteCustomer = $conn->query("DELETE FROM customer WHERE id=$id");
if ($deleteCustomer) {
?>
    <script>
        alert('Customer berhasil dihapus');
        window.location.href = 'home_customer.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Error Acures');
        window.location.href = 'home_customer.php';
    </script>
<?php
}
?>