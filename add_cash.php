<?php
$conn =  new mysqli("localhost","root","","payroll");

?>
<?php

if(isset($_POST['submitcash'])!="")
{
  date_default_timezone_set("Asia/Dhaka");
  $given_date = date('Y-m-d', strtotime($_POST['given_date']));

    $amount     = $_POST['amount'];
    $remark      = $_POST['remark'];


    $sql = $conn->query("INSERT into cash(given_date,amount,remark)VALUES('$given_date','$amount','$remark')");

    if($sql)
    {
        ?>
        <script>
            alert('Company Cash has been successfully added.');
            window.location.href='home_cash.php?page=Given_cash_list';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Invalid.');
            window.location.href='home_cash.php';
        </script>
        <?php
    }
}
?>
