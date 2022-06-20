<?php
require('db.php');

$id = $_GET['id'];

$query  = "SELECT billsno from bill WHERE company_id='" . $id . "'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
  $deleteCompanybill = $conn->query("UPDATE  companybill set delete_status='1' WHERE billsno='" . $row["billsno"] . "'");
  $deleteCompanyreceivedbill = $conn->query("UPDATE  billreceived set delete_status='1' WHERE billsno='" . $row["billsno"] . "'");
}
$deleteCompanybill = $conn->query("UPDATE  bill set delete_status='1' WHERE company_id='" . $id . "'");
$deleteCompanyGroup = $conn->query("UPDATE  compaygroup set delete_status='1' WHERE id='" . $id . "'");
$deleteCompany = $conn->query("UPDATE  company set delete_status='1' WHERE id='" . $id . "'");

if ($deleteCompanybill && $deleteCompanyGroup && $deleteCompany) {
?>
  <script>
    alert('Supplier berhasil dihapus');
    window.location.href = 'home_company.php';
  </script>
<?php
} else {
?>
  <script>
    alert('Error Acures');
    window.location.href = 'home_company.php';
  </script>
<?php
}
?>