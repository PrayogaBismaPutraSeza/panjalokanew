<?php

include("db.php");
include("auth.php");

$id         = $_POST['id'];
$name      = $_POST['name'];
$mobile     = $_POST['mobile'];
$address    = $_POST['address'];
$details   = $_POST['details'];


$query  = "UPDATE company SET name='$name', mobile='$mobile', address='$address' , details='$details' WHERE id='$id'";
$sql = $conn->query($query);
if ($sql) {
?>
  <script>
    alert('Supplier berhasil di ubah');
    window.location.href = 'home_company.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Invalid action');
    window.location.href = 'home_employee.php';
  </script>
<?php
}
?>