<?php

include("db.php");
include("auth.php");

$id         = $_POST['id'];
$lname      = $_POST['lname'];
$fname      = $_POST['fname'];
$mobile     = $_POST['mobile'];
$gender     = $_POST['gender'];
$division   = $_POST['division'];
$emp_type   = $_POST['emp_type'];
$salary_rate   = $_POST['salary'];


$query  = "UPDATE employee SET emp_type='$emp_type', lname='$lname', fname='$fname', gender='$gender', division='$division' , mobileNo='$mobile', salary = '$salary_rate' WHERE emp_id='$id'";
$sql = $conn->query($query);
if ($sql) {
?>
  <script>
    alert('Pegawai berhasil di update.');
    window.location.href = 'home_employee.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Invalid action.');
    window.location.href = 'home_employee.php';
  </script>
<?php
}
?>