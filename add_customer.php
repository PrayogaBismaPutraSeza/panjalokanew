<?php

?>

<?php

if(isset($_POST['submit'])!="")
{
    $name      = $_POST['name'];
    $address      = $_POST['address'];
    $mobile     = $_POST['mobile'];
    $details      = $_POST['details'];

    $sql = $conn->query("INSERT into customer(name, address, mobile, delete_status, details)VALUES('$name','$address','$mobile', '0', '$details')");

    if($sql)
    {
        ?>
        <script>
            alert('Customer had been successfully added.');
            window.location.href='home_customer.php?page=customer_list';
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
