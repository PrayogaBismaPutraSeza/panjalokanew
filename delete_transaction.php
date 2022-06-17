<?php
require('db.php');

	$sno=$_GET['sno'];


  $deleteProduct= $conn->query("UPDATE  transaction set delete_status='1' WHERE sno='".$sno."'");

  if($deleteProduct)
  {
    ?>
          <script>
              alert('Transaction successfully deleted...');
              window.location.href='dailyTransactions.php';
          </script>
      <?php
  }
  else {
    ?>
          <script>
              alert('Error Acures');
              window.location.href='dailyTransactions.php';
          </script>
      <?php
  }
 ?>
