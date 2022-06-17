<?php

?>

<?php


if(isset($_POST['submit'])!="")
{

    $t_date  = date('Y-m-d', strtotime($_POST['date']));
    $cause =$_POST['cause'];
    $amount  =$_POST['amount'];
    $method  =$_POST['method'];

    $sql = $conn->query("INSERT into transaction(t_date, amount, cause, method)VALUES('$t_date','$amount','$cause', '$method')");

    if($sql)
    {
        ?>
        <script>
            alert('Transaction has been successfully added.');
            window.location.href='dailyTransactions.php?page=transaction_list';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
        <?php
    }
}
?>
