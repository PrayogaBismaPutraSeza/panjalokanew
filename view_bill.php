<?php
  include("first.php"); //include auth.php file on all secure pages

  include("php/headerBill.php");


$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
  }
?>






      <?php
      global $company_id;
      global $bill_id;
      global $company_group_id;
      global $company_group;
      global $billsno;
        $bill_no=$_REQUEST['bill_no'];

      $query  = "SELECT * from companybill where bill_no = '".$bill_no."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {
          $billsno = $row["billsno"];

          $query11  = "SELECT * from bill where billsno = '".$billsno."'";
          $q11 = $conn->query($query11);
          $row11 = $q11->fetch_assoc();
          $company_id = $row11["company_id"];
          $bill_id = $row11["bill_id"];
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
          }
          ?>
          <div id="page-wrapper">
              <div id="page-inner">

          <div class="row">
              <div class="col-md-12">
                  <h2 class="page-head-line"><?php echo "Company : ". $company_name."/". $bill_id ?></h2>
                  <h1 class="page-subhead-line">Welcome to <strong><?php echo ' '. $siteName ?></strong> Today is:
                  <i class="icon-calendar icon-large" ></i>


                  <?php
                  date_default_timezone_set("Asia/Jakarta");
                  echo  date(" l, F d, Y") . "<br>";

                  ?>
                   </h1>

              </div>
          </div>

              <form class="form-horizontal" action="update_bill.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="billsno" type="hidden" value="<?php echo $billsno?>" />
                <div class="form-group">
                    <label class="col-sm-4 control-label">Bill No :</label>
                    <div class="col-sm-4">
                        <input type="text" name="bill_no" value="<?php echo $bill_no?>" class="form-control" placeholder="Enter Bill No" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Company :</label>
                    <div class="col-sm-4">
                        <input type="text" name="company_name" value="<?php echo $company_name?>" class="form-control" placeholder="Enter Amount" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Group :</label>
                    <div class="col-sm-4">
                        <input type="text" name="company_group" value="<?php echo $company_group?>" class="form-control" placeholder="Enter Amount" required="required">
                    </div>
                </div>

                  <div class="form-group">
                      <label class="col-sm-4 control-label">Work Type :</label>
                      <div class="col-sm-4">
                          <input type="text" name="work_type" value="<?php echo $work_type?>" class="form-control" placeholder="Enter Amount" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Area :</label>
                      <div class="col-sm-4">
                          <input type="text" name="area" value="<?php echo $work_area?>" class="form-control" placeholder="Enter Amount" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-4 control-label">Bill Date :</label>
                      <div class="col-sm-4">
                          <input class="form-control" id="datepicker" value="<?php echo $bill_date?>" name="bill_date" type="text" />
                          <script>
                              $('#datepicker').datepicker({
                                  uiLibrary: 'bootstrap4'
                              });
                          </script>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-4 control-label">Amount :</label>
                      <div class="col-sm-4">
                          <input type="text" name="bill_amount" value="<?php echo $bill_amount?>" class="form-control" placeholder="Enter Amount" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Receive Date :</label>
                      <div class="col-sm-4">
                          <input class="form-control" id="datepicker1" value="<?php echo $receive_date?>" name="received_date" type="text" />
                          <script>
                              $('#datepicker1').datepicker({
                                  uiLibrary: 'bootstrap4'
                              });
                          </script>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-4 control-label"> Receive Amount :</label>
                      <div class="col-sm-4">
                          <input type="text" name="received_amount" value="<?php echo $received_amount?>" class="form-control" placeholder="Enter Amount" required="required">
                      </div>
                  </div>
<br><br>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submitBillUpdate" value="Update" class="btn btn-danger">
                      <a class="btn btn-info " href="home_bill.php?company_id=<?php echo $company_id ?>">Cancel</a>
                    </div>
                  </div>

              </form>


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
<?php include("last.php") ?>
