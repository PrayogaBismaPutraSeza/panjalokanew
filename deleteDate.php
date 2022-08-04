<?php
require('db.php');

$w_date = $_GET['w_date'];

$deleteDate = $conn->query("DELETE FROM works WHERE w_date=$w_date");
if ($deleteDate) {
?>
    <script>
        alert('Tanggal berhasil dihapus');
        window.location.href = 'edit_casualAccount.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Error Acures');
        window.location.href = 'edit_casualAccount.php';
    </script>
<?php
}
?>