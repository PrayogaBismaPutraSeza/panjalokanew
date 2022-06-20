<?php
include("first.php"); //include auth.php file on all secure pages
include("payment_regular.php");
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Company Cash</h1>
    </div>
</div>
<div class="well bs-component">
    <form class="form-horizontal">
        <fieldset>
            <div class="table-responsive">
                <form method="post" action="">
                    <table class="table table-bordered table-hover table-condensed">
                        <thead>
                            <tr class="info">
                            <th>
                                        <p align="center">SN:</p>
                                    </th>
                                    <th>
                                        <p align="center">Given Date</p>
                                    </th>
                                    <th>
                                        <p align="center">Amount</p>
                                    </th>
                                    <th>
                                        <p align="center">remark</p>
                                    </th>
                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            global $sn;
                            global $company_name;
                            global $totalCash;
                            global $paid;
                            global $billsno;

                            $sn = 0;

                            $query1  = "SELECT * from cash";
                            $q1 = $conn->query($query1);
                            while ($row1 = $q1->fetch_assoc()) {
                                $sn++;
                                $c_id = $row1["c_id"];
                                date_default_timezone_set("Asia/Jakarta");
                                $GivenDate = date('D , d-M , Y', strtotime($row1["given_date"]));
                                $amount =  $row1["amount"];
                                $remark = $row1["remark"];




                            ?>
                                <tr>
                                    <td align="center"><?php echo $sn ?></td>
                                    <td align="center"><?php echo $GivenDate ?></td>
                                    <td align="center"><?php echo $amount  ?>.00</td>
                                    <td align="center"><?php echo $remark  ?></td>
                                </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </fieldset>
    </form>
</div>
<script>
    window.print();
</script>