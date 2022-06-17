<?php

?>

<?php

if(isset($_POST['submit'])!="")
{

    $nama  =$_POST['nama'];
    $banyak =$_POST['banyak'];
    $harga   =$_POST['harga'];
    $stok  =$_POST['stok'];
    $total_bayar  =$_POST['total_bayar'];



    $sellProduct = $conn->query("INSERT into sell(nama, banyak, harga, stok, total_bayar)VALUES('$nama','$banyak','$harga', '$stok', '$total_bayar')");

    if($sellProduct)
    {
        ?>
        <script>
            alert('Product has been successfully added.');
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
