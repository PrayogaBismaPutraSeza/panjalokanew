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
            <h1 class="page-head-line">Uang Perusahaan</h1>
            <h1 class="page-subhead-line">Selamat Datang di Sistem ERP <strong><?php echo ' ' . $siteName ?></strong>
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
                <button type="button" data-toggle="modal" data-target="#addcash" class="btn btn-success">Tambah Uang Perusahaan Baru</button>
                <a class="btn btn-info" href="report_cash.php" target="_blank"><i class='bx bx-printer'></i> Cetak PDF</a>
                <br><br>
                <div class="table-responsive">
                    <form method="post" action="">
                        <table class="table table-sm table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                                <tr class="info">
                                    <th>
                                        <p align="center">SN:</p>
                                    </th>
                                    <th>
                                        <p align="center">Tanggal</p>
                                    </th>
                                    <th>
                                        <p align="center">Jumlah</p>
                                    </th>
                                    <th>
                                        <p align="center">Catatan</p>
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
                                <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th>
                                    <p align="center">SN:</p>
                                </th>
                                <th>
                                    <p align="center">Tanggal</p>
                                </th>
                                <th>
                                    <p align="center">Jumlah</p>
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


    <!-- this modal is for ADDING cash-->
    <div class="modal fade" id="addcash" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:30px 60px;">

                    <h3 align="center"><b>Tambahkan Uang Perusahaan</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="add_cash.php" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal :</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="datepicker" placeholder="Pilih Tanggal" name="given_date" type="text" />
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Jumlah :</label>
                            <div class="col-sm-8">
                                <input type="number" name="amount" class="form-control" placeholder="Masukkan jumlah uang" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Catatan :</label>
                            <div class="col-sm-8">
                                <input type="text" name="remark" class="form-control" placeholder="Masukkan Catatan">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" name="submitcash" class="btn btn-success" value="Tambahkan">
                                <input type="reset" name="" class="btn btn-danger" value="Kosongkan Form">
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



    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
        {
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        }
    </script>

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