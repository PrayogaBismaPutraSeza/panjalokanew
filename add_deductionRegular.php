<?php
$conn =  new mysqli("localhost", "root", "", "payroll");

?>

<?php

if (isset($_POST['submit']) != "") {
    $emp_id      = $_POST['emp_id'];
    $d_date     = $_POST['d_date'];
    $d_cause     = $_POST['d_cause'];
    $d_amount     = $_POST['d_amount'];
    $d_method     = $_POST['pay_method'];


    $sql = $conn->query("INSERT into deductions(emp_id, d_date, d_cause, d_amount,d_method)VALUES('$emp_id','$d_date','$d_cause','$d_amount','$d_method')");

    if ($sql) {
?>
        <script>
            alert('Pembayaran Berhasil.');
            window.location.href = 'home_salaryRegular.php?page=Salary_list';
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