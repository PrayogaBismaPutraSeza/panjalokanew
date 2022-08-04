<?php
?>

<?php
global $allreadyAdded;
$allreadyAdded = false;
if (isset($_POST['submit']) != "") {

    $p_name  = $_POST['p_name'];
    $company = $_POST['company'];
    $banyak = $_POST['banyak'];
    $harga   = $_POST['harga'];
    $total  = $_POST['total'];

    date_default_timezone_set("Asia/Jakarta");
    $given_date = date('Y-m-d', strtotime($_POST['given_date']));

    $query4  = "SELECT * from buy";
    $q4 = $conn->query($query4);
    while ($row4 = $q4->fetch_assoc()) {
        if ($p_name == $row4['p_name'] && $company == $row4['company']) {
            $allreadyAdded = true;
        }
    }


    if ($allreadyAdded) {
?>
        <script>
            alert('Bahan Baku Sudah Ada Dari Supplier Yang Sama.');
            window.location.href = 'home_supply.php';
        </script>
        <?php
    } else {
        $addSupply = $conn->query("INSERT into buy(given_date,p_name, company, banyak, harga, total)VALUES('$given_date','$p_name','$company','$banyak','$harga', '$total')");
        $addSupplyL = $conn->query("INSERT into buy_laporan(given_date,p_name, company, banyak, harga, total)VALUES('$given_date','$p_name','$company','$banyak','$harga', '$total')");
        if ($addSupply && $addSupplyL) {
        ?>
            <script>
                alert('Suppply berhasil dibeli.');
                window.location.href = 'home_supply.php?page=buy_list';
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
}
?>