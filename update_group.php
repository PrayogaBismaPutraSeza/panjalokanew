<?php

  include("db.php");

  $s_id         = $_POST['s_id'];
  $g_id     = $_POST['g_id'];
  $g_name    = $_POST['g_name'];


$query  = "UPDATE compaygroup SET g_id='$g_id', g_name='$g_name' WHERE s_id='$s_id'";
$sql = $conn->query($query);
  if ($sql)
  {
    ?>
    <script>
      alert('Company Group successfully updated.');
      window.location.href='home_company.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='home_employee.php';
    </script>
    <?php
  }
?>
