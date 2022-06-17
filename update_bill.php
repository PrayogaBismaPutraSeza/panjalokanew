<?php

		require("db.php");
		$pay_status = '0';
    @$bill_no			= $_POST['bill_no'];
    @$billsno			= $_POST['billsno'];
		@$bill_amount			= $_POST['bill_amount'];
		@$received_date			= $_POST['received_date'];
		@$received_amount		= $_POST['received_amount'];

		if(($bill_amount-$received_amount) != 0){
			$pay_status = '2';
		}
		else if(($bill_amount-$received_amount) == 0){
			$pay_status = '1';
		}
		else{
			$pay_status = '0';
		}


    $sql = $conn->query("UPDATE companybill SET receive_date='$received_date', receive_amount='$received_amount', pay_status='$pay_status' where bill_no = '".$bill_no."' AND billsno = '".$billsno."' ");

		if($sql)
		{
			?>
		        <script>
		            alert('Company Bill successfully updated...');
		            window.location.href='home_bill.php';
		        </script>
		    <?php
		}
		else {
      ?>
		        <script>
		            alert('Error Acures');
								window.location.href='home_bill.php';
		        </script>
		    <?php
		}
 ?>
