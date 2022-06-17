<?php 

  include("db.php");
  include("auth.php");

  $id           = $_POST['id'];
  $advance    = $_POST['advance'];
  $salary_rate    = $_POST['salary_rate'];
  $bonus        = $_POST['bonus'];

  $sql = $conn->query("UPDATE salary SET salary_rate='$salary_rate', advance='$advance', bonus='$bonus' WHERE emp_id='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Account successfully updated.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    echo "Invalid";
  }
?>