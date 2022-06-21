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
                        <!-- <h3><b>Ordinance</b></h3> -->
                        <thead>
                            <tr class="info">
                                <th>
                                    <p align="center">Tanggal</p>
                                </th>
                                <th>
                                    <p align="center">Id/Nama</p>
                                </th>
                                <th>
                                    <p align="center">Kuantitas</p>
                                </th>
                                <th>
                                    <p align="center">Harga</p>
                                </th>
                                <th>
                                    <p align="center">Total</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            global $s_id;


                            $query = "select * from sell where delete_status = '0' ORDER BY s_id asc ";
                            $q = $conn->query($query);
                            while ($row = $q->fetch_assoc()) {
                                date_default_timezone_set("Asia/Jakarta");
                                $GivenDate = date('D , d-M , Y', strtotime($row["given_date"]));
                                $s_id  = $row['s_id'];
                                $p_name  = $row['p_name'];
                                $banyak  = $row['banyak'];
                                $harga  = $row['harga'];
                                $total = $row['total'];

                            ?>

                                <tr>
                                    <td align="center"><a title="Update"><?php echo $GivenDate ?></a></td>
                                    <td align="center"><a title="Update"><?php echo $s_id ?>/ <?php echo $p_name ?></a></td>
                                    <td align="center"><a title="Update"><?php echo $banyak ?></a></td>
                                    <td align="center"><a title="Update"><?php echo $harga ?></a></td>
                                    <td align="center"><a title="Update"><?php echo $total ?> </a></td>


                                </tr>

                            <?php } ?>
                        </tbody>

                        <tr class="info">
                            <th>
                                <p align="center">Tanggal</p>
                            </th>
                            <th>
                                <p align="center">Id/Nama</p>
                            </th>
                            <th>
                                <p align="center">Kuantitas</p>
                            </th>
                            <th>
                                <p align="center">Harga</p>
                            </th>
                            <th>
                                <p align="center">Total</p>
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
        </fieldset>
    </form>
</div>
<script>
    window.print();
</script>