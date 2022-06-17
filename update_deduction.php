<?php 

  include("db.php");
  include("auth.php");

  $id         = $_POST['id'];
  $emp_id         = $_POST['emp_id'];
  date_default_timezone_set("Asia/Dhaka");
  $d_date = date('Y-m-d', strtotime($_POST['d_date']));
  $d_cause      = $_POST['d_cause'];
  $d_amount     = $_POST['d_amount'];
  $remark    = $_POST['remark'];
  $type = $_POST['type'];
  
  if($type=="1"){
        $location="edit_regularAccount.php";
    }
    else if($type=="2"){
        $location="edit_casualAccount.php";
    }
    else if($type=="3"){
        $location="edit_jobOrderAccount.php";
    }
    else{
        $$location="home_salaryRegular.php";
    }


$query  = "UPDATE deductions SET d_date='$d_date', d_cause='$d_cause', d_amount='$d_amount', remark='$remark' WHERE deduction_id='$id'";
$sql = $conn->query($query);
  if ($sql)
  {
    ?>
    <script>
      alert('Employee Deduction successfully updated.');
      window.location.href="<?php echo $location;?>?emp_id=<?php echo $emp_id;?>";
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href="edit_regularAccount.php?emp_id=<?php echo $emp_id;?>";
    </script>
    <?php 
  }
?>