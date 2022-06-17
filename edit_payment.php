<?php //include auth.php file on all secure pages
include("first.php");
include("add_deductionRegular.php");


// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["payMethod"])) {
    $genderErr = "Select a Payment Method to pay";
  } else {
    $gender = test_input($_POST["payMethod"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>



    <?php
    $emp_id = $_REQUEST['emp_id'];
    global $days;
    global $deduction;
    global $paid;
    global $due;
    global $dueStatus;
    global $pay_status;

    $deduction = 0;
    $query2  = "SELECT * from employee where emp_id ='".$emp_id."' ";
    $q2 = $conn->query($query2);
    while($row2 = $q2->fetch_assoc())
    {

        $deduction = 0;
        $days    = 0;
        $paid = 0;
        $due = 0;
        $deduction = 0;
        $days    = 0;
        $paid = 0;
        $due1 = 0;
        $netpay = 0;
        $income = 0;
        $remark = "Not paid";


        $emp_id         = $row2['emp_id'];
        $lname           = $row2['lname'];
        $fname           = $row2['fname'];
        $type           = $row2['emp_type'];

        $query4  = "SELECT d_amount from deductions where emp_id ='".$emp_id."'";
        $q4 = $conn->query($query4);
        while($row4 = $q4->fetch_assoc()){
            $deduction = $deduction + $row4['d_amount'];
        }



        $query3  = "SELECT * from salary where emp_id ='".$emp_id."'";
        $q3 = $conn->query($query3);
        $row3 = $q3->fetch_assoc();
        $bonus           = $row3['bonus'];
        $salary_rate   = $row3['salary_rate'];
        $advance  = $row3['advance'];

        $query6  = "SELECT count(w_date) as days from works where emp_id='".$emp_id."'";
        $q6 = $conn->query($query6);
        $row6 = $q6->fetch_assoc();
        $days = $row6["days"];

        if($type == "Casual"){
            $salary = $salary_rate * $days;
        }
        else{
            $salary = $salary_rate;
        }

        $query7  = "SELECT * from payment where emp_id ='".$emp_id."'";
        $q7 = $conn->query($query7);
        while($row7 = $q7->fetch_assoc()){
          $pay_status = $row7["$pay_status"];
          date_default_timezone_set("Asia/Dhaka");
          $thisMonth =  date("m-Y");
          $payiedMonth = date('m-Y', strtotime($row7['pay_date']));
          if($payiedMonth == $thisMonth){
              $paid = $row7['pay_amount'];

          }

          if($row7["due_status"]=='1'){
              $dueMonth = date('d-M', strtotime($row7['pay_date']));
              $dueStatus = '1';
              $due = $row7["due"];

          }
          else{
              $dueMonth = "No Due";
          }

        }

        $paid = $paid;
        $income   = $due + $bonus + $salary;
        $netpay   = $income - ($paid + $deduction);


        ?>

        <?php
        include("php/headerPayment.php");
        ?>
                <div id="page-wrapper">
                    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Payment for <?php echo ' '.$row2['fname']." ". $row2['lname'] ?></h1>
                <h1 class="page-subhead-line">Welcome to <strong><?php echo ' '. $siteName ?></strong> Today is:
                <i class="icon-calendar icon-large" ></i>


                <?php
                date_default_timezone_set("Asia/Dhaka");
                echo  date(" l, F d, Y") . "<br>";

                ?>
                 </h1>

            </div>
        </div>



        <form class="form-horizontal" action="add_payment.php" method="post" name="form">


            <div class="container-fluid">
                <div class="row">

                    <div class="col-4 bg-success">
                        <?php
                        include("php/checkSalaryPaid.php");
                        if(!$pay_status){
                          ?>
                          <div class="form-group">
                            <br>
                            <label class="col-sm-1 control-label"></label>

                              <label class="col-sm-6 control-label">Note: If you pay you will not able to pay this emoloyee for this month.</label>

                          </div>
                          <input type="hidden" name="new" value="1" />
                          <input name="id" type="hidden" value="<?php echo $emp_id?>" />
                          <br>
                          <div class="form-group">
                              <label class="col-sm-4 control-label">Net Pay  :</label>
                              <div class="col-sm-4">
                                  <input type="text" name="salary" class="form-control" value="<?php echo $netpay;?>" required="required">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-4 control-label">Pay Amount  :</label>
                              <div class="col-sm-4">
                                  <input type="readonly" id="pay" name="pay" class="form-control" value="" placeholder="Enter Amount" required="required">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 control-label">Due :</label>
                              <div class="col-sm-4">
                                  <input type="text"  name="due" class="form-control" value="" required="required" readonly>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 control-label">Payment method :</label>
                              <div class="col-sm-4">
                                  <input type="radio" name="pay_method"  value="cash">Cash &nbsp;&nbsp;
                                  <input type="radio" name="pay_method" value="bkash">Bkash
                                  <input name="due_status" type="hidden" value="<?php echo $dueStatus?>" />


                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-4 control-label"></label>
                              <div class="col-sm-4">
                                  <input type="submit" name="submit" value="Pay" class="btn btn-success">
                                  <a href="home_payment.php" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                          <br>
                          <?php
                        }else{
                          ?>
                          <div class="form-group bg-danger">

                              <div class = "row">
                                <div class="col-12 ">
                                  <h1 class="h1" align="center">Salary Paid in this month for  <?php echo ' '.$row2['fname']." ". $row2['lname'] ?></h1>
                                </div>
                              </div>
                          </div>

                          <?php
                        }
                         ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-subhead-line">Payment List:</strong>


                        </div>
                    </div>
                    <div class="well bs-component">
                      <form class="form-horizontal">
                        <fieldset>

                          <div class="table-responsive">
                            <form method="post" action="" >
                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">
                                <th><p align="center">Date</p></th>
                                <th><p align="center">amount</p></th>
                                <th><p align="center">method</p></th>
                                <th><p align="center">Due</p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $id=$_REQUEST['emp_id'];

                            $query5  = "SELECT * from payment where emp_id = '$id'";
                            $q5 = $conn->query($query5);
                            while($row5 = $q5->fetch_assoc()) {


                                $pay_date = $row5['pay_date'];
                                $pay_dateFull =  date('D,', strtotime($row5['pay_date'])).
                                 date(' d-', strtotime($row5['pay_date'])).
                                    date(' F, ', strtotime($row5['pay_date'])).
                                 date(' Y', strtotime($row5['pay_date']));

                                $pay_method = $row5['pay_method'];
                                $pay_amount = $row5['pay_amount'];
                                $due = $row5['due'];



                                ?>
                                <tr>
                                    <td align="center"><?php echo $pay_dateFull?></td>
                                    <td align="center"><?php echo $pay_amount?>.00</td>
                                    <td align="center"><big><b><?php echo $pay_method?></b></big></td>
                                    <td align="center"><?php echo $due?>.00</td>

                                </tr>
                            <?php } ?>

                            </tbody>

                            <tr class="info">
                                <th><p align="center">Date</p></th>
                                <th><p align="center">Amount</p></th>
                                <th><p align="center">Method</p></th>
                                <th><p align="center">Due</p></th>
                            </tr>
                        </table>
                      </form>
                    </div>
                  </fieldset>
                </form>
              </div>
        <?php
    }
    ?>

    <!-- this modal is for ADDING Salary -->
    <div class="modal fade" id="addDeduction" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center"><b>Add salary for an Employee</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <?php
                            $id=$_REQUEST['emp_id'];

                            ?>

                            <label class="col-sm-4 control-label">ID :</label>
                            <div class="col-sm-8">
                                <input type="text" name="emp_id" class="form-control"  value="<?php echo $id; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Date :</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="datepicker" name="d_date" type="text" />
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Cause :</label>
                            <div class="col-sm-8">
                                <input type="text" name="d_cause" class="form-control" placeholder="Enter Deduction Cause" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Amount :</label>
                            <div class="col-sm-8">
                                <input type="text" name="d_amount" class="form-control" placeholder="Enter Amount" required="required">
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
    $(document).ready(function()
    {
        $("#myBtn").click(function()
        {
            $("#myModal").modal();
        });
    });
</script>
</br>


    <?php
    include ("last.php");

    ?>
