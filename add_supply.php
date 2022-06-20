<?php





?>

<?php

if(isset($_POST['submit'])!="") 
{

    $p_name  =$_POST['p_name'];
    $company =$_POST['company'];
    $banyak =$_POST['banyak'];
    $harga   =$_POST['harga'];
    $total  =$_POST['total'];

    date_default_timezone_set("Asia/Jakarta");
    $given_date = date('Y-m-d', strtotime($_POST['given_date']));


    $addSupply = $conn->query("INSERT into buy(given_date,p_name, company, banyak, harga, total)VALUES('$given_date','$p_name','$company','$banyak','$harga', '$total')");

    if($addSupply)
    {
        ?>
        <script>
            alert('Suppply has been buy.');
            window.location.href='home_supply.php?page=buy_list';
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
