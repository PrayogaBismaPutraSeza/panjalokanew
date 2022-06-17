<?php

?>

<?php

if(isset($_POST['submit'])!="")
{

    $p_name  =$_POST['pname'];
    $company =$_POST['company'];
    $type   =$_POST['type'];
    $quantity  =$_POST['quantity'];
    $price  =$_POST['price'];
    $stock  =$_POST['stock'];


    $addProduct = $conn->query("INSERT into product(p_name, p_type, p_quantity, p_company, price,stock)VALUES('$p_name','$type','$quantity', '$company', '$price','$stock')");

    if($addProduct)
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
