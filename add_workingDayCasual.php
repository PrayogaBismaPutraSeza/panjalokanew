<?php
include("db.php");
$conn =  new mysqli("localhost", "root", "", "panjaloka");

?>

<?php
global $allreadyAdded, $empty;
$allreadyAdded = false;
$empty = false;
if (isset($_POST['submit']) != "") {
  $emp_id      = $_POST['emp_id'];
  date_default_timezone_set("Asia/Jakarta");
  $w_date = date('Y-m-d', strtotime($_POST['w_date']) );
 
  if ($w_date == " ") {
    $empty = true;
  }
  $query4  = "SELECT w_date from works where emp_id = $emp_id";
  $q4 = $conn->query($query4);
  while ($row4 = $q4->fetch_assoc()) {
    if ($w_date == $row4['w_date']) {
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
    $sql = $conn->query("INSERT into works(emp_id, w_date)VALUES('$emp_id','$w_date')");

    if ($sql) {
    ?>
      <script>
        alert('Tanggal Kerja telah berhasil ditambahkan.');
        window.location.href = 'home_salaryCasual.php?page=regularAccount';
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