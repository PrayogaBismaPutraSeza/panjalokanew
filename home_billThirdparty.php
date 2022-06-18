<?php
include("first.php"); //include auth.php file on all secure pages
include("payment_regular.php");

?>

<?php
include("php/header.php");
?>
<div id="page-inner">


    <div class="masthead">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">

                <ul class="nav navbar-nav">
                    <li><a href="home_bill.php">Regular Company Accounts</a></li>
                    <li class="active"><a href="home_billThirdparty.php">3rd Party Company Accounts</a></li>

                </ul>
            </div>
        </nav>
    </div>

    <style type="text/css">
        .different-text-color {
            color: green;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Company Bill</h1>
            <marquee>
                <h1 class="page-subhead-line">
                    <p style="font-size:x-large;"><span class="different-text-color">Welcome to <strong><?php echo ' ' . $siteName ?></strong>@@@ Today is:
                            <i class="icon-calendar icon-large"></i>


                            <?php
                            date_default_timezone_set("Asia/Dhaka");
                            echo  date(" l, F d, Y") . "<br>";

                            ?>
                        </span> </p>
                </h1>
            </marquee>

        </div>
    </div>

    <div class="well bs-component">
        <form class="form-horizontal">
            <fieldset>
                <button type="button" data-toggle="modal" data-target="#addbill" class="btn btn-success">Add a Company Bill</button>



                <p align="center"><big><b>Payment</b></big></p>
                <div class="table-responsive">
                    <form method="post" action="">
                        <input type="hidden" name="type" value="2">
                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                                <tr class="info">
                                    <th>
                                        <p align="center">SN:</p>
                                    </th>
                                    <th>
                                        <p align="center">Company</p>
                                    </th>
                                    <th>
                                        <p align="center">Total Bill</p>
                                    </th>
                                    <th>
                                        <p align="center">Paid</p>
                                    </th>
                                    <th>
                                        <p align="center">Reduced</p>
                                    </th>
                                    <th>
                                        <p align="center">Payment Status</p>
                                    </th>
                                    <th>
                                        <p align="center">Action</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                global $sn;
                                global $company_name;
                                global $totalBill;
                                global $paid;
                                global $billsno;

                                $sn = 0;

                                $query1  = "SELECT * from bill as b,company as c where b.delete_status='0' and c.company_type = 'Casual' and c.id = b.company_id";
                                $q1 = $conn->query($query1);
                                while ($row1 = $q1->fetch_assoc()) {
                                    $sn++;
                                    $company_id = $row1["company_id"];
                                    $bill_id = $row1["bill_id"];
                                    $billsno = $row1["billsno"];

                                    $query2  = "SELECT name from company where id = '" . $company_id . "'";
                                    $q2 = $conn->query($query2);
                                    while ($row2 = $q2->fetch_assoc()) {
                                        $company_name = $row2["name"];
                                    }

                                    $totalBill = 0;
                                    $paid = 0;
                                    $query  = "SELECT * from companybill as cb, bill as b  where b.billsno = '" . $billsno . "' AND b.company_id = '" . $company_id . "' AND b.billsno = cb.billsno ";
                                    $q = $conn->query($query);
                                    while ($row = $q->fetch_assoc()) {

                                        $totalBill = $totalBill + $row["bill_amount"];
                                        $paid = $paid + $row["receive_amount"];
                                    }

                                    $query9  = "SELECT * from billreceived where billsno = '" . $billsno . "' and delete_status='0'";
                                    $q9 = $conn->query($query9);
                                    $row9 = $q9->fetch_assoc();
                                    $BillPaid = $row9["received_amount"];
                                    $reduced =  $row9["reduced"];
                                    $pay_status = $row9["pay_status"];

                                    $paid = $paid + $BillPaid;

                                    if ($pay_status == "1") {
                                        $class = "paid";
                                        $status = "Paid";
                                    } else if ($pay_status == "2") {
                                        $class = "due";
                                        $status = "Have Due";
                                    } else {
                                        $class = "notpaid";
                                        $status = "Not Paid";
                                    }
                                    if ($paid > 0 && $paid < $totalBill && $pay_status != '1') {
                                        $class = "due";
                                        $status = "Have Due";
                                    }



                                ?>
                                    <tr>
                                        <td align="center"><?php echo $sn ?></td>
                                        <td align="center"><?php echo $company_name ?>/<?php echo $bill_id ?></td>
                                        <td align="center"><?php echo $totalBill  ?>.00</td>
                                        <td align="center"><?php echo $paid  ?>.00</td>
                                        <td align="center"><?php echo $reduced  ?>.00</td>
                                        <td align="center" class="<?php echo $class ?>"><?php echo $status ?></td>
                                        <td align="center">
                                            <a class="btn btn-info btn-sm" href="edit_bill.php?billsno=<?php echo $billsno ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="delete_bill.php?billsno=<?php echo $billsno ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th>
                                    <p align="center">SN:</p>
                                </th>
                                <th>
                                    <p align="center">Company</p>
                                </th>
                                <th>
                                    <p align="center">Total Bill</p>
                                </th>
                                <th>
                                    <p align="center">Paid</p>
                                </th>
                                <th>
                                    <p align="center">Reduced</p>
                                </th>
                                <th>
                                    <p align="center"> Payment Status</p>
                                </th>
                                <th>
                                    <p align="center">Action</p>
                                </th>
                            </tr>
                        </table>
                    </form>
                </div>
            </fieldset>
        </form>
    </div>


    <!-- this modal is for ADDING Salary -->
    <div class="modal fade" id="addbill" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:30px 60px;">

                    <h3 align="center"><b>Add Bill of a Company</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>




                    <!-- <input name="type" type="type" value="2" />-->




                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="add_bill.php" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Bill ID :</label>
                            <div class="col-sm-8">
                                <input type="text" name="bill_id" class="form-control" placeholder="Enter Bill No" required="required">
                                <input type="hidden" name="type" value="2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Company :</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="company" style=" height:35px;" name="company" onchange="myFunction(this.value)">
                                    <option value=''>------- Select --------</option>
                                    <?php
                                    $query1  = "SELECT id, name from company where company_type = 'Casual' and delete_status='0'";
                                    $q1 = $conn->query($query1);
                                    while ($row1 = $q1->fetch_assoc()) {
                                    ?>
                                        <option class="form-control" value="<?php echo $row1["id"] ?>"><?php echo $row1["name"] ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" name="submitbill" class="btn btn-success" value="Submit">
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