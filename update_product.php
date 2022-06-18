<?php

include("db.php");

$p_id         = $_POST['p_id'];
$p_name      = $_POST['p_name'];
$company     = $_POST['company'];
$type    = $_POST['type'];
$quantity   = $_POST['quantity'];
$price  = $_POST['price'];


$query  = "UPDATE product SET p_name='$p_name', p_company='$company', p_type='$type' , p_quantity='$quantity',price = '$price' WHERE p_id='$p_id'";
$sql = $conn->query($query);
if ($sql) {
?>
  <script>
    alert('Produk berhasil diubah.');
    window.location.href = 'home_store.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Invalid action.');
    window.location.href = 'home_store.php';
  </script>
<?php
}
?>