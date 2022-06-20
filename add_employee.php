<?php

?>

<?php

if (isset($_POST['submit']) != "") {
  $emp_id      = $_POST['emp_id'];
  $lname      = $_POST['lname'];
  $fname      = $_POST['fname'];
  $mobile      = $_POST['mobile'];
  $gender     = $_POST['gender'];
  $type       = $_POST['emp_type'];
  $division   = $_POST['division'];
  $salary_rate   = $_POST['salary_rate'];

  $sql = $conn->query("INSERT into employee(lname, fname, gender, emp_type, division,mobileNo,salary)VALUES('$lname','$fname','$gender', '$type', '$division', '$mobile', '$salary_rate')");
  $sql1 = $conn->query("INSERT into salary(emp_id, salary_rate)VALUES('$emp_id','$salary_rate')");

  if ($sql && $sql1) {
?>
    <script>
      alert('Pegawai berhasil ditambahkan');
      window.location.href = 'home_employee.php?page=emp_list';
    </script>
  <?php
  } else {
  ?>
    <script>
      alert('Invalid.');
      window.location.href = 'index.php';
    </script>
<?php
  }
}
?>