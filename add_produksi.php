<?php
include("db.php");
$conn =  new mysqli("localhost", "root", "", "panjaloka");

?>

<?php
global $allreadyAdded, $empty;
$allreadyAdded = false;
$empty = false;
if (isset($_POST['submit']) != "") {
    $p_id  = $_POST['produk'];
    $p_name  = $_POST['produk'];
    $name1  = $_POST['name'];
    $name2  = $_POST['name2'];
    date_default_timezone_set("Asia/Jakarta");
    $stok = $_POST['stok'];
    $bahan = $_POST['bahan'];
    $operation_value   = $_POST['operation_value'];
    $bhnbakar = 35000;
    $hpp   = $_POST['hppKg']; 
    $hppKg = $hpp + ($hpp * 0.2);
    $quantity   = $_POST['result'];
    $b_id         = $_POST['b_id'];
    
    $emp_id1      = $_POST['name'];
    date_default_timezone_set("Asia/Jakarta");
    $w_date = date('Y-m-d', strtotime($_POST['given_date']) );

    $emp_id2      = $_POST['name2'];
    date_default_timezone_set("Asia/Jakarta");
    $w_date = date('Y-m-d', strtotime($_POST['given_date']) );
    
    if ($w_date == " " && $p_name && $name1 == " " && $name2 == " ") {
        $empty = true;
    }
    $query4  = "SELECT w_date from works where emp_id = $emp_id1";
    $query5  = "SELECT w_date from works where emp_id = $emp_id2";
    $q4 = $conn->query($query4);
    $q5 = $conn->query($query5);
    while ($row4 = $q4 && $row5 = $q5->fetch_assoc()) {
        if ($w_date == $row4['w_date'] && $w_date == $row5['w_date']) {
        $allreadyAdded = true;
        }
    }
        

    

    if ($allreadyAdded || $empty) {
        ?>
            <script>
              alert('Tanggal telah ditambahkan atau tidak ada tanggal yang dipilih.');
              window.location.href = 'home_salaryCasual.php';
            </script>
            <?php
    } else {
            $updateSupply  = $conn->query("UPDATE buy SET banyak='$quantity' WHERE b_id='$b_id'");
            $updateProduk  = $conn->query("UPDATE produk SET stock=('$stok' + stock), harga_modal='$hpp', harga_jual='$hppKg' WHERE idproduk='$p_id'");
            $addProduksi = $conn->query("INSERT into produksi(p_name, name1, name2, given_date, stok, bahan, jumbahan, bhnbakar,hpp)VALUES('$p_name','$name1','$name2','$w_date','$stok','$bahan','$operation_value','$bhnbakar', '$hpp')");
            $sql = $conn->query("INSERT into works(emp_id, w_date)VALUES('$emp_id1','$w_date')");
            $sql2 = $conn->query("INSERT into works(emp_id, w_date)VALUES('$emp_id2','$w_date')");
        if ($sql && $sql2 && $addProduksi && $updateProduk && $updateSupply) {
            ?>
              <script>
                alert('Produksi berhasil ditambahkan.');
                window.location.href = 'home_supply.php';
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