<?php
include("first.php"); //include auth.php file on all secure pages

include("add_deductionRegular.php");


// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
global $billsno;

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

global $billsno;
$billsno = $_REQUEST['billsno'];
global $totalBill;
global $company_name;
global $company_group;
global $company_id;
global $bill_id;
global $paid;
global $reduced;
global $remark;
global $found;
$found = false;
$query  = "SELECT * from bill where billsno = '".$billsno."' ";
$q = $conn->query($query);
$row = $q->fetch_assoc();
$company_id = $row["company_id"];
$bill_id = $row["bill_id"];

$totalBill = 0;
$paid = 0;
$reduced = 0;

$query0  = "SELECT name from company where id = '".$company_id."'";
$q0 = $conn->query($query0);
$row0 = $q0->fetch_assoc();
$company_name = $row0["name"];

$query1  = "SELECT * from companybill as cb, bill as b  where b.billsno = '".$billsno."' AND b.company_id = '".$company_id."' AND b.billsno = cb.billsno";

$q1 = $conn->query($query1);
while($row1 = $q1->fetch_assoc())
{
  $totalBill = $totalBill + $row1["bill_amount"];
  $bill_no = $row1["bill_no"];

  $paid = $paid + $row1["receive_amount"];
  $query2  = "SELECT name from company where id = '".$company_id."'";
  $q2 = $conn->query($query2);
  $row2 = $q2->fetch_assoc();
  $company_name = $row2["name"];

  $company_group_id = $row1["company_group_id"];
  $query3  = "SELECT g_name from compaygroup where g_id = '".$company_group_id."'";
  $q3 = $conn->query($query3);
  $row3 = $q3->fetch_assoc();
  $company_group = $row3["g_name"];

  $work_type = $row1["work_type"];
  $work_area = $row1["work_area"];
  $bill_date = $row1["bill_date"];
  $receive_date= $row1["receive_date"];
  $bill_amount = $row1["bill_amount"];
  $received_amount = $row1["receive_amount"];
  $remark = $row1["remark"];
  $pay_status = $row1["pay_status"];

  if($pay_status == "1"){
      $class = "paid";
      $status="Paid";
  }
  else if($pay_status == "2"){
      $class = "due";
      $status="Have Due";
  }
  else{
      $class = "notpaid";
      $status="Not Paid";
  }
}

?>

<?php
include("php/headerBill.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">




              <div class="row">
                  <div class="col-md-12">
                      <h2 class="page-head-line"><?php echo "Company : ". $company_name."/". $bill_id ?></h2>
                      <h1 class="page-subhead-line">Welcome to <strong><?php echo ' '. $siteName ?></strong> Today is:
                      <i class="icon-calendar icon-large" ></i>


                      <?php
                      date_default_timezone_set("Asia/Dhaka");
                      echo  date(" l, F d, Y") . "<br>";

                      ?>
                       </h1>

                  </div>
              </div>



        <form class="form-horizontal" action="add_bill.php" method="post" name="form">

            <div class="container-fluid">

              <div class="row">


                  <div class="col-12 bg-success">

                    <?php
                    $query0  = "SELECT * from billreceived where billsno = '".$billsno."'";
                    $q0 = $conn->query($query0);
                    while($row0 = $q0->fetch_assoc()){
                      $found = true;
                    }
                    if(!$found){
                      ?>
                      <input type="hidden" name="new" value="1" />
                      <input name="company_id" type="hidden" value="<?php echo $company_id?>" />
                      <input name="billsno" type="hidden" value="<?php echo $billsno?>" />


                      <br><br>
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Total Bill  :</label>
                          <div class="col-sm-4">
                              <input type="text" id="totalBill" name="totalBill" class="form-control" value="<?php echo $totalBill;?>" required="required" readonly>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-4 control-label">Paid  :</label>
                          <div class="col-sm-4">
                              <input type="readonly" id="paid" name="paid" class="form-control" value="<?php echo $paid;?>" placeholder="" required="required" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label">New Paid  :</label>
                          <div class="col-sm-4">
                              <input type="readonly" id="npaid" name="npaid" class="form-control" value="" placeholder="Enter Amount">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Total Paid  :</label>
                          <div class="col-sm-4">
                              <input type="readonly" id="tpaid" name="tpaid" class="form-control" value="<?php echo $paid;?>" placeholder="" required="required" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Reduced :</label>
                          <div class="col-sm-4">
                            <?php
                            $query9  = "SELECT * from billreceived where billsno = '".$billsno."'";
                            $q9 = $conn->query($query9);
                            $row9 = $q9->fetch_assoc();
                            $BillPaid = $row9["received_amount"];

                            $paid = $paid + $BillPaid;

                             $reduced = $totalBill - $paid;?>

                              <input type="text"  name="reduced" class="form-control" value="<?php echo $reduced;?>" required="required" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Remark  :</label>
                          <div class="col-sm-4">
                              <textarea type="readonly" rows = "3"  name="remark" class="form-control" value="" placeholder="Enter Your Remark" required="required"></textarea>
                          </div>
                      </div>


                      <br><br>

                      <div class="form-group">
                          <label class="col-sm-4 control-label"></label>
                          <div class="col-sm-4">
                              <input type="submit" name="setAsPaid" value=" Set as Paid " class="btn btn-success">
                              <a href="home_bill.php" class="btn btn-danger">Cancel</a>
                          </div>
                          <br><br>
                      </div>

                      <?php
                    }
                      else{
                        ?>
                        <br>
                        <div class="alert alert-success" align="center">
                            <h3>This company has paid all bills. </h3>

                        </div>
                        <?php
                      }
                        ?>

                  </div>

              </div>
            </div>

            <div class="well bs-component">
                <fieldset>

                  <div class="table-responsive">

                      <?php
                      $query0  = "SELECT * from billreceived where billsno = '".$billsno."'";
                      $q0 = $conn->query($query0);
                      while($row0 = $q0->fetch_assoc()){
                        $found = true;
                      }
                      if(!$found){
                        ?>

                        <button type="button" data-toggle="modal" data-target="#addBill" class="btn btn-success">New Company Group bill</button>
                        <a href="PrintBill/invoice.php?billsno=<?php echo $billsno ?>" class="btn btn-primary">Print</a>
                        <br><br>
                        <?php
                      }
                        else{
                          ?>
                          <div class="form-group">
                              <div class="col-sm-4">
                                  <a href="home_bill.php" class="btn btn-info">Back</a>
                              </div>
                          </div>
                          <?php
                        }
                          ?>


                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">
                                <th><p align="center">SN</p></th>
                                <th><p align="center">Bill No</p></th>
                                <th><p align="center">Group</p></th>
                                <th><p align="center">Work Type</p></th>
                                <th><p align="center">Area</p></th>
                                <th><p align="center">Bill Date</p></th>
                                <th><p align="center">Bill Amount</p></th>
                                <th><p align="center">Received Date</p></th>
                                <th><p align="center">Received Amount</p></th>
                                <th><p align="center">Reduced</p></th>
                                <th><p align="center">Remark</p></th>
                                <th><p align="center">Status</p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            global $sn;

                            global $s_id;
                            global $due;
                            global $remark;
                            $sn = 0;
                            $query  = "SELECT * from companybill as cb, bill as b  where b.billsno = '".$billsno."' AND b.company_id = '".$company_id."' AND b.billsno = cb.billsno";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $s_id = $row["s_id"];
                              $sn++;

                              $bill_no = $row["bill_no"];

                              $query1  = "SELECT * from company where id = '".$company_id."'";
                              $q1 = $conn->query($query1);
                              $row1 = $q1->fetch_assoc();
                              $company_name = $row1["name"];

                              $company_group_id = $row["company_group_id"];
                              $query2  = "SELECT g_name from compaygroup where g_id = '".$company_group_id."' AND id = '".$company_id."'";
                              $q2 = $conn->query($query2);
                              $row2 = $q2->fetch_assoc();
                              $company_group = $row2["g_name"];

                              $work_type = $row["work_type"];
                              $work_area = $row["work_area"];
                              $bill_date = $row["bill_date"];
                              $receive_date= $row["receive_date"];
                              $bill_amount = $row["bill_amount"];
                              $received_amount = $row["receive_amount"];
                              $reduced = $row["reduced"];
                              $remark = $row["remark"];
                              $pay_status = $row["pay_status"];

                              if($pay_status == "1"){
                                  $class = "paid";
                                  $status="Paid";
                              }
                              else if($pay_status == "2"){
                                  $class = "due";
                                  $status="Have Due";
                              }
                              else{
                                  $class = "notpaid";
                                  $status="Not Paid";
                              }



                                ?>
                                <tr>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $sn?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $bill_no?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $company_group?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $work_type?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $work_area?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $bill_date?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $bill_amount?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $receive_date ?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $received_amount ?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $reduced ?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $remark  ?></td>
                                    <td align="center" class="<?php  echo $class ?>"><?php echo $status ?></td>


                                </tr>
                            <?php } ?>
                            </tbody>

                            <tr class="info">
                              <th><p align="center">SN</p></th>
                              <th><p align="center">Bill No</p></th>
                              <th><p align="center">Group</p></th>
                              <th><p align="center">Work Type</p></th>
                              <th><p align="center">Area</p></th>
                              <th><p align="center">Bill Amount</p></th>
                              <th><p align="center">Bill Date</p></th>
                              <th><p align="center">Received Amount</p></th>
                              <th><p align="center">Received Date</p></th>
                              <th><p align="center">Reduced</p></th>
                              <th><p align="center">Remark</p></th>
                              <th><p align="center">Status</p></th>
                            </tr>
                        </table>
                      </form>
                    </div>
                  </fieldset>

              </div>


    <!-- this modal is for ADDING Company Bill -->
    <div class="modal fade" id="addBill" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:30px 60px;">

                    <h3 align="center"><b>Add Bill of a Company</b></h3>
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>


                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="add_bill.php" name="form" method="post">
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Bill No :</label>
                          <input type="hidden" name="billsno" class="form-control" value = "<?php echo $billsno?>">
                          <div class="col-sm-8">
                              <input type="text" name="bill_no" class="form-control" placeholder="Enter Bill No" required="required">
                          </div>
                      </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Company :</label>
                            <div class="col-sm-8">
                              <select  class="form-control" id="company" style=" height:35px;" name="company" onchange="myFunction(this.value)">
                                <option value=''>------- Select --------</option>
                                <?php
                                $query1  = "SELECT id, name from company where id = '".$company_id."' ";
                                $q1 = $conn->query($query1);
                                while($row1 = $q1->fetch_assoc())
                                {
                                ?>
                                  <option class="form-control" value = "<?php echo $row1["id"] ?>"><?php echo $row1["name"] ?></option>
                                  <?php  }?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Group :</label>
                            <div class="col-sm-8">
                                <select  name = "group" class="form-control" id="group" style=" height:35px;">

                                    <option  class="form-control"></option>

                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Work Type :</label>
                            <div class="col-sm-8">
                                <input type="text" name="work_type" class="form-control" placeholder="Enter Type of work" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Area :</label>
                            <div class="col-sm-8">
                                <input type="text" name="area" class="form-control" placeholder="Enter Amount" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Date :</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="datepicker" name="bill_date" type="text" />
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Amount :</label>
                            <div class="col-sm-8">
                                <input type="text" name="bill_amount" class="form-control" placeholder="Enter Amount" required="required">
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
        $(document).ready(function()
        {
            $('#myTable').DataTable();
        });
    }
</script>

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
