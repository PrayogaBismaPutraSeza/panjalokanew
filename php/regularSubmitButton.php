<?php
global $idFound, $submitMessage;
$idFound = false;
date_default_timezone_set("Asia/Jakarta");
$currentMonth = date('m');
$currentYear = date('Y');
$query4  = "SELECT emp_id from payment where MONTH(pay_date) = '" . $currentMonth . "' AND YEAR(pay_date)  = '" . $currentYear . "'";
$q4 = $conn->query($query4);
while ($row4 = $q4->fetch_assoc()) {

  $emp_id        = $row4['emp_id'];
  if ($emp_id == $id) {
    $idFound = true;
  }
}
if (!$idFound) {
  $day =  date("d");
  if ($day == "28" || $day == "29" || $day == "30" || $day == "31") {
    $submitMessage = "Pesan: Anda hanya dapat melakukan submit gaji sekali dalam sebulan.";
?>
    <input type="hidden" name="netpay" value="<?php echo $netpay; ?>">
    <input type="hidden" name="new_advance" value="<?php echo $advanceSalary; ?>">
    <input type="hidden" name="total_paid" value="<?php echo $salaryPaid; ?>">
    <input type="hidden" name="paid_in_cash" value="<?php echo $paid_in_cash; ?>">
    <input type="hidden" name="paid_in_bkash" value="<?php echo $paid_in_bkash; ?>">
    <input type="hidden" name="due_status" value="<?php echo $newDue_status; ?>">
    <input type="hidden" name="advance_status" value="<?php echo $newAdvance_status; ?>">
    <input type="hidden" name="remark" value="<?php echo $remark; ?>">
    <input type="hidden" name="emp_type" value="<?php echo $emp_type; ?>">
    <input type="hidden" name="ADpay_id" value="<?php echo $ADpay_id; ?>">

    <input type="submit" name="submit" value="Submit" class="btn btn-success">
  <?php
  } else {
    $submitMessage = "Pesan: Tombol submit dapat digunakan pada akhir bulan.";
  }
} else {
  $submitMessage = "Pesan: Anda sudah melakukan submit. Periksa Daftar Pembayaran.";
  ?>
  <script>
    alert('Anda sudah melakukan submit pada bulan ini.');
  </script>

<?php
}
?>