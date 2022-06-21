<?php
include("php/sqlCon.php");

?>
<?php

if (isset($_POST['submit']) != "") {
    $billsno      = $_POST['billsno'];
    $bill_no      = $_POST['bill_no'];
    $group_id      = $_POST['group'];
    $work_type      = $_POST['work_type'];
    $work_area    = $_POST['area'];
    $company_type = $_POST['type'];




    date_default_timezone_set("Asia/Dhaka");
    $bill_date = date('Y-m-d', strtotime($_POST['given_date']));

    $qty      = $_POST['qty'];
    $rate      = $_POST['rate'];
    $bill_amount     = $_POST['bill_amount'];
    $remark     = $_POST['remark'];


    $sql = $conn->query("INSERT into companybill(bill_no,billsno,company_group_id,work_type,work_area,square_fit,rate,bill_date,bill_amount,remark)
    VALUES('$bill_no','$billsno','$group_id','$work_type','$work_area','$qty','$rate','$bill_date','$bill_amount','$remark')");

    if ($sql) {
?>
        <script>
            //  alert('Company Bill has been successfully added.');//
            window.location.href = "edit_bill.php?billsno=<?php echo $billsno ?>";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid.');
            window.location.href = "edit_bill.php?billsno=<?php echo $billsno ?>";
        </script>
<?php
    }
}
?>


<?php

if (isset($_POST['submitbill']) != "") {
    $bill_id      = $_POST['bill_id'];
    $company_id      = $_POST['company'];
    $type = $_POST['type'];

    if ($type == "1") {
        $location = "home_bill.php";
    } else if ($type == "2") {
        $location = "home_billThirdparty.php";
    }


    $sql = $conn->query("INSERT into bill(bill_id,company_id)VALUES('$bill_id','$company_id')");

    if ($sql) {
?>
        <script>
            //alert('Company Bill has been successfully added.');//
            window.location.href = "<?php echo $location; ?>";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid.');
            window.location.href = '<?php echo $location; ?>';
        </script>
<?php
    }
}
?>

<?php

if (isset($_POST['setAsPaid']) != "") {

    $company_id      = $_POST['company_id'];
    $billsno     = $_POST['billsno'];
    $remark      = $_POST['remark'];
    $reduced     = $_POST['reduced'];
    $totalBill      = $_POST['totalBill'];
    $receive_amount     = $_POST['npaid'];

    date_default_timezone_set("Asia/Dhaka");
    $receive_date = date("l, F d, Y");


    $sqlInsert = $conn->query("INSERT into billreceived(billsno,totoal_bill,received_date,received_amount,reduced,remark,pay_status)VALUES('$billsno','$totalBill','$receive_date','$receive_amount','$reduced','$remark','1')");
    $sqlUpdate = $conn->query("UPDATE companybill SET remark='$remark', pay_status='1' where billsno = '" . $billsno . "' ");

    if ($sqlInsert && $sqlUpdate) {
?>
        <script>
            alert('Company Bill has been successfully updated.');
            window.location.href = 'home_bill.php?page=emp_list';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid.');
            window.location.href = 'home_bill.php';
        </script>
<?php
    }
}
?>

<?php

if (isset($_POST['submitnew']) != "") {
    $s_id     = $_POST['s_id'];
    $remark      = $_POST['remark'];
    date_default_timezone_set("Asia/Dhaka");
    $receive_amount     = $_POST['received_amount'];
    $received_date = date('Y-m-d', strtotime($_POST['received_date']));
    $due = $_POST['due'];


    $query2 = "SELECT receive_amount from companybill where s_id = '" . $s_id . "'";
    $q2 = $conn->query($query2);
    while ($row2 = $q2->fetch_assoc()) {
        $totalbill = $totalbill + $row2["receive_amount"];
    }

    $totalbill = $totalbill + $receive_amount;

    $sqlInsert = $conn->query("INSERT into receivedbill(s_id,bill_date,amount,remark)VALUES('$s_id','$received_date','$receive_amount','$remark')");

    $sqlUpdate = $conn->query("UPDATE companybill SET remark='$remark', pay_status='2', receive_date = '$received_date', receive_amount = '$totalbill', reduced='$due'  where s_id = '" . $s_id . "'");

    if ($sqlInsert && $sqlUpdate) {
?>
        <script>
            alert('Company Bill has been successfully updated.');
            window.location.href = "view_bill.php?bill_no=<?php echo $s_id ?>";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid.');
            window.location.href = "view_bill.php?bill_no=<?php echo $s_id ?>";
        </script>
<?php
    }
}
?>