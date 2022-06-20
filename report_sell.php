<?php
include("first.php"); //include auth.php file on all secure pages

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Penjualan</h1>
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
                                <p align="center">No</p>
                            </th>
                            <th>
                                <p align="center">Date</p>
                            </th>
                            <th>
                                <p align="center">ID/Nama Pegawai</p>
                            </th>
                            <th>
                                <p align="center">Quantity</p>
                            </th>
                            <th>
                                <p align="center">Price</p>
                            </th>
                            <th>
                                <p align="center">Total</p>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            global $s_id;

                            $no = 1;
                            $query = "select * from sell where delete_status = '0' ORDER BY s_id asc ";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                              {
                                date_default_timezone_set("Asia/Dhaka");
                                $GivenDate = date('D , d-M , Y', strtotime($row["given_date"]));
                                $s_id  =$row['s_id'];
                                $p_name  =$row['p_name'];
                                $banyak  =$row['banyak'];
                                $harga  =$row['harga'];
                                $total = $row['total'];
                            ?>
                            <tr>
                            <td align="center"><?php echo $no++?></a></td> 
                            <td align="center"><?php echo $GivenDate?></a></td>
                            <td align="center"><?php echo $s_id?>/  <?php echo $p_name ?></a></td>
                            <td align="center"><?php echo $banyak?></a></td>
                            <td align="center"><?php echo $harga ?></a></td>
                            <td align="center"><?php echo $total ?> </a></td>
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