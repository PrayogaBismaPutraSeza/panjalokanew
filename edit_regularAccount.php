<?php
include("first.php"); //include auth.php file on all secure pages

include("add_deductionRegular.php");


?>



<?php
$id = $_REQUEST['emp_id'];

global $d_amount;

$query2  = "SELECT * from employee where emp_id = '" . $id . "'";
$q2 = $conn->query($query2);
while ($row2 = $q2->fetch_assoc()) {
    include("calculations/regularCalculation.php");



?>
    <?php
    include("php/header.php");
    ?>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Gaji<?php echo ' ' . $row2['fname'] . " " . $row2['lname'] ?></h1>
                <h1 class="page-subhead-line">Selamat Datang di Sitem ERP<strong><?php echo ' ' . $siteName ?></strong>
                    <i class="icon-calendar icon-large"></i>


                    <?php
                    date_default_timezone_set("Asia/Jakarta");
                    echo  date(" l, F d Y") . "<br>";

                    ?>
                </h1>

            </div>
        </div>

        <form class="form-horizontal" action="update_regularAccount.php" method="post" name="form">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 bg-info">
                        <input type="hidden" name="new" value="1" />
                        <input name="id" type="hidden" value="<?php echo $id ?>" />

                        <br>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Gaji :</label>
                            <div class="col-sm-3">
                                <input type="text" name="salary" class="form-control" value="<?php echo $row2['salary']; ?>" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kelebihan :</label>
                            <div class="col-sm-3">
                                <input type="readonly" name="advance" class="form-control" value="<?php echo $advanceSalary; ?>" required="required" readonly>
                            </div>
                            <div class="col-sm-5">
                                <span style="color:blue"><?php echo $message1 ?> </span><br>
                                <span style="color:red"><?php echo $message2 ?> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Bonus :</label>
                            <div class="col-sm-3">
                                <input type="text" name="bonus" class="form-control" value="<?php echo $row2['bonus']; ?>" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Jumlah Pembayaran:</label>
                            <div class="col-sm-3">
                                <input type="text" name="totalDeduction" class="form-control" value="<?php echo $d_amount; ?>" required="required" readonly>
                            </div>
                        </div>


                        <div class="form-group">

                            <label class="col-sm-4 control-label">Yang harus dibayar :</label>
                            <div class="col-sm-3">
                                <?php echo $netpay; ?>
                            </div>
                            <div class="col-sm-5">
                                <span style="color:#ff4d4d"><?php echo $message3; ?><span><br>
                                        <span style="color:#809fff"><?php echo $message4; ?><span>
                            </div>


                        </div>
                        <div class="form-group">

                            <label class="col-sm-4 control-label">Total Pembayaran :</label>
                            <div class="col-sm-3">
                                <?php echo $salaryPaid; ?>
                            </div>
                            <div class="col-sm-5">
                                <?php echo "Tunai : " . $paid_in_cash; ?><br>
                                <?php echo "Transfer : " . $paid_in_bkash; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label"></label>
                            <div class="col-sm-3">
                                <?php include("php/regularSubmitButton.php"); ?>
                                <a href="home_salaryRegular.php" class="btn btn-danger">Cancel</a>
                                <br><br>
                            </div>
                            <div class="col-sm-12">
                                <span style="color:#809fff"><?php echo $submitMessage; ?><span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-subhead-line">Daftar Pembayaran:</strong>


                    </div>
                </div>

                <div class="well bs-component">
                    <form class="form-horizontal">
                        <fieldset>

                            <div class="table-responsive">
                                <form method="post" action="">
                                    <button type="button" data-toggle="modal" data-target="#addDeduction" class="btn btn-success">Tambah Pembayaran</button>
                                    <br><br>
                                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                                        <!-- <h3><b>Ordinance</b></h3> -->
                                        <thead>
                                            <tr class="info">
                                                <th>
                                                    <p align="center">Tanggal</p>
                                                </th>
                                                <th>
                                                    <p align="center">Detail</p>
                                                </th>
                                                <th>
                                                    <p align="center">Jumlah</p>
                                                </th>
                                                <th>
                                                    <p align="center">Metode</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = $_REQUEST['emp_id'];

                                            $query5  = "SELECT * from deductions where emp_id = '$id'";
                                            $q5 = $conn->query($query5);
                                            while ($row5 = $q5->fetch_assoc()) {

                                                date_default_timezone_set("Asia/Jakarta");
                                                $thisMonth =  date("m-Y");
                                                $dMonth = date('m-Y', strtotime($row5['d_date']));
                                                if ($thisMonth == $dMonth) {
                                                    $d_date = $row5['d_date'];
                                                    $d_Cause = $row5['d_cause'];
                                                    $d_amount = $row5['d_amount'];
                                                    $d_method = $row5['d_method'];

                                            ?>
                                                    <tr>
                                                        <td align="center"><?php echo $d_date ?></td>
                                                        <td align="center"><?php echo $d_Cause ?></td>
                                                        <td align="center"><?php echo $d_amount ?></td>
                                                        <td align="center"><?php echo $d_method ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>

                                        </tbody>

                                        <tr class="info">
                                            <th>
                                                <p align="center">Tanggal</p>
                                            </th>
                                            <th>
                                                <p align="center">Detail</p>
                                            </th>
                                            <th>
                                                <p align="center">Jumlah</p>
                                            </th>
                                            <th>
                                                <p align="center">Metode</p>
                                            </th>
                                        </tr>
                                    </table>
                            </div>

                </div>
                </fieldset>
        </form>
    </div>

    </form>
<?php
}
?>

<!-- this modal is for ADDING Deduction -->
<div class="modal fade" id="addDeduction" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
                <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                <h3 align="center"><b>Tambahkan Pembayaran</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

                <form class="form-horizontal" action="add_deductionRegular.php" name="form" method="post">
                    <div class="form-group">
                        <?php
                        $id = $_REQUEST['emp_id'];

                        ?>

                        <label class="col-sm-4 control-label">ID :</label>
                        <div class="col-sm-8">
                            <input type="text" name="emp_id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal :</label>
                        <div class="col-sm-8">

                            <input class="form-control" id="datepicker" placeholder="Pilih Tanggal" name="d_date" type="text" />

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detail :</label>
                        <div class="col-sm-8">
                            <input type="text" name="d_cause" class="form-control" placeholder="Masukkan alasan pembayaran" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jumlah :</label>
                        <div class="col-sm-8">
                            <input type="text" name="d_amount" class="form-control" placeholder="Masukkan Jumlah" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Metode Pembayaran :</label>
                        <div class="col-sm-4">
                            <input type="radio" name="pay_method" value="cash"> Tunai &nbsp;&nbsp;
                            <input type="radio" name="pay_method" value="bkash"> Transfer


                        </div>
                    </div>





                    <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <input type="submit" name="submit" class="btn btn-success" value="Tambahkan">
                            <input type="reset" name="" class="btn btn-danger" value="Kosongkan Form">
                        </div>
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

<!-- this function is for datetimepiker -->
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

<!-- this function is for modal -->
<script>
    $(document).ready(function() {
        $("#myBtn").click(function() {
            $("#myModal").modal();
        });
    });
</script>
</br>
<?php
include("last.php");

?>