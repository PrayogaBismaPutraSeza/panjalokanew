<?php
	require('db.php');

	$billsno = $_POST['billsno'];
	
	$deleteBill = $conn->query("UPDATE bill SET delete_status='1' WHERE billsno='$billsno'");
    $deleteBillreceived = $conn->query("delete from billreceived WHERE billsno='$billsno'");
    
    $deleteCompanyBill = $conn->query("UPDATE companybill SET delete_status='1' WHERE billsno='$billsno'");

 $query  = "SELECT s_id from companybill WHERE billsno='$billsno'";
                                $q = $conn->query($query);
                                while($row = $q->fetch_assoc()){
                                $s_id = $row["s_id"];
                                $deleteBillReceived = $conn->query("Delete from receivedbill WHERE s_id='$s_id'");

                                }
   
    
  if($deleteBill && $deleteCompanyBill)
  {
    ?>
          <script>
              alert('Company bill successfully Deleted...');
              window.location.href="home_bill.php";
          </script>
      <?php
  }
  else {
    ?>
          <script>
              alert('Error Acures');
              window.location.href="home_bill.php";
          </script>
      <?php
  }
 ?>