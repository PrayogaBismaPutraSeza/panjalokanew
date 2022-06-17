<?php
  include("first.php"); //include auth.php file on all secure pages

global $name,$emp_id,$t;

  $id=$_REQUEST['deduction_id'];
  
  $query  = "SELECT emp_id from deductions where deduction_id='".$id."'";
  $q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
    $emp_id = $row['emp_id'];
  }

  $query1  = "SELECT * from employee where emp_id='".$emp_id."'";
  $q1 = $conn->query($query1);
while($row1 = $q1->fetch_assoc())
  {
    $name = $row1['fname'].' ' .$row1['lname'];
    
    if($row1["emp_type"]=="Regular"){
        $t="1";
    }
    else if($row1["emp_type"]=="Casual"){
        $t="2";
    }
    else if($row1["emp_type"]=="Job Order"){
        $t="3";
    }
    else{$t=4;}
  }
?>
<?php
include("php/headerCompany.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">




<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line"><?php echo $name; ?></h1>
        <h1 class="page-subhead-line">Welcome to <strong><?php echo ' '. $siteName ?></strong> Today is:
        <i class="icon-calendar icon-large" ></i>


        <?php
        date_default_timezone_set("Asia/Dhaka");
        echo  date(" l, F d, Y") . "<br>";

        ?>
         </h1>

    </div>
</div>
      <?php
        $id=$_REQUEST['deduction_id'];

      $query  = "SELECT * from deductions where deduction_id='".$id."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

          ?>

              <form class="form-horizontal" action="update_deduction.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $id;?>" />
                <input name="emp_id" type="hidden" value="<?php echo $emp_id;?>" />
                 <input name="type" type="hidden" value="<?php echo $t;?>" />

                  
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Employee  Name:</label>
                    <div class="col-sm-4">
                      <input type="text" name="lname" class="form-control" value="<?php echo $name;?>" required="required" readonly>
                      
                    </div>
                  </div>
                  <div class="form-group">
                            <label class="col-sm-5 control-label">Deduction Date :</label>
                            <div class="col-sm-4">

                                <input class="form-control" id="datepicker" name="d_date" value="<?php echo $thisDate;?>" type="text" />
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Cause:</label>
                    <div class="col-sm-4">
                      <input type="text" name="d_cause" class="form-control" value="<?php echo $row["d_cause"];?>" required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Amount:</label>
                    <div class="col-sm-4">
                      <input type="text" name="d_amount" class="form-control" value="<?php echo $row["d_amount"];?>" required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Remark:</label>
                    <div class="col-sm-4">
                      <input type="text" name="remark" class="form-control" value="<?php echo $row["remark"];?>">
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="edit_regularAccount.php?emp_id=<?php echo $emp_id;?>" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>

              </form>
            <?php
          }
        ?>

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
  include("last.php");
?>
