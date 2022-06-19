<?php
include("first.php"); //include auth.php file on all secure pages
include("payment_regular.php");
?>

<?php
include("php/header.php");
?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Pembayaran Gaji</h1>
            <h1 class="page-subhead-line">Selamat Datang di Sistem ERP<strong><?php echo ' ' . $siteName ?></strong>
                <i class="icon-calendar icon-large"></i>


                <?php
                date_default_timezone_set("Asia/Jakarta");
                echo  date(" l, F d Y") . "<br>";

                ?>
            </h1>

        </div>
    </div>

    <div class="well bs-component">
        <form class="form-horizontal">
            <fieldset>

                <div class="table-responsive">
                    <form method="post" action="">
                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                                <tr class="info">
                                    <th>
                                        <p align="center">ID/Nama</p>
                                    </th>
                                    <th>
                                        <p align="center">Status Pegawai</p>
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
                                        <p align="center">Komentar</p>
                                    </th>
                                    <th>
                                        <p align="center">Status Pembayaran</p>
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


                                    if ($row2["pay_status"] == 1) {
                                        $class = "paid";
                                        $remark = "Terbayar";
                                    } else {
                                        $class = "notpaid";
                                        $remark = "Tidak Terbayar";
                                    }


                                ?>
                                    <tr>
                                        <td align="center"><?php echo $row["emp_id"] ?>/<?php echo $row["fname"] ?> <?php echo $row["lname"] ?></td>
                                        <td align="center"><?php echo $row["emp_type"] ?></td>
                                        <td align="center"><big><b><?php echo $row2["pay_amount"] ?>.00 </b></big></td>
                                        <td align="center"><big><b><?php echo $AD . $currentAD ?>.00 </b></big></td>
                                        <td align="center"><big><b><?php echo $row2["paid_in_cash"] ?></b></big>.00</td>
                                        <td align="center"><big><b><?php echo $row2["paid_in_bkash"] ?></b></big></td>
                                        <td align="center"><big><b><?php echo $row2["pay_date"] ?></b></big></td>
                                        <td align="center"><big><b><?php echo $row2["pay_remark"] ?></b></big></td>
                                        <td align="center" class="<?php echo $class ?>"><big><b><?php echo $remark ?></b></big> </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th>
                                    <p align="center">ID/Name</p>
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
                                    <p align="center">Komentar</p>
                                </th>
                                <th>
                                    <p align="center">Status Pembayaran</p>
                                </th>
                            </tr>
                        </table>
                    </form>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- this modal is for OVERTIME -->
    <div class="modal fade" id="overtime" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center">Enter the amount of <big><b>Overtime</b></big> rate per hour.</h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="update_overtime.php" name="form" method="post">
                        <div class="form-group">
                            <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>" required="required">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- this modal is for ADDING Salary -->
    <div class="modal fade" id="addSalary" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center"><b>Add Salary for and Employee</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="emp_id" class="form-control" placeholder="Employee ID" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Salary Rate</label>
                            <div class="col-sm-8">
                                <input type="text" name="salary_rate" class="form-control" placeholder="Enter Salary" required="required">
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- this modal is for SALARY -->
    <div class="modal fade" id="salary" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center">Enter the amount of <big><b>Salary</b></big> rate.</h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="update_salary.php" name="form" method="post">
                        <div class="form-group">
                            <input type="text" name="emp_id" class="form-control" value="<?php echo $emp_id; ?>" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" name="salary_rate" class="form-control" value="<?php echo $salary; ?>" required="required">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- this modal is for my Colins -->
    <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <div align="center">
                        <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



<!-- this function is for modal -->
<script>
    $(document).ready(function() {
        $("#myBtn").click(function() {
            $("#myModal").modal();
        });
    });
</script>

<?php

include("last.php");
?>