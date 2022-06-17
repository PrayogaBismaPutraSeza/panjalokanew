<?php

global $paidThisMonth;
global $previous_due;

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

 ?>
