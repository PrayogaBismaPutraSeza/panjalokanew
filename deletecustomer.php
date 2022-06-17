<?php
require('db.php');

	$id=$_GET['id'];

  $deleteCustomer = $conn->query("UPDATE  customer set delete_status='1' WHERE id='".$id."'");
  if($deleteCustomer)
  {
    ?>
          <script>
              alert('Customer successfully deleted...');
              window.location.href='home_customer.php';
          </script>
      <?php
  }
  else {
    ?>
          <script>
              alert('Error Acures');
              window.location.href='home_customer.php';
          </script>
      <?php
  }
 ?>