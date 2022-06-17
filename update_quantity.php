<?php

  include("db.php");

  $p_id         = $_POST['p_id'];
  $quantity   = $_POST['result'];


$query  = "UPDATE product SET stock='$quantity' WHERE p_id='$p_id'";
$sql = $conn->query($query);
  if ($sql)
  {
    ?>
    <script>
      alert('Prroduct stock quantity successfully updated.');
      window.location.href='home_store.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='home_store.php';
    </script>
    <?php
  }

?>
