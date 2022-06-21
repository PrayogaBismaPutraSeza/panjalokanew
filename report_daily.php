<?php
include("first.php");
include("add_dailyTransaction.php");
$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while ($row = $q->fetch_assoc()) {
}
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Transaksi Harian</h1>
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
                                    <p align="center">NO:</p>
                                </th>
                                <th>
                                    <p align="center">Tanggal</p>
                                </th>
                                <th>
                                    <p align="center">Jumlah</p>
                                </th>
                                <th>
                                    <p align="center">Detail</p>
                                </th>
                                <th>
                                    <p align="center">Metode</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php




                            $query = "select * from transaction where delete_status = '0' ORDER BY sno asc ";
                            $q = $conn->query($query);
                            $serial = 0;
                            while ($row = $q->fetch_assoc()) {
                                $serial++;
                                $sno     = $row['sno'];
                                $date = date('D-d/M-Y', strtotime($row['t_date']));
                                $cause   = $row['cause'];
                                $amount  = $row['amount'];
                                $method  = $row['method'];



                            ?>

                                <tr>
                                    <td align="center"><a title="Update"> <?php echo $serial ?></a></td>
                                    <td align="center"><a title="Update"><?php echo $date ?></a></td>
                                    <td align="center"><a title="Update"><?php echo $amount ?></a></td>
                                    <td align="center"><a title="Update"><?php echo $cause ?></a></td>
                                    <td align="center"><a title="Update"><?php echo $method ?></a></td>

                                </tr>

                            <?php } ?>
                        </tbody>

                        <tr class="info">
                            <th>
                                <p align="center">NO:</p>
                            </th>
                            <th>
                                <p align="center">Tanggal</p>
                            </th>
                            <th>
                                <p align="center">Jumlah</p>
                            </th>
                            <th>
                                <p align="center">Detail</p>
                            </th>
                            <th>
                                <p align="center">Metode</p>
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