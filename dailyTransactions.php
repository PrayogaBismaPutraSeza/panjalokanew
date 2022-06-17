<?php

include("first.php");
include("add_dailyTransaction.php");


$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
  }
?>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">

<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">My Daily Transactions</h1>
        <h1 class="page-subhead-line">Welcome to <strong><?php echo ' '. $siteName ?></strong> Today is:
        <i class="icon-calendar icon-large" ></i>


        <?php
        date_default_timezone_set("Asia/Dhaka");
        echo  date(" l, F d, Y") . "<br>";

        ?>
         </h1>

    </div>
</div>

          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>

                <button type="button" data-toggle="modal" data-target="#addTransaction" class="btn btn-success">Add New Transaction</button>
                <br><br>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">SNO:</p></th>
                          <th><p align="center">Date</p></th>
                          <th><p align="center">Amount</p></th>
                          <th><p align="center">Cause</p></th>
                            <th><p align="center">Method</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php




                          $query = "select * from transaction where delete_status = '0' ORDER BY sno asc ";
                        $q = $conn->query($query);
                        $serial = 0;
                        while($row = $q->fetch_assoc())
                          {
                            $serial++;
                            $sno     =$row['sno'];
                            $date = date('D-d/M-Y', strtotime($row['t_date']));
                            $cause   =$row['cause'];
                            $amount  =$row['amount'];
                            $method  =$row['method'];



                        ?>

                        <tr>
                          <td align="center"><a  title="Update">  <?php echo $serial ?></a></td>
                          <td align="center"><a  title="Update"><?php echo $date ?></a></td>
                          <td align="center"><a  title="Update"><?php echo $amount?></a></td>
                          <td align="center"><a  title="Update"><?php echo $cause?></a></td>
                            <td align="center"><a  title="Update"><?php echo $method ?></a></td>

                        </tr>

                        <?php } ?>
                      </tbody>

                        <tr class="info">
                          <th><p align="center">SNO:</p></th>
                          <th><p align="center">Date</p></th>
                          <th><p align="center">Amount</p></th>
                          <th><p align="center">Cause</p></th>
                            <th><p align="center">Method</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an Product -->
      <div class="modal fade" id="addTransaction" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Transaction</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Date :</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="datepicker" name="date" type="text" />
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
                        <input type="text" name="cause" class="form-control" placeholder="Enter Transaction Cause" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Amount :</label>
                    <div class="col-sm-8">
                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Payment method :</label>
                    <div class="col-sm-4">
                        <input type="radio" name="method"  value="cash">Cash &nbsp;&nbsp;
                        <input type="radio" name="method" value="bkash">Bkash


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




        <?php

        include ("last.php");

        ?>
