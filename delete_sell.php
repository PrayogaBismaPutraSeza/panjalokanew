<?php
require('db.php');

	$s_id=$_GET['s_id'];


  $deleteProduct= $conn->query("UPDATE  sell set delete_status='1' WHERE s_id='".$s_id."'");
  if($deleteProduct)
  {
    ?>
          <script>
              alert('Sell successfully deleted...');
              window.location.href='home_sell.php';
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
