<?php





?>

<?php

if (isset($_POST['submit']) != "") {
    include("db.php");
    $p_name  = $_POST['p_name'];
    $banyak = $_POST['banyak'];
    $harga   = $_POST['harga'];
    $total  = $_POST['total'];

    date_default_timezone_set("Asia/Jakarta");
    $given_date = date('Y-m-d', strtotime($_POST['given_date']));

    $p_id         = $_POST['p_id'];
    $quantity   = $_POST['result'];

    $sellProduct = $conn->query("INSERT into sell(given_date,p_name, banyak, harga, total)VALUES('$given_date','$p_name','$banyak','$harga', '$total')");
    $query  = "UPDATE product SET stock='$quantity' WHERE p_id='$p_id'";
    $sql = $conn->query($query);

    if ($sellProduct && $sql) {
?>
        <script>
            alert('Produk berhasil dijual.');
            window.location.href = 'home_store.php?page=product_list';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Invalid.');
            window.location.href = 'index.php';
        </script>
<?php
    }
}
?>