<?php
require('db.php');

	$b_id=$_GET['b_id'];


  $deleteProduct= $conn->query("UPDATE  buy set delete_status='1' WHERE b_id='".$b_id."'");
  if($deleteProduct)
  {
    ?>
          <script>
              alert('Buy Supply successfully deleted...');
              window.location.href='home_supply.php';
          </script>
      <?php
  }
  else {
    ?>
          <script>
              alert('Error Acures');
              window.location.href='home_sell.php';
          </script>
      <?php
  }
 ?>
