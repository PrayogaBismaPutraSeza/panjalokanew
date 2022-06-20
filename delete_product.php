<?php
require('db.php');

$p_id = $_GET['p_id'];


// $deleteProduct = $conn->query("UPDATE  product set delete_status='1' WHERE p_id='" . $p_id . "'");
$deleteProduct = $conn->query("DELETE FROM product WHERE p_id=$p_id");
if ($deleteProduct) {
?>
  <script>
    alert('Produk berhasil dihapus');
    window.location.href = 'home_store.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Error Acures');
    window.location.href = 'home_store.php';
  </script>
<?php
}
?>