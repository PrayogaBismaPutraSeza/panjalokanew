<?php
  include("first.php"); //include auth.php file on all secure pages



?>

      <?php
      global $sno;
        $sno=$_REQUEST['sno'];

      $query  = "SELECT * from product_operation_history where sno='".$sno."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

           $quantity = $row["quantity"];
            $operation = $row["operation"];
           $date = $row["date"];
           $result = $row["result"];
           $remark = $row["remark"];
           $value= $row["value"];
           
           $pid = $row["pid"];
           $query1  = "SELECT p_name from product where p_id='".$pid."'";
           $q1 = $conn->query($query1);
           $row1 = $q1->fetch_assoc();
          

          ?>

          <?php
          include("php/headerStore.php");
          ?>
                  <div id="page-wrapper">
                      <div id="page-inner">


          <div class="row">
              <div class="col-md-12">
                  <h1 class="page-head-line">Product: <?php echo $row1['p_name']; ?></h1>
                  <style type="text/css">
        .different-text-color { color: green; }
        </style>

       <marquee>  <h1 class="page-subhead-line"><p style="font-size:x-large;"><span class="different-text-color">WELCOME TO--PRODUCT @ <strong><?php echo ' '. $siteName ?></strong> Today is:
        <i class="icon-calendar icon-large" ></i>


        <?php
        date_default_timezone_set("Asia/Jakarta");
        echo  date(" l, F d, Y") . "<br>";

        ?>
         </span></p></h1> </marquee>

              </div>
          </div>


              <form class="form-horizontal" action="update_quantity.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="sno" type="hidden" value="<?php echo $sno;?>" />
                <input name="pid" type="hidden" value="<?php echo $pid;?>" />

                <div class="form-group">
                  <label class="col-sm-5 control-label">Product Name  :</label>
                  <div class="col-sm-4">
                    <input type="text" name="p_name" class="form-control" value="<?php echo $row1['p_name'];?>" required="required" readonly>
                  </div>
                </div>
                <div class="form-group">
                            <label class="col-sm-5 control-label">Date :</label>
                            <div class="col-sm-4">

                                <input class="form-control" id="datepicker" name="date" value="<?php echo $date;?>" type="text" />
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>

                  <div class="form-group">
                      <label class="col-sm-5 control-label">Qunatity :</label>
                      <div class="col-sm-4">
                          <input type="number" id="stock_quantity" name="quantity" class="form-control" value="<?php echo $quantity;?>" required="required" readonly >
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Select Operation:</label>
                      <div class="col-sm-4">
                          <input type="radio" id="Operation" name="stock_operation"  value="add" required="required">Add &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" id="Operation" name="stock_operation" value="sub" required="required">Substract


                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Value :</label>
                      <div class="col-sm-4">
                          <input type="number" id="operation_value" name="operation_value" class="form-control" value="<?php echo $value;?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Result :</label>
                      <div class="col-sm-4">
                          <input type="number" id="result" name="output" class="form-control" value = "<?php echo $result;?>" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Remark :</label>
                      <div class="col-sm-4">
                          <input type="text"  name="remark" value="<?php echo $remark;?>" class="form-control" >
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submitHistory" value="Update" class="btn btn-warning">
                      <a href="manage_product_quantity.php?p_id=<?php echo $pid ?>" class="btn btn-danger"><em class="fas fa-window-close"></em></a>
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
    <script src="assets/jquery/stockOperation.js" type="text/javascript"></script>
    <?php
  include("last.php");
  ?>
