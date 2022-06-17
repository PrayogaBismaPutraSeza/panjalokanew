<?php

?>

<?php

if(isset($_POST['submit'])!="")
{
    $name      = $_POST['name'];
    $address      = $_POST['address'];
    $mobile     = $_POST['mobile'];
    $details      = $_POST['details'];

    $sql = $conn->query("INSERT into company(name, address, mobile, delete_status, details)VALUES('$name','$address','$mobile', '0', '$details')");

    if($sql)
    {
        ?>
        <script>
            alert('Company had been successfully added.');
            window.location.href='home_company.php?page=company_list';
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
