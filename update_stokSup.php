<?php

include("db.php");

$b_id         = $_POST['b_id'];
$quantity   = $_POST['result'];


$query  = "UPDATE buy SET banyak='$quantity' WHERE b_id='$b_id'";
$sql = $conn->query($query);
if ($sql) {
?>
  <script>
    alert('Stock Supply kuantitas berhasil update.');
    window.location.href = 'home_supply.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Invalid action.');
    window.location.href = 'home_supply.php';
  </script>
<?php
}

?>