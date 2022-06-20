<?php
include("first.php"); //include auth.php file on all secure pages
include("payment_regular.php");
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Pembayaran Gaji</h1>
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
                                    <p align="center">ID/Nama</p>
                                </th>
                                <th>
                                    <p align="center">Status</p>
                                </th>
                                <th>
                                    <p align="center"> Gaji</p>
                                </th>
                                <th>
                                    <p align="center"> Kelebihan/Kekurangan</p>
                                </th>
                                <th>
                                    <p align="center">Tunai</p>
                                </th>
                                <th>
                                    <p align="center">Transder</p>
                                </th>
                                <th>
                                    <p align="center">Tanggal Pembayaran</p>
                                </th>
                                <th>
                                    <p align="center">Catatan</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            global $AD, $currentAD;
                            $query2  = "SELECT * from payment ORDER BY pay_date ";
                            $q2 = $conn->query($query2);
                            while ($row2 = $q2->fetch_assoc()) {
                                if ($row2["due_status"] == 1) {
                                    $currentAD = $row2["due"];
                                    $AD = "Kekurangan: ";
                                } else if ($row2["advance_status"] == 1) {
                                    $currentAD = $row2["advance"];
                                    $AD = "Kelebihan: ";
                                }
                                $query  = "SELECT * from employee where emp_id='" . $row2["emp_id"] . "' ";
                                $q = $conn->query($query);
                                $row = $q->fetch_assoc();

                            ?>
                                <tr>
                                    <td align="center"><?php echo $row["emp_id"] ?>/<?php echo $row["fname"] ?> <?php echo $row["lname"] ?></td>
                                    <td align="center"><?php echo $row["emp_type"] ?></td>
                                    <td align="center"><?php echo $row2["pay_amount"] ?></td>
                                    <td align="center"><?php echo $AD . $currentAD ?></td>
                                    <td align="center"><?php echo $row2["paid_in_cash"] ?></td>
                                    <td align="center"><?php echo $row2["paid_in_bkash"] ?></td>
                                    <td align="center"><?php echo $row2["pay_date"] ?></td>
                                    <td align="center"><?php echo $row2["pay_remark"] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                        <tr class="info">
                            <th>
                                <p align="center">ID/Nama</p>
                            </th>
                            <th>
                                <p align="center">Status Pegawai</p>
                            </th>
                            <th>
                                <p align="center">Gaji</p>
                            </th>
                            <th>
                                <p align="center">Kelebihan/Kekurangan</p>
                            </th>
                            <th>
                                <p align="center">Tunai</p>
                            </th>
                            <th>
                                <p align="center">Transfer</p>
                            </th>
                            <th>
                                <p align="center">Tanggal Pembayaran</p>
                            </th>
                            <th>
                                <p align="center">Catatan</p>
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