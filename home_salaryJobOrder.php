<?php
//include auth.php file on all secure pages
include("first.php");
include("add_salary.php");

?>

<?php


?>

<?php
include("php/headerSalary.php");
?>
<div id="page-wrapper">
    <div id="page-inner">



        <div class="masthead">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">

                    <ul class="nav navbar-nav">
                        <li><a href="home_salaryRegular.php">Pegawai Tetap</a></li>
                        <li><a href="home_salaryCasual.php">Pegawai Freelance</a></li>
                        <li class="active"><a href="home_salaryJobOrder.php">Pegawai Kontrak</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Gaji Pegawai Kontrak</h1>
                <h1 class="page-subhead-line">Selamat Datang di <strong><?php echo ' ' . $siteName ?></strong>
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
                    <button type="button" data-toggle="modal" data-target="#addSalary" class="btn btn-success">Tambah Bonus</button>
                    <br><br>
                    <div class="table-responsive">
                        <form method="post" action="">
                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                <!-- <h3><b>Ordinance</b></h3> -->
                                <thead>
                                    <tr class="info">
                                        <th>
                                            <p align="center">ID</p>
                                        </th>
                                        <th>
                                            <p align="center">Name</p>
                                        </th>
                                        <th>
                                            <p align="center">Salary</p>
                                        </th>
                                        <th>
                                            <p align="center">Due</p>
                                        </th>
                                        <th>
                                            <p align="center">Deduction</p>
                                        </th>
                                        <th>
                                            <p align="center">Advance</p>
                                        </th>
                                        <th>
                                            <p align="center">Bonus</p>
                                        </th>
                                        <th>
                                            <p align="center">Action</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    global $d_amount;

                                    $query2  = "SELECT * from employee where emp_type = 'Job Order'";
                                    $q2 = $conn->query($query2);
                                    while ($row2 = $q2->fetch_assoc()) {
                                        include("calculations/regularCalculation.php");

                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $emp_id ?></td>
                                            <td align="center"><?php echo $lname ?>, <?php echo $fname ?></td>
                                            <td align="center"><big><b><?php echo $salary ?></b></big>.00</td>
                                            <td align="center"><big><b><?php echo $due ?></b></big>.00</td>
                                            <td align="center"><big><b><?php echo $deduction ?></b></big>.00</td>
                                            <td align="center"><big><b><?php echo $advance ?></b></big> .00</td>
                                            <td align="center"><big><b><?php echo $bonus ?></b></big>.00</td>
                                            <td align="center">
                                                <a class="btn btn-warning" href="edit_jobOrderAccount.php?emp_id=<?php echo $row2["emp_id"]; ?>">Modify</a>
                                                <a class="btn btn-danger" href="delete_salary.php?emp_id=<?php echo $row2["emp_id"]; ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                                <tr class="info">
                                    <th>
                                        <p align="center">Id</p>
                                    </th>
                                    <th>
                                        <p align="center">Name</p>
                                    </th>
                                    <th>
                                        <p align="center">Salary</p>
                                    </th>
                                    <th>
                                        <p align="center">Due</p>
                                    </th>
                                    <th>
                                        <p align="center">Deduction</p>
                                    </th>
                                    <th>
                                        <p align="center">Advance</p>
                                    </th>
                                    <th>
                                        <p align="center">Bonus</p>
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
                                <label class="col-sm-4 control-label">Company :</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="emp_id" style=" height:35px;" name="emp_id" onchange="myFunction(this.value)">
                                        <option value=''>------- Select --------</option>
                                        <option value='all'>All Job Order Employee</option>
                                        <?php
                                        $query1  = "SELECT emp_id, fname,lname from employee where emp_type='Job Order'";
                                        $q1 = $conn->query($query1);
                                        while ($row1 = $q1->fetch_assoc()) {
                                        ?>
                                            <option class="form-control" value="<?php echo $row1["emp_id"] ?>"><?php echo $row1["fname"] . " " . $row1["lname"] ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Salary Rate</label>
                                <div class="col-sm-8">
                                    <input type="text" name="salary_rate" class="form-control" placeholder="Enter Salary" required="required">
                                    <input type="hidden" name="salary_type" value="3" class="form-control" placeholder="Enter Salary" required="required">

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