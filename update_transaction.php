<?php

  include("db.php");

  $sno        = $_POST['sno'];
  date_default_timezone_set("Asia/Dhaka");
  $date      = date('Y-m-d', strtotime($_POST['d_date']));
  $amount     = $_POST['amount'];
  $cause    = $_POST['cause'];
  $remark    = $_POST['remark'];


$query  = "UPDATE transaction SET t_date='$date', amount='$amount', cause='$cause' , remark='$remark' WHERE sno='$sno'";
$sql = $conn->query($query);
  if ($sql)
  {
    ?>
    <script>
      alert('transaction successfully updated.');
      window.location.href='dailyTransactions.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='dailyTransactions.php';
    </script>
    <?php
  }
?>
