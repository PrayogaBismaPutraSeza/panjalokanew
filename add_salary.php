<?php
$conn =  new mysqli("localhost","root","","payroll");

?>

<?php

if(isset($_POST['submit'])!="")
{
    global $location;
    global $idFound;
    $idFound = false;
    $emp_id      = $_POST['emp_id'];
    $salary_rate      = $_POST['salary_rate'];
    $salary_type     = $_POST['salary_type'];

    if($salary_type==1)
    {
      $location = "home_salaryRegular.php?page=salary_list";
      $type = "Regular";
    }
    else if($salary_type==2)
    {
      $location = "home_salaryCasual.php?page=salary_list";
      $type = "Casual";
    }else
    {
      $location = "home_salaryJobOrder.php?page=salary_list";
      $type = "Job Order";
    }


    if($emp_id=="all"){

        $sql = $conn->query("UPDATE employee SET bonus = '$salary_rate' WHERE emp_type = '".$type."'");


      if($sql)
      {
          ?>
          <script>
              alert('Employee Bonus had been successfully added.');
              window.location.href='<?php echo $location?>';
          </script>
          <?php
      }

      else
      {
          ?>
          <script>
              alert('Invalid.');
              window.location.href='<?php echo $location?>';
          </script>
          <?php
      }

    }else{
      $sql = $conn->query("UPDATE employee SET bonus = '$salary_rate' WHERE emp_id = '".$emp_id."'");

      if($sql)
      {
          ?>
          <script>
              alert('Employee Bonus has been successfully added.');
              window.location.href='<?php echo $location?>';
          </script>
          <?php
      }

      else
      {
          ?>
          <script>
              alert('Invalid.');
              window.location.href='<?php echo $location?>';
          </script>
          <?php
      }
    }
}
?>
