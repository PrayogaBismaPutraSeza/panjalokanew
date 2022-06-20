<?php
require('db.php');

$id = $_GET['id'];
$deleteCompany = $conn->query("DELETE FROM company WHERE id=$id");

if ($deleteCompany) {
?>
  <script>
    alert('Supplier berhasil di hapus');
    window.location.href = 'home_company.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Error Acures');
    window.location.href = 'home_company.php';
  </script>
<?php
}
?>