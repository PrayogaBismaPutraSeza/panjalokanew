<?php

include("db.php");

$id           = $_POST['id'];
$salary_rate     = $_POST['salary'];
$bonus        = $_POST['bonus'];

$query4  = "SELECT emp_type from employee where emp_id = $id";
$q4 = $conn->query($query4);
while ($row4 = $q4->fetch_assoc()) {
  if ($row4['emp_type'] == "Casual") {
    $casual = true;
  }
}

$sql = $conn->query("UPDATE employee SET salary='$salary_rate', bonus='$bonus' WHERE emp_id='$id'");

$netpay     = $_POST['netpay'];
$advanceSalary     = $_POST['new_advance'];
$pay_amount        = $_POST['total_paid'];
$paid_in_cash       = $_POST['paid_in_cash'];
$paid_in_bkash       = $_POST['paid_in_bkash'];
$due_status = $_POST['due_status'];
$advance_status = $_POST['advance_status'];
$remark = $_POST['remark'];
$emp_type = $_POST['emp_type'];
$ADpay_id = $_POST['ADpay_id'];
if ($emp_type == "Regular") {
  $location = "home_salaryRegular.php";
} else if ($emp_type == "Tetap") {
  $location = "home_salaryCasual.php";
} else {
  $location = "home_salaryJobOrder.php";
}
date_default_timezone_set("Asia/Jakarta");
$pay_date = date("Y-m-d");
$pay_status = "1";
$thisMonth = date("m");
$thisYear = date("Y");
if ($ADpay_id != 0) {
  $updatePreviousPayments = $conn->query("UPDATE payment SET due_status = '0',due = '0',advance_status = '0',advance = '0' WHERE pay_id='" . $ADpay_id . "'");
}
$addPayment = $conn->query("INSERT into payment(emp_id, pay_date,pay_amount, paid_in_cash, paid_in_bkash, due, due_status,advance, advance_status,pay_remark, pay_status)VALUES('$id','$pay_date','$pay_amount','$paid_in_cash','$paid_in_bkash','$netpay','$due_status','$advanceSalary','$advance_status','$remark','$pay_status')", MYSQLI_USE_RESULT);

if ($sql && $addPayment) {
?>
  <script>
    alert('Account successfully updated.');
    window.location.href = '<?php echo $location; ?>';
  </script>

<?php
  $deleteDeductions = $conn->query("DELETE FROM deductions WHERE emp_id='" . $id . "'");
  if ($casual) {
    $deleteWorkingDays = $conn->query("DELETE FROM works WHERE emp_id='" . $id . "'");
  }
} else {
  echo "Invalid";
}
?>