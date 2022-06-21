<?php
include("first.php"); //include auth.php file on all secure pages

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Buy Supply</h1>
    </div>
</div>
<div class="well bs-component">
    <form class="form-horizontal">
        <fieldset>
            <div class="table-responsive">
                <form method="post" action="">
                    <table class="table table-bordered table-hover table-condensed">
                        <thead>
                            <tr class=" info">
                                <th>
                                    <p align="center">Tanggal</p>
                                </th>
                                <th>
                                    <p align="center">Id/Nama</p>
                                </th>
                                <th>
                                    <p align="center">Supplier</p>
                                </th>
                                <th>
                                    <p align="center">Harga</p>
                                </th>
                                <th>
                                    <p align="center">Kuantitas</p>
                                </th>
                                <th>
                                    <p align="center">Total</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            global $b_id;


                            $query = "select * from buy where delete_status = '0' ORDER BY b_id asc ";
                            $q = $conn->query($query);
                            while ($row = $q->fetch_assoc()) {
                                $b_id     = $row['b_id'];
                                $p_name  = $row['p_name'];
                                $company = $row['company'];
                                $given_date   = $row['given_date'];
                                $harga  = $row['harga'];
                                $banyak  = $row['banyak'];
                                $total = $row['total'];

                            ?>

                                <tr>
                                    <td align="center"><?php echo $given_date ?></a></td>
                                    <td align="center"><?php echo $b_id ?>/<?php echo $p_name ?></a></td>
                                    <td align="center"><?php echo $company ?></a></td>
                                    <td align="center"><?php echo $harga ?></a></td>
                                    <td align="center"><?php echo $banyak ?></a></td>
                                    <td align="center"><?php echo $total ?></a></td>
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
                                <p align="center">Supplier</p>
                            </th>
                            <th>
                                <p align="center">Harga</p>
                            </th>
                            <th>
                                <p align="center">Kuantitas</p>
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