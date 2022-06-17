<?php
$conn =  new mysqli("localhost","root","","payroll");

?>

<?php

if(isset($_POST['submit'])!="")
{
    global $paidThisMonth;
    global $previous_due;
    global $due_status;
    global $pay_status;
    global $deduction;


    $emp_id      = $_POST['id'];

    date_default_timezone_set("Asia/Dhaka");
    $due_date = date("Y-m-d");

    $query7  = "SELECT * from payment where emp_id ='".$emp_id."'";
    $q7 = $conn->query($query7);
    $paidThisMonth = "false";
    while($row7 = $q7->fetch_assoc()) {

        date_default_timezone_set("Asia/Dhaka");
        $thisMonth = date("m");
        $payiedMonth = date('m', strtotime($row7['pay_date']));

        if ($payiedMonth == $thisMonth && $emp_id == $row7['emp_id']) {
            $paidThisMonth = "true";

        }
        else
        {
            $paidThisMonth = "false";
        }
    }


    if($paidThisMonth == "false")
    {

        $emp_id      = $_POST['id'];
        $pay_date      = date("Y-m-d");
        $pay_amount      = $_POST['pay'];
        $pay_method      = $_POST['pay_method'];
        $salary      = $_POST['salary'];
        $current_due = $_POST['due'];

        if($current_due>0){
          $due_status = '1';
          $pay_status = '0';
        }else{
          $due_status = '0';
          $pay_status = '0';
        }

        $thisDate =  date("Y-m-d");
        $query8 = "SELECT * from payment where emp_id ='".$emp_id."' and pay_date <>'".$thisDate."'";
        $q8 = $conn->query($query8);
        while($row8 = $q8->fetch_assoc()){

            $previous_due = $row8["due"];

        }

        $query4  = "SELECT d_amount from deductions where emp_id ='".$emp_id."'";
        $q4 = $conn->query($query4);
        while($row4 = $q4->fetch_assoc()){
            $deduction = $deduction + $row4['d_amount'];
        }

        if($previous_due>0){
          $pay_amount = $pay_amount - $previous_due;
          $updateDue = $conn->query("UPDATE payment SET due = '0', due_status = '0',pay_status='1' WHERE emp_id = '$emp_id' AND due_status = '1'", MYSQLI_USE_RESULT);
        }

      
        $addPayment = $conn->query("INSERT into payment(emp_id, pay_date, pay_amount, pay_method, due, due_status, pay_status)VALUES('$emp_id','$pay_date','$pay_amount','$pay_method','$current_due','$due_status','$pay_status')", MYSQLI_USE_RESULT);



        if($addPayment)
        {
            ?>
            <script>
                alert('Payment has been successfully paid ');
                window.location.href='home_payment.php?page=payment_list';
            </script>


            <?php
            if (!$conn->query("SET @a:='this will not work'")) {
                printf("Error: %s\n", $conn->error);
            }
        }
        else
        {
            ?>
            <script>
                alert('Invalid.');
                window.location.href='home_payment.php?page=payment_list';
            </script>
            <?php
        }


    }
    else{

        ?>
        <script>
            alert('Already paid in this month. Try again next month');
            window.location.href='home_payment.php?page=payment_list';
        </script>
        <?php

    }
  }

    if(isset($_POST['submitAsPaid'])!="")
    {
        global $paidThisMonth;
        global $previous_due;
        $emp_id      = $_POST['id'];

        date_default_timezone_set("Asia/Dhaka");
        $due_date = date("Y-m-d");

        $query7  = "SELECT * from payment where emp_id ='".$emp_id."'";
        $q7 = $conn->query($query7);
        $paidThisMonth = "false";
        while($row7 = $q7->fetch_assoc()) {

            date_default_timezone_set("Asia/Dhaka");
            $thisMonth = date("m");
            $payiedMonth = date('m', strtotime($row7['pay_date']));

            if ($payiedMonth == $thisMonth && $emp_id == $row7['emp_id']) {
                $paidThisMonth = "true";

            }
            else
            {
                $paidThisMonth = "false";
            }
        }


        if($paidThisMonth == "false")
        {

            $emp_id      = $_POST['id'];
            $pay_date      = date("Y-m-d");
            $pay_amount      = $_POST['pay'];
            $pay_method      = $_POST['pay_method'];
            $salary      = $_POST['salary'];
            $current_due = $_POST['due'];
            $due_d = $_POST['due_date'];

            $thisDate =  date("Y-m-d");
            $query8 = "SELECT * from payment where emp_id ='".$emp_id."' and pay_date <>'".$thisDate."'";
            $q8 = $conn->query($query8);
            while($row8 = $q8->fetch_assoc()){

                $previous_due = $row8["due"];

            }
            $pay_amount = $pay_amount - $previous_due;

            $addPayment = $conn->query("INSERT into payment(emp_id, pay_date, pay_amount, pay_method, due)VALUES('$emp_id','$pay_date','$pay_amount','$pay_method','$current_due')", MYSQLI_USE_RESULT);
            $updateDue = $conn->query("UPDATE payment SET due = 0 WHERE emp_id = '$emp_id' AND pay_date = '$due_d'", MYSQLI_USE_RESULT);


            if($addPayment && $updateDue)
            {
                ?>
                <script>
                    alert('Payment has been successfully paid ');
                    window.location.href='home_payment.php?page=payment_list';
                </script>


                <?php
                if (!$conn->query("SET @a:='this will not work'")) {
                    printf("Error: %s\n", $conn->error);
                }
            }
            else
            {
                ?>
                <script>
                    alert('Invalid.');
                    window.location.href='home_payment.php?page=payment_list';
                </script>
                <?php
            }


        }
        else{

            ?>
            <script>
                alert('Already paid in this month. Try again next month');
                window.location.href='home_payment.php?page=payment_list';
            </script>
            <?php

        }










}
$conn->close();
?>
