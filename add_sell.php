<?php





?>

<?php

if(isset($_POST['submit'])!="") 
{
    include("db.php");
    $p_name  =$_POST['p_name'];
    $banyak =$_POST['banyak'];
    $harga   =$_POST['harga'];
    $total  =$_POST['total'];

    $p_id         = $_POST['p_id'];
    $quantity   = $_POST['result'];

    $sellProduct = $conn->query("INSERT into sell(p_name, banyak, harga, total)VALUES('$p_name','$banyak','$harga', '$total')");
    $query  = "UPDATE product SET stock='$quantity' WHERE p_id='$p_id'";
    $sql = $conn->query($query);

    if($sellProduct && $sql)
    {
        ?>
        <script>
            alert('Product has been sold.');
            window.location.href='home_sell.php?page=sell_list';
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
