<?php

include("db.php");
include("auth.php");

$id         = $_POST['id'];
$name      = $_POST['name'];
$mobile     = $_POST['mobile'];
$address    = $_POST['address'];
$details   = $_POST['details'];


$query  = "UPDATE customer SET name='$name', mobile='$mobile', address='$address' , details='$details' WHERE id='$id'";
$sql = $conn->query($query);
if ($sql) {
?>
  <script>
    alert('Customer berhasil di ubah.');
    window.location.href = 'home_customer.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Invalid action.');
    window.location.href = 'home_customer.php';
  </script>
<?php
}
?>