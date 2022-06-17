<?php

?>

<?php

if(isset($_POST['submit'])!="")
{

    $p_name  =$_POST['pname'];
    $stock  =$_POST['stock'];

    $addStock = $conn->query("INSERT into stock(p_id, stock_quantity)VALUES('$p_name','$type','$quantity', '$company', '$price')");

    if($addStock)
    {
        ?>
        <script>
            alert('Product has been successfully added.');
            window.location.href='home_store.php?page=product_list';
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
